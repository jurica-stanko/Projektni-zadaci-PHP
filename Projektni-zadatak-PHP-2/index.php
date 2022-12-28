<?php
include("connect.php");
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
                    <li><a href = "index.php?navigacija=5">Gallery</a></li>
                </ul>
            </nav>
        </div>
    </header>';
    if ($_GET['navigacija'] == 1) 
    {
        print ' <div class="div-slika">
        <img src = "restaurant.jpg" class = "slika">
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

    if (!isset($_GET['navigacija']) || $_GET['navigacija'] == 1) {include("home.php");}
    else if ($_GET['navigacija'] == 2) {include("ponuda-jela.php"); }
    else if ($_GET['navigacija'] == 3) {include("contact.php"); }
    else if ($_GET['navigacija'] == 4) {include("about.php"); }
    else if ($_GET['navigacija'] == 5) {include("gallery.php"); }
    
    else if ($_GET['navigacija'] == 6) {include("jelo-1.php"); }
    else if ($_GET['navigacija'] == 7) {include("jelo-2.php"); }
    else if ($_GET['navigacija'] == 8) {include("jelo-3.php"); }
    else if ($_GET['navigacija'] == 9) {include("jelo-4.php"); }


    print'
    </main>
    <footer>
        <p>Copyright &copy; 2022, Jurica Stanko</p><a href = "https://github.com/jurica-stanko"><img src = "social/github.svg" class = "ikona"></a>
    </footer>
</body>
</html>';
?>

