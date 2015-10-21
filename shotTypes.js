//Plain old bullet
function Bullet(I){
//Checks to see if the shot pierces the target
	I.pierce = false;
//Will this be checked by the quad tree?
	I.check = false;
//If the bullet is player 1's then this is true
	I.P1;
//Checks to see if the bullet is still onscreen/"alive"
	I.active = true;
	I.xVelocity = 0;
	I.yVelocity = -I.speed;
	I.color = "white";
	I.age = Math.floor(Math.random() * 128);
//Used for hit detection boxes
	I.hitHeight = 5;
	I.hitWidth = 3;
	I.menu;
	
	I.xVelocity = Math.sin(I.age * Math.PI / 64);
        
	I.age++;
	
	I.inBounds = function(){
		return I.x >=0 && I.x <= canvas.width && I.y >=0 && I.y <= canvas.height;
	};

	I.draw = function() {
		context.fillStyle = this.color;
		context.fillRect(this.x, this.y, this.hitWidth, this.hitHeight);
		if(!this.menu){
			context2.fillStyle = this.color;
			context2.fillRect(this.x, this.y, this.hitWidth, this.hitHeight);
		}
	};

	I.update = function() {
		I.x += I.xVelocity;
		if(this.P1===true){
			I.y += I.yVelocity;
		}else{
			I.y -= I.yVelocity;
		}
		I.active = I.active && I.inBounds();
	};
    return I;
}
//============================================================================================================================
//A conical spray of energy balls
//Speed recommendation = 2-6
//Fire rate = 1
function BulletCone(I){
//Checks to see if the shot pierces the target
	I.pierce = false;
//Will this be checked by the quad tree?
	I.check = false;
//Checks to see if the bullet is still onscreen/"alive"
	I.active = true;
	I.xVelocity = 0;
	I.yVelocity = -I.speed;
	I.radius = 7;
	I.age = Math.floor(Math.random() * 128);
	I.P1;
	I.sprite;
//Used for hit detection boxes
	I.hitHeight = 13;
	I.hitWidth = 13;

	I.menu;
	
	I.xVelocity = Math.sin(I.age * Math.PI / 64);
	I.age++;

	I.inBounds = function(){
		//A simplified if statement returning true/false
		return I.x >=0 && I.x <= canvas.width && I.y >=0 && I.y <= canvas.height;
	};
	
	if(I.P1)
		I.sprite = shotBall1;
	else
		I.sprite = shotBall1P2;

	I.draw = function() {
		context.beginPath();
		context.drawImage(this.sprite, this.x, this.y);
		if(!this.menu){
			context2.beginPath();
			context2.drawImage(this.sprite, this.x, this.y);
		}
	};

	I.update = function() {
		I.x += I.xVelocity;
		if(this.P1===true){
			I.y += I.yVelocity;
		}else{
			I.y -= I.yVelocity;
		}		
		I.active = I.active && I.inBounds();
	};
    return I;
}

//============================================================================================================================
//A snowy spray (Screen AoE) TODO Adapt for split screen
//Speed recommendation = 1.5-3
//Fire rate = 1
function BulletSnow(I){
	I.pierce = false;
	I.check = false
	I.P1;
	I.active = true;
	I.xVelocity = 0;
	I.width = 4;
	I.height = 4;
	I.hitWidth = 4;
	I.hitHeight = 4;
	
	I.age = Math.floor(Math.random() * 128);
	I.x = Math.random()*canvas.width;

	I.xVelocity = 3 * Math.sin(I.age * Math.PI / 64);
	I.age++;

	I.inBounds = function(){
		return I.x >=0 && I.x <= canvas.width && I.y >=0 && I.y <= canvas.height;
	};

		if(I.P1)
			I.color = "blue";
		else
			I.color = "yellow";	
	
	I.draw = function() {
		context.fillStyle = this.color;
		context.fillRect(this.x - this.width/2, this.y, this.width, this.height);
		if(!this.menu){
			context2.fillStyle = this.color;
			context2.fillRect(this.x - this.width/2, this.y, this.width, this.height);
		}
	};

	I.update = function() {
		I.x += I.xVelocity;
		if(this.P1 === true){
			I.y -= I.speed;
		}else{
			I.y += I.speed;
		}
		I.active = I.active && I.inBounds();
	};
    return I;
}

