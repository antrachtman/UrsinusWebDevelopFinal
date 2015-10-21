<?php
require_once './login.php';
require_once './connect.php';

?>

<?php
	if(isset($_SESSION['username'])){
		$idNum = $_SESSION['idNumber'];
	} 

	if (isset($_POST['movespeed']) && isset($_POST['hitboxDisplay']) && isset($_POST['toggleBackground']) && isset($_POST['toggleBGM']) && isset($_POST['toggleName'])){
		$movespeed = get_post($link, 'movespeed');
		$movespeed2 = get_post($link, 'movespeed2');
		$hitbox = get_post($link, 'hitboxDisplay');
		$hitbox2 = get_post($link, 'hitboxDisplay2');
		$background = get_post($link, 'toggleBackground');
		$bgm = get_post($link, 'toggleBGM');
		$nameDisplay = get_post($link, 'toggleName');
		$animateMethod = get_post($link, 'animMethod');
	
		$query = "INSERT INTO playerSettings (playerMovespeed, playerHitbox, playerBackground, playerBGM, playerNameDisplay, idNumber, P2Movespeed, P2Hitbox, animateMethod) VALUES" . "('$movespeed','$hitbox','$background','$bgm','$nameDisplay','$idNum','$movespeed2','$hitbox2','$animateMethod') ON DUPLICATE KEY UPDATE playerMovespeed = $movespeed, playerHitbox = $hitbox, playerBackground = $background, playerBGM = $bgm, playerNameDisplay = $nameDisplay, idNumber = $idNum, P2Movespeed = $movespeed2, P2Hitbox = $hitbox2, animateMethod = $animateMethod";
		mysqli_query($link, $query);
		
		if(!mysqli_query($link, $query))
			echo "INSERT failed: $query<br>" . mysqli_error($link) . "<br><br>";
	}

	
	function get_post($link, $var)
		{
			return mysqli_real_escape_string($link,$_POST[$var]);
		}
?>

