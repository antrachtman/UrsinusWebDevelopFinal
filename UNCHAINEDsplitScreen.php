<!DOCTYPE HTML>
<!--NOTICE: SINCE ALL 3 DIFFICULTY PHP FILES ESSENTIALLY WORK THE SAME EXACT WAY, REFER TO splitScreen.php FOR DOCUMENTATION.-->
<?php
require_once 'mySQLMagic.php';
?>

<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
<script src="./jquery-1.11.1.js"></script>
<script src="./util.js"></script>
<script src="./jquery.hotkeys.js"></script>
<script src="./key_status.js"></script>
<script src="./shotTypes.js"></script>
<script src="./quadTreeAlt.js"></script>

<title>DANMAKU</title>
</head>
<body id = "chaosBG">
<div id = "buttons">
<div id = "buttonBox">
<input type = "button" class = "sidebar" id = "findMatch" value = "Find an online match"/><br/>
<input type = "button" class = "sidebar" id = "playerCustomize1" value = "Player 1 Customize"/><br/>
<input type = "button" class = "sidebar" id = "playerCustomize2" value = "Player 2 Customize"/><br/>
<input type = "button" class = "sidebar" id = "gameConfig" value = "Game Configuration"/><br/>
<input type = "button" class = "sidebar" id = "logOut" value = "Log Out"/><br/>
TOOLBAR
</div>
</div>

<button id = "normalMode">Click here for normal mode (100% fire rate)</button>
<button id = "ezMode">Click here for easy mode (25% fire rate)</button>

<script>
function preloader(){
	imageObject = new Image();
	images = new Array();
	images[0]="./gameImages/Character/inGame/back/body1.png";
	images[1]="./gameImages/Character/inGame/back/body2.png";
	images[2]="./gameImages/Character/inGame/back/body3.png";
	images[3]="./gameImages/Character/inGame/back/hair1.png";
	images[4]="./gameImages/Character/inGame/back/hair2.png";
	images[5]="./gameImages/Character/inGame/back/hair3.png";
	images[6]="./gameImages/Character/inGame/back/legs1.png";
	images[7]="./gameImages/Character/inGame/back/legs2.png";
	images[8]="./gameImages/Character/inGame/back/legs3.png";
	images[9]="./gameImages/Character/inGame/front/frontBody1.png";
	images[10]="./gameImages/Character/inGame/front/frontBody2.png";
	images[11]="./gameImages/Character/inGame/front/frontBody3.png";
	images[12]="./gameImages/Character/inGame/front/frontHead1.png";
	images[13]="./gameImages/Character/inGame/front/frontHead2.png";
	images[14]="./gameImages/Character/inGame/front/frontHead3.png";
	images[15]="./gameImages/Character/inGame/front/frontFace1.png";
	images[16]="./gameImages/Character/inGame/front/frontFace2.png";
	images[17]="./gameImages/Character/inGame/front/frontFace3.png";
	images[18]="./gameImages/Character/inGame/front/frontLegs1.png";
	images[19]="./gameImages/Character/inGame/front/frontLegs2.png";
	images[20]="./gameImages/Character/inGame/front/frontLegs3.png";
	images[21]="./gameImages/ShotBall1.png";
	images[22]="./gameImages/RailBeam.png";
	images[23]="./gameImages/OvalShot.png";
	images[24]="./gameImages/OvalShot2.png";
	images[25]="./gameImages/ShotBall1P2.png";
	images[26]="./gameImages/RailBeamP2.png";
	images[27]="./gameImages/OvalShotP2.png";
	images[28]="./gameImages/OvalShot2P2.png";
	images[29]="./gameImages/Character/inGame/front/frontHead1.1.png";
	for(var i = 0; i<images.size; i++){
		imageObject.src = images[i];
	}
}

document.getElementById("buttons").style.zIndex = "100";
document.getElementById("gameConfig").onclick = 
function(){
window.location = "./gameConfig.php"
}
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
document.getElementById("normalMode").onclick = 
function(){
window.location = "./splitScreen.php"
}
document.getElementById("ezMode").onclick = 
function(){
window.location = "./ezMode.php"
}
</script>

