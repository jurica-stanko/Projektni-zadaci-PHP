<?php
if (isset($_POST['_action_']) && $_POST['_action_'] == 'dodaj_jela') {
    //$_SESSION['message'] = '';
    $naslov = $_POST['naslov'];
    $opis = htmlspecialchars($_POST['opis'], ENT_QUOTES);
    $upit  = "INSERT INTO jela (naziv, opis) VALUES ('$naslov', '$opis')";
    $rezultat = mysqli_query($baza, $upit);

    $trenutni_id = mysqli_insert_id($baza);

    //dodavanje slike
    if (isset($_POST['submit_jelo'])) {
        $errorUpload = '';
        $uploadDir = "galerija/";
        $dopusteniTip = array('jpg', 'png', 'jpeg', 'gif');
        $imena = array_filter($_FILES['slike']['name']);

        if (!empty($imena)) {
            //$_SESSION['message'] .= $_FILES['slike']['name'][0];
            //debug_to_console("prosao je prvi dio");
            foreach ($_FILES['slike']['name'] as $index => $value) {
                $ime = $trenutni_id . '-' . rand(1, 1000) . '-' . basename($_FILES['slike']['name'][$index]);
                $path = $uploadDir . $ime;

                $fileType = pathinfo($path, PATHINFO_EXTENSION);
                if (in_array($fileType, $dopusteniTip)) {
                    if (move_uploaded_file($_FILES["slike"]["tmp_name"][$index], $path)) {
                        $_upit = "INSERT INTO slike (naziv, idJela) VALUES ('$ime', $trenutni_id)";
                        $_rezultat = mysqli_query($baza, $_upit);
                    } else {
                        $errorUpload .= $_FILES['slike']['name'][$index] . ' | ';
                    }
                } else {
                    $errorUploadType .= $_FILES['slike']['name'][$index] . ' | ';
                }
            }
            $_SESSION['message'] = 'Vaše jelo je poslano i čeka odobravanje administratora.';
        }
    }
} else {
    print '
    <h2>Dodavanje jela</h2>
    <form class="kontakt_forma" name="kontakt_forma" action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="_action_" name="_action_" value="dodaj_jela">
        <br>
        <label for="naslov">Naslov *</label>
        <input type="text" id="naslov" name="naslov" placeholder="Naslov jela" required>
        <br>
        <label for="opis">Recept i opis *</label>
        <textarea id="opis" name="opis" placeholder="Opis i recept jela" required cols = 15 rows = 20></textarea>
        <br><br>
        <label for="slika">Slika</label>
        <input type="file" id="slika" name="slike[]" multiple>
        <br>
        <hr>
        
        <input type="submit" name = "submit_jelo" value="Pošalji">
    </form>
    <p><a href="index.php?navigacija=1">Natrag</a></p>';
}
