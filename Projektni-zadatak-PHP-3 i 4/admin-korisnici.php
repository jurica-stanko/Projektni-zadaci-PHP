<?php
    include("connect.php");
    //ažuriranje profila
    if (isset($_POST['uredi']) && $_POST['_action_'] == 'TRUE') {
        $id = $_POST['id'];
        $uredi = $_POST['uredi'];
        $brisi = $_POST['brisi'];
        $akcija = $_POST['_action_'];

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
        $arhiva = $_POST['arhiva'];
        $korPravo = $_POST['korPravo'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

		$upit  = "UPDATE korisnici SET ime='$ime', prezime='$prezime', email='$email', korime='$korime', drzava = '$country', arhiva = '$arhiva', korPrava = '$korPravo' WHERE id = $uredi LIMIT 1;";
        $rezultat = mysqli_query($baza, $upit);
		
		$_SESSION['message'] = '<p>Profil ažuriran.</p>';
		
		# Redirect
		header("Location: index.php?navigacija=12&action=1");
	}

    //brisanje profila
    if (isset($_GET['brisi']) && $_GET['brisi'] != '') {
		$upit  = "DELETE FROM korisnici WHERE id= ". $_GET['brisi'];
		$rezultat = mysqli_query($baza, $upit);

		$_SESSION['message'] = '<p>Obrisali ste korisnički profil</p>';
		
		header("Location: index.php?navigacija=12&action=1");
	}
    //prikaz profila u novoj stranici
    if (isset($_GET['id']) && $_GET['id'] != '') {
		$upit  = "SELECT * FROM korisnici WHERE id = '" . $_GET['id'] . "'";
		$rezultat = mysqli_query($baza, $upit);
		$redak = mysqli_fetch_array($rezultat);
		print '
		<h2>Korisnički profil</h2>
		<p><b>Ime:</b> ' . $redak['ime'] . '</p>
		<p><b>Prezime:</b> ' . $redak['prezime'] . '</p>
		<p><b>Korisničko ime:</b> ' . $redak['korIme'] . '</p>';
		$_upit  = "SELECT * FROM country WHERE numcode = '" . $redak['drzava'] . "'";
		$_rezultat = mysqli_query($baza, $_upit);
		$_redak = mysqli_fetch_array($_rezultat);
		print '
		<p><b>Country:</b> ' .$_redak['nicename'] . '</p>
		<p><b>Date:</b> ' . $redak['datRodenja'] . '</p>
		<p><a href="index.php?navigacija=12&amp;action='.$action.'">Back</a></p>';
	}
    //uređivanje profila forma
    else if (isset($_GET['uredi']) && $_GET['uredi'] != '') {
		$upit  = "SELECT * FROM korisnici WHERE id=" . $_GET['uredi'];
		$rezultat = mysqli_query($baza, $upit);
		$redak = mysqli_fetch_array($rezultat);
        $arhiva_checked = FALSE;
        print '
            <h2>Uredi profil korisnika</h2>
            <form class = "kontakt_forma" action = "" method = "POST">
                <input type = "hidden" id = "_action_" name = "_action_" value = "TRUE">
                <input type = "hidden" id = "uredi" name = "uredi" value = "' . $_GET['uredi'] . '">
                <label for="ime">Ime:</label>
                <input type="text" id = "ime" name = "ime" placeholder="Vaše ime" value = "' .$redak['ime'] . '" required>
                <br>
                <label for="prezime">Prezime:</label>
                <input type="text" id = "prezime" name = "prezime" placeholder="Vaše prezime" value = "'.$redak['prezime'] . '" required>
                <br>
                <label for "datrodenja">Datum rođenja:</label>
                <input type = "date" name = "datrodenja" id = "datrodenja" value = "'.$redak['datRodenja'] . '">
                <br>
                <label for "email">Email:</label>
                <input type = "email" name = "email" id = "email" value = "'.$redak['email'] . '">
                <br>
                <label for "korIme">Korisničko ime:</label>
                <input type = "text" name = "korime" id = "korime" value = "'.$redak['korIme'] . '">
        
                <br>
                <label for="country">Država:</label>
                <select id = "country" name = "country">
                    <option value = "">Odaberite...</option>';
                    $_upit  = "SELECT * FROM country";
                    $_rezultat = mysqli_query($baza, $_upit);
                    while($_redak = mysqli_fetch_array($_rezultat)) {
                        print '<option value="' . $_redak['numcode'] . '"';
                        if ($redak['drzava'] == $_redak['numcode']) { print ' selected'; }
                        print '>' . $_redak['nicename'] . '</option>';
                    }
                    print '
            </select>
            <br>
            <label for="arhiva">Arhiviran?</label><br/>
            <input type="radio" name="arhiva" value="D"'; if($redak['arhiva'] == 'D') { echo ' checked="checked"'; $arhiva_checked = TRUE; } echo ' /> DA &nbsp;&nbsp;
			<input type="radio" name="arhiva" value="N"'; if($arhiva_checked == FALSE) { echo ' checked="checked"'; } echo ' /> NE
            <br>
            <label for="korPravo">Korisničko pravo?</label><br/>
            <input type="radio" name="korPravo" value="A"'; if($redak['korPrava'] == 'A') { echo ' checked="checked"'; $arhiva_checked = TRUE; } echo ' /> Admin &nbsp;&nbsp;
			<input type="radio" name="korPravo" value="K"'; if($redak['korPrava'] == 'K') { echo ' checked="checked"'; } echo ' /> Korisnik &nbsp;&nbsp;
            <input type="radio" name="korPravo" value="E"'; if($redak['korPrava'] == 'E') { echo ' checked="checked"'; } echo ' /> Editor

            <input type="submit" value="Spremi promjene">
        </form>
        <p><a href = "index.php?navigacija=' . $navigacija . '&action= ' . $akcija . '</p>
    ';
    }
    else{
        print '
		<h2>List of users</h2>
		<div id="users">
			<table style = "border:2px solid black">
				<thead>
					<tr>
						<th width="16" align = "center"></th>
						<th width="16" align = "center"></th>
						<th width="16" align = "center"></th>
						<th align = "center">First name</th>
						<th align = "center">Last name</th>
						<th align = "center" width = "250px">E mail</th>
						<th align = "center">Država</th>
						<th align = "center">Arhiviran?</th>
					</tr>
				</thead>
				<tbody>';
				$upit  = "SELECT * FROM korisnici";
				$rezultat = mysqli_query($baza, $upit);
				while($redak = mysqli_fetch_array($rezultat)) {
					print '
					<tr>
						<td align = "center"><a href="index.php?navigacija='.$navigacija.'&action=' . $action.'&amp;id=' . $redak['id']. '"><img src = "thumbnails/show.png"  style = "display: block; position: relative; height: 15px;"></a></td>
						<td align = "center"><a href="index.php?navigacija='.$navigacija.'&action=' . $action.'&amp;uredi=' . $redak['id']. '"><img src = "thumbnails/edt.png"  style = "display: block; position: relative; height: 15px;"></a></td>
						<td align = "center"><a href="index.php?navigacija='.$navigacija.'&action=' . $action.'&amp;brisi=' . $redak['id']. '"><img src = "thumbnails/delete.png"  style = "display: block; position: relative; height: 15px;"></a></td>
						<td align = "center"><strong>' . $redak['ime'] . '</strong></td>
						<td align = "center"><strong>' . $redak['prezime'] . '</strong></td>
						<td align = "center">' . $redak['email'] . '</td>
						<td align = "center">';
							$_upit  = "SELECT * FROM country WHERE numcode='" . $redak['drzava'] ."'";
							$_rezultat = mysqli_query($baza, $_upit);
							$_redak = mysqli_fetch_array($_rezultat, MYSQLI_ASSOC);
							print $_redak['nicename'] . '
						</td>
                        <td align = "center">';
							if ($redak['arhiva'] == 'D') { print 'DA'; }
                            else if ($redak['arhiva'] == 'N') { print 'NE'; }
						print '
						</td>
					</tr>';
				}
			print '
				</tbody>
			</table>
		</div>';
    }
?>