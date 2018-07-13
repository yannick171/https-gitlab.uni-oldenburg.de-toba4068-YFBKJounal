<?php
  include("ressources/snippets/session.php");
 ?>

<!DOCTYPE html>
<html lang = "de">
    <head>
        <title>About us</title>
        <?php include("ressources/snippets/globalsources.php") ?>

		<link href = "ressources/css/article.css" rel= "stylesheet">
		<link rel = "stylesheet" type="text/css" href = "ressources/ueberunsseite/ueberseite.css">

</head>
<body>

	  <?php include ("ressources/snippets/head.php") ;?>

    <main class="defaultstyle">
		
		    <div id="mysection">
                <div id="articleInMySection">
					<h1>Über uns</h1>
        <p>
            Auf dieser Seite geht es um Hintergrundinformationen zum Journal.
            Wir möchten Menschen eine Plattform geben, die allen Interessierten das Thema der Computational Intelligence näherbringt.
            Jeder Wissenschaftler bekommt bei uns eine Möglichkeit seine Forschung zu publizieren.<br>
            Hier eine Liste wichtiger Informationen :
        </p>
                </div>
				<div id="asideInMySection">
					<img src="ressources/ueberunsseite/bulle.png" alt="" id="pfeile" />
					      <div id="asideone">
					<h2>Personen</h2>
                <ul>
                <li><button id="kontakt"  onmouseover="myFunction()" onmouseout="myfunction()" onclik="myFormular()"> Kontakt </button></li>
					<script>
					function myFormular(){
							<form action="about.php" id="registerform" method="post">
					<div class="form-group">  
					<label for="Anrede">Anrede* : </label>
						   <select name="Anrede" type="text" class="form-control" id="Anrede" placeholder="--bitte auswählen---" name="Anrede">
    					   <option value="choix1"><h1>--bitte auswählen---</h1></option>
						   <option value="choix1"><h1> Frau </h1></option>
						   <option value="choix2"><h1>Herr</h1></option></select>
					</div>
					<div class="from-group">
						 <lablel for="Titel">Titel :</lablel>
						   <select name="Titel" type="text" class="form-control" id="Titel" placeholder="" name="Titel" >
    					  <option value="choix1"><h1></h1></option>
						   <option value="choix1"><h1> Dr. </h1></option>
						   <option value="choix2"><h1>Prof.</h1></option>
						   <option value="choix2"><h1>Prof. Dr.</h1></option>
						   </select>
					
					</div>
                    <div class="form-group">
                        <label for="Name">Name*:</label>
                        <input type="text" class="form-control" id="fname" placeholder="Vorname" name="firstname">
                    </div>
					
                    <div class="form-group">
                        <label for="Vorname">Vorname*:</label>
                        <input type="text" class="form-control" id="lname" placeholder="Nachname" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="StraßeHausnummer">Straße, Hausnr.*</label>
                        <input type="text" class="form-control" id="StraßHausnummer" placeholder=" Enter Straße, Hausnr." name="StraßeHausnummer">
                    </div>
                    <div class="form-group">
                        <label for="PLZ">PLZ*:</label>
                        <input type="text" class="form-control" id="PLZ" placeholder="Enter PLZ" name="PLZ">
                    </div>
					 <div class="form-group">
                        <label for="Wohnort">Wohnort*:</label>
                        <input type="text" class="form-control" id="Wohnort" placeholder="Enter Wohnort" name="Wohnort">
                    </div>
					 <div class="form-group">
                        <label for="Geburtsdatum">Geburtsdatum*:</label>
                        <input type="text" class="form-control" id="Geburtsdatum" placeholder="Enter Geburtsdatum" name="Geburtsdatum">
                    </div>
					<div class="form-group">
                        <label for="Telefon">Telefon:</label>
                        <input type="text" class="form-control" id="Telefon" placeholder="Enter Telefon" name="Telefon">
                    </div>
					<div class="form-group">
                        <label for="Mobiltelefon">Mobilelefon:</label>
                        <input type="text" class="form-control" id="Mobiltelefon" placeholder="Enter Mobiltelefon" name="Mobiltelefon">
                    </div>
					<div class="form-group">
                        Bereits Kunde*: ?
						   <input type="radio" name="kunde" value="Yes" id="yes" checked="checked" /> <label for="oui">Yes</label>
						   <input type="radio" name="kunde" value="No" id="no" /> <label for="non">No</label>
						   
                    </div>
                    <p id = "error">
                    </p>

                </form>
							
						}
					function myFunction(){
						document.getElementById('kontakt').innerHTML="bonjour";
					}
						function myfunction(){
							document.getElementById('kontakt').innerHTML="jojojoj";
						}
					
					</script>
					
                <li><a href ="ressources/ueberunsseite/Redaktion.txt">Redaktion</a></li>
            </ul>
					
					</div>
					<div id="asidetwo">
					
					<h2>Die Zeischrift</h2>
            <ul>
                <li><a href = "ressources/ueberunsseite/Konzept.txt">Konzept</a></li>
                <li><a href = "ressources/ueberunsseite/Richtlinien.txt">Richtlinien</a></li>
            </ul>
					</div>
				</div>   
            </div>
    </main>
        <?php include ("ressources/snippets/footer.php") ;?>
        <?php include ("ressources/snippets/loadjavascript.php") ;?>
    </body>
</html>
