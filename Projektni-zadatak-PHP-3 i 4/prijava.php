<?php
include ("connect.php");
if (!$_POST['_action_']){
    print'
    <div>
        <h1>Prijava</h1>
        <form class = "kontakt_forma" action = "" method = "POST">
            <input type = "hidden" id = "_action_" name = "_action_" value = "TRUE">
            <label for="korime">Korisničko ime:</label>
            <input type="text" id = "korime" name = "korime" required>
            <br>
            <label for="password">Lozinka:</label>
            <input type="password" id = "password" name = "password" required>
            <br>
            <input type = "submit" value = "Prijava">
        </form>
    ';
}
else if ($_POST['_action_']){
    $korime = $_POST['korime'];
    $password = $_POST['password'];
    $citaj = "SELECT * FROM korisnici WHERE korIme = '$korime'";
    $rezultat = mysqli_query($baza, $citaj);
    $redak = mysqli_fetch_array($rezultat, MYSQLI_ASSOC);

    $passwordHash = $redak['passwordHash'];
    $id = $redak['id'];
    $ime = $redak['ime'];
    $prezime = $redak['prezime'];
    $korPrava = $redak['korPrava'];

    if(password_verify($password, $passwordHash) && $redak['arhiva'] == 'N'){
        $_SESSION['korisnik']['prijavljen'] = "TRUE";
        $_SESSION['korisnik']['id'] = $id;
        $_SESSION['korisnik']['ime'] = $ime;
        $_SESSION['korisnik']['prezime'] = $prezime;
        $_SESSION['korisnik']['pravo'] = $korPrava;

        $_SESSION['message'] = '<p>Dobrodošli, ' . $ime . ' ' . $prezime . '</p>';
        header("Location: index.php?navigacija=12");
        session_start();
    }
    else{
        unset($_SESSION['user']);
        $_SESSION['message'] = '<p>Unjeli ste krivo korisničko ime ili lozinku ili je profil neaktivan. Obratite se administratoru.</p>';
        header("Location: index.php?navigacija=11");

    }
} 
print'
    </div>';
