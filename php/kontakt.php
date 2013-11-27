<?php

/* Betreff und Email Variable */

	$emailBetreff = 'Pizza-Blast Kontakt';
	$webmaster = '';
	
	/* Emailform Daten */

	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Betreff = $_POST['Betreff'];
	$Nachricht = $_POST['Nachricht'];
	
	
	$body = <<<EOD
		Name: $Name
		Email: $Email 
		Betreff: $Betreff 
		Nachricht: $Nachricht 
	EOD;
	
	$headers = "From: $Name\r\n";
	$headers .= "Content-type: text/html\r\n";
	$headers = mail($webmaster, $emailBetreff, $body);
	
	
	/* Antwort */

header("location:support_success.html");

?>