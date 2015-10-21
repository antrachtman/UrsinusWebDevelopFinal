<!DOCTYPE html>
<meta charset="UTF-8"> 
<!-- I have no clue if this is actually doing ANYTHING right now. 

It appears as though it doesn't do much. You need to close the browser to log in as someone else.-->

<html>
<link rel = "stylesheet" type = "text/css" href = "style.css">
<body id = "logOutBG">

<?php
	require_once './login.php';
	require_once './connect.php';
	
  function destroy_session_and_data()
  {
	//Resets all session array data
	$_SESSION = array();
	//Invalidates all cookies associated with the session
	setcookie(session_name(), '', time() - 2592000, '/');
	//Close the session
	session_destroy();
  }
  destroy_session_and_data();
  $link->close();
  
  echo "<span id = 'logInOut'>Successfully logged out. <br/><a href = './index.php' id = 'white'>Click here to return to login</a></span>";
?>

</body>
</html>