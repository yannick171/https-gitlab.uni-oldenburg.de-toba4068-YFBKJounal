<!DOCTYPE html>
<html>
    <head>
        <title>
			Meine Beiträge - Evolve
		</title>
        <?php include("ressources/snippets/globalsources.php") ?>

        <link rel = "stylesheet" type="text/css" href = "ressources/autorseite/autorseite.css">
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
		  
		<main class="defaultstyle">

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
            </article>
                <div id="Haupttitel1">
					<h1>Meine Beiträge</h1>
				</div>
            <div class = "parentContainer">
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
                                            Neue Erkenntnisse im Bereich ...
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
                                            Industrie 4.0 aus den Kinderschuhen...
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
                                            Verstehen der Semantik menschlicher Sprache...
											<!mithilfe von künstlichen, neuronalen Netzen>
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
                                            Künstliche Intelligenz... <!generiert Zeitungsartikel>
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
                                            Reflektion der aktuellen... <!Forschungsergebnisse...>
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
                    <h2 id = "abgelehnt" class = workingArea>
                        abgelehnt
                    </h2>
                    <ul id = "todoArticles" class = "list-group">
                        <li class = "list-group-item">
                            <div class="card margin">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Künstliche Intelligenz...<! generiert Zeitungsartikel>
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
                                            Reflektion der aktuellen...<! Forschungsergebnisse im Bereich der Automation>
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
            </div>
            <div>
	      <h1>Beitrag einreichen:</h1>  
				
            </div>
			<div class="einreichen">
				<aside>
				<label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Titel:
                   <input name="name" value=":" type="text" size="31" maxlength="33"><br>
                </label>
                        <br>
                 <label> Autor/in:
                   <input name="name" value="" type="text" size="31" maxlength="33"><br><br>
                 </label>
                    <br>

                     <label>Datei hinzufügen:
                         <form action="/actions_page.php" >
                          <input list ="liste" type="file" name="img" multiple><br>
                         </form>
                     </label>
					<script>
					function MyFunction(){
						var y =document.createElement("INPUT");
						y.setAttribute("type","file");
						document.body.appendChild(y);
						
					}
					</script>
					<button onclick="MyFunction()"> Weitere Documente</button>
				</aside>
                <article>
                        <p><strong>Checklist für Beiträge</strong> <br><br>
                            <input type="checkbox" name="opt[]"
                            value="parken"> Der Beitrag ist bisher unveröffentlicht und wurde auch keiner anderen Zeitschrift vorgelegt.<br><br>
                            <input type="checkbox" name="opt[]"
                            value="parken"> Der Text folgt den stilistischen und bibliografischen Vorgaben, die in den jeweiligen <a href="Rubrikenrichtlinien" > Rubrikenrichtlinien</a> zu fin­den sind.<br><br>
                           <input type="checkbox" name="opt[]"
                            value="parken"> Der oder die Autor_in versichert, die allgemein gültigen Standards wissenschaftlicher Arbeit berücksichtigt und sämtliche genutzte Bilder, Grafiken und Texte Dritter kenntlich gemacht zu haben machen.
                        </p>
                      <footer class="lign">&nbsp; </footer>
                        <p><strong>Copyright-Vermerk </strong><br><br>
                           Autor_innen, die in dieser Zeitschrift publizieren möchten, stimmen den folgenden Bedingungen zu:<br>
                            <input type="checkbox" name="opt[]"
                            value="parken"> Die Autor/innen stimmen den Bestimmungen dieser Copyright-Regelungen zu, die für diesen Beitrag im Falle einer Veröffentlichung Anwendung finden. (Kommentare für die Redaktion können weiter unten angefügt werden.)<br><br>
                        </p>

                        <p>
                        Erklärung zum Schutz persönlicher Daten in dieser Zeitschrift
                            <br><br><br>
                        Namen und E-Mail-Adressen, die in diesem Onlineangebot eingegeben werden (bspw. bei der Registrierung von Nutzern), werden ausschließlich zu den angegebenen Zwecken genutzt und nicht an Dritte weitergegeben.
                        Namen der Autor_innen werden mit den Artikeln veröffentlicht.
                        </p>
                        <footer class="lign">&nbsp; </footer>
                          <form action="/actions_page.php" >
                             <input type="submit">
                           </form>
				</article>
			</div>
			<script>
				
			</script>    
		</main>
        <?php include ("ressources/snippets/footer.php") ;?>
        <?php include ("ressources/snippets/loadjavascript.php") ;?>
    </body>
</html>
