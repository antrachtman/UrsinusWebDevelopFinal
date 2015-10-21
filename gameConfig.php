<!DOCTYPE html>
<meta charset="UTF-8"> 
<link rel = "stylesheet" type = "text/css" href = "style.css">

<?php
require_once './setConfig.php';
require_once './mySQLMagic.php';
?>

<html>

<head>
<script src="./jquery-1.11.1.js"></script>
<script src="./util.js"></script>
<script src="./key_status.js"></script>
<script src="./jquery.hotkeys.js"></script>
<title>Game configuration</title>
</head>

<body id = "configScreenBG">

<div id = "buttons">
<div id = "buttonBox">
<input type = "button" class = "sidebar" id = "playSplit" value = "Play splitscreen"/><br/>
<input type = "button" class = "sidebar" id = "findMatch" value = "Find an online match"/><br/>
<input type = "button" class = "sidebar" id = "playerCustomize1" value = "Player 1 Customize"/><br/>
<input type = "button" class = "sidebar" id = "playerCustomize2" value = "Player 2 Customize"/><br/>
<input type = "button" class = "sidebar" id = "logOut" value = "Log Out"/><br/>
TOOLBAR
</div>
</div>

<script>

function preloader(){
//http://www.techrepublic.com/article/preloading-and-the-javascript-image-object/#.
//The preloader is necessary so that the large .png files are already in the cache for use

	//create object
	imageObject = new Image();

	images = new Array();
	images[1]="./gameImages/Character/inGame/back/body1.png";
	images[2]="./gameImages/Character/inGame/back/body2.png";
	images[3]="./gameImages/Character/inGame/back/body3.png";
	images[4]="./gameImages/Character/inGame/back/hair1.png";
	images[5]="./gameImages/Character/inGame/back/hair2.png";
	images[6]="./gameImages/Character/inGame/back/hair3.png";
	images[7]="./gameImages/Character/inGame/back/legs1.png";
	images[8]="./gameImages/Character/inGame/back/legs2.png";
	images[9]="./gameImages/Character/inGame/back/legs3.png";

	//begin the preloading
	for(var i = 0; i<images.size; i++){
		imageObject.src = images[i];
	}

}

//Gives priority to the toolbar in terms of object display
document.getElementById("buttons").style.zIndex = "100";

document.getElementById("playSplit").onclick = 
function(){
window.location = "./splitScreen.php"
}

/* Postponed
document.getElementById("findMatch").onclick = 
function(){
window.location = "./onlineMult.php"
}
/* SCRAPPED
document.getElementById("chat").onclick = 
function(){
window.location = "./chat.php"
}

document.getElementById("buy").onclick = 
function(){
window.location = "./shop.php"
}
*/
document.getElementById("playerCustomize2").onclick = 
function(){
window.location = "./player2Custom.php"
}
document.getElementById("playerCustomize1").onclick = 
function(){
window.location = "./custom.php"
}
document.getElementById("logOut").onclick = 
function(){
window.location = "./logout.php"
}

//view-source:http://www.html5tutorial.info/html5-range.php

</script>

<div id = "optionsButtonsDiv">

<form id = "userConfigForm" method = "post" action="gameConfig.php">
<div id = "option">
Player 1 Movespeed: <br/>
<input type = "radio" name = "movespeed" id = "move" value = 1> 1 
<input type = "radio" name = "movespeed" id = "move" value = 2> 2 
<input type = "radio" name = "movespeed" id = "move" value = 3> 3 
<input type = "radio" name = "movespeed" id = "move" value = 4> 4 
<input type = "radio" name = "movespeed" id = "move" value = 5> 5 
<input type = "radio" name = "movespeed" id = "move" value = 6> 6 
<input type = "radio" name = "movespeed" id = "move" value = 7> 7 
<input type = "radio" name = "movespeed" id = "move" value = 8> 8 
</div>
<div id = "option">
Player 2 Movespeed: <br/>
<input type = "radio" name = "movespeed2" id = "move2" value = 1> 1 
<input type = "radio" name = "movespeed2" id = "move2" value = 2> 2 
<input type = "radio" name = "movespeed2" id = "move2" value = 3> 3 
<input type = "radio" name = "movespeed2" id = "move2" value = 4> 4 
<input type = "radio" name = "movespeed2" id = "move2" value = 5> 5 
<input type = "radio" name = "movespeed2" id = "move2" value = 6> 6 
<input type = "radio" name = "movespeed2" id = "move2" value = 7> 7 
<input type = "radio" name = "movespeed2" id = "move2" value = 8> 8 
</div>


<!-- 1 = on, 0 = off-->
<div id = "option">
Player 1 Hitbox Display: <br/>
<input type = "radio" name = "hitboxDisplay" id = "hitbox" value = 1> On
<input type = "radio" name = "hitboxDisplay" id = "hitbox" value = 0> Off
</div>

<div id = "option">
Player 2 Hitbox Display: <br/>
<input type = "radio" name = "hitboxDisplay2" id = "hitbox2" value = 1> On
<input type = "radio" name = "hitboxDisplay2" id = "hitbox2" value = 0> Off
</div>

<div id = "option">
Background: <br/>
<input type = "radio" name = "toggleBackground" id = "BG" value = 1> On
<input type = "radio" name = "toggleBackground" id = "BG" value = 0> Off
</div>

<!-- I never got the chance to actually MAKE the music.-->
<div id = "option">
Background Music: <br/>
<input type = "radio" name = "toggleBGM" id = "BGM" value = 1> On
<input type = "radio" name = "toggleBGM" id = "BGM" value = 0> Off
</div>

