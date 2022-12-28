<?php
    print '
    <h1>Contact</h1>
    <div class = "mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.7972887291744!2d15.967324915715018!3d45.795288719310435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d68b441ce2df%3A0x54e2a03adf42446f!2sTehni%C4%8Dko%20veleu%C4%8Dili%C5%A1te%20u%20Zagrebu!5e0!3m2!1shr!2shr!4v1667072711005!5m2!1shr!2shr" width = 100% height = 300px referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <form class = "kontakt_forma" action = "" method = "POST">
        <label for="ime">Ime:</label>
        <input type="text" id = "ime" name = "ime" placeholder="Vaše ime" required>
        <br>
        <label for="prezime">Prezime:</label>
        <input type="text" id = "prezime" name = "prezime" placeholder="Vaše prezime" required>
        <br>
        <label for="drzava">Država:</label>
        <select id = "drzava" name = "drzava">
            <option value = "">Odaberite...</option>';
            $upit  = "SELECT * FROM country";
            $ispis = mysqli_query($baza, $upit);
            while($redak = mysqli_fetch_array($ispis)) {
                print '<option value="' . $redak['numcode'] . '">' . $redak['nicename'] . '</option>';
            }
        print '
        </select>
        <br>
        <label for="email">E-Mail:</label>
        <input type="email" id = "email" name = "email" placeholder="Vaš e-mail" required>
        <br>
        <label for="naslov">Naslov:</label>
        <input type="text" id = "naslov" name = "naslov" placeholder="Naslov:">
        <br>
        <label for="poruka">Poruka:</label>
        <textarea id = "poruka" name = "poruka" placeholder="Poruka:" cols = 15 rows = 20></textarea>
        <br>
        <input type = "submit" name = "submit_contact" value = "Pošalji">
    </form>';

    if(isset($_POST['submit_contact'])){
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $drzava = $_POST['drzava'];
        $email = $_POST['email'];
        $naslov = $_POST['naslov'];
        $poruka = $_POST['poruka'];

        $upit = "INSERT INTO contact (ime, prezime, drzava, email, naslov, poruka) VALUES ('$ime', '$prezime', '$drzava', '$email', '$naslov', '$poruka')";
        $upis = mysqli_query($baza, $upit);

        $_SESSION['message'] = "Zahvaljujemo na Vašem upitu, odgovoriti ćemo Vam u najbržem mogućem roku";
	}


?>