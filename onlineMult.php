<!DOCTYPE HTML>
<meta charset="UTF-8"> 
<html>
<link rel="stylesheet" type="text/css" href="style.css">

<head>

<script src="../Common/jquery-1.11.1.js"></script>
<script src="../Common/util.js"></script>
<script src="../Common/key_status.js"></script>
<script src="../Common/jquery.hotkeys.js"></script>
<script src="../Common/sprite.js"></script>
<script src="shotTypes.js"></script>

<title></title>
</head>

<body>

<span>INSTRUCTIONS: Move with WASD |
W - Up |
A - Left |
S - Down |
D - Right |
Hold Space to shoot.<br/>
The toolbar is gone here because the game will run until there is a winner. It will automatically relocate the players to the customize screen after.
this version only needs one screen.
</span>

<canvas id = "myCanvas" width = "600" height = "500" 
style = "border:1px solid "black";>

//Hiding images in the canvas  is a good idea.
<img id="character1" src = "./gameImages/Character1.png">
<img id="character1opposite" src = "./gameImages/Character1Face.png">

</canvas>




<form>
	<output type = "text" id = "name"></output>
	<output type = "text" id = "score"></output>
</form>



<!-- Used to submit user score data and name data. -->


<script>

	function post()
	{
		var name = $("#name").val();
		var score = $("#score").val();

		$.post("scores.php",{postname:name,postscore:score},
		function(data)
		{
			$("#result").html(data);
		});
	}

</script>




<div id = "result"></div>

<script>
//Name variable
var name = "PLAYER 1"
//Global point variable
var scoreP = 0;
//Global bullet array
var playerBullets = [];
//Shot limiter
var shoot = true;
var shoot2 = true;
var shoot3 = true;
//firerate variable. (milliseconds/shot) @500, 1 shot every .5 seconds (SMALL = FAST)
var fireRate = 10;
var fireRate2 = 100;
var fireRate3 = 150;

//============================================================================================================================
//Gets the 2d context for the canvas (not 3d) attaches canvas to body.
var canvas = document.getElementById("myCanvas");
var context = canvas.getContext("2d");

//============================================================================================================================
/* Construct a player object declaring it literally. This is nice and flexible because we use the "this." notation
   ie: the draw function can adapt to changes. */

var player = {
	color: "yellow",
	x: 280,
	y: 460,
	width: 1,
	height: 1,
	sprite: girl1 = document.getElementById("character1"),	

//This draw function constantly redraws the player rectangle based on the Player object's values.
	draw: function() {
		context.fillStyle = this.color;
		context.fillRect(this.x, this.y, this.width, this.height);
		context.drawImage(this.sprite, this.x-15, this.y-25);
	}
};

var player2 = {
	color: "yellow",
	x: 280,
	y: 300,
	width: 5,
	height: 5,
	sprite: girl1opp = document.getElementById("character1opposite"),	

//This draw function constantly redraws the player rectangle based on the Player object's values.
	draw: function() {
		context.fillStyle = this.color;
		context.fillRect(this.x, this.y, this.width, this.height);
		context.drawImage(this.sprite, this.x-15, this.y-25);
	}
};

//============================================================================================================================



var nametag  = {
	color: "yellow",
	draw: function() {
		context.fillStyle = this.color;
		context.font = "12px Times";
		context.fillText(name, player.x-25, player.y-30);
		}
	};


//============================================================================================================================
/*Used to simulate gameplay/animation. The division at the end determines the refresh rate?
I believe it is the number of milliseconds between each pause. Set interval calls update and draw on a regular basis.*/

var FPS = 60;
setInterval(function() {
	update();
	draw();
}, 1000/FPS);

//This timer/interval calls every X milliseconds as determined by fireRate
setInterval( function() { shoot= true; }, fireRate );
setInterval( function() { shoot2= true; }, fireRate2 );
setInterval( function() { shoot3= true; }, fireRate3 );

//============================================================================================================================
//Actually draws things on the screen. Clears the screen before drawing a new image constantly.

function draw() {
	context.clearRect(0,0, canvas.width, canvas.height);
	player.draw();
	player2.draw();
	nametag.draw();
	playerBullets.forEach(function(bullet){bullet.draw();});

if(collides(player, player2))
alert("collision");

	//enemies.forEach(function(enemy){enemy.draw();});
}

//============================================================================================================================
//Get the middle of the player.
player.midpoint = function(){
return{
	x: this.x + this.width/2,
	y: this.y-25

	};
}

//============================================================================================================================
//Push an instance of a bullet into an array and have it come from the center of the player
player.shoot = function(){
	var bulletPosition = this.midpoint();
	//Each player can choose up to 3 bullet types to mix at max level
	//3 HAS to be the HARDCAP. Any more than that and the game *probably* becomes impossible
if(shoot){
	playerBullets.push(Bullet2({speed:3, x: bulletPosition.x, y: bulletPosition.y}));
		shoot=false;
	}
if(shoot2){
	playerBullets.push(Bullet10({speed:0, x: bulletPosition.x, y: bulletPosition.y}));
		shoot2=false;
	}
if(shoot3){
	playerBullets.push(Bullet10({speed:0, x: bulletPosition.x, y: bulletPosition.y}));
		shoot3=false;
	}
	
}

//============================================================================================================================

/*Makes stuff happen. The reason keydown.X works at all is because I imported
scripts from other javascript files. jquery.hotkeys.js is an example of one
such file.*/

function update() {

	if(keydown.a) 
	{player.x-=4;}

	if(keydown.s)
	{player.y+=4;}

	if(keydown.d) 
	{player.x+=4;}

	if(keydown.w)
	{player.y-=4;}

	if(keydown.space)
	{if(shoot || shoot2 || shoot3){player.shoot();}}

/* I believe that the clamp function actually limits or puts a hard cap on the 
possible outcome of a computation. ie: Player x can never be lower than 0
and the player.x can never exceed the width of the canvas - the space the player
takes up.

EACH PLAYER MUST BE RESTRICTED TO HALF OF THE SCREEN FOR FAIRNESS/LOGISTICS.
 */

	player.x = player.x.clamp(0, canvas.width - player.width);
	player.y = player.y.clamp(canvas.height/2 - player.height, canvas.height);

/* Collision Detection */

	handleCollisions();

	playerBullets.forEach(function(bullet) {
		bullet.update();
	});

	playerBullets = playerBullets.filter(function(bullet) {
		return bullet.active;
		});

/*
	enemies.forEach(function(enemy) {
	enemy.update();
	});

	enemies = enemies.filter(function(enemy){
	return enemy.active;
	});

	if(Math.random() <0.1) {
	enemies.push(Enemy());
	}
*/

}


function collides(a, b) {
        return a.x < b.x + b.width && a.x + a.width > b.x &&
               a.y < b.y + b.height && a.y + a.height > b.y;
        }
        
        function handleCollisions() {
/*
        playerBullets.forEach(function(bullet){enemies.forEach(function(enemy){
              if(collides(bullet, enemy)) 
		{
                //enemy.explode();
                bullet.active = false;
		}
           
 		});    
 	});

*/


/*        
          enemies.forEach(function(enemy) {
            if(collides(enemy, player)) {
              player.explode();
            }
          });
*/
        }


      

        player.explode = function() {
          this.active = false;
	  scoreP = 0;
	  playerBullets = [];
	  player.x = 280;
	  player.y = 460;

	  
        }; 

	

</script>

</body>
</html>