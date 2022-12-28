<?php
    include("connect.php");

    //dodaj jelo
    if (isset($_POST['_action_']) && $_POST['_action_'] == 'dodaj_jela') {
		//$_SESSION['message'] = '';
        $naslov = $_POST['naslov'];
        $opis = htmlspecialchars($_POST['opis'], ENT_QUOTES);
        $arhiva = $_POST['arhiva'];
        $odobreno = $_POST['odobreno'];
        //ako jela unosi admin, ona se automatski odobravaju, ako ne, u bazi je postavljeno da jelo automatski bude ne odobreno, ako ga unosi korisnik
		$upit  = "INSERT INTO jela (naziv, opis, arhiva, odobreno) VALUES ('$naslov', '$opis', '$arhiva', 'D')";
		$rezultat = mysqli_query($baza, $upit);
		
		$trenutni_id = mysqli_insert_id($baza);
		
		//dodavanje slike
        if(isset($_POST['submit_jelo'])){
            $errorUpload = '';
            $uploadDir = "galerija/"; 
            $dopusteniTip = array('jpg','png','jpeg','gif'); 
            $imena = array_filter($_FILES['slike']['name']);

            if(!empty($imena)){ 
                $_SESSION['message'] .= $_FILES['slike']['name'][0];
                //debug_to_console("prosao je prvi dio");
                foreach($_FILES['slike']['name'] as $index=>$value){ 
                    $ime = $trenutni_id . '-' . rand(1, 1000) . '-' . basename($_FILES['slike']['name'][$index]); 
                    $path = $uploadDir . $ime; 

                    $fileType = pathinfo($path, PATHINFO_EXTENSION); 
                    if(in_array($fileType, $dopusteniTip)){
                        if(move_uploaded_file($_FILES["slike"]["tmp_name"][$index], $path)){ 
                            $_upit = "INSERT INTO slike (naziv, idJela) VALUES ('$ime', $trenutni_id)";
                            $_rezultat = mysqli_query($baza, $_upit);
                        }
                        else{
                            $errorUpload .= $_FILES['slike']['name'][$index].' | '; 
                        }
                    }
                    else{
                        $errorUploadType .= $_FILES['slike']['name'][$index].' | '; 
                    }
                }
            }
        }
		header("Location: index.php?navigacija=12&action=2");
	    }
    //ažuriraj jela u bazi
    if (isset($_POST['_action_']) && $_POST['_action_'] == 'uredi_jela') {
        $naslov = htmlspecialchars($_POST['naslov'], ENT_QUOTES);
        $opis = htmlspecialchars($_POST['opis'], ENT_QUOTES);
        $arhiva = $_POST['arhiva'];
        $odobreno = $_POST['odobreno'];
        $id = (int)$_POST['uredi'];
        

		$upit  = "UPDATE jela SET naziv = '$naslov', opis = '$opis', arhiva = '$arhiva', odobreno = '$odobreno' WHERE id = $id LIMIT 1";
        $result = mysqli_query($baza, $upit);
		
		//slike
        if(isset($_POST['submit_promjene_jela'])){
            $errorUpload = '';
            $uploadDir = "galerija/"; 
            $dopusteniTip = array('jpg','png','jpeg','gif'); 
            $imena = array_filter($_FILES['slike']['name']);

            if(!empty($imena)){ 
                //$_SESSION['message'] .= $_FILES['slike']['name'][0];
                
                //debug_to_console("prosao je prvi dio");
                foreach($_FILES['slike']['name'] as $index=>$value){ 
                    $ime = $id . '-' . rand(1, 1000) . '-' . basename($_FILES['slike']['name'][$index]);
                    $_SESSION['message'] .= $ime;
                    $path = $uploadDir . $ime; 

                    $fileType = pathinfo($path, PATHINFO_EXTENSION); 
                    if(in_array($fileType, $dopusteniTip)){
                        if(move_uploaded_file($_FILES["slike"]["tmp_name"][$index], $path)){ 
                            $_upit = "INSERT INTO slike (naziv, idJela) VALUES ('$ime', $id)";
                            $_rezultat = mysqli_query($baza, $_upit);
                        }
                        else{
                            $errorUpload .= $_FILES['slike']['name'][$index].' | '; 
                        }
                    }
                    else{
                        $errorUploadType .= $_FILES['slike']['name'][$index].' | '; 
                    }
                }
            }
        }
		
		$_SESSION['message'] = '<p>Jelo je ažurirano!</p>';
		
		# Redirect
		header("Location: index.php?navigacija=12&action=2");
	}

    //brisanje jela iz baze
    if (isset($_GET['brisi']) && $_GET['brisi'] != '') {
		if($_SESSION['korisnik']['pravo'] == 'A'){
            $id = (int)$_GET['brisi'];
            //brisanje slike
            $upit = "SELECT * FROM slike WHERE idJela = $id";
            $rezultat = mysqli_query($baza, $upit);
            while ($redak = mysqli_fetch_array($rezultat)){
                unlink("galerija/" . $redak['naziv']); 
                $upit = "DELETE FROM slike WHERE idJela = $id";
            }
            $_SESSION['message'] = $upit;

            //brisanje samog jela iz baze
            $_upit  = "DELETE FROM jela WHERE id = $id";
            $_rezultat = mysqli_query($baza, $_upit);

            //$_SESSION['message'] = '<p>Uspješno ste obrisali jelo</p>';
            $_SESSION['message'] .= $_upit;

            
            # Redirect
            header("Location: index.php?navigacija=12&action=2");
        }
        else{
            $_SESSION['message'] .= '<p>Nemate dovoljna korisnička prava</p>';
        }
        
	}

    //Prikaži jelo
	if (isset($_GET['id']) && $_GET['id'] != '') {
        $id = $_GET['id'];
		$upit  = "SELECT * FROM jela WHERE id = $id ORDER BY datum DESC";
		$rezultat = mysqli_query($baza, $upit);
		$redak = mysqli_fetch_array($rezultat);

        $_upit = "SELECT * FROM slike WHERE idJela = $id";
        $_rezultat = mysqli_query($baza, $_upit);

		print '
		<h2>Pregled jela</h2>
		<div class="news">';
            while ($_redak = mysqli_fetch_array($_rezultat)){
                print '
                <div class = "pregled_wrapper">
                    <figure>
                        <img src="galerija/' . $_redak['naziv'] . '" alt="' . $_redak['naziv'] . '" title="' . $_redak['naziv'] . '" class = "pregled_jela_img">
                    </figure>
                </div>
                ';
            }
			print'
			<h2>' . $redak['naziv'] . '</h2>
			' . $redak['opis'] . '
			<time datetime="' . $row['datum'] . '">' . ($redak['datum']) . '</time>
			<hr>
		</div>
		<p><a href="index.php?navigacija='.$navigacija.'&amp;action='.$action.'">Natrag</a></p>';
	}
    //dodaj jela forma
    else if (isset($_GET['dodaj_jelo']) && $_GET['dodaj_jelo'] != '') {
		print '
		<h2>Dodavanje jela</h2>
		<form class="kontakt_forma" name="kontakt_forma" action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="_action_" name="_action_" value="dodaj_jela">
			<br>
			<label for="naslov">Naslov *</label>
			<input type="text" id="naslov" name="naslov" placeholder="Naslov jela" required>
            <br>
			<label for="opis">Recept i opis *</label>
			<textarea id="opis" name="opis" placeholder="Opis i recept jela" required></textarea>
			<br>
			<label for="slika">Slika</label>
			<input type="file" id="slika" name="slike[]" multiple>
			<br>
            <label for="arhiva">Arhiva:</label><br />
            <input type="radio" name="arhiva" value="D"> DA &nbsp;&nbsp;
			<input type="radio" name="arhiva" value="N" checked> NE
			<hr>
			
			<input type="submit" name = "submit_jelo" value="Pošalji">
		</form>
		<p><a href="index.php?navigacija='.$navigacija.'&amp;action='.$action.'">Natrag</a></p>';
	}
    //uređivanje jela forma
    else if (isset($_GET['uredi']) && $_GET['uredi'] != '') {
        $uredi = $_GET['uredi'];
		$upit  = "SELECT * FROM jela WHERE id = $uredi";
		$rezultat = mysqli_query($baza, $upit);
		$redak = mysqli_fetch_array($rezultat);
        $arhiva_checked = FALSE;
        $odobreno_checked = FALSE;

		print '
		<h2>Edit news</h2>
		<form action="" class = "kontakt_forma" id="uredi_jela" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="_action_" name="_action_" value="uredi_jela">
			<input type="hidden" id="uredi" name="uredi" value="' . $redak['id'] . '">
			<br>
			<label for="naslov">Naslov *</label>
			<input type="text" id="naslov" name="naslov" value="' . $redak['naziv'] . '" placeholder="Naslov jela" required>
            <br>
			<label for="opis">Recept i opis *</label>
			<textarea id="opis" name="opis" placeholder="Opis i recept jela" required>' . $redak['opis'] . '</textarea>
			<br>	
			<label for="slika">Slika</label>
			<input type="file" id="slika" name="slike[]" multiple>
			<br>
            <label for="arhiva">Archive:</label><br />
            <input type="radio" name="arhiva" value="D"'; if($redak['arhiva'] == 'D') { echo ' checked="checked"'; $arhiva_checked = TRUE; } echo ' /> DA &nbsp;&nbsp;
			<input type="radio" name="arhiva" value="N"'; if($arhiva_checked == FALSE) { echo ' checked="checked"'; } echo ' /> NE
            <br>
            <label for="odobreno">Odobreno:</label><br />
            <input type="radio" name="odobreno" value="D"'; if($redak['odobreno'] == 'D') { echo ' checked="checked"'; $odobreno_checked = TRUE; } echo ' /> DA &nbsp;&nbsp;
			<input type="radio" name="odobreno" value="N"'; if($odobreno_checked == FALSE) { echo ' checked="checked"'; } echo ' /> NE
			<hr>
			
			<input type="submit" name = "submit_promjene_jela" value="Spremi promjene">
		</form>
		<p><a href="index.php?navigacija='.$navigacija.'&amp;action='.$action.'">Natrag</a></p>';
	}

    //početni ispis
    else {
            print '
            <h2>Administracija jela</h2>
            <div id="users">
                <table style = "border:2px solid black">
                    <thead>
                        <tr>
                            <th width="16" align = "center"></th>
                            <th width="16" align = "center"></th>
                            <th width="16" align = "center"></th>
                            <th align = "center">Title</th>
                            <th width = "720px" align = "center">Description</th>
                            <th width = "220px" align = "center">Date</th>
                            <th width = "100px" align = "center">Arhivirano?</th>
                            <th width = "100px" align = "center">Odobreno?</th>
                        </tr>
                    </thead>
                    <tbody>';
                    $upit  = "SELECT * FROM jela ORDER BY datum DESC";
                    $rezultat = mysqli_query($baza, $upit);
                    while($redak = mysqli_fetch_array($rezultat)) {
                        print '
                        <tr>
                            <td align = "center"><a href="index.php?navigacija='.$navigacija.'&amp;action='.$action.'&amp;id=' .$redak['id']. '"><img src = "thumbnails/show.png"  style = "display: block; position: relative; height: 15px;"></a></td>
                            <td align = "center"><a href="index.php?navigacija='.$navigacija.'&amp;action='.$action.'&amp;uredi=' .$redak['id']. '"><img src = "thumbnails/edit.png"  style = "display: block; position: relative; height: 15px;"></a></td>
                            <td align = "center"><a href="index.php?navigacija='.$navigacija.'&amp;action='.$action.'&amp;brisi=' .$redak['id']. '""><img src = "thumbnails/delete.png"  style = "display: block; position: relative; height: 15px;"></a></td>
                            <td align = "center">' . $redak['naziv'] . '</td>
                            <td align = "center">';
                            if(strlen($redak['opis']) > 100) {
                                print substr(($redak['opis']), 0, 100).'...';
                            }
                            else {
                                print ($redak['opis']);
                            }
                            print '
                            </td>
                            <td align = "center">' . ($redak['datum']) . '</td>
                            <td align = "center">';
                                if ($redak['arhiva'] == 'D') { print 'DA'; }
                                else if ($redak['arhiva'] == 'N') { print 'NE'; }
                            print '
                            </td>
                            <td align = "center">';
                                if ($redak['odobreno'] == 'D') { print 'DA'; }
                                else if ($redak['odobreno'] == 'N') { print 'NE'; }
                            print '
                            </td>
                        </tr>';
                    }
                print '
                    </tbody>
                </table>
                <br>
                <a href="index.php?navigacija='.$navigacija.'&amp;action='.$action.'&amp;dodaj_jelo=TRUE" class=""><input type = "button" value = "Dodaj jelo" width = "100px"></a>
            </div>';    
        }
	
	//zatvaranje konekcije prema bazi
	mysqli_close($baza);
    
?>