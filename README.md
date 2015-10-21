# UrsinusWebDevelopFinal
My Ursinus web development final project. 

Should this need to be run:

1) First fill in the details in "login.php"

An example would be: 
<?php //login.php
$db_hostname = '127.0.0.1';
$db_database = 'somedatabase';
$db_username = 'username for database';
$db_password = 'password to access database';
session_start();
?>

2) Make sure to set up the mySQL table. You can either copy and paste the query text from mySQLtableQueryToEnter.php 
into whatever you use, or you can run the php file once to query mySQL and make the table that way.

3) Once the table exists and once the credentials, host and server are correct everything should work once 'index.php' is run.
