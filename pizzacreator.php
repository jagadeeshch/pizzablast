<?php
session_start();

if(!session_is_registered(id)) {

	header("location:pizzacreator_notlogged.html");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <link rel="stylesheet" href="x3dom/x3dom.css" type="text/css" />
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
        <script type="text/javascript" src="js/javascript.js"> </script>
		<title>Erstelle Deine eigene Pizza!</title>

<script type="text/javascript" src="http://www.x3dom.org/download/dev/x3dom-full.js"></script>
		<script>

					//Noch zu implementieren: verhindern, dass die Salami die Pizza verlaesst
					//						 Textur wechseln einbauen
					//

					var counter = 1;				//Counter zum vergeben der ID
					var oldMousePosX = 0;			//Alte X Position der Maus
					var newMousePosX = 0;			//Neue X Position der Maus
					var oldMousePosY = 0;   		//Alte Y Position der Maus
					var newMousePosY = 0;   		//Neue Y Position der Maus
					var mousedown = false;			//Boolean, um zu schauen, ob die Maus gedrückt ist oder nicht
					var drag = true;				//Boolean, um zwischen den Ansichten zu wechseln, ob es bewegt werden darf
					var ID = "null";
					var removeAktiv = false;

					//Zutaten = new Array("Schinken", "Salami", "Pepperonisalami", "Thunfisch", "Pilz", "Tomate", "Olive", "Spinat", "Ananas", "Mais", "Ei", "Paprika", "Chili",
					//"Zwiebel", "Basilikum", "Mozzarella", "Kaese", "Tomatensoße", "Currysoße", "Pizzaboden");

					ZutatenCounter = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1); //20
					PreisCounter = new Array(0.25, 0.19, 0.20, 0.35, 0.5, 0.3, 0.3, 0.2, 0.10, 0.10, 0.5, 0.3, 0.5, 0.2, 0.15, 0.35, 0.20, 0.50, 0.75, 3.0); //20


					  function hinzufuegen(val)
					    {
							if(val == "Schinken")
							{
								ZutatenCounter[0] += 1;
								document.getElementById('Schinken').innerHTML="Schinken: "+ZutatenCounter[0]+" x "+ PreisCounter[0]+" € = "+ (ZutatenCounter[0]*PreisCounter[0]+" €");
								berechneGesamtpreis();

								var meinTransform = document.createElement('Transform');
								meinTransform.setAttribute('id','schinken_tOuter'+counter);

								var meinInline = document.createElement('Inline');
								meinInline.setAttribute('url','schinken.x3d');
								meinInline.setAttribute('id','schinken_inline'+counter);
								meinInline.setAttribute('mapDefToId', 'true');
								meinInline.setAttribute('nameSpaceName', 'schinken_tOuter'+counter);

								var ot = document.getElementById('scene');
								meinTransform.appendChild(meinInline);
								ot.appendChild(meinTransform);

								var myI = meinTransform.getAttribute('id');	//Transform, also tOuter
								var myI2 = meinInline.getAttribute('id');	//Inline, also schinken_inline

								var removeID = document.getElementById(meinTransform.getAttribute('id'));	//Transform, also tOuter
								var removeID2 = document.getElementById(meinInline.getAttribute('id'));	//Inline, also schinken_inline

								document.getElementById(myI).onmousedown = function(evt)
								{
									if(drag == true)
									{
										if(removeAktiv == true)
										{
											ZutatenCounter[0] -= 1;
											document.getElementById('Schinken').innerHTML="Schinken: "+ZutatenCounter[0]+" x "+ PreisCounter[0]+" € = "+ (ZutatenCounter[0]*PreisCounter[0]+" €");
											var test = removeID.getAttribute('id');
											var test2 = removeID2.getAttribute('id');
											var rinline = document.getElementById(test);
											var rinline2 = document.getElementById('test2');
											var removed = ot.removeChild(rinline);
											var removed2 = ot.removeChild(rinline2);
										}
										else
										{
											if (ID == "null")
											{
												oldMousePosX = evt.layerX;
												oldMousePosY = evt.layerY;
												mousedown = true;
												ID = myI;
											}
										}
									}
								}

								document.getElementById(myI).onmousemove = function(evt)
								{
									if (myI == ID)
									{
										if(drag == true)
										{
											if(mousedown == true)
											{
													newMousePosX = evt.layerX;

													newMousePosY = evt.layerY;
													var differenz = (newMousePosX - oldMousePosX) / 15 ;
													var differenzY = (newMousePosY - oldMousePosY) / 15  ;

													var newId = myI+"__trans";

													var position = document.getElementById(newId).getAttribute("translation");
													var res = position.split(" ");

													var x = res[0];
													var y = res[1];
													var z = res[2];

													var neuX = Number(x);
													var neuY = Number(y);


													neuX = neuX + differenz;
													neuY = neuY - differenzY;

													oldMousePosX = newMousePosX;
													oldMousePosY = newMousePosY;

													document.getElementById(newId).setAttribute("translation", neuX + " " + neuY + " " + z);

													newMousePosX = 0;
											}
										}
									}
								}

								document.onmouseup = function (evt)
								{
									mousedown = false;
									ID = "null";
								}

								counter++;
								return false;
							}

							else if(val == "Ananas")
							{
								ZutatenCounter[8] += 1;
								document.getElementById('Ananas').innerHTML = "Ananas: "+ZutatenCounter[8]+" x "+ PreisCounter[8]+" € = "+ (ZutatenCounter[8]*PreisCounter[8]+" €");
								berechneGesamtpreis();

								var meinTransform = document.createElement('Transform');
								meinTransform.setAttribute('id','ananas_tOuter'+counter);

								var meinInline = document.createElement('Inline');
								meinInline.setAttribute('url','ananas.x3d');
								meinInline.setAttribute('id','ananas_inline'+counter);
								meinInline.setAttribute('mapDefToId', 'true');
								meinInline.setAttribute('nameSpaceName', 'ananas_tOuter'+counter);

								var ot = document.getElementById('scene');
								meinTransform.appendChild(meinInline);
								ot.appendChild(meinTransform);

								var myI = meinTransform.getAttribute('id');	//Transform, also tOuter
								var myI2 = meinInline.getAttribute('id');	//Inline, also schinken_inline

								var removeID = document.getElementById(meinTransform.getAttribute('id'));	//Transform, also tOuter
								var removeID2 = document.getElementById(meinInline.getAttribute('id'));	//Inline, also schinken_inline

								document.getElementById(myI).onmousedown = function(evt)
								{
									if(drag == true)
									{
										if(removeAktiv == true)
										{
											ZutatenCounter[8] -= 1;
											document.getElementById('Ananas').innerHTML="Ananas: "+ZutatenCounter[8]+" x "+ PreisCounter[8]+" € = "+ (ZutatenCounter[8]*PreisCounter[8]+" €");
											var test = removeID.getAttribute('id');
											var test2 = removeID2.getAttribute('id');
											var rinline = document.getElementById(test);
											var rinline2 = document.getElementById('test2');
											var removed = ot.removeChild(rinline);
											var removed2 = ot.removeChild(rinline2);
										}
										else
										{
											if (ID == "null")
											{
												oldMousePosX = evt.layerX;
												oldMousePosY = evt.layerY;
												mousedown = true;
												ID = myI;
											}
										}
									}
								}

								document.getElementById(myI).onmousemove = function(evt)
								{
									if (myI == ID)
									{
										if(drag == true)
										{
											if(mousedown == true)
											{
													newMousePosX = evt.layerX;

													newMousePosY = evt.layerY;
													var differenz = (newMousePosX - oldMousePosX) / 15 ;
													var differenzY = (newMousePosY - oldMousePosY) / 15  ;

													var newId = myI+"__trans";

													var position = document.getElementById(newId).getAttribute("translation");
													var res = position.split(" ");

													var x = res[0];
													var y = res[1];
													var z = res[2];

													var neuX = Number(x);
													var neuY = Number(y);


													neuX = neuX + differenz;
													neuY = neuY - differenzY;

													oldMousePosX = newMousePosX;
													oldMousePosY = newMousePosY;

													document.getElementById(newId).setAttribute("translation", neuX + " " + neuY + " " + z);

													newMousePosX = 0;
											}
										}
									}
								}

								document.onmouseup = function (evt)
								{
									mousedown = false;
									ID = "null";
								}

								counter++;
								return false;
							}




							else if(val == "Tomate")
							{
								ZutatenCounter[5] += 1;
								document.getElementById('Tomate').innerHTML = "Tomate: "+ZutatenCounter[5]+" x "+ PreisCounter[5]+" € = "+ (ZutatenCounter[5]*PreisCounter[5]+" €");
								berechneGesamtpreis();

								var meinTransform = document.createElement('Transform');
								meinTransform.setAttribute('id','tomate_tOuter'+counter);

								var meinInline = document.createElement('Inline');
								meinInline.setAttribute('url','tomate.x3d');
								meinInline.setAttribute('id','tomate_inline'+counter);
								meinInline.setAttribute('mapDefToId', 'true');
								meinInline.setAttribute('nameSpaceName', 'tomate_tOuter'+counter);

								var ot = document.getElementById('scene');
								meinTransform.appendChild(meinInline);
								ot.appendChild(meinTransform);

								var myI = meinTransform.getAttribute('id');	//Transform, also tOuter
								var myI2 = meinInline.getAttribute('id');	//Inline, also schinken_inline

								var removeID = document.getElementById(meinTransform.getAttribute('id'));	//Transform, also tOuter
								var removeID2 = document.getElementById(meinInline.getAttribute('id'));	//Inline, also schinken_inline

								document.getElementById(myI).onmousedown = function(evt)
								{
									if(drag == true)
									{
										if(removeAktiv == true)
										{
											ZutatenCounter[5] -= 1;
											document.getElementById('Tomate').innerHTML="Tomate: "+ZutatenCounter[5]+" x "+ PreisCounter[5]+" € = "+ (ZutatenCounter[5]*PreisCounter[5]+" €");
											var test = removeID.getAttribute('id');
											var test2 = removeID2.getAttribute('id');
											var rinline = document.getElementById(test);
											var rinline2 = document.getElementById('test2');
											var removed = ot.removeChild(rinline);
											var removed2 = ot.removeChild(rinline2);
										}
										else
										{
											if (ID == "null")
											{
												oldMousePosX = evt.layerX;
												oldMousePosY = evt.layerY;
												mousedown = true;
												ID = myI;
											}
										}
									}
								}

								document.getElementById(myI).onmousemove = function(evt)
								{
									if (myI == ID)
									{
										if(drag == true)
										{
											if(mousedown == true)
											{
													newMousePosX = evt.layerX;

													newMousePosY = evt.layerY;
													var differenz = (newMousePosX - oldMousePosX) / 15 ;
													var differenzY = (newMousePosY - oldMousePosY) / 15  ;

													var newId = myI+"__trans";

													var position = document.getElementById(newId).getAttribute("translation");
													var res = position.split(" ");

													var x = res[0];
													var y = res[1];
													var z = res[2];

													var neuX = Number(x);
													var neuY = Number(y);


													neuX = neuX + differenz;
													neuY = neuY - differenzY;

													oldMousePosX = newMousePosX;
													oldMousePosY = newMousePosY;

													document.getElementById(newId).setAttribute("translation", neuX + " " + neuY + " " + z);

													newMousePosX = 0;
											}
										}
									}
								}

								document.onmouseup = function (evt)
								{
									mousedown = false;
									ID = "null";
								}

								counter++;
								return false;
							}

					     };


						 function berechneGesamtpreis()
						 {
							var gesamtsumme = 0.0;
							for(var i = 0; i < ZutatenCounter.length; i++)
							{
								gesamtsumme += ZutatenCounter[i]*PreisCounter[i];
							}
							document.getElementById('Gesamtsumme').innerHTML="Gesamtpreis: "+gesamtsumme+" €";
						 }

						function removeZutat()
						{
							//RemoveAktiv wird auf true gesetzt, man kann löschen
							removeAktiv = true;
						}

						function stopRemove()
						{
							//RemoveAktiv wird auf false gesetzt, man kann nicht mehr löschen
							removeAktiv = false;
						}

						function viewPointChange()
						{
							//Pizza-Beweg-Ansicht
							//hier soll NONE auf ANY gesetzt werden
							//Moveable muss deaktiviert werden

							document.getElementById('test1__navi').setAttribute("type", "ANY");
							drag = false;
						}

						function viewPointChange2()
						{
							//Zutaten-Beweg-Ansicht
							//Viewpoint muss noch auf die Ursprungsdaten gesetzt werden
							//Moveable muss aktiviert werden
							//Pizza ANY auf NONE setzen

							document.getElementById('test1__navi').setAttribute("type", "NONE");
							document.getElementById("boxes").runtime.resetView();
							drag = true;
						}
  </script>
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
		<h1>Pizza Blast</h1>

					 <x3d id='boxes' DEF='boxes' showStat='false' showLog='false' style='width:500px; height:500px; border:0; margin:0; padding:0;'>
				       <scene id="scene" DEF='scene'>
							<inline id='pizza' url='text.x3d' nameSpaceName='test1' mapDefToId='true' ></inline>
                            <!-- hier hin -->
						<scene>
					</x3d>


                    	<p><h2>Fleisch</h2></p>
                        <div id="meat">
	                     <P><input type="image" src="images/salami.png" id="but1" value="Salami" onclick="hinzufuegen(this.value);"></input>
                         <input type="image" src="images/psalami.png" id="but17" value="Schinken" onclick="hinzufuegen(this.value);"> </input>
                         <input type="image" src="images/schinken.png" id="but2" value="Schinken" onclick="hinzufuegen(this.value);"> </input>
                         <input type="image" src="images/tuna.png" id="but5" value="Thunfisch" onclick="hinzufuegen(this.value);"> </input> </p>
                        <p><h2>Obst und Gemüse</h2></p>
                         <P><input type="image" src="images/mushroom.png" id="but3" value="Pilz" onclick="hinzufuegen(this.value);"></input>
                         <input type="image" src="images/tomato.png" id="but4" value="Tomate" onclick="hinzufuegen(this.value);"> </input>
                         <input type="image" src="images/olives.png" id="but6" value="Olive" onclick="hinzufuegen(this.value);"> </input>
                         <input type="image" src="images/spinach.png" id="but7" value="Spinat" onclick="hinzufuegen(this.value);"> </input>
                         <input type="image" src="images/pineapple.png" id="but9" value="Ananas" onclick="hinzufuegen(this.value);"></input> <br/>
                         <input type="image" src="images/maize.png" id="but10" value="Mais" onclick="hinzufuegen(this.value);"> </input>
                         <input type="image" src="images/egg.png" id="but11" value="Ei" onclick="hinzufuegen(this.value);"> </input>
                         <input type="image" src="images/paprika.png" id="but12" value="Paprika" onclick="hinzufuegen(this.value);"> </input>
                         <input type="image" src="images/chili.png" id="but13" value="Chili" onclick="hinzufuegen(this.value);"></input>
                         <input type="image" src="images/onion.png" id="but14" value="Zwiebel" onclick="hinzufuegen(this.value);"> </input>
                         <input type="image" src="images/basil.png" id="but15" value="Basilikum" onclick="hinzufuegen(this.value);"> </input></p>
                        </div>


					<p id="Auswahl">Sie haben ausgew&auml;hlt:</p>
                    <p id="Schinken">Schinken:</p>
                    <p id="Salami">Salami:</p>
                    <p id="Pepperonisalami">Pepperonisalami:<br /</p>
                    <p id="Thunfisch">Thunfisch:</p>
                    <p id="Pilz">Pilz:</p>
                    <p id="Tomate">Tomate:</p>
                    <p id="Olive">Olive:</p>
                    <p id="Spinat">Spinat:</p>
                    <p id="Ananas">Ananas:</p>
                    <p id="Mais">Mais:</p>
                    <p id="Ei">Ei:</p>
                    <p id="Paprika">Paprika:</p>
                    <p id="Chili">Chili:</p>
                    <p id="Zwiebel">Zwiebel:</p>
                    <p id="Basilikum">Basilikum:</p>
                    <p id="Mozzarella">Mozzarella:</p>
                    <p id="Käse">K&auml;se:</p>
                    <p id="Tomatensoße">Tomatensoße:</p>
                    <p id="Currysoße">Currysoße</p>
                    <p>Pizzaboden: 3 €</p>
                    <p id="Gesamtsumme">Gesamtpreis: 3 €</p>

