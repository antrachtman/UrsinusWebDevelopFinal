<!DOCTYPE html>
<meta charset="UTF-8"> 
<?php
	require_once './setUserInfo.php';
?>

<html>
<head>
<title>Log in</title>

<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-1.11.1.js"></script>

</head>
<body id = "registerBG">

<script>
function validate(){
	var fail = "";
	//grab element from the form. [form name] [the form name of the value you want]
	var username = document.forms["logInScreen"]["desiredUsername"].value;
	var pass1 = document.forms["logInScreen"]["desiredPassword"].value;
	var pass2 = document.forms["logInScreen"]["confirmPassword"].value;
	var email = document.forms["logInScreen"]["desiredEmail"].value;
	
	//http://stackoverflow.com/questions/4374822/javascript-regexp-remove-all-special-characters
	//^ negates the set [...] and gi means the search is global case insensitive.
	//letters and underscores are safe. 
	username = username.replace(/[^\w]/gi,'');
	//This was an alternate solution posted. This one works for non English characters.
	//However, a WHITELIST (the above method) is more efficient since you simply say what IS allowed.
	username = username.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
	//I only keep both here to eliminate the few characters that \w let through.
	
	//http://www.w3schools.com/js/js_form_validation.asp
	//The idea is that every email needs the @ and a '.' so we find their positions if they exist.
	var atPos = email.indexOf("@");
	var dotPos = email.lastIndexOf(".");
	
	if(username == null || username == ""){
		fail += "You must enter a username.\n";
	}else if(username.length > 15){
		fail += "Your username cannot exceed 15 characters.\n";
	}else{
		$("#desiredUsername").val(username);
	}
	
	//If the @ is the first character, fail. If the dot is too close to the @, fail. If the . is too close to the end of the email, fail.
	if(atPos < 1 || dotPos < atPos+2 || dotPos+2 === email.length){
		fail += "Please enter a valid e-mail address.\n";
	}
	
	if(pass1 == null || pass1 == ""){
		fail += "You must enter a password.\n";
	}
	else if(pass1 !== pass2){
		fail += "Passwords do not match.\n";
	}
	else if(pass1.length < 7){
		fail += "Password must be at least 7 characters.\n";
	}
	
	if(fail == ""){
		alert("Successfully registered!\nYour username is: "+username+"");
		return true;
	}else{
		alert(fail);
		return false;
	}
}

function back(){
	window.location = "./index.php"
}

</script>
<!--The onSubmit = "return validate()" basically tells the form if it is allowed to submit based on the result (return value) of the function validate()-->
<form id = "logInScreen" name="logInScreen" method = "post" action = "register.php" onSubmit = "return validate()">
	<span id = "loginWarnings">Username must not exceed 15 characters.<br/>Spaces and specials will be removed.<br/>Password must be at least 7 characters.</span><br/>
	<input type = "text" name = "desiredUsername" id = "desiredUsername" placeholder = "Desired username" size = "27"></input><br/>
	<input type = "text" name = "desiredEmail" id = "desiredEmail" placeholder = "Your Email" size = "27"></input><br/>
	<input type = "password" name = "desiredPassword" id = "desiredPassword" placeholder = "Desired password" size = "27"></input><br/>
	<input type = "password" name = "confirmPassword" id = "confirmPassword" placeholder = "Confirm password" size = "27"></input><br/>
	
	<input type = "submit" id = "submitInfo" value = "Submit"></input>
	<input type = "button" id = "goBack" value = "Back" onclick = "back()"></input>
</form>











































</body>
</html>