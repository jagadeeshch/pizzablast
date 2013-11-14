<?php
$verbindung = mysql_connect("localhost", "root" , "")
or die("Verbindung zur Datenbank konnte nicht hergestellt werden");

mysql_select_db("") or die ("Datenbank konnte nicht ausgewählt werden");

$email = $_POST["email"];
$password = $_POST["password"];
$password2 = $_POST["password2"];

$webmaster = '';
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
	
	
}



?>
