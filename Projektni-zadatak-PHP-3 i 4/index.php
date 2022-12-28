<?php

include("connect.php");
include ("funkcije.php");
if(isset($_GET['navigacija'])) { $navigacija = (int)$_GET['navigacija']; }
if(isset($_GET['action'])) { $action = (int)$_GET['action']; }
session_start();
print 
'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naslovnica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
            <nav class = "navbar">
                <ul class = "navigacija">
                    <li><a href = "index.php?navigacija=1">Home</a></li>
                    <li><a href = "index.php?navigacija=2">Ponuda</a></li>
                    <li><a href = "index.php?navigacija=3">Contact</a></li>
                    <li><a href = "index.php?navigacija=4">About</a></li>
                    <li><a href = "index.php?navigacija=5">Gallery</a></li>';
                    if (!isset($_SESSION['korisnik']['prijavljen']) || $_SESSION['korisnik']['prijavljen'] == 'FALSE') {
                        print '
                        <li><a href="index.php?navigacija=10">Registracija</a></li>
                        <li><a href="index.php?navigacija=11">Prijava</a></li>';
                    }
                    else if ($_SESSION['korisnik']['prijavljen'] && $_SESSION['korisnik']['pravo'] == 'A') {
                        print '
                        <li><a href="signout.php">Sign Out</a></li>
                        <li><a href="index.php?navigacija=12&amp;action=1" style = "width: auto;">Administracija korisnika</a></li>
                        <li><a href="index.php?navigacija=12&amp;action=2" style = "width: auto">Administracija jela</a></li>';
                    }
                    else if ($_SESSION['korisnik']['prijavljen'] && $_SESSION['korisnik']['pravo'] == 'E') {
                        print '
                        <li><a href="signout.php">Sign Out</a></li>
                        <li><a href="index.php?navigacija=12&amp;action=2" style = "width: auto">Administracija jela</a></li>';
                    }
                    else if ($_SESSION['korisnik']['prijavljen'] && $_SESSION['korisnik']['pravo'] == 'K') {
                        print '
                        <li><a href="signout.php">Sign Out</a></li>
                        <li><a href="index.php?navigacija=12&amp;action=3" style = "width: auto">Unos jela</a></li>';
                    }
                    print'
                </ul>
            </nav>
        </div>
    </header>';
    if ($_GET['navigacija'] == 1) 
    {
        print ' <div class="div-slika">
        <img src = "slike/restaurant.jpg" class = "slika">
        </div>';
    } 
    else if ($_GET['navigacija'] == 2){
        print '
        <div class="div-slika">
            <img src="slike/chef.jpg" class="slika">
        </div>';
    }
    print '
    <main>';

    if (isset($_SESSION['message'])) {
        print $_SESSION['message'];
        unset($_SESSION['message']);
    }

    if(isset($_GET['navigacija'])){ 
        $navigacija = (int)$_GET['navigacija']; 
    }

    if (!isset($navigacija) || $navigacija == 1) {include("home.php");}
    else if ($navigacija == 2) {include("meni.php"); }
    else if ($navigacija == 3) {include("contact.php"); }
    else if ($navigacija == 4) {include("about.php"); }
    else if ($navigacija == 5) {include("gallery.php"); }
    
    else if ($navigacija == 6) {include("jelo-1.php"); }
    else if ($navigacija == 7) {include("jelo-2.php"); }
    else if ($navigacija == 8) {include("jelo-3.php"); }
    else if ($navigacija == 9) {include("jelo-4.php"); }

    else if ($navigacija == 10) {include("registracija.php"); }
    else if ($navigacija == 11) {include("prijava.php"); }

    else if ($navigacija == 12) {include ("administracija.php");}


    print'
    </main>
    <footer>
        <p>Copyright &copy; 2022, Jurica Stanko</p><a href = "https://github.com/jurica-stanko"><img src = "social/github.svg" class = "ikona"></a>
        <br>
    </footer>
</body>
</html>';
?>