//============================================================================================================================
//Infinite Swords
//Speed recommendation = 0
//Fire rate = 1
function BulletMissiles(I){
	I.pierce = false;
	I.check = false
	I.P1;
	I.active = true;
	I.yVelocity = 0;
	I.speed;
	//img is 8x25
	I.width = 8;
	I.height = 25;
	I.hitWidth = 8;
	I.hitHeight = 25;
	I.sprite;

	I.age = Math.floor(Math.random() * 128);
	I.x = Math.random()*canvas.width;
	I.y;

	I.xVelocity = 3 * Math.sin(I.age * Math.PI / 64);
        
	I.age++;

	I.inBounds = function(){
		//A simplified if statement returning true/false
		return I.x >=0 && I.x <= canvas.width && I.y >=0 && I.y <= canvas.height;
	};

	if(I.P1)
		I.sprite = sword1;
	else
		I.sprite = sword2;	
	
	I.draw = function() {
		if(this.yVelocity < this.speed)
			this.yVelocity+=.1;
		context.drawImage(this.sprite, this.x, this.y, this.hitWidth, this.hitHeight);	
		if(!this.menu){
			context2.drawImage(this.sprite, this.x, this.y, this.hitWidth, this.hitHeight);	
		}
	};

	I.update = function() {
		if(this.P1)
			this.y -= this.yVelocity;
		else
			this.y += this.yVelocity;
		I.active = I.active && I.inBounds();
	};
    return I;
}

//============================================================================================================================
//Railgun
//Speed recommendation = n/a
//Fire rate = 3000-4000+
function BulletRail(I){
	I.pierce = true;
	I.check = false
	I.P1;
	I.sprite;
	I.active = true;
//hitHeight = used for collision detection
	I.hitHeight;
//hitWidth always starts out 10 used for collision detection
	I.hitWidth = 10;
	I.x-=6;
	
	if(I.P1)
		I.sprite = railBeam;
	else
		I.sprite = railBeamP2;	
	
	I.draw = function() {
	if(this.hitWidth > 0 && this.hitWidth <=10){
		context.beginPath();
		context.drawImage(this.sprite, this.x, this.y, this.hitWidth, this.hitHeight);
		if(!this.menu){
			context2.drawImage(this.sprite, this.x, this.y, this.hitWidth, this.hitHeight);
		}
		this.hitWidth -= .1;
		this.x += .05;
		}
	};

	I.update = function() {
		I.age++;
		if(I.age>10){
			I.active = I.active && I.hitWidth > 0;
		}
		if(this.P1 === true){
			I.hitHeight = Math.abs(player.y);
			I.y = 0;
		}else{
			I.hitHeight = canvas.height;
			I.y = Math.abs(player2.y);
		}
	};
    return I;
}