<span id = "partytime"><b>CHAOS MODE ENGAGED</b></span>
<!--The canvas can be any size and the shots will all still work, but too large and the game will basically crash from calculations-->
<?php
	if($background == 1){
		echo "<canvas id = 'myCanvas' class = 'chaosCanvasBG' width = '600' height = '500' style = 'border: 5px solid 'black';>";
	}else{
		echo "<canvas id = 'myCanvas' width = '600' height = '500' style = 'border: 5px solid 'black';>";
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
<img id="frontBody1" src = "./gameImages/Character/inGame/front/frontBody1.png">
<img id="frontBody2" src = "./gameImages/Character/inGame/front/frontBody2.png">
<img id="frontBody3" src = "./gameImages/Character/inGame/front/frontBody3.png">
<img id="frontHead1" src = "./gameImages/Character/inGame/front/frontHead1.png">
<img id="frontHead11" src = "./gameImages/Character/inGame/front/frontHead1.1.png">
<img id="frontHeadNoBack" src = "./gameImages/Character/inGame/front/frontHeadNoBack.png">
<img id="frontHead2" src = "./gameImages/Character/inGame/front/frontHead2.png">
<img id="frontHead3" src = "./gameImages/Character/inGame/front/frontHead3.png">
<img id="frontFace1" src = "./gameImages/Character/inGame/front/frontFace1.png">
<img id="frontFace2" src = "./gameImages/Character/inGame/front/frontFace2.png">
<img id="frontFace3" src = "./gameImages/Character/inGame/front/frontFace3.png">
<img id="frontLegs1" src = "./gameImages/Character/inGame/front/frontLegs1.png">
<img id="frontLegs2" src = "./gameImages/Character/inGame/front/frontLegs2.png">
<img id="frontLegs3" src = "./gameImages/Character/inGame/front/frontLegs3.png">
<img id="shotBall1" src = "./gameImages/ShotBall1.png">
<img id="railBeam" src = "./gameImages/RailBeam.png">
<img id="ovalShot" src = "./gameImages/OvalShot.png">
<img id="ovalShot2" src = "./gameImages/OvalShot2.png">
<img id="shotBall1P2" src = "./gameImages/ShotBall1P2.png">
<img id="railBeamP2" src = "./gameImages/RailBeamP2.png">
<img id="ovalShotP2" src = "./gameImages/OvalShotP2.png">
<img id="ovalShot2P2" src = "./gameImages/OvalShot2P2.png">
<img id="sword1" src = "./gameImages/Sword1.png">
<img id="sword2" src = "./gameImages/Sword2.png">
</canvas>

<?php
	if($bgm == 1){
		echo "<audio id = 'audio1' autoplay loop>
				<source src = 'YukariThemeLoop.MP3' type = 'audio/mpeg'>
			  </audio>
			  <script>
				var audio = document.getElementById('audio1');
				audio.volume = 0.1;
			  </script>";
	}
?>

<div id = "unchainCount">
P1 technically died: <input type = "text" id = "p1HitShow" value = 0 readonly = "true"></input> times. <br/>
P2 technically died: <input type = "text" id = "p2HitShow" value = 0 readonly = "true"></input> times. </br>
</div>

<script>

//Use quadTree.js to create a quad tree for collision detection
var myTree = new Quadtree({
	x: 0,
	y: 0,
	width: myCanvas.width,
	height: myCanvas.height
});	

//Name variable
var name = username;
//Global bullet array
var playerBullets = [];
//Shot limiter
var shoot1 = true;
var shoot2 = true;
var shoot3 = true;

var shoot1P2 = true;
var shoot2P2 = true;
var shoot3P2 = true;

//Total numbers of each part that exists.
var totalLegs = 3;
var totalBody = 3;
var totalHeads = 3;
var totalFaces = 3;

//From behind
var p1HeadB;
var p1BodyB;
var p1LegsB;

var p2HeadB;
var p2BodyB;
var p2LegsB;
//From in front
var p1HeadF;
var p1Head11 = document.getElementById("frontHeadNoBack");
var p1FaceF;
var p1BodyF;
var p1LegsF;

var p2HeadF;
var p2Head11 = document.getElementById("frontHeadNoBack");
var p2FaceF;
var p2BodyF;
var p2LegsF;

var bullet1;
var bullet2;
var bullet3;
var bullet1P2;
var bullet2P2;
var bullet3P2;

//Used to show how many times you technically died
var p1Hit = 0;
var p2Hit = 0;

//sprites for shots
var shotBall1 = document.getElementById('shotBall1');
var railBeam = document.getElementById('railBeam');
var ovalShot = document.getElementById('ovalShot');
var ovalShot2 = document.getElementById('ovalShot2');
var shotBall1P2 = document.getElementById('shotBall1P2');
var railBeamP2 = document.getElementById('railBeamP2');
var ovalShotP2 = document.getElementById('ovalShotP2');
var ovalShot2P2 = document.getElementById('ovalShot2P2');
var sword1 = document.getElementById('sword1');
var sword2 = document.getElementById('sword2');

function checkParts(){
//head
	for(var i = 1; i <= totalHeads; i++){
		if(head === i){
			p1HeadB = document.getElementById('gameHead' + i);
			p1HeadF = document.getElementById('frontHead' + i);
			if(i === 1)
				p1Head11 = document.getElementById("frontHead11");
		}
		if(p2Head === i){
			p2HeadB = document.getElementById('gameHead' + i);
			p2HeadF = document.getElementById('frontHead' + i);
			if(i === 1)
				p2Head11 = document.getElementById("frontHead11");
		}
	}

//faces
	for(var i = 1; i <= totalFaces; i++){
		if(face === i){
			p1FaceB = document.getElementById('gameFace' + i);
			p1FaceF = document.getElementById('frontFace' + i);
		}
		if(p2Face === i){
			p2Face = document.getElementById('gameFace' + i);
			p2FaceF = document.getElementById('frontFace' + i);
		}
	}
//bodies
	for(var i = 1; i <= totalBody; i++){
		if(body === i){
			p1BodyB = document.getElementById('gameBody' + i);
			p1BodyF = document.getElementById('frontBody' + i);
		}
		if(p2Body === i){
			p2BodyB = document.getElementById('gameBody' + i);
			p2BodyF = document.getElementById('frontBody' + i);
		}
	}
//legs
	for(var i = 1; i <= totalLegs; i++){
		if(legs === i){
			p1LegsB = document.getElementById('gameLegs' + i);
			p1LegsF = document.getElementById('frontLegs' + i);
		}
		if(p2Legs === i){
			p2LegsB = document.getElementById('gameLegs' + i);
			p2LegsF = document.getElementById('frontLegs' + i);
		}
	}
}
checkParts();

var canvas = document.getElementById("myCanvas");
var context = canvas.getContext("2d");

//============================================================================================================================
//This is a simpler way of animating. The other was causing keydown to be undefined.
  
var player = {
	color: "yellow",
	x: 300,
	y: 460,
	width: 1,
	height: 1,

	draw: function() {
		context.fillStyle = this.color;
		context.fillRect(this.x, this.y, this.width, this.height);
		context.drawImage(p1BodyB, this.x-15, this.y-25);
		context.drawImage(p1HeadB, this.x-15, this.y-25);
		context.drawImage(p1LegsB, this.x-15, this.y-25);
		if(hitbox === 1){
			context.fillStyle = this.color;
			context.fillRect(this.x, this.y, this.width, this.height);
		}
	}
}

var player2 = {
	color: "yellow",
	x: 300,
	y: 40,
	width: 1,
	height: 1,

	draw: function() {
		context.drawImage(p2Head11, this.x-15, this.y-25);
		context.drawImage(p2LegsF, this.x-15, this.y-25);
		context.drawImage(p2BodyF, this.x-15, this.y-25);
		context.drawImage(p2FaceF, this.x-15, this.y-25);
		context.drawImage(p2HeadF, this.x-15, this.y-25);
		if(p2Hitbox === 1){
			context.fillStyle = this.color;
			context.fillRect(this.x, this.y, this.width, this.height);
		}
	}
}
//Nametag omitted for now
//============================================================================================================================
//This timer/interval calls every X milliseconds as determined by fireRate
setInterval( function() { shoot1 = true; }, fire1P1 );
setInterval( function() { shoot2 = true; }, fire2P1 );
setInterval( function() { shoot3 = true; }, fire3P1 );
setInterval( function() { shoot1P2 = true; }, fire1P2 );
setInterval( function() { shoot2P2 = true; }, fire2P2 );
setInterval( function() { shoot3P2 = true; }, fire3P2 );
//============================================================================================================================
function draw() {
	context.clearRect(0,0, canvas.width, canvas.height);
	player2.draw();
	player.draw();
	playerBullets.forEach(function(bullet){bullet.draw();});
}
//============================================================================================================================
player.midpoint = function(){
return{
		x: this.x,
		y: this.y
	};
}

var bulletPosition = player.midpoint();

player2.midpoint = function(){
return{
		x: this.x,
		y: this.y
	};
}

var bulletPosition2 = player2.midpoint();

//============================================================================================================================
//Framerate tanks b/c of detection checks.
player.shoot = function(){
	var bulletPosition = this.midpoint();
		if(shotT1 === 1){
			playerBullets.push(Bullet({speed:5, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
			shoot=false;
			}
		if(shotT1 === 2){
			playerBullets.push(BulletCone({speed:1, x: bulletPosition.x, y: bulletPosition.y, P1: true, menu: true}));
			shoot=false;
			}
		if(shotT1 === 3){
			playerBullets.push(BulletSnow({speed:1, y: canvas.height, menu: true, P1: true}));
			shoot=false;
			}
		if(shotT1 === 4){
			playerBullets.push(BulletRail({speed:0, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
			shoot=false;
			}
		if(shotT1 === 5){
			for(var i = 1; i<=6; i++){
				playerBullets.push(BulletHoming({fallbackSpeed: 5, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true, shotNum: i}));
			}
			shoot=false;
			}
		if(shotT1 === 6){
			var randomX = Math.random()*canvas.width;
			var randomY = Math.random()*canvas.height;
			
			for(var i = 4; i < canvas.width; i+=15){
				playerBullets.push(BulletGridlock({x: 0, y: randomY, shotNum: i, menu: true, P1: true}));
			}
			for(var j = 4; j < canvas.height; j+=15){
				playerBullets.push(BulletGridlock2({x: randomX, y: canvas.height - 4, shotNum2: j, menu: true, P1: true}));
			}
			shoot=false;
			}
		if(shotT1 === 7){
			playerBullets.push(BulletMissiles({speed: 3, x:bulletPosition.x, y:canvas.height, P1: true, menu: true}));
			shoot=false;
			}
			
		if(shotT2 === 1){
				playerBullets.push(Bullet({speed:7.5, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
				shoot2=false;
				}
		if(shotT2 === 2){
				playerBullets.push(BulletCone({speed:2, x: bulletPosition.x, y: bulletPosition.y, P1: true, menu: true}));
				shoot2=false;
				}
		if(shotT2 === 3){
				playerBullets.push(BulletSnow({speed:1.5, y: canvas.height, menu: true, P1: true}));
				shoot2=false;
				}
		if(shotT2 === 4){
				playerBullets.push(BulletRail({speed:0, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
				shoot2=false;
				}
		if(shotT2 === 5){
				for(var i = 1; i<=6; i++){
					playerBullets.push(BulletHoming({fallbackSpeed: 7.5, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true, shotNum: i}));
				}
				shoot2=false;
				}
		if(shotT2 === 6){
				var randomX = Math.random()*canvas.width;
				var randomY = Math.random()*canvas.height;
				
				for(var i = 4; i < canvas.width; i+=15){
					playerBullets.push(BulletGridlock({x: 0, y: randomY, shotNum: i, menu: true, P1: true}));
				}
				for(var j = 4; j < canvas.height; j+=15){
					playerBullets.push(BulletGridlock2({x: randomX, y: canvas.height - 4, shotNum2: j, menu: true, P1: true}));
				}
				shoot2=false;
				}
		if(shotT2 === 7){
				playerBullets.push(BulletMissiles({speed: 4, x:bulletPosition.x, y:canvas.height, P1: true, menu: true}));
				shoot2=false;
				}
		
		if(shotT3 === 1){
				playerBullets.push(Bullet({speed:10, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
				shoot3=false;
				}
		if(shotT3 === 2){
				playerBullets.push(BulletCone({speed:3, x: bulletPosition.x, y: bulletPosition.y, P1: true, menu: true}));
				shoot3=false;
				}
		if(shotT3 === 3){
				playerBullets.push(BulletSnow({speed:2, y: canvas.height, menu: true, P1: true}));
				shoot3=false;
				}
		if(shotT3 === 4){
				playerBullets.push(BulletRail({speed:0, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true}));
				shoot3=false;
				}
		if(shotT3 === 5){
				for(var i = 1; i<=6; i++){
					playerBullets.push(BulletHoming({fallbackSpeed: 10, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: true, shotNum: i}));
				}
				shoot3=false;
				}
		if(shotT3 === 6){
				var randomX = Math.random()*canvas.width;
				var randomY = Math.random()*canvas.height;
				
				for(var i = 4; i < canvas.width; i+=15){
					playerBullets.push(BulletGridlock({x: 0, y: randomY, shotNum: i, menu: true, P1: true}));
				}
				for(var j = 4; j < canvas.height; j+=15){
					playerBullets.push(BulletGridlock2({x: randomX, y: canvas.height - 4, shotNum2: j, menu: true, P1: true}));
				}
				shoot3=false;
				}
		if(shotT3 === 7){
				playerBullets.push(BulletMissiles({speed: 5, x:bulletPosition.x, y:canvas.height, P1: true, menu: true}));
				shoot3=false;
				}
}

player2.shoot = function(){
	var bulletPosition = this.midpoint();
		if(p2Shot1 === 1){
			playerBullets.push(Bullet({speed:5, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: false}));
			shoot=false;
			}
		if(p2Shot1 === 2){
			playerBullets.push(BulletCone({speed:1, x: bulletPosition.x, y: bulletPosition.y, P1: false, menu: true}));
			shoot=false;
			}
		if(p2Shot1 === 3){
			playerBullets.push(BulletSnow({speed:1, y:0, menu: true, P1: false}));
			shoot=false;
			}
		if(p2Shot1 === 4){
			playerBullets.push(BulletRail({speed:0, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: false}));
			shoot=false;
			}
		if(p2Shot1 === 5){
			for(var i = 1; i<=6; i++){
				playerBullets.push(BulletHoming({fallbackSpeed: 5, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: false, shotNum: i}));
			}
			shoot=false;
			}
		if(p2Shot1 === 6){
			var randomX = Math.random()*canvas.width;
			var randomY = Math.random()*canvas.height;
			
			for(var i = 4; i < canvas.width; i+=15){
				playerBullets.push(BulletGridlock({x: 0, y: randomY, shotNum: i, menu: true, P1: false}));
			}
			for(var j = 4; j < canvas.height; j+=15){
				playerBullets.push(BulletGridlock2({x: randomX, y: 4, shotNum2: j, menu: true, P1: false}));
			}
			shoot=false;
			}
		if(p2Shot1 === 7){
			playerBullets.push(BulletMissiles({speed: 3, x:bulletPosition.x, y:0, P1: false, menu: true}));
			shoot=false;
			}
			
		if(p2Shot2 === 1){
				playerBullets.push(Bullet({speed:7.5, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: false}));
				shoot2=false;
				}
		if(p2Shot2 === 2){
				playerBullets.push(BulletCone({speed:2, x: bulletPosition.x, y: bulletPosition.y, P1: false, menu: true}));
				shoot2=false;
				}
		if(p2Shot2 === 3){
				playerBullets.push(BulletSnow({speed:1.5, y:0, menu: true, P1: false}));
				shoot2=false;
				}
		if(p2Shot2 === 4){
				playerBullets.push(BulletRail({speed:0, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: false}));
				shoot2=false;
				}
		if(p2Shot2 === 5){
				for(var i = 1; i<=6; i++){
					playerBullets.push(BulletHoming({fallbackSpeed: 7.5, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: false, shotNum: i}));
				}
				shoot2=false;
				}
		if(p2Shot2 === 6){
				var randomX = Math.random()*canvas.width;
				var randomY = Math.random()*canvas.height;
				
				for(var i = 4; i < canvas.width; i+=15){
					playerBullets.push(BulletGridlock({x: 0, y: randomY, shotNum: i, menu: true, P1: false}));
				}
				for(var j = 4; j < canvas.height; j+=15){
					playerBullets.push(BulletGridlock2({x: randomX, y: 4, shotNum2: j, menu: true, P1: false}));
				}
				shoot2=false;
				}
		if(p2Shot2 === 7){
				playerBullets.push(BulletMissiles({speed: 4, x:bulletPosition.x, y:0, P1: false, menu: true}));
				shoot2=false;
				}
		
		if(p2Shot3 === 1){
				playerBullets.push(Bullet({speed:10, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: false}));
				shoot3=false;
				}
		if(p2Shot3 === 2){
				playerBullets.push(BulletCone({speed:3, x: bulletPosition.x, y: bulletPosition.y, P1: false, menu: true}));
				shoot3=false;
				}
		if(p2Shot3 === 3){
				playerBullets.push(BulletSnow({speed:2, y:0, menu: true, P1: false}));
				shoot3=false;
				}
		if(p2Shot3 === 4){
				playerBullets.push(BulletRail({speed:0, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: false}));
				shoot3=false;
				}
		if(p2Shot3 === 5){
				for(var i = 1; i<=6; i++){
					playerBullets.push(BulletHoming({fallbackSpeed: 10, x: bulletPosition.x, y: bulletPosition.y, menu: true, P1: false, shotNum: i}));
				}
				shoot3=false;
				}
		if(p2Shot3 === 6){
				var randomX = Math.random()*canvas.width;
				var randomY = Math.random()*canvas.height;
				
				for(var i = 4; i < canvas.width; i+=15){
					playerBullets.push(BulletGridlock({x: 0, y: randomY, shotNum: i, menu: true, P1: false}));
				}
				for(var j = 4; j < canvas.height; j+=15){
					playerBullets.push(BulletGridlock2({x: randomX, y: 4, shotNum2: j, menu: true, P1: false}));
				}
				shoot3=false;
				}
		if(p2Shot3 === 7){
				playerBullets.push(BulletMissiles({speed: 5, x:bulletPosition.x, y:0, P1: false, menu: true}));
				shoot3=false;
				}
}

//============================================================================================================================

function update() {

	if(keydown.a){
		player.x-=movespeed;
	}

	if(keydown.s){
		player.y+=movespeed;
	}

	if(keydown.d){
		player.x+=movespeed;
	}

	if(keydown.w){
		player.y-=movespeed;
	}
//P2	
	if(keydown.left){
		player2.x-=p2Movespeed;
	}

	if(keydown.down){
		player2.y+=p2Movespeed;
	}

	if(keydown.right){
		player2.x+=p2Movespeed;
	}

	if(keydown.up){
		player2.y-=p2Movespeed;
	}

	if(keydown.space)
	{if(shoot1 || shoot2 || shoot3){player.shoot();}}
	
	if(keydown.m)
	{if(shoot1P2 || shoot2P2 || shoot3P2){player2.shoot();}}
	
	playerBullets.forEach(function(bullet) {
		bullet.update();
	});

	playerBullets = playerBullets.filter(function(bullet) {
		return bullet.active;
	});
	
	$("#p1HitShow").val(p1Hit);
	$("#p2HitShow").val(p2Hit);

	player.x = player.x.clamp(0, canvas.width - player.width);
	player.y = player.y.clamp(canvas.height/2 - player.height, canvas.height);
	
	player2.x = player2.x.clamp(0, canvas.width - player2.width);
	player2.y = player2.y.clamp(0, canvas.height/2 - player2.height);
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
			if(bullet.P1 === true){
				if(bullet.pierce === false)
					bullet.active = false;
				p2Hit++;
			}
		}
		if(collidesBox(bullet, player)){
			if(bullet.P1 === false){
				if(bullet.pierce === false)
					bullet.active = false;
				p1Hit++;
			}
		}
	});
}
//For some horrible reason, the request animation frame interferes with keydown on Mozilla even with shims and attempts to use their webkit versions.
//So the user can change how the animation frames are retrieved.
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
</script>
</body>
</html>