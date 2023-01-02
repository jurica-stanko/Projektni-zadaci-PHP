<?php
    define('__APP__', TRUE);

	session_start();
	
	unset($_POST);
	unset($_SESSION['korisnik']);

	$_SESSION['korisnik']['prijavljen'] = 'FALSE';
	$_SESSION['message'] = '<p>Dođite nam ponovo</p>';
	
	header("Location: index.php?navigacija=1");
	exit;
?>