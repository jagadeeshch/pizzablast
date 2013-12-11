<?php
$verbindung = mysql_connect("localhost","web53","lostinfulda")
or die ("Verbindung zur Datenbank konnte nicht hergestellt werden");
mysql_select_db ("usr_web53_1") or die ("Datenbank konnte nicht ausgewählt werden");

$email = $_POST["email"];
$webmaster = 'to_be@gmx.de';
$emailBetreff = 'Ihre Zugangsdaten fuer Pizza-Blast';

$datenabfrage = "SELECT * FROM customer WHERE email LIKE '$email' LIMIT 1";
$daten = mysql_query($datenabfrage);
$inhalt = mysql_fetch_object($daten);


$body = <<<EOD
Anbei erhalten Sie Ihre Kundennummer und Ihr Passwort fuer Pizza-Blast!

Ihre Kundennummer lautet: $inhalt->customerid
Ihr Passwort lautet: $inhalt->password
EOD;

if($email)
{
	/*
	$abfrage = "SELECT id, email, password FROM customer WHERE email LIKE '$email' LIMIT 1";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis); 
	*/
	
	if($inhalt->email == $email)
    {
		$headers = "From: $webmaster\r\n";
		$headers .= "Content-type: text/html\r\n";
		$headers = mail($email, $emailBetreff, $body);
    	header("location:../pwvergessen_erfolgreich.html");
	}
	else
	{
		header("location:../pwvergessen_nosuccess.html");
	}
}
else
{
	header("location:../pwvergessen_typeerror.html");
}
		

?>