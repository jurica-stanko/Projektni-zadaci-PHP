<?php
	# Stop Hacking attempt
    define('__APP__', TRUE);

	# Start session
	session_start();
	
	
	unset($_POST);
	unset($_SESSION['korisnik']);

	$_SESSION['korisnik']['prijavljen'] = 'FALSE';
	$_SESSION['message'] = '<p>Dođite nam ponovo</p>';
	
	header("Location: index.php?navigacija=1");
	exit;
?>