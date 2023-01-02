<?php 
	function debug_to_console($data) {
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);
	
		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}
	function provjeriKorIme($redak, $korime){
		if ($redak['korIme'] == $korime){ 
            $promjenaKorIme = "TRUE";
			return $promjenaKorIme; 
        }
	}
	function provjeriEmail($redak, $email){
		if($redak['email'] == $email){
			$poklapanje = "TRUE";
			return $poklapanje;
		}
	}
?>