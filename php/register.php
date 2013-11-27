<?php
$verbindung = mysql_connect("localhost", "web53" , "lostinfulda")
or die("Verbindung zur Datenbank konnte nicht hergestellt werden");

mysql_select_db("usr_web53_1") or die ("Datenbank konnte nicht ausgewählt werden");

$email = $_POST["email"];
$password = $_POST["password"];
$password2 = $_POST["password2"];

$webmaster = 'to_be@gmx.de';
$emailBetreff = 'Herzlich Willkommen bei Pizza Creator!';

$body = <<<EOD
Herlich Willkommen bei Pizza Creator!
Ihre Registrierung war erfolgreich.
Genießen Sie jetzt ihre wundervollen und außergwöhnlichen Pizza Kreationen!
Egal was Sie sich auf Ihrer Pizza wünschen, bei UNS bekommen Sie es.

Sie können sich nun auf unserer Webseite einloggen.
Benutzen Sie dafür Ihre E-Mail Adresse, mit der Sie sich registriert haben und Ihr ausgewähltes Passwort.

Zur Erinnerung: Ihr Passwort lautet $password

Wenn Sie möchten, speichern Sie doch Ihre außergewöhnlichen Pizza Kreationen, und rufen Sie diese (sofern gewünscht) bei Ihrer nächsten
Bestellung einfach wieder ab.
EOD;

if($email&&$password&&$password2)
{
	if(filter_var($email, FILTER_VALIDATE_EMAIL)&&password==password2)
	{
		$result = mysql_query("SELECT customerid FROM customer WHERE email LIKE '$email'");
		$menge = mysql_num_rows($result);
		
		if($menge == 0)
    	{
			$eintrag = "INSERT INTO customer (email, password) VALUES ('$email', '$password')";
    		$eintragen = mysql_query($eintrag);
		}
		else
		{
			header("location:register_emailalreadyexists.html");
		}
		
		if($eintragen == true)
		{
			$headers = "From: $webmaster\r\n";
			$headers .= "Content-type: text/html\r\n";
			$headers = mail($email, $emailBetreff, $body);
			header("location:register_success.html");
		}
		else
		{
			header("location:register_nosuccess.html");
		}
	}
	else
	{
		header("location:register_typeerror.html");
	}
}
else
{
	header("location:register_pleasefill.html");
}
		
		
	
	
}



?>