<div id = "option">
Name Display (Player 1 Only): <br/>
<input type = "radio" name = "toggleName" id = "name" value = 1> On
<input type = "radio" name = "toggleName" id = "name" value = 0> Off
</div>

<div id = "option">
Animation Method <br/>
<input type = "radio" name = "animMethod" id = "animMethod" value = 1> Request Animation Frames (More efficient. Pauses on tab out. Recommended for Chrome.) <br/>
<input type = "radio" name = "animMethod" id = "animMethod" value = 0> Set Interval (Slower. Click this if you use FireFox or if the controls don't work.)
</div>

<input type = "submit" value = "Commit Changes"></submit>
</form>

</div>

<?php
	if($background == 1){
		echo "<canvas id = 'testCanvas' class = 'ezCanvasBG' width = '500' height = '500' style = 'border: 5px solid 'black';>";
	}else{
		echo "<canvas id = 'testCanvas' width = '500' height = '500' style = 'border: 5px solid 'black';>";
	}
?>
<img id="gameHead1" src = "./gameImages/Character/inGame/back/hair1.png">
<img id="gameHead2" src = "./gameImages/Character/inGame/back/hair2.png">
<img id="gameHead3" src = "./gameImages/Character/inGame/back/hair3.png">
<img id="gameBody1" src = "./gameImages/Character/inGame/back/body1.png">
<img id="gameBody2" src = "./gameImages/Character/inGame/back/body2.png">
<img id="gameBody3" src = "./gameImages/Character/inGame/back/body3.png">
<img id="gameLegs1" src = "./gameImages/Character/inGame/back/legs1.png">
<img id="gameLegs2" src = "./gameImages/Character/inGame/back/legs2.png">
<img id="gameLegs3" src = "./gameImages/Character/inGame/back/legs3.png">
</canvas>

<script>
window.onload = function(){
//Uses jquery to check the radio buttons
//BASED JQUERY
$('input[name=movespeed][value ='+movespeed+']').prop('checked', true);
$('input[name=movespeed2][value ='+p2Movespeed+']').prop('checked', true);
$('input[name=hitboxDisplay][value ='+hitbox+']').prop('checked', true);
$('input[name=hitboxDisplay2][value ='+p2Hitbox+']').prop('checked', true);
$('input[name=toggleBackground][value ='+background+']').prop('checked', true);
$('input[name=toggleBGM][value ='+bgm+']').prop('checked', true);
$('input[name=toggleName][value ='+nameDisplay+']').prop('checked', true);
$('input[name=animMethod][value ='+animateMethod+']').prop('checked', true);

var name = username;

//Used to actually draw the image for the game canvas.
var currHead = document.getElementById('gameHead1');
var currLegs = document.getElementById('gameBody1');
var currBody = document.getElementById('gameLegs1');

//Total numbers of each part that exists.
var totalLegs = 3;
var totalBody = 3;
var totalHeads = 3;
var totalFaces = 3;

function checkParts(){
preloader();
//This is more efficient and I probably should have done this for other things too.
//heads
	for(var i = 1; i <= totalHeads; i++){
		if(head === i){
			currHead = document.getElementById('gameHead' + i);
		}
	}

//bodies
	for(var i = 1; i <= totalBody; i++){
		if(body === i){
			currBody = document.getElementById('gameBody' + i);
		}
	}
//legs
	for(var i = 1; i <= totalLegs; i++){
		if(legs === i){
			currLegs = document.getElementById('gameLegs' + i);
		}
	}
}

//============================================================================================================================
//Gets the 2d context for the canvas (not 3d) attaches canvas to body.
var canvas = document.getElementById("testCanvas");
var context = canvas.getContext("2d");
//============================================================================================================================

var player = {
	color: "yellow",
	x: 250,
	y: 250,
	width: 1,
	height: 1,

//This draw function constantly redraws the player rectangle based on the Player object's values.
	draw: function() {
		context.drawImage(currBody, this.x-15, this.y-25);
		context.drawImage(currLegs, this.x-15, this.y-25);
		context.drawImage(currHead, this.x-15, this.y-25);
		context.fillStyle = this.color;
	//Controls the draw order to show or hide the hitbox.
	//Do not draw hitbox
		if(hitbox !== 0){
	//Draw hitbox
		context.fillRect(this.x, this.y, this.width, this.height);
		}
	}
}

//Animates the canvas
/*
window.requestAnimFrame = (function() {
        return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
        function(callback) {
          window.setTimeout(callback, 1000 / 60);
        };
    })();

(function animate(){
	requestAnimFrame(animate);
	update();
	draw();
})();
*/

<?php
if($animateMethod == 1){
	echo 
		"function animate(){
		draw();
		update();
		handleCollisions();
		requestAnimationFrame(animate);
		}
		requestAnimationFrame(animate);";
}else{
	echo
		"setInterval(function() {
			draw();
			update();
			handleCollisions();
		}, 1000/60);";
}
?>

function draw() {
	context.clearRect(0,0, canvas.width, canvas.height);
	player.draw();
	if(nameDisplay === 1){
		var extension = name.length*2.5;
		context.fillText(name, player.x-extension, player.y+40);
	}
}

function update() {
	if(keydown.a) 
	{player.x -= movespeed;}

	if(keydown.s)
	{player.y += movespeed;}

	if(keydown.d) 
	{player.x += movespeed;}

	if(keydown.w)
	{player.y -= movespeed;}
	
	player.x = player.x.clamp(0, canvas.width - player.width);
	player.y = player.y.clamp(0 - player.height, canvas.height);
}

checkParts();
//end of onload block
}
</script>


















</body>
</html>