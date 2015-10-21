<?php
require_once './login.php';
require_once './connect.php';
?>

<?php
	function generateRandomString($length = 20){
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$shchar = str_shuffle($characters);
	$randomString = '';
	for($i = 0; $i < $length; $i++){
	//.= acts as an append
		$randomString .= $shchar[rand(0, strlen($characters) -1)];
	}
		return $randomString;
	}
	
	$alg = '$2y$';
	$coststr = '10';
	$cost = 10;
	$timeTarget = 0.05;

	if(isset($_POST['desiredUsername']) && isset($_POST['desiredPassword']) && isset($_POST['desiredEmail'])){
	
			$salt = generateRandomString(22);
			$cost++;
			if($cost < 10){
				$coststr = str_pad($cost, 2, '0', STR_PAD_LEFT);
			}
			else
			{
				$coststr = $cost;
			}
		
		$username = get_post($link, 'desiredUsername');
		$token = get_post($link, 'desiredPassword');
		$email = get_post($link, 'desiredEmail');
		$password = crypt ("$token", $alg . $coststr . '$' . $salt);
				
		//Needs to post the essential information to the server. ie: username, email, and password. ID number is automatic. 
		$query = "INSERT INTO playerSettings (playerUsername, playerEmail, playerPassword) VALUES "."('$username', '$email', '$password');";
		
		if(!mysqli_query($link, $query)){
			//echo "INSERT failed: $query" . mysqli_error($link) . "";
			$error = "INSERT failed: $query" . mysqli_error($link) . "";
			
			$usernameError = "INSERT failed: INSERT INTO playerSettings (playerUsername, playerEmail, playerPassword) VALUES ('".$username."', '".$email."', '".$password."');Duplicate entry '".$username."' for key 'playerUsername_UNIQUE'";
			$emailError = "INSERT failed: INSERT INTO playerSettings (playerUsername, playerEmail, playerPassword) VALUES ('".$username."', '".$email."', '".$password."');Duplicate entry '".$email."' for key 'playerEmail_UNIQUE'";
			
			if($error === $usernameError){
				echo "<span id = 'warning'>The popup lied, your username has already been taken. Pick another.</span><br/>";
			}
			if($error === $emailError){
				echo "<span id = 'warning'>The popup lied, your e-mail has already been taken. Enter a different one.</span><br/>";
			}
		}else{
			echo "<span id = 'notification'>Successfully registered as ".$username."! Click back and login to start playing.</span><br/>";
		}
	}
	
	function get_post($link, $var)
		{
			return mysqli_real_escape_string($link,$_POST[$var]);
		}
?>