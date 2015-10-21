<!DOCTYPE html>
<meta charset="UTF-8"> 
<?php
require_once './setCustom.php';
require_once './mySQLMagic.php';
?>

<html>

<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
<script src="shotTypes.js"></script>
<script src="jquery-1.11.1.js"></script>

<script>
function preloader(){
//http://www.techrepublic.com/article/preloading-and-the-javascript-image-object/#.
//The preloader is necessary so that the large .png files are already in the cache for use

	//create object
	imageObject = new Image();

	images = new Array();
	images[0]= "./gameImages/Character/Legs/legs1.png";
	images[1]= "./gameImages/Character/Legs/legs2.png";
	images[2]= "./gameImages/Character/Head/head1.png";
	images[3]= "./gameImages/Character/Head/head2.png";
	images[4]= "./gameImages/Character/Head/head1Hair.png";
	images[5]= "./gameImages/Character/Head/head2Hair.png";
	images[6]= "./gameImages/Character/Face/face1.png";
	images[7]= "./gameImages/Character/Face/face2.png";
	images[8]= "./gameImages/Character/Body/body1.png";
	images[9]= "./gameImages/Character/Body/body2.png";
	images[10]="./gameImages/Character/Legs/legs3.png";
	images[11]="./gameImages/Character/Body/body3.png";
	images[12]="./gameImages/Character/Head/head3.png";
	images[13]="./gameImages/Character/Face/face3.png";
	images[14]="./gameImages/Character/inGame/back/body1.png";
	images[15]="./gameImages/Character/inGame/back/body2.png";
	images[16]="./gameImages/Character/inGame/back/body3.png";
	images[17]="./gameImages/Character/inGame/back/hair1.png";
	images[18]="./gameImages/Character/inGame/back/hair2.png";
	images[19]="./gameImages/Character/inGame/back/hair3.png";
	images[20]="./gameImages/Character/inGame/back/legs1.png";
	images[21]="./gameImages/Character/inGame/back/legs2.png";
	images[22]="./gameImages/Character/inGame/back/legs3.png";

	//begin the preloading
	for(var i = 0; i<images.size; i++){
		imageObject.src = images[i];
	}

}
</script>

<title>Customize</title>
</head>

<body id = "P1BG">
<canvas id = "shotCanvas" width = "300" height = "300" 
style = "border: 5px solid "black";>
<img id="shotBall1" src = "./gameImages/ShotBall1.png">
<img id="railBeam" src = "./gameImages/RailBeam.png">
<img id="ovalShot" src = "./gameImages/OvalShot.png">
<img id="ovalShot2" src = "./gameImages/OvalShot2.png">
<img id="sword1" src = "./gameImages/Sword1.png">
</canvas>

<canvas id = "charCanvas" width = "400" height = "500" 
style = "border: 5px solid "black";>
<img id="head1" src = "./gameImages/Character/Head/head1.png">
<img id="head2" src = "./gameImages/Character/Head/head2.png">
<img id="head3" src = "./gameImages/Character/Head/head3.png">
<img id="hair1Back" src = "./gameImages/Character/Head/head1Hair.png">
<img id="hair2Back" src = "./gameImages/Character/Head/head2Hair.png">
<img id="hair3Back" src = "./gameImages/Character/Head/head3Hair.png">
<img id="face1" src = "./gameImages/Character/Face/face1.png">
<img id="face2" src = "./gameImages/Character/Face/face2.png">
<img id="face3" src = "./gameImages/Character/Face/face3.png">
<img id="body1" src = "./gameImages/Character/Body/body1.png">
<img id="body2" src = "./gameImages/Character/Body/body2.png">
<img id="body3" src = "./gameImages/Character/Body/body3.png">
<img id="legs1" src = "./gameImages/Character/Legs/legs1.png">
<img id="legs2" src = "./gameImages/Character/Legs/legs2.png">
<img id="legs3" src = "./gameImages/Character/Legs/legs3.png">
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

<div id = "buttons">
<div id = "buttonBox">
<input type = "button" class = "sidebar" id = "playSplit" value = "Play splitscreen"/><br/>
<input type = "button" class = "sidebar" id = "findMatch" value = "Find an online match"/><br/>
<input type = "button" class = "sidebar" id = "playerCustomize2" value = "Player 2 Customize"/><br/>
<input type = "button" class = "sidebar" id = "gameConfig" value = "Game Configuration"/><br/>
<input type = "button" class = "sidebar" id = "logOut" value = "Log Out"/><br/>
TOOLBAR
</div>
</div>

