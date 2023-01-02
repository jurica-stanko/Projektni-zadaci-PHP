<?php
include ("connect.php");
//include ("test.php");
//$varijabla = $_POST['action'];
if (!$_POST['_action_']){
    print '
    <h1>Registracija</h1>
    <form class = "kontakt_forma" action = "" method = "POST">
        <input type = "hidden" id = "_action_" name = "_action_" value = "TRUE">
        <label for="ime">Ime:</label>
        <input type="text" id = "ime" name = "ime" placeholder="Vaše ime" required>
        <br>
        <label for="prezime">Prezime:</label>
        <input type="text" id = "prezime" name = "prezime" placeholder="Vaše prezime" required>
        <br>
        <label for "datrodenja">Datum rođenja:</label>
        <input type = "date" name = "datrodenja" id = "datrodenja">
        <br>
        <label for "korIme">Korisničko ime:</label>
        <input type = "text" name = "korime" id = "korime">

        <br>
        <label for="country">Država:</label>
        <select id = "country" name = "country">
            <option value = "">Odaberite...</option>';
            $upit  = "SELECT * FROM country";
            $ispis = mysqli_query($baza, $upit);
            while($row = mysqli_fetch_array($ispis)) {
                print '<option value="' . $row['numcode'] . '">' . $row['nicename'] . '</option>';
            }
        print '
            </select>
            <br>
            <label for="ulica">Ulica:</label>
            <input type="text" id = "ulica" name = "ulica" required>
            <br>
            <label for="kucbroj">Kućni broj:</label>
            <input type="number" id = "kucbroj" name = "kucbroj" required>      
            <br>
            <label for="email">E-Mail:</label>
            <input type="email" id = "email" name = "email" placeholder="Vaš e-mail" required>
            <br>
            <label for="password">Lozinka:</label>
            <input type="password" id = "password" name = "password">
            <br>
            <label for="repassword">Ponovite lozinku:</label>
            <input type="password" id = "repassword" name = "repassword">
            <br>
            <input type = "submit" value = "Registracija">
        </form>';
}
else if ($_POST['_action_']){
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $country = $_POST['country'];
    $ulica = $_POST['ulica'];
    $kucbroj = $_POST['kucbroj'];
    $datrodenja = $_POST['datrodenja'];
    $korime = $_POST['korime'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $citaj = "SELECT * FROM korisnici WHERE email = '$email' OR korIme = '$korime'";
    $rezultat = mysqli_query($baza, $citaj);
    $redak = mysqli_fetch_array($rezultat);
    
    $provj_email = provjeriEmail($redak, $email);
    $provj_korIme = provjeriKorIme($redak, $korime);

    if ($provj_email) {
        echo '<p>Email je već u bazi</p>';
    }
    else if (!$provj_email){
        if ($password == $repassword && $password != ''){
            $zapisi = "INSERT INTO korisnici (ime, prezime, email, drzava, passwordHash, ulica, kucBroj, datRodenja, korime, korPrava, arhiva)
                    VALUES ('$ime', '$prezime', '$email', '$country', '$password_hash', '$ulica', '$kucbroj', '$datrodenja', ";
            if($provj_korIme){
                $korime .= rand(1,1000);
                print '<p>Dobro došli, vaše korisničko ime je već bilo zauzeto pa smo ga promijenili u: ' . $korime . '</p>';
                $zapisi .= "'$korime', 'K', 'N')";
            }
            else{
                print '<p>Dobro došli ' . $korime . '</p>';
                $zapisi .= "'$korime', 'K', 'N')";
            }
            $fZapisi = mysqli_query($baza, $zapisi);
        }
        else{
            print '<p>Passwordi se ne poklapaju ili nisu uneseni</p>';
        }
    }
}

?>