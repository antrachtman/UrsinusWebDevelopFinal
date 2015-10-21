<!--This file pulls the variables from the MySQL database and turns them into values that javascript can use.
This is literally the workhorse of my program because it pulls from the database and every other file usually calls this one-->

<?php
require_once './login.php';
require_once './connect.php';
//http://www.w3schools.com/php/php_sessions.asp
//We use session variables ONLY to get the player ID number.
?>

<?php
//We only need the ID number. IF the username is set however, we can assume someone entered in a valid password for that username.
//Since the session keeps a username and an ID number, we check for the username and then pull the corresponding ID number.
if(isset($_SESSION['username'])){
	$playerID = $_SESSION['idNumber'];
} 

//We grab everything from whatever row is associated with the current player ID number.
$query = "select * from playerSettings where idNumber = ".$playerID."";
//Send out the query to mySQL
$result = mysqli_query($link, $query);

if(!$result) die ("Database access failed: ".mysqli_error($link));

//How much is there to go through?
$rows = mysqli_num_rows($result);

//Gets the server data by going through the data pulled out from mySQL as an array
for($j = 0; $j < $rows; $j++){
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	
		$username = $row[0];
		$password = $row[1];
		$email = $row[2];
		$shotT1 = $row[3];
		$shotT2 = $row[4];
		$shotT3 = $row[5];
		$charPart1 = $row[6];
		$charPart2 = $row[7];
		$charPart3 = $row[8];
		$charPart4 = $row[9];
		$level = $row[10];
		$exp = $row[11];
		$movespeed = $row[12];
		$hitbox = $row[13];
		$background = $row[14];
		$bgm = $row[15];
		$nameDisplay = $row[16];
		//We don't need to pull the ID number for anything so we skip row 17
		$p2Shot1 = $row[18];
		$p2Shot2 = $row[19];
		$p2Shot3 = $row[20];
		$p2Head = $row[21];
		$p2Face = $row[22];
		$p2Body = $row[23];
		$p2Legs = $row[24];
		$p2Movespeed = $row[25];
		$p2Hitbox = $row[26];
		$fire1P1 = $row[27];
		$fire2P1 = $row[28];
		$fire3P1 = $row[29];
		$fire1P2 = $row[30];
		$fire2P2 = $row[31];
		$fire3P2 = $row[32];
		$animateMethod = $row[33];
}

//Does some magic and basically sticks the values retrieved into 
//variables that javascript can use. This php file essentially
//creates a <script>...</script> block of code to create the variables.
echo "<script>\n";
echo "var username="."'".$username."'".";\n";
echo "var password="."'".$password."'".";\n";
echo "var email="."'".$email."'".";\n";
echo "var shotT1=".$shotT1.";\n";
echo "var shotT2=".$shotT2.";\n";
echo "var shotT3=".$shotT3.";\n";
echo "var head=".$charPart1.";\n";
echo "var face=".$charPart2.";\n";
echo "var body=".$charPart3.";\n";
echo "var legs=".$charPart4.";\n";
echo "var level=".$level.";\n";
echo "var exp=".$exp.";\n";
echo "var movespeed=".$movespeed.";\n";
echo "var hitbox=".$hitbox.";\n";
echo "var background=".$background.";\n";
echo "var bgm=".$bgm.";\n";
echo "var nameDisplay=".$nameDisplay.";\n";
echo "var p2Shot1=".$p2Shot1.";\n";
echo "var p2Shot2=".$p2Shot2.";\n";
echo "var p2Shot3=".$p2Shot3.";\n";
echo "var p2Head=".$p2Head.";\n";
echo "var p2Face=".$p2Face.";\n";
echo "var p2Body=".$p2Body.";\n";
echo "var p2Legs=".$p2Legs.";\n";
echo "var p2Movespeed=".$p2Movespeed.";\n";
echo "var p2Hitbox=".$p2Hitbox.";\n";
echo "var fire1P1=".$fire1P1.";\n";
echo "var fire2P1=".$fire2P1.";\n";
echo "var fire3P1=".$fire3P1.";\n";
echo "var fire1P2=".$fire1P2.";\n";
echo "var fire2P2=".$fire2P2.";\n";
echo "var fire3P2=".$fire3P2.";\n";
echo "var animateMethod=".$animateMethod.";\n";

echo "</script>";

?>