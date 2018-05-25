<!DOCTYPE html>
<html>
    <head>
        <title>
			Redakteur Profil - Evolve
		</title>
        <?php include("ressources/snippets/globalsources.php") ?>

        <link rel = "stylesheet" type="text/css" href = "ressources/redakteurseite/redakteur.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
		<link href = "ressources/css/article.css" rel= "stylesheet">

	</head>

	<body>

		 <?php include ("ressources/snippets/head.php") ;?>

		<script>
			// Set the date we're counting down to
			var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();
	
			// Update the count down every 1 second
			var x = setInterval(function() {
	
				// Get todays date and time
				var now = new Date().getTime();
				
				// Find the distance between now an the count down date
				var distance = countDownDate - now;
				
				// Time calculations for days, hours, minutes and seconds
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				
				// Output the result in an element with id="demo"
				document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
				+ minutes + "m " + seconds + "s ";
				
				// If the count down is over, write some text 
				if (distance < 0) {
					clearInterval(x);
					document.getElementById("demo").innerHTML = "EXPIRED";
				}
			}, 1000);
		</script>
		  
		<!--<main class="defaultstyle">
			<h1>Redakteur Profil</h1>
            <article>
                <section class="grid-container-article">
                    <div>
                        <img class="profilpic" src="ressources/redakteurseite/profilbild.png" alt="picture"/>
						<button type="button">Bild ändern</button>

                    </div>
                    <div>
                        <p class = "item2">
							&nbsp;&nbsp;&nbsp;&nbsp;
							<label>Name: <br>
								&nbsp;&nbsp;&nbsp;&nbsp;
								Namh Cnupeno
							</label>
							<br><br>

							&nbsp;&nbsp;&nbsp;&nbsp;
							<label>Vorname: <br>
								&nbsp;&nbsp;&nbsp;&nbsp;
								Saitama
							</label>
							<br><br>

							&nbsp;&nbsp;&nbsp;&nbsp;
							<label>E-Mail: <br>
								&nbsp;&nbsp;&nbsp;&nbsp;
								one.punchman@boredom.de
							</label>
							<br><br>&nbsp;&nbsp;&nbsp;&nbsp;
							<button type="button">Daten ändern</button>
                        </p>
                    </div>
                    <div class="item-down-article">
                        <h3>Info</h3>
						blabla dudu ich bin so ein Typ der in seinem Leben nichts anderes zu tun hat als Artikel für irgendsoeine Onlinezeitschrift zu prüfen die sowieso niemand liest und weil mein leben so langweilig ist bin ich nicht in der Lage einen Punkt zu schreiben blbablabla
						<button type="button">Ändern</button>
					</div>
                </section>
            </article>-->
            <h1>
                Redakteur Profil</h1>
			<h1>Arbeitsbereich</h1>

            <div class = "parentContainer">
                <div class = "containerElement">
                    <h2 id = "zuPrüfen" class = workingArea>
                        zu prüfen
                    </h2>
                    <ul id = "todoArticles" class = "list-group">
                        <li class = "list-group-item">
                            <div class="card margin">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Künstliche Intelligenz generiert Zeitungsartikel
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" da>
                                    <div class="card-body">
                                        In diesem Paper geht es darum, wie Forscher Edward Schneitzel mit seinen Mitarbeitern des renormierten Instituts Berkely für angewandte
                                        Neurolinguistik es geschafft hat einer KI das Dichten wie Shakespeare innnerhalb weniger Stunden anzutrainieren. Es wurde dafür eine
                                        neue Technik namens Randolinguisierung angewandt, bei der zufällig Wörterketten produziert werden. Das Ergebnis imitiert Shakespeare
                                        perfekt. Lesen Sie den vollständigen Artikel <a href="ressources/archivseite/Zeitung1/ki.txt">hier.</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class = "list-group-item">
                            <div class="card margin">
                                <div class="card-header" id="headingFive">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            Reflektion der aktuellen Forschungsergebnisse im Bereich der Automation
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                    <div class="card-body">
                                        In diesem Paper geht es darum, wie Forscher Edward Schneitzel mit seinen Mitarbeitern des renormierten Instituts Berkely für angewandte
                                        Neurolinguistik es geschafft hat einer KI das Dichten wie Shakespeare innnerhalb weniger Stunden anzutrainieren. Es wurde dafür eine
                                        neue Technik namens Randolinguisierung angewandt, bei der zufällig Wörterketten produziert werden. Das Ergebnis imitiert Shakespeare
                                        perfekt. Lesen Sie den vollständigen Artikel <a href="ressources/archivseite/Zeitung1/ki.txt">hier.</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class = "list-group-item">
                            <div class="card margin">
                                <div class="card-header" id="headingSix">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            KI lernt von selbst das Gehen
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                                    <div class="card-body">
                                        In diesem Paper geht es darum, wie Forscher Edward Schneitzel mit seinen Mitarbeitern des renormierten Instituts Berkely für angewandte
                                        Neurolinguistik es geschafft hat einer KI das Dichten wie Shakespeare innnerhalb weniger Stunden anzutrainieren. Es wurde dafür eine
                                        neue Technik namens Randolinguisierung angewandt, bei der zufällig Wörterketten produziert werden. Das Ergebnis imitiert Shakespeare
                                        perfekt. Lesen Sie den vollständigen Artikel <a href="ressources/archivseite/Zeitung1/ki.txt">hier.</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class = "containerElement">
                    <h2 id = "geprüft" class = "workingArea">
                        geprüft
                    </h2>
                    <ul id = "acceptedArticles" class = "list-group">
                        <li class = "list-group-item">
                            <div class="card margin">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                            Neue Erkenntnisse im Bereich künstlicher Immunsystem
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" da>
                                    <div class="card-body">
                                        In diesem Paper geht es darum, wie Forscher Edward Schneitzel mit seinen Mitarbeitern des renormierten Instituts Berkely für angewandte
                                        Neurolinguistik es geschafft hat einer KI das Dichten wie Shakespeare innnerhalb weniger Stunden anzutrainieren. Es wurde dafür eine
                                        neue Technik namens Randolinguisierung angewandt, bei der zufällig Wörterketten produziert werden. Das Ergebnis imitiert Shakespeare
                                        perfekt. Lesen Sie den vollständigen Artikel <a href="ressources/archivseite/Zeitung1/ki.txt">hier.</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class = "list-group-item">
                            <div class="card margin">
                                <div class="card-header" id="headingEight">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                            Industrie 4.0 aus den Kinderschuhen entwachsen
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
                                    <div class="card-body">
                                        In diesem Paper geht es darum, wie Forscher Edward Schneitzel mit seinen Mitarbeitern des renormierten Instituts Berkely für angewandte
                                        Neurolinguistik es geschafft hat einer KI das Dichten wie Shakespeare innnerhalb weniger Stunden anzutrainieren. Es wurde dafür eine
                                        neue Technik namens Randolinguisierung angewandt, bei der zufällig Wörterketten produziert werden. Das Ergebnis imitiert Shakespeare
                                        perfekt. Lesen Sie den vollständigen Artikel <a href="ressources/archivseite/Zeitung1/ki.txt">hier.</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class = "list-group-item">
                            <div class="card margin">
                                <div class="card-header" id="headingNine">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                            Verstehen der Semantik menschlicher Sprache mithilfe von künstlichen, neuronalen Netzen
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
                                    <div class="card-body">
                                        In diesem Paper geht es darum, wie Forscher Edward Schneitzel mit seinen Mitarbeitern des renormierten Instituts Berkely für angewandte
                                        Neurolinguistik es geschafft hat einer KI das Dichten wie Shakespeare innnerhalb weniger Stunden anzutrainieren. Es wurde dafür eine
                                        neue Technik namens Randolinguisierung angewandt, bei der zufällig Wörterketten produziert werden. Das Ergebnis imitiert Shakespeare
                                        perfekt. Lesen Sie den vollständigen Artikel <a href="ressources/archivseite/Zeitung1/ki.txt">hier.</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <h1>
                Nächste Ausgabe: <p id="countdown"></p>
            </h1>
			
			<div class = "nextMagazine">
                <div class = "parentContainer">
                    <div class = "containerElement">
                        <div class = "containerChild">
                            <h3>
                                Titel der Ausgabe
                            </h3>
                            <p id = "nextMagazineTitle">
                                Neuronale Netze unter Vollauslastung
                            </p>
                            <div class = "centerButton">
                                <button type="button" data-toggle = "modal" data-target = "#modalTitle">
                                    Titel ändern
                                </button>
                            </div>
                        </div>
                        <div class = "containerChild">
                            <h3>
                                Titelbild der Ausgabe
                            </h3>
                            <img src = "ressources/archivseite/TitelSeite.jpg" alt = "Titelseite des Magazins" class = "centerImage">
                            <div class = "centerButton">
                                <button type="button" data-toggle = "modal" data-target = "#modalImage">Bild ändern</button>
                            </div>
                        </div>
                        <div class = "containerChild">
                            <h3>
                                Einleitungstext der Ausgabe
                            </h3>
                            <p>
                                Diese Ausgabe wird von Beiträgen zum Thema der Grenzen der Computational Intelligence dominiert.
                                Begleiten Sie uns auf einer Reise zu den Grenzen des Machbaren.
                                Laden Sie sich die Ausgabe <a href = "ressources/archivseite/Zeitung1/Zeitung%201.txt">hier</a> herunter
                            </p>
                            <div class = "centerButton">
                                <button type="button" data-toggle = "modal" data-target = "#modalDescription">
                                    Beschreibung ändern
                                </button>
                            </div>
                            
                       </div>
                    </div>
                    <div class  = "containerElement">
                        <h3>
                            Inhalt
                        </h3>
                        <ul id = "articleList" class = "list-group">
                            <li class = "list-group-item">
                                <div class="card margin">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            1. Wie wir der Wahrheit immer näher kommen
                                        </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" da>
                                        <div class="card-body">
                                            In diesem Paper geht es darum, wie Forscher Edward Schneitzel mit seinen Mitarbeitern des renormierten Instituts Berkely für angewandte
                                            Neurolinguistik es geschafft hat einer KI das Dichten wie Shakespeare innnerhalb weniger Stunden anzutrainieren. Es wurde dafür eine
                                            neue Technik namens Randolinguisierung angewandt, bei der zufällig Wörterketten produziert werden. Das Ergebnis imitiert Shakespeare
                                            perfekt. Lesen Sie den vollständigen Artikel <a href="ressources/archivseite/Zeitung1/ki.txt">hier.</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class = "list-group-item">
                                <div class="card margin">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                2. Bedenken der Arbeiter im Hinblick auf fortschreitende Automatisierung
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            In diesem Paper geht es darum, wie Forscher Edward Schneitzel mit seinen Mitarbeitern des renormierten Instituts Berkely für angewandte
                                            Neurolinguistik es geschafft hat einer KI das Dichten wie Shakespeare innnerhalb weniger Stunden anzutrainieren. Es wurde dafür eine
                                            neue Technik namens Randolinguisierung angewandt, bei der zufällig Wörterketten produziert werden. Das Ergebnis imitiert Shakespeare
                                            perfekt. Lesen Sie den vollständigen Artikel <a href="ressources/archivseite/Zeitung1/ki.txt">hier.</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class = "list-group-item">
                                <div class="card margin">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                3. Neuer Durchbruch im Bereich der neuronalen Netze nutzenden Ki
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            In diesem Paper geht es darum, wie Forscher Edward Schneitzel mit seinen Mitarbeitern des renormierten Instituts Berkely für angewandte
                                            Neurolinguistik es geschafft hat einer KI das Dichten wie Shakespeare innnerhalb weniger Stunden anzutrainieren. Es wurde dafür eine
                                            neue Technik namens Randolinguisierung angewandt, bei der zufällig Wörterketten produziert werden. Das Ergebnis imitiert Shakespeare
                                            perfekt. Lesen Sie den vollständigen Artikel <a href="ressources/archivseite/Zeitung1/ki.txt">hier.</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Here are the Modals-->

            <!-- Modal -->
            <div class="modal fade" id="modalTitle" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Geben Sie den neuen Titel ein : </p>
                            <input class="form-control mr-sm-2" type="text" placeholder="..." aria-label="text">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" data-dismiss="modal">Anwenden</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalImage" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Geben Sie die neue URL des Bildes an : </p>
                            <input class="form-control mr-sm-2" type="text" placeholder="..." aria-label="text">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" data-dismiss="modal">Anwenden</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalDescription" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Geben Sie eine neue Beschreibung an : </p>
                            <div class="form-group">
                                <label for="discription">neue Beschreibung : </label>
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" data-dismiss="modal">Anwenden</button>
                        </div>
                    </div>
                </div>
            </div>

		</main>
        <?php include ("ressources/snippets/footer.php") ;?>
        <?php include ("ressources/snippets/loadjavascript.php") ;?>
        <?php include ("ressources/snippets/loadjavascriptRedakteur.php");?>
    </body>
</html>
