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
<body background='a1.jpg'>
<fieldset>

<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password)
*/
$link = mysqli_connect("localhost", "root", "", "ghar_wapsi");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$fname = mysqli_real_escape_string($link, $_POST['fname']);
$lname = mysqli_real_escape_string($link, $_POST['lname']);
$sex = mysqli_real_escape_string($link, $_POST['sex']);
$bday = mysqli_real_escape_string($link, $_POST['bday']);
$email = mysqli_real_escape_string($link, $_POST['usremail']);
$pword = mysqli_real_escape_string($link, $_POST['pword']);
$country = mysqli_real_escape_string($link, $_POST['country']);
$cnum = mysqli_real_escape_string($link, $_POST['usrtel']);

 
// attempt insert query execution
$sql = "INSERT INTO user_info (fname, lname, sex, dob, email, pword, country, phno) VALUES ('$fname', '$lname', '$sex', '$bday', '$email', '$pword', '$country', '$cnum')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Incorrect entry of data. please try again<br> " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>

</fieldset>
</body>
</html>