<!--

						<img width="10%" src="miau.jpg" onclick="changeTexture('miau.jpg');" style="cursor:pointer;" border="1">
						<br />
						<img width="10%" src="fladenbrottextur_512.jpg" onclick="changeTexture('fladenbrottextur_512.jpg');" style="cursor:pointer;" border="1">
						<br />
						<img width="10%" src="salami.jpg" onclick="changeTexture('salami.jpg');" style="cursor:pointer;" border="1">-->

						<p>
						<h2>Fleisch</h2><br />
                        <div id="food">Salami:</h3> <input type="image" src="images/schinken.png" height="38" width="40" id="but2" value="Schinken" onclick="hinzufuegen(this.value);"> </input> </div>  <br />

				<form>
				Fleisch<br />
					<input type="button" id="but1" value="Salami" onclick="hinzufuegen(this.form.but1.value);"></input>


				  <input type="button" id="but8" value="Thunfisch" onclick="hinzufuegen(this.form.but8.value);"> </input><br />
					<input type="button" id="but17" value="Pepperonisalami" onclick="hinzufuegen(this.form.but17.value);"> </input><br />
				<br /><br />Grünzeug<br />
					<input type="button" id="but3" value="Pilz" onclick="hinzufuegen(this.form.but3.value);"> </input><br />
					<input type="button" id="but4" value="Tomate" onclick="hinzufuegen(this.form.but4.value);"> </input><br />
					<input type="button" id="but6" value="Olive" onclick="hinzufuegen(this.form.but6.value);"> </input><br />
					<input type="button" id="but7" value="Spinat" onclick="hinzufuegen(this.form.but7.value);"> </input><br />
					<input type="button" id="but9" value="Ananas" onclick="hinzufuegen(this.form.but9.value);"> </input><br />
					<input type="button" id="but10" value="Mais" onclick="hinzufuegen(this.form.but10.value);"> </input><br />
					<input type="button" id="but11" value="Ei" onclick="hinzufuegen(this.form.but11.value);"> </input><br />
					<input type="button" id="but12" value="Paprika" onclick="hinzufuegen(this.form.but12.value);"> </input><br />
					<input type="button" id="but13" value="Chili" onclick="hinzufuegen(this.form.but13.value);"> </input><br />
					<input type="button" id="but14" value="Zwiebel" onclick="hinzufuegen(this.form.but14.value);"> </input><br />
					<input type="button" id="but15" value="Basilikum" onclick="hinzufuegen(this.form.but15.value);"> </input><br />

				<br /><br />K&auml;se<br />
					<input type="button" id="but16" value="Mozzarella" onclick="hinzufuegen(this.form.but16.value);"> </input><br />
					<input type="button" id="but5" value="K&auml;se" onclick="hinzufuegen(this.form.but5.value);"> </input><br /><br />
					<input type="button" id="fertig" value="Pizza-Beweg-Ansicht" onclick="viewPointChange();"> </input><br />
					<input type="button" id="fertig" value="Zutaten-Beweg-Ansicht" onclick="viewPointChange2();"> </input><br />
					<input type="button" id="entfernen" value="Zutat entfernen starten" onclick="removeZutat();"> </input><br />
                    <input type="button" id="entfernen" value="Zutat entfernen beenden" onclick="stopRemove();"> </input><br />
				</form>

		</p>
	<span></span>
    </div>
    </div>
	<div id="footer">
		<div>
			<ul>
				<li id="pasta">
					<div>
						<span>Pizza Creator</span>
						<p>Bla bla bla</p>
						<a href="index.html" class="more">More</a>
					</div>
				</li>
				<li id="pizza">
					<div>
						<span>Pizza</span>
						<p> More Bla</p>
						<a href="index.html" class="more">More</a>
					</div>
				</li>
				<li id="callus">
					<div>
						<span>Call us now!</span>
						<b>NUMBER</b>
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