//============================================================================================================================
//Homing shots that home in on the opponent's last position.
//Speed recommendation = N/A
//Fire rate = 1000-2000
function BulletHoming(I){
	I.pierce = false;
	I.check = false
	I.P1;
	I.fallbackSpeed;
	I.active = true;
	I.xVelocity = 0;
	I.yVelocity = 0;
	I.width = 8;
	I.height = 16;
	I.hitWidth = 8;
	I.hitHeight = 16;
	I.sprite;
	I.reachEnd = false;
	I.shotNum;
	
	//I.radians = Math.tan((player.y - player2.y)/(this.x - player2.x));
	
	I.inBounds = function(){
		//A simplified if statement returning true/false
		return I.x >=0 && I.x <= canvas.width && I.y >=0 && I.y <= canvas.height;
	};
	
	if(I.P1)
		I.sprite = ovalShot;
	else
		I.sprite = ovalShotP2;	
	
	I.draw = function() {
		context.drawImage(this.sprite, this.x, this.y);
		if(!this.menu){
			context2.drawImage(this.sprite, this.x, this.y);
		}
	};

	I.update = function() {
	if(this.reachEnd === false){
	if(this.P1===true){
//Shots to the right
		if(this.shotNum === 6){
			if(this.x < player.x+80){
				I.xVelocity += 0.15;
				I.x += I.xVelocity;
			}else{
				I.reachEnd = true;
				if(I.x-player2.x !== 0)
					I.yVelocity = Math.abs((I.y-player2.y)/(I.x-player2.x));
			}
		}
		if(this.shotNum === 5){
			if(this.x < player.x+60){
				I.xVelocity += 0.10;
				I.x += I.xVelocity;
			}else{
				I.reachEnd = true;
				if(I.x-player2.x !== 0)
				I.yVelocity = Math.abs((I.y-player2.y)/(I.x-player2.x));
			}
		}
		if(this.shotNum === 4){
			if(this.x < player.x+40){
				I.xVelocity += 0.05;
				I.x += I.xVelocity;
			}else{
				I.reachEnd = true;
				if(I.x-player2.x !== 0)
				I.yVelocity = Math.abs((I.y-player2.y)/(I.x-player2.x));
			}
		}
		
//Shots to the left
		if(this.shotNum === 3){
			if(this.x > player.x-80){
				I.xVelocity += -0.15;
				I.x += I.xVelocity;
			}else{
				I.reachEnd = true;
				if(I.x-player2.x !== 0)
				I.yVelocity = Math.abs((I.y-player2.y)/(I.x-player2.x));
			}
		}
		if(this.shotNum === 2){
			if(this.x > player.x-60){
				I.xVelocity += -0.10;
				I.x += I.xVelocity;
			}else{
				I.reachEnd = true;
				if(I.x-player2.x !== 0)
				I.yVelocity = Math.abs((I.y-player2.y)/(I.x-player2.x));
			}
		}
		if(this.shotNum === 1){
			if(this.x > player.x-40){
				I.xVelocity += -0.05;
				I.x += I.xVelocity;
			}else{
				I.reachEnd = true;
				if(I.x-player2.x !== 0)
				I.yVelocity = Math.abs((I.y-player2.y)/(I.x-player2.x));
			}
		}
	}else{
//Shots to the right
		if(this.shotNum === 6){
			if(this.x < player2.x+80){
				I.xVelocity += 0.15;
				I.x += I.xVelocity;
			}else{
				I.reachEnd = true;
				if(I.x-player.x !== 0)
					I.yVelocity = Math.abs((I.y-player.y)/(I.x-player.x));
			}
		}
		if(this.shotNum === 5){
			if(this.x < player2.x+60){
				I.xVelocity += 0.10;
				I.x += I.xVelocity;
			}else{
			//Goes after the opposite player. 1 in this case
				I.reachEnd = true;
				if(I.x-player.x !== 0)
				I.yVelocity = Math.abs((I.y-player.y)/(I.x-player.x));
			}
		}
		if(this.shotNum === 4){
			if(this.x < player.x+40){
				I.xVelocity += 0.05;
				I.x += I.xVelocity;
			}else{
				I.reachEnd = true;
				if(I.x-player.x !== 0)
				I.yVelocity = Math.abs((I.y-player.y)/(I.x-player.x));
			}
		}
		
//Shots to the left
		if(this.shotNum === 3){
			if(this.x > player2.x-80){
				I.xVelocity += -0.15;
				I.x += I.xVelocity;
			}else{
				I.reachEnd = true;
				if(I.x-player.x !== 0)
				I.yVelocity = Math.abs((I.y-player.y)/(I.x-player.x));
			}
		}
		if(this.shotNum === 2){
			if(this.x > player2.x-60){
				I.xVelocity += -0.10;
				I.x += I.xVelocity;
			}else{
				I.reachEnd = true;
				if(I.x-player.x !== 0)
				I.yVelocity = Math.abs((I.y-player.y)/(I.x-player.x));
			}
		}
		if(this.shotNum === 1){
			if(this.x > player.x-40){
				I.xVelocity += -0.05;
				I.x += I.xVelocity;
			}else{
				I.reachEnd = true;
				if(I.x-player.x !== 0)
				I.yVelocity = Math.abs((I.y-player.y)/(I.x-player.x));
			}
		}
	}
}
	if(this.reachEnd === true){
		if(this.yVelocity>I.fallbackSpeed)
			I.yVelocity = this.fallbackSpeed;
		if(this.yVelocity<1)
			I.yVelocity = 1;
		if(this.shotNum === 6 || this.shotNum === 5 || this.shotNum === 4){
			if(I.yVelocity !== this.fallbackSpeed)
				I.x -= 1;
			if(this.P1 === true)
				I.y -= I.yVelocity;
			else
				I.y += I.yVelocity;
		}else{
			if(I.yVelocity !== this.fallbackSpeed)
				I.x += 1;
			if(this.P1 === true)
				I.y -= I.yVelocity;
			else
				I.y += I.yVelocity;
		}
	}
	
		I.active = I.active && I.inBounds();
	};
    return I;
}

