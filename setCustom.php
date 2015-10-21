<?php
require_once './login.php';
require_once './connect.php';
?>

<?php
//Grabs the id number from the established session. Everything revolves around ID number, so nothing else is needed.
	if(isset($_SESSION['username'])){
		$idNum = $_SESSION['idNumber'];
	} 

//If the form elements are all set to values, then they are pulled in as php variables and inserted with a SQL query.	
	if(isset($_POST['formShot1']) && isset($_POST['formShot2']) && isset($_POST['formShot3']) && isset($_POST['formCharHead']) && isset($_POST['formCharFace']) && isset($_POST['formCharBody']) && isset($_POST['formCharLegs'])){
		$shotT1 = get_post($link, 'formShot1');
		$shotT2 = get_post($link, 'formShot2');
		$shotT3 = get_post($link, 'formShot3');
		$charPart1 = get_post($link, 'formCharHead');
		$charPart2 = get_post($link, 'formCharFace');
		$charPart3 = get_post($link, 'formCharBody');
		$charPart4 = get_post($link, 'formCharLegs');
		$fire1P1 = get_post($link, 'formFire1P1');
		$fire2P1 = get_post($link, 'formFire2P1');
		$fire3P1 = get_post($link, 'formFire3P1');
			
		$query = "INSERT INTO playerSettings (playerShottype1, playerShottype2, playerShottype3, playerCharPart1, playerCharPart2, playerCharPart3, playerCharPart4, idNumber, fire1P1, fire2P1, fire3P1) VALUES" . "('$shotT1','$shotT2','$shotT3','$charPart1','$charPart2','$charPart3','$charPart4','$idNum','$fire1P1','$fire2P1','$fire3P1') ON DUPLICATE KEY UPDATE playerShottype1 = $shotT1, playerShottype2 = $shotT2, playerShottype3 = $shotT3, playerCharPart1 = $charPart1, playerCharPart2 = $charPart2, playerCharPart3 = $charPart3, playerCharPart4 = $charPart4, idNumber = $idNum, fire1P1 = $fire1P1, fire2P1 = $fire2P1, fire3P1 = $fire3P1";
//Sends a query to mySQL	
		mysqli_query($link, $query);
		
		if(!mysqli_query($link, $query))
			echo "INSERT failed: $query<br>" . mysqli_error($link) . "<br><br>";
	}
	
	function get_post($link, $var)
		{
			//Escapes the string to prevent harm to the database.
			return mysqli_real_escape_string($link,$_POST[$var]);
		}
?>