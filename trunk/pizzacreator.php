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
			
			
			  function hinzufuegen(val)
			    {
					 if(val == "Schinken")
					{
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
											document.getElementById('lala').innerHTML="Maus:ad "+newMousePosX;

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

											//document.getElementById('lala').innerHTML="Maus: "+oldMousePosX+ " Position: "+neuX+" "+neuY+" "+z+ " mousedown: "+mousedown;

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
					 if(val == "Ananas")
					{
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
											document.getElementById('lala').innerHTML="Maus:ad "+newMousePosX;

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

											//document.getElementById('lala').innerHTML="Maus: "+oldMousePosX+ " Position: "+neuX+" "+neuY+" "+z+ " mousedown: "+mousedown;

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
						
						var myI = "tomate_tOuter"+counter;
						
						document.getElementById(myI).onmousedown = function(evt)
						{
							if (ID == "null")
							{
								oldMousePosX = evt.layerX;
								oldMousePosY = evt.layerY;
								mousedown = true;
								ID = myI;
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
										document.getElementById('lala').innerHTML="Maus:ad "+newMousePosX;

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

										//document.getElementById('lala').innerHTML="Maus: "+oldMousePosX+ " Position: "+neuX+" "+neuY+" "+z+ " mousedown: "+mousedown;

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
					<p id="lala">Test</p>

						<!--<input type="button" id="but" value="Entfernen" onclick="removeNode();"> </input><br />

						<img width="10%" src="miau.jpg" onclick="changeTexture('miau.jpg');" style="cursor:pointer;" border="1">
						<br />
						<img width="10%" src="fladenbrottextur_512.jpg" onclick="changeTexture('fladenbrottextur_512.jpg');" style="cursor:pointer;" border="1">
						<br />
						<img width="10%" src="salami.jpg" onclick="changeTexture('salami.jpg');" style="cursor:pointer;" border="1">-->

						<p>
						<!--<input type="image" src="bla.jpg" id="but1" value="Salami" onclick="hinzufuegen(this.value);"></input><br />-->
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