//============================================================================================================================
//Gridlock creates 2 "lines" of shots. Combine this with Gridlock2.
//Speed recommendation = N/A
//Fire rate = 1000-2000
function BulletGridlock(I){
	I.pierce = false;
	I.check = false
	I.P1;
	I.shotNum;
	I.active = true;
	I.xVelocity = 0;
	I.yVelocity = 0;
	I.width = 8;
	I.height = 16;
	I.hitWidth = 8;
	I.hitHeight = 16;
	I.color = "white";
	I.sprite;
	I.reachEnd = false;
	I.x = 0;
	I.y;
	
	I.inBounds = function(){
		//A simplified if statement returning true/false
		return I.x >=0 && I.x <= canvas.width && I.y >=0 && I.y <= canvas.height;
	};
	
	if(I.P1)
		I.sprite = ovalShot;
	else
		I.sprite = ovalShotP2;	
	
	I.draw = function() {
		context.drawImage(this.sprite, this.x, this.y);
		if(!this.menu){
			context2.drawImage(this.sprite, this.x, this.y);
		}
	};

	I.update = function() {
		if(this.reachEnd === false){
			if(I.x < this.shotNum){
				I.xVelocity = 0.25*(this.shotNum/15);
				I.x += I.xVelocity;
			}else{
				I.xVelocity = 0;
				this.reachEnd = true;
			}
		}
		
		if(this.reachEnd === true){
			I.yVelocity += 0.01;
				if(this.P1 === true)
					I.y -= I.yVelocity;
				else
					I.y += I.yVelocity;
		}	
		I.active = I.active && I.inBounds();
	};
    return I;
}

//USE THIS WITH GRIDLOCK
function BulletGridlock2(I){
	I.pierce = false;
	I.check = false
	I.P1;
	I.shotNum2;
	I.active = true;
	I.xVelocity = 0;
	I.yVelocity = 0;
	I.width = 16;
	I.height = 8;
	I.hitWidth = 16;
	I.hitHeight = 8;
	I.color = "white";
	I.sprite;
	I.reachEnd2 = false;
	I.x;
	I.y;
	
	I.inBounds = function(){
		//A simplified if statement returning true/false
		return I.x >=0 && I.x <= canvas.width && I.y >=0 && I.y <= canvas.height;
	};
	
	if(I.P1)
		I.sprite = ovalShot2;
	else
		I.sprite = ovalShot2P2;	
	
	I.draw = function() {
		context.drawImage(this.sprite, this.x, this.y);
		if(!this.menu){
			context2.drawImage(this.sprite, this.x, this.y);
		}
	};

	I.update = function() {
		if(this.reachEnd2 === false){
		if(this.P1){
			if(I.y > this.shotNum2){
				I.yVelocity = .25*((canvas.height - (this.shotNum2+4))/15);
				I.y -= I.yVelocity;
			}else
				this.reachEnd2 = true;
		}else{
			if(I.y < canvas.height-this.shotNum2){
				I.yVelocity = .25*((canvas.height -(this.shotNum2+4))/15);
				I.y += I.yVelocity;
			}else
				this.reachEnd2 = true;
		}
	}else{
		I.yVelocity = 0;
		this.reachEnd2 = true;
	}
		
		if(this.reachEnd2 === true){
			I.xVelocity += 0.01;
				if(this.P1 === true)
					I.x -= I.xVelocity;
				else
					I.x += I.xVelocity;
		}	
		I.active = I.active && I.inBounds();
	};
    return I;
}