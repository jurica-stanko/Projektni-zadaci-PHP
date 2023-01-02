<?php
if ($_SESSION['korisnik']['prijavljen']) {
    if ($action == 1) {
        include("admin-korisnici.php");
    } else if ($action == 2) {
        include("admin-jela.php");
    } else if ($action == 3) {
        include("dodaj-jelo.php");
    }
} else {
    print '<p>Došli ste na ovu stranicu pogreškom, molimo prijavite se.</p>';
    header("Location: index.php/navigacija=1");
}
