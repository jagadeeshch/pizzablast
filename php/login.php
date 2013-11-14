<?php
session_start();

$verbindung = mysql_connect("localhost","root","")
or die ("Verbindung zur Datenbank konnte nicht hergestellt werden");
mysql_select_db ("") or die ("Datenbank konnte nicht ausgewählt werden");

$email = $_POST["email"];
$password = $_POST["password"];

if($email&&$password)
{
	$abfrage = "SELECT email, password FROM customer WHERE email LIKE '$email' LIMIT 1";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);
	
	if($row->password == $password && $row->email == $email)
    {
		$_SESSION["email"] = $email;
    	header("location:login_success.html");
    }
	else
    {
		header("location:login_nosuccess.html");
    }
}
else
{
	header("location:login_typeerror.html");
}


?>