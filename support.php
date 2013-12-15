<?php

session_start();

if(!session_is_registered(id)) {

	header("location:support.html");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <link rel="stylesheet" href="x3dom/x3dom.css" type="text/css" />
		<title>Welcome @ Pizza Blast</title>
</head>

<body>
 <div id="header">
   <div>
			<ul class="first">
				<li><a href="index.php">Home</a></li>
				<li><a href="pizzacreator.php">Pizza Creator</a></li>
			</ul>
			<div>
				<a href="index.php"><img src="images/logo2.png" alt="Logo" width="180" height="163"></a>
	   </div>
			<ul>
				<li><a href="support.php">Support</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
 	</div>
	<div id="content">
		<div>
			<h1>Kontaktformular</h1>
			<p>Sie haben Fragen, Anregungen oder gar Kritik? Kein Problem! Bitte zögern Sie nicht uns über dieses Kontaktformular zu kontaktieren.                             Wir werden uns so schnell wie möglich mit Ihnen in Verbindung setzen.</p>
            <p><br /></p>
              <form action="php/kontakt.php" method="post">
              		<p>Name:* <input type="text" class="input" name="Name" /></p>
              		<p>E-Mail:* <input type="text" class="input" name="Email" /></p>
              		<p>Betreff:* <input type="text" class="input" name="Betreff" /></p>
              		<p>Ihre Nachricht:* <textarea name="Nachricht" rows="10"></textarea></p>
              		<p><br /></p>
              		<p><br /></p>
              		<p><br /></p>
                    <br />
              		<p><input class="button" type="submit" /></p>
              </form>
              <p><br /></p>
              <p><br /></p>
		</div>
	</div>
		<div id="footer">
		<div>
			<ul>
				<li id="pasta">
					<div>
						<span>Pizza Creator</span>
						<p>Pizza Blast hat den einzigartigen Pizza Creator, welcher Dir erlaubt, deine eigene Pizza zu erstellen!</p>
						<a href="pizzacreator.php" class="more">zum Pizza Creator</a>
					</div>
				</li>
				<li id="pizza">
					<div>
						<span>Pizza</span>
						<p>Pizza ist eine italienische Spezialtät aus Italien. Möchtest du mehr zur Geschichte der Pizza erfahren, dann folge einfach diesem Link!</p>
						<a href="index.html" class="more">zur Geschichte der Pizza</a>
					</div>
				</li>
				<li id="callus">
					<div>
						<span>Ruf uns jetzt an!</span>
                        <p> Möchtest du einfach nur eine Pizza bestellen á la carte? Dann rufe uns einfach über diese Nummer an - lokale Gebühren!</p>
                        <b>661 2509750</b>
					</div>
				</li>
			</ul>
		</div>
		<div class="section">
			<div>
				<p>&copy; Copyright &copy; 2013. Erstellt für die Hochschule Fulda von Tobias Brückner, Jenny Wüstrich, Nena Zimmermann und Juliane Gehb</p>
				<div>
					<span>Finde uns </br> auf:</span>
					<div>
						<a href="http://facebook.com/" class="facebook" target="_blank"></a>
						<a href="http://linkedin.com/" class="linked-in" target="_blank"></a>
						<a href="http://twitter.com/" class="twitter" target="_blank"></a>
					</div>
                </div>
			</div>
		</div>
	</div>
</body>
</html>