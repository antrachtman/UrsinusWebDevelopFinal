<!DOCTYPE html>
<meta charset="UTF-8"> 
<html>
<head>
<title>Log in</title>

<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body id = "dryRain">
<span id = "loginButtons">
		<input type = "button" id = "login" value = "Log In" />
		<input type = "button" id = "register" value = "Register" />
</span>
<script>
//=======================================================================
document.getElementById("login").onclick = 

function login()
{
//THIS DOES NOT END IN A ;
	window.location = "./currentUser.php"
}
//=======================================================================

//=======================================================================
//The id name is confusing, but it actually just brings you to the register page
//The id name is just to save style.css code.
document.getElementById("register").onclick = 

function register()
{
//THIS DOES NOT END IN A ;
	window.location = "./register.php"
}
//=======================================================================

</script>











































</body>
</html>