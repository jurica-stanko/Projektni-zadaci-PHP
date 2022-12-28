<?php
    if($_SESSION['korisnik']['prijavljen']){
        /*print '
        <div>
            <nav class = "navbar" style = "">
                <ul class = "navigacija" style = "Width: 50%">
                    <li style = "width: 50%"><a href = "index.php?navigacija=12&amp;action=2" style = "Width: 100%">Administracija jela</a></li>
                    <li style = "width: 50%"><a href = "index.php?navigacija=12&amp;action=1" style = "Width: 100%">Administracija korisnika</a></li>
                </ul>
            </nav>
        </div>';*/
        if ($action == 1){
            include ("admin-korisnici.php");
        }
        else if ($action == 2){
            include ("admin-jela.php");
        }
        else if ($action == 3){
            include("dodaj-jelo.php");
        }
    }
    else{
        print '<p>Došli ste na ovu stranicu pogreškom, molimo prijavite se.</p>';
        header("Location: index.php/navigacija=1");

    }
    
?>