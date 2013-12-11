<?php
session_start();

$verbindung = mysql_connect("localhost","web53","lostinfulda")
or die ("Verbindung zur Datenbank konnte nicht hergestellt werden");
mysql_select_db ("usr_web53_1") or die ("Datenbank konnte nicht ausgewählt werden");

$email = $_POST["email"];
$password = $_POST["password"];

if($email&&$password)
{
	$abfrage = "SELECT * FROM customer WHERE email LIKE '$email' LIMIT 1";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);
	
	if($row->email == $email && $row->password == $password)
    {
		$_SESSION["id"] = $row->customerid;
    	header("location:../login_success.html");
    }
	else
    {
		header("location:../login_nosuccess.html");
    }
}
else
{
	header("location:../login_typeerror.html");
}


?>