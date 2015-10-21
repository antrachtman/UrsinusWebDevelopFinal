<!DOCTYPE html>
<meta charset="UTF-8"> 
<?php
require_once './login.php';
require_once './connect.php';
?>

<html>
<link rel = "stylesheet" type = "text/css" href = "style.css">
<body id = "loggedInBG">

<?php
//Destroys anoy old session data
  session_destroy();
  
  //If the user enters a password and username
  if (isset($_SERVER['PHP_AUTH_USER']) &&
      isset($_SERVER['PHP_AUTH_PW']))
  {
    $un_temp = mysql_entities_fix_string($link, $_SERVER['PHP_AUTH_USER']);
    $pw_temp = mysql_entities_fix_string($link, $_SERVER['PHP_AUTH_PW']);

	//query the database where the playername = whatever was entered
	$query = "SELECT * FROM playerSettings WHERE playerUsername='$un_temp'";
    $result = $link->query($query);

    if (!$result) die($link->error);
	elseif ($result->num_rows)
	{
		$row = $result->fetch_array(MYSQLI_NUM);

		$result->close();

        $token = crypt($pw_temp, $row[1]);
		
		//If the encrypted passwords match up, then the passwords were the same. The user is logged in and allowed to continue.
		//We store the ID number kept in row[17] of whichever ID number has the same username as the one entered.
		if ($token == $row[1])
		{
			session_start();
			$_SESSION['username'] = $un_temp;
			$_SESSION['password'] = $pw_temp;
			$_SESSION['idNumber'] = $row[17];
			//Echo the prompt to go to the next page.
			echo "<span id = 'logInOut'>You are now logged in as '$row[0]'<br/><a href=custom.php id = 'white'>Click here to continue.</a></span>";
		}
		else {
			header('WWW-Authenticate: Basic realm="Restricted Section"');
			header('HTTP/1.0 401 Unauthorized');
			die("Invalid username/password combination Row: $row[3] <br/> Token: $token");
		}
	}
	else {
			header('WWW-Authenticate: Basic realm="Restricted Section"');
			header('HTTP/1.0 401 Unauthorized');
			die("Invalid username/password combination");
		 }
  }
  else
  {
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Please enter your username and password");
  }

  $link->close();

  function mysql_entities_fix_string($link, $string)
  {
    return htmlentities(mysql_fix_string($link, $string));
  }	

  function mysql_fix_string($link, $string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $link->real_escape_string($string);
  }
?>
</body>
</html>