<script>
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
/* Scrapped
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
document.getElementById("gameConfig").onclick = 
function(){
window.location = "./gameConfig.php"
}
document.getElementById("logOut").onclick = 
function(){
window.location = "./logout.php"
}

</script>

<span id = "hint">Slot 1: Highest rate of fire/Lowest projectile speed<br/>
Slot 2: Medium rate of fire/Medium projectile speed<br/>
Slot 3: Low rate of fire/Highest projectile speed</span>

<div id = "shotSelectRight">
<input type = "button" class = "arrow" id = "shot1R" value = ">"/><br/>
<input type = "button" class = "arrow" id = "shot2R" value = ">"/><br/>
<input type = "button" class = "arrow" id = "shot3R" value = ">"/><br/>
</div>

<div id = "shotSelectLeft">
<input type = "button" class = "arrow" id = "shot1L" value = "<"/><br/>
<input type = "button" class = "arrow" id = "shot2L" value = "<"/><br/>
<input type = "button" class = "arrow" id = "shot3L" value = "<"/><br/>
</div>

<div id = "charOptionsRight">
<input type = "button" class = "arrow" id = "char1R" value = ">"/><br/><br/><br/><br/><br/>
<input type = "button" class = "arrow" id = "char2R" value = ">"/><br/><br/><br/><br/><br/>
<input type = "button" class = "arrow" id = "char3R" value = ">"/><br/><br/><br/><br/><br/>
<input type = "button" class = "arrow" id = "char4R" value = ">"/><br/>
</div>

<div id = "charOptionsLeft">
<input type = "button" class = "arrow" id = "char1L" value = "<"/><br/><br/><br/><br/><br/>
<input type = "button" class = "arrow" id = "char2L" value = "<"/><br/><br/><br/><br/><br/>
<input type = "button" class = "arrow" id = "char3L" value = "<"/><br/><br/><br/><br/><br/>
<input type = "button" class = "arrow" id = "char4L" value = "<"/><br/>
</div>

<div id = "shotTypeBoxes">
<input id = "shotType1" type = "text" size = "25"/><br/>
<input id = "shotType2" type = "text" size = "25"/><br/>
<input id = "shotType3" type = "text" size = "25"/>
</div>

<form name = "settingsForm" method = "post" action = "custom.php">
	<input type = "hidden" name = "formShot1" id = "formShot1" value = 1 readonly = "true"></input>
	<input type = "hidden" name = "formShot2" id = "formShot2" value = 1 readonly = "true"></input>
	<input type = "hidden" name = "formShot3" id = "formShot3" value = 1 readonly = "true"></input>
	<input type = "hidden" name = "formCharHead" id = "formCharHead" value = 1 readonly = "true"></input>
	<input type = "hidden" name = "formCharFace" id = "formCharFace" value = 1 readonly = "true"></input>
	<input type = "hidden" name = "formCharBody" id = "formCharBody" value = 1 readonly = "true"></input>
	<input type = "hidden" name = "formCharLegs" id = "formCharLegs" value = 1 readonly = "true"></input>
	<input type = "hidden" name = "formFire1P1" id = "formFire1P1" value = 1 readonly = "true"></input>
	<input type = "hidden" name = "formFire2P1" id = "formFire2P1" value = 1 readonly = "true"></input>
	<input type = "hidden" name = "formFire3P1" id = "formFire3P1" value = 1 readonly = "true"></input>
	<input type = "submit" id = "commit" value = "Save Settings">
</form>

<!--SCRAPPED I can't see a point to it.
<div id="levelDisplay">
<script>
document.getElementById("levelDisplay").innerHTML = 'Level: ' + level  + "<br>" + 'Exp: ' + exp;
</script>
</div>
-->

<script>
var totalShotTypes = 7;

var shotBox1 = document.getElementById("shotType1");
var shotBox2 = document.getElementById("shotType2");
var shotBox3 = document.getElementById("shotType3");

//firerate variable. (milliseconds/shot) @500, 1 shot every .5 seconds (SMALL = FAST)
var fireRate;
var fireRate2;
var fireRate3;

window.onload = function(){
checkShotType1(shotT1);
checkShotType2(shotT2);
checkShotType3(shotT3);
resetFireRate();
drawChar();
}

function updateFormShotValues(){
//Use jquery to update hidden form values.
	$("#formShot1").val(shotT1);
	$("#formShot2").val(shotT2);
	$("#formShot3").val(shotT3);
//Update fire rates
	$("#formFire1P1").val(fireRate);
	$("#formFire2P1").val(fireRate2);
	$("#formFire3P1").val(fireRate3);
}

//Timer in milliseconds
var fireTime1 = setInterval( function() { shoot = true;  }, fireRate);
var fireTime2 = setInterval( function() { shoot2 = true; }, fireRate2);
var fireTime3 = setInterval( function() { shoot3 = true; }, fireRate3);

function resetFireRate(){
	clearInterval(fireTime1);
	clearInterval(fireTime2);
	clearInterval(fireTime3);
	fireTime1 = setInterval( function() { shoot = true;  }, fireRate);
	fireTime2 = setInterval( function() { shoot2 = true; }, fireRate2);
	fireTime3 = setInterval( function() { shoot3 = true; }, fireRate3);
}
document.getElementById("shot1R").onclick =
function(){
	if(shotT1<totalShotTypes)
		shotT1++;
	else
		shotT1 = 1;
		
	checkShotType1(shotT1);
	resetFireRate();
}
document.getElementById("shot2R").onclick =
function(){
	if(shotT2<totalShotTypes)
		shotT2++;
	else
		shotT2 = 1;
		
	checkShotType2(shotT2);
	resetFireRate();
}
document.getElementById("shot3R").onclick =
function(){
	if(shotT3<totalShotTypes)
		shotT3++;
	else
		shotT3 = 1;
		
	checkShotType3(shotT3);
	resetFireRate();
}
document.getElementById("shot1L").onclick =
function(){
		
	if(shotT1>1)
		shotT1--;
	else
		shotT1 = totalShotTypes;
		
	checkShotType1(shotT1);
	resetFireRate();
}
document.getElementById("shot2L").onclick =
function(){
	
	if(shotT2>1)
		shotT2--;
	else
		shotT2 = totalShotTypes;
		
	checkShotType2(shotT2);
	resetFireRate();
}
document.getElementById("shot3L").onclick =
function(){
	
	if(shotT3>1)
		shotT3--;
	else
		shotT3 = totalShotTypes;
		
	checkShotType3(shotT3);
	resetFireRate();
}

//firerate is slowest (high numbers for milliseconds between shots)
function checkShotType1(shotT1){
	if(shotT1 === 1){
		shotBox1.value = "Bullets";
		fireRate = 250;
	}
	if(shotT1 === 2){
		shotBox1.value = "Spray";
		fireRate = 25;
	}
	if(shotT1 === 3){
		shotBox1.value = "AoE snowy";
		fireRate = 5;
	}
	if(shotT1 === 4){
		shotBox1.value = "Railgun";
		fireRate = 3000;
	}
	if(shotT1 === 5){
		shotBox1.value = "Homing shots";
		fireRate = 2000;
	}
	if(shotT1 === 6){
		shotBox1.value = "GridLock";
		fireRate = 4000;
	}
	if(shotT1 === 7){
		shotBox1.value = "Infinite Swords";
		fireRate = 80;
	}
	updateFormShotValues();
}

function checkShotType2(shotT2){
	if(shotT2 === 1){
		shotBox2.value = "Bullets";
		fireRate2 = 200;
	}
	if(shotT2 === 2){
		shotBox2.value = "Spray";
		fireRate2 = 50;
	}
	if(shotT2 === 3){
		shotBox2.value = "AoE snowy";
		fireRate2 = 10;
	}
	if(shotT2 === 4){
		shotBox2.value = "Railgun";
		fireRate2 = 3500;
	}
	if(shotT2 === 5){
		shotBox2.value = "Homing shots";
		fireRate2 = 1500;
	}
	if(shotT2 === 6){
		shotBox2.value = "GridLock";
		fireRate2 = 3500;
	}
	if(shotT2 === 7){
		shotBox2.value = "Infinite Swords";
		fireRate2 = 50;
	}
	updateFormShotValues();
}

//fire rate is highest (low numbers)
function checkShotType3(shotT3){
	if(shotT3 === 1){
		shotBox3.value = "Bullets";
		fireRate3 = 150;	
	}
	if(shotT3 === 2){
		shotBox3.value = "Spray";
		fireRate3 = 75;		
	}
	if(shotT3 === 3){
		shotBox3.value = "AoE snowy";
		fireRate3 = 15;	
	}
	if(shotT3 === 4){
		shotBox3.value = "Railgun";
		fireRate3 = 4000;		
	}
	if(shotT3 === 5){
		shotBox3.value = "Homing shots";
		fireRate3 = 1000;	
	}
	if(shotT3 === 6){
		shotBox3.value = "GridLock";
		fireRate3 = 3000;	
	}
	if(shotT3 === 7){
		shotBox3.value = "Infinite Swords";
		fireRate3 = 20;	
	}
	updateFormShotValues();
}

</script>

<script>
//=================================================================
//The number of the relevant image.
var hairBackDraw;
var legsDraw;
var bodyDraw;
var headDraw;
var faceDraw;

//Used to actually draw the image for the game canvas.
var currHead = document.getElementById("gameHead1");
var currLegs = document.getElementById("gameBody1");
var currBody = document.getElementById("gameLegs1");

//Total numbers of each part that exists.
var totalLegs = 3;
var totalBody = 3;
var totalHeads = 3;
var totalFaces = 3;

document.getElementById("char1R").onclick = 
function ()
{
	if(head<totalHeads)
		head++;
	else
		head = 1;
		
	checkParts();
	drawChar();
}

document.getElementById("char2R").onclick = 
function ()
{
	if(face<totalFaces)
		face++;
	else
		face = 1;
		
	checkParts();
	drawChar();
}

document.getElementById("char3R").onclick = 
function ()
{
	if(body<totalBody)
		body++;
	else
		body = 1;
		
	checkParts();
	drawChar();
}

document.getElementById("char4R").onclick = 
function ()
{
	if(legs<totalLegs)
		legs++;
	else
		legs = 1;
		
	checkParts();
	drawChar();
}

document.getElementById("char1L").onclick = 
function ()
{
	if(head>1)
		head--;
	else
		head = totalHeads;
		
	checkParts();
	drawChar();
}

document.getElementById("char2L").onclick = 
function ()
{
	if(face>1)
		face--;
	else
		face = totalFaces;
		
	checkParts();	
	drawChar();
}

document.getElementById("char3L").onclick = 
function ()
{
	if(body>1)
		body--;
	else
		body = totalBody;
		
	checkParts();
	drawChar();
}

document.getElementById("char4L").onclick = 
function ()
{
	if(legs>1)
		legs--;
	else
		legs = totalLegs;
		
	checkParts();
	drawChar();
}

function checkParts(){
//This is more efficient and I probably should have done this for other things too.
//heads
	for(var i = 1; i <= totalHeads; i++){
		if(head === i){
			headDraw = document.getElementById('head' + i);
			currHead = document.getElementById('gameHead' + i);
			hairBackDraw = document.getElementById('hair' + i + 'Back');
		}
	}

//faces
	for(var i = 1; i <= totalFaces; i++){
		if(face === i)
		faceDraw = document.getElementById('face' + i);
	}
//bodies
	for(var i = 1; i <= totalBody; i++){
		if(body === i){
			bodyDraw = document.getElementById('body' + i);
			currBody = document.getElementById('gameBody' + i);
		}
	}
//legs
	for(var i = 1; i <= totalLegs; i++){
		if(legs === i){
			legsDraw = document.getElementById('legs' + i);
			currLegs = document.getElementById('gameLegs' + i);
		}
	}
	updateFormCharValues();
}
</script>

<script>
//Global bullet array
var playerBullets = [];
//Shot limiter
var shoot = false;
var shoot2 = false;
var shoot3 = false;

//============================================================================================================================
//Gets the 2d context for the canvas (not 3d) attaches canvas to body.
var canvas = document.getElementById("shotCanvas");
var context = canvas.getContext("2d");

var canvas2 = document.getElementById("charCanvas");
var context2 = canvas2.getContext("2d");

//============================================================================================================================
/* Construct a player object declaring it literally. This is nice and flexible because we use the "this." notation
   ie: the draw function can adapt to changes. */

var player = {
	color: "yellow",
//Default x: 150, y:280
	x: 150,
	y: 280,
	width: 1,
	height: 1,

//This draw function constantly redraws the player rectangle based on the Player object's values.
	draw: function() {
		context.drawImage(currBody, this.x-15, this.y-25);
		context.drawImage(currLegs, this.x-15, this.y-25);
		context.drawImage(currHead, this.x-15, this.y-25);
		context.fillStyle = this.color;
		context.fillRect(this.x, this.y, this.width, this.height);
	}
};

var player2 = {
	color: "yellow",
//Default x: 150, y:20
	x: 150,
	y: 20,
	width: 1,
	height: 1,

//This draw function constantly redraws the player rectangle based on the Player object's values.
	draw: function() {
		context.fillStyle = this.color;
		context.fillRect(this.x, this.y, this.width, this.height);
	}
};

//============================================================================================================================
//USE THIS UPDATED ANIMATION METHOD IN THE SPLITSCREEN AND MULTIPLAYER. It is slightly more efficient.
//This method fixes the bug where shots piled up.

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

//draw order matters
function draw() {
	context.clearRect(0,0, canvas.width, canvas.height);
	playerBullets.forEach(function(bullet){bullet.draw();});
	player.draw();
	player2.draw();
	}
	
function drawChar(){
	checkParts();
	preloader();
	//This context.clear needs to be the exact size of the whole canvas.
	//canvas.height and canvas.width don't work properly.
	context2.clearRect(0,0,400,500);
	context2.drawImage(hairBackDraw,0,0);
	context2.drawImage(legsDraw,0,0);
	context2.drawImage(bodyDraw,0,0);
	context2.drawImage(headDraw,0,0);
	context2.drawImage(faceDraw,0,0);
	}
	
function updateFormCharValues(){
//Use jquery to update hidden form values.
//THANK YOU BASED JQUERY
	$("#formCharHead").val(head);
	$("#formCharFace").val(face);
	$("#formCharBody").val(body);
	$("#formCharLegs").val(legs);
}
	
//============================================================================================================================
//Get the middle of the player.
player.midpoint = function(){
return{
	x: this.x,
	y: this.y
	};
}

//============================================================================================================================
//Sprites for game
shotBall1 = document.getElementById("shotBall1");
railBeam = document.getElementById("railBeam");
sword1 = document.getElementById("sword1");

//============================================================================================================================
//Push an instance of a bullet into an array and have it come from the center of the player
player.shoot = function(){
	var bulletPosition = this.midpoint();
	//Each player can choose up to 3 bullet types to mix at max level
	//3 HAS to be the HARDCAP. Any more than that and the game *probably* becomes impossible
	
	if(shoot===true){

//TODO A bunch of these feel imbalanced or "not fun" so I'll probably replace the arcs and orbs later.
		if(shotT1 === 1){
			playerBullets.push(Bullet({speed:5, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
			shoot=false;
			}
		if(shotT1 === 2){
			playerBullets.push(BulletCone({speed:1, x: bulletPosition.x, y: bulletPosition.y, P1: true, menu: true}));
			shoot=false;
			}
		if(shotT1 === 3){
			playerBullets.push(BulletSnow({speed:1, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
			shoot=false;
			}
		if(shotT1 === 4){
			playerBullets.push(BulletRail({speed:0, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
			shoot=false;
			}
		if(shotT1 === 5){
			for(var i = 1; i<=6; i++){
				playerBullets.push(BulletHoming({x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true, shotNum: i}));
			}
			shoot=false;
			}
		if(shotT1 === 6){
			var randomX = Math.random()*canvas.width;
			var randomY = Math.random()*canvas.height;
			
			//i should be equal to half of the projectile radius
			for(var i = 4; i < canvas.width; i+=15){
				playerBullets.push(BulletGridlock({x: 0, y: randomY, shotNum: i, menu: true, P1: true}));
			}
			for(var j = 4; j < canvas.height; j+=15){
			//y = canvas.height for player 1. Player 2 will see y = 0.
				playerBullets.push(BulletGridlock2({x: randomX, y: canvas.height - 4, shotNum2: j, menu: true, P1: true}));
			}
			shoot=false;
			}
		if(shotT1 === 7){
			playerBullets.push(BulletMissiles({speed: 3, x:bulletPosition.x, y:canvas.height, P1: true, menu: true}));
			shoot=false;
			}
	}
			
if(shoot2===true){
		if(shotT2 === 1){
				playerBullets.push(Bullet({speed:7.5, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
				shoot2=false;
				}
		if(shotT2 === 2){
				playerBullets.push(BulletCone({speed:2, x: bulletPosition.x, y: bulletPosition.y, P1: true, menu: true}));
				shoot2=false;
				}
		if(shotT2 === 3){
				playerBullets.push(BulletSnow({speed:1.5, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
				shoot2=false;
				}
		if(shotT2 === 4){
				playerBullets.push(BulletRail({speed:0, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
				shoot2=false;
				}
		if(shotT2 === 5){
				for(var i = 1; i<=6; i++){
					playerBullets.push(BulletHoming({x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true, shotNum: i}));
				}
				shoot2=false;
				}
		if(shotT2 === 6){
				var randomX = Math.random()*canvas.width;
				var randomY = Math.random()*canvas.height;
				
				//i should be equal to half of the projectile radius
				for(var i = 4; i < canvas.width; i+=15){
					playerBullets.push(BulletGridlock({x: 0, y: randomY, shotNum: i, menu: true, P1: true}));
				}
				for(var j = 4; j < canvas.height; j+=15){
				//y = canvas.height for player 1. Player 2 will see y = 0.
					playerBullets.push(BulletGridlock2({x: randomX, y: canvas.height - 4, shotNum2: j, menu: true, P1: true}));
				}
				shoot2=false;
				}
		if(shotT2 === 7){
				//playerBullets.push(Bullet7({speed:2, x: bulletPosition.x, y: bulletPosition.y}));
				playerBullets.push(BulletMissiles({speed: 4, x:bulletPosition.x, y:canvas.height, P1: true, menu: true}));
				shoot2=false;
				}
		}
if(shoot3===true){
		if(shotT3 === 1){
				playerBullets.push(Bullet({speed:10, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
				shoot3=false;
				}
		if(shotT3 === 2){
				playerBullets.push(BulletCone({speed:3, x: bulletPosition.x, y: bulletPosition.y, P1: true, menu: true}));
				shoot3=false;
				}
		if(shotT3 === 3){
				playerBullets.push(BulletSnow({speed:2, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
				shoot3=false;
				}
		if(shotT3 === 4){
				playerBullets.push(BulletRail({speed:0, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
				shoot3=false;
				}
		if(shotT3 === 5){
				for(var i = 1; i<=6; i++){
					playerBullets.push(BulletHoming({x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true, shotNum: i}));
				}
				shoot3=false;
				}
		if(shotT3 === 6){
				var randomX = Math.random()*canvas.width;
				var randomY = Math.random()*canvas.height;
				
				//i should be equal to half of the projectile radius
				for(var i = 4; i < canvas.width; i+=15){
					playerBullets.push(BulletGridlock({x: 0, y: randomY, shotNum: i, menu: true, P1: true}));
				}
				for(var j = 4; j < canvas.height; j+=15){
				//y = canvas.height for player 1. Player 2 will see y = 0.
					playerBullets.push(BulletGridlock2({x: randomX, y: canvas.height - 4, shotNum2: j, menu: true, P1: true}));
				}
				shoot3=false;
				}
		if(shotT3 === 7){
				//playerBullets.push(Bullet7({speed:1, x: bulletPosition.x, y: bulletPosition.y}));
				playerBullets.push(BulletMissiles({speed: 5, x:bulletPosition.x, y:canvas.height, P1: true, menu: true}));
				shoot3=false;
				}
	}
}

function update() {

if(shoot || shoot2 || shoot3)
	{player.shoot();}

	//Updates bullet info every update call
	playerBullets.forEach(function(bullet) {
		handleCollisions();
		bullet.update();
	});

	playerBullets = playerBullets.filter(function(bullet) {
		return bullet.active;
	});

}
		
function collidesBox(a, b) {
				
        return 	a.x < b.x + b.width && 
				a.x + a.hitWidth > b.x &&
				a.y < b.y + b.height && 
				a.y + a.hitHeight > b.y;
        }		
		
function handleCollisions() {

	playerBullets.forEach(function(bullet){
            if(collidesBox(bullet, player2)){ 
				if(bullet.pierce === false && bullet.split === false)
					bullet.active = false;
			}
    });
	
	playerBullets.forEach(function(bullet){
            if(collidesBox(bullet, player)){ 
				if(bullet.pierce === false && bullet.split === true)
					bullet.active = false;
			}
    });
}

</script>




























</body>
</html>