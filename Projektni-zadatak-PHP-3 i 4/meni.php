<?php
include("connect.php");
if (isset($action) && $action != '') {
	$id = $_GET['action'];
	$upit  = "SELECT * FROM jela WHERE id = $id";
	$rezultat = mysqli_query($baza, $upit);
	$redak = mysqli_fetch_array($rezultat);

	$_upit = "SELECT * FROM slike WHERE idJela = $id";
	$_rezultat = mysqli_query($baza, $_upit);

	print '
			<div class="wrapper">';
	while ($_redak = mysqli_fetch_array($_rezultat)) {
		print '
						<figure>
							<img src="jela/' . $_redak['naziv'] . '" alt="' . $redak['naziv'] . '" title="' . $redak['naziv'] . '"' . ' class = "news-slika">
						</figure>';
	}
	print '
			</div>
			<div class = "clanak">
				<h2>' . $redak['naziv'] . '</h2><hr>
				<div>
					<p class = "tekst-clanka">'  . $redak['opis'] . '</p>
					<time datetime="' . $redak['datum'] . '">' . ($redak['datum']) . '</time>
				</div>
				<hr>
				<p><a href="index.php?navigacija=2">Natrag</a></p>
			</div>';
} else {
	print '<h1>Jela u ponudi</h1>';
	$upit  = "SELECT * FROM jela WHERE arhiva = 'N' and odobreno = 'D' ORDER BY datum DESC";
	$rezultat = mysqli_query($baza, $upit);
	while ($redak = mysqli_fetch_array($rezultat)) {
		$_upit = "SELECT * FROM slike WHERE idJela = " . $redak['id'] . " LIMIT 1";
		$_rezultat = mysqli_query($baza, $_upit);
		$_redak = mysqli_fetch_array($_rezultat);

		print '
			<div class="clanci">
				<img src="jela/' . $_redak['naziv'] . '" alt="' . $redak['naziv'] . '" title="' . $redak['naziv'] . '"' . ' class = "clanak_thumbnail">
				<a href="index.php?navigacija=' . $navigacija . '&amp;action=' . $redak['id'] . '"><h2>' . $redak['naziv'] . '</h2></a>';
		print '<p class = "sazetak">';
		if (strlen($redak['opis']) > 300) {
			echo substr(strip_tags($redak['opis']), 0, 300) . '... <a href="index.php?navigacija=' . $navigacija . '&amp;action=' . $redak['id'] . '">Više...</a>';
		} else {
			echo strip_tags($redak['opis']);
		}
		print '</p>
                <br>
				<i><time datetime="' . $redak['datum'] . '">' . $redak['datum'] . '</time></i>
				<hr>
			</div>';
	}
}
