<?php
require_once './login.php';
require_once './connect.php';
?>

<?php
	if(isset($_SESSION['username'])){
		$idNum = $_SESSION['idNumber'];
	} 
	
	if(isset($_POST['formShot1']) && isset($_POST['formShot2']) && isset($_POST['formShot3']) && isset($_POST['formCharHead']) && isset($_POST['formCharFace']) && isset($_POST['formCharBody']) && isset($_POST['formCharLegs'])){
		$shotT1 = get_post($link, 'formShot1');
		$shotT2 = get_post($link, 'formShot2');
		$shotT3 = get_post($link, 'formShot3');
		$charPart1 = get_post($link, 'formCharHead');
		$charPart2 = get_post($link, 'formCharFace');
		$charPart3 = get_post($link, 'formCharBody');
		$charPart4 = get_post($link, 'formCharLegs');
		$fire1P2 = get_post($link, 'formFire1P2');
		$fire2P2 = get_post($link, 'formFire2P2');
		$fire3P2 = get_post($link, 'formFire3P2');
		
		$query = "INSERT INTO playerSettings (P2Shot1, P2Shot2, P2Shot3, P2Head, P2Face, P2Body, P2Legs, idNumber, fire1P2, fire2P2, fire3P2) VALUES" . "('$shotT1','$shotT2','$shotT3','$charPart1','$charPart2','$charPart3','$charPart4','$idNum','$fire1P2','$fire2P2','$fire3P2') ON DUPLICATE KEY UPDATE P2Shot1 = $shotT1, P2Shot2 = $shotT2, P2Shot3 = $shotT3, P2Head = $charPart1, P2Face = $charPart2, P2Body = $charPart3, P2Legs = $charPart4, idNumber = $idNum, fire1P2 = $fire1P2, fire2P2 = $fire2P2, fire3P2 = $fire3P2";
		mysqli_query($link, $query);
		
		if(!mysqli_query($link, $query))
			echo "INSERT failed: $query<br>" . mysqli_error($link) . "<br><br>";
	
	}
	
	function get_post($link, $var)
		{
			return mysqli_real_escape_string($link,$_POST[$var]);
		}
?>