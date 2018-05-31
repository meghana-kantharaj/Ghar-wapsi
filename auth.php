<!DOCTYPE html>
<head>
<title>ACKNOWLEDGEMENT</title>
<style>
body{
    background-repeat: no-repeat;
    background-attachment: fixed;
	background-position: center;
	background-size:cover;
	}
	
fieldset {
	background-color:white;
	opacity:0.8;
    display: block;
    color:lightseagreen bold;
    padding-top: auto;
    padding-bottom: auto;
    padding-left: auto;
    padding-right: auto;
   
  width: 250px;
  margin:auto;
	margin-top:100px;
	text-align:center;
	-webkit-border-radius: 25px;
-moz-border-radius: 25px;
} 
</style>
</head>
<body background='a2.jpg'>
<fieldset>
<?php

session_start();
//require_once('includes.php');


	//Connect to server
	$link = mysqli_connect("localhost", "root", "") or die(mysql_error());
	//Select the database
	mysql_select_db ("ghar_wapsi");

	// Get the login credentials from user
	$username = $_POST['user'];
	$userpassword = $_POST['pass'];	
	
	// Secure the credentials
	$username = mysql_real_escape_string($_POST['username']);
	$userpassword = mysql_real_escape_string($_POST['password']);

	// Check the users input against the DB.
	$query = "SELECT * FROM user_info WHERE email = '$username' AND pword = '$userpassword'";
	$result = mysql_query($query) or die ("Unable to verify user because " . mysql_error());
	
	$count = mysql_num_rows($result);
	
	if ($count == 1)
	{
		$_SESSION['loggedIn'] = "true";
		header("Location: menu.html");
// I also tried the whole URL here, but same result.

	}
	else
	{
		$_SESSION['loggedIn'] = "false";
		echo "<p>Login failed, username or password incorrect.</p>";
	}



?>

</fieldset>
</body>
</html>
