<!DOCTYPE html>
<html>
    <head>
        <title>
			Redakteur Profil - Evolve
		</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href = "ressources/css/nav.css" rel = "stylesheet">
        <link rel = "stylesheet" type="text/css" href = "ressources/redakteurseite/redakteur.css">
        <link href = "ressources/css/footer.css" rel = "stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
		<link href = "ressources/css/article.css" rel= "stylesheet">
        <meta charset="utf-8">

        <!--Scripts for using bootstrap-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

	</head>

	<body>

		  <?php include ("ressources/snippets/head.php") ;?>
      
		<main>
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
            </article>

			<h1>Arbeitsbereich</h1>

            <article>
                <section class="grid-container-article">
                    <div class="item-down-article">

						<h2>Zu prüfen:</h2>

						<table>
							<tr>
								<th>Artikel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th>Autor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th>Datum&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th>Prüfen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
							</tr>
							<tr>
								<td>
									<a href = "ressources/archivseite/Zeitung%202.txt">
										Google entwickelt Schach KI
									</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</td>
								<td>Friedrich Petersen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>19.03.2018&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>
									<form>
										<select multiple>
											<option value="todo">ToDo</option>
											<option value="yes">Akzeptiert</option>
											<option value="no">Abgelehnt</option>
										</select>
									</form>
								</td>
							</tr>
							<tr>
								<td>
									<a href = "ressources/archivseite/Zeitung%202.txt">
										Neue Netze
									</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</td>
								<td>Gertrud Wallacher&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>22.01.2018&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>
									<form>
										<select multiple>
											<option value="todo">ToDo</option>
											<option value="yes">Akzeptiert</option>
											<option value="no">Abgelehnt</option>
										</select>
									</form>
								</td>
							</tr>
						</table>

						<br><br><br>

						<h2>Geprüfte Artikel:</h2>

						<table>
							<tr>
								<th>Artikel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th>Autor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th>Datum&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th>Hinzufügen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
							</tr>
							<tr>
								<td>
									<a href = "ressources/archivseite/Zeitung%202.txt">
										Der Zusammenhang aus Größe und Effektivität
									</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</td>
								<td>Friedrich Petersen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>19.03.2018&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>
									<form>
										<select multiple>
											<option value="todo">ToDo</option>
											<option value="yes">Zur nächsten Ausgabe</option>
										</select>
									</form>
								</td>
							</tr>
							<tr>
								<td>
									<a href = "ressources/archivseite/Zeitung%202.txt">
										Wege im Netz
									</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</td>
								<td>Gertrud Wallacher&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>22.01.2018&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td>
									<form>
										<select multiple>
											<option value="todo">ToDo</option>
											<option value="yes">Zur nächsten Ausgabe</option>
										</select>
									</form>
								</td>
							</tr>
						</table>
                    </div>
                </section>
            </article>

			<article>
				<h2>Nächste Ausgabe:   Die Grenzen der Computational Intelligence <button type="button"> Titel ändern</button></h2>
				<section class="grid-container-article">
					<div>
						<img src = "ressources/archivseite/TitelSeite.jpg" alt = "Titelseite des Magazins">
						<button type="button">Bild ändern</button>
					</div>
					<div>
						<p class = "item2">
							Diese Ausgabe wird von Beiträgen zum Thema der Grenzen der Computational Intelligence dominiert.
							Begleiten Sie uns auf einer Reise zu den Grenzen des Machbaren.
							Laden Sie sich die Ausgabe <a href = "ressources/archivseite/Zeitung1/Zeitung%201.txt">hier</a> herunter
							<button type="button">Beschreibung ändern</button>
						</p>
					</div>
					<div class="item-down-article">
						<h3>Inhalt</h3>
						<details>
							<summary>
								Neue Erkenntnisse im Bereich der Fuzzy-Logik
								<button type="button"> Titel ändern</button>
								<br>
							</summary>
							<p>
								Aufgrund langer und intensiver Forschung konnten ich, der großartige Huan Lee,
								und mein Team neue Erkenntnisse im Bereich der Fuzzy-Logik gewinnen. Welche dies genau sind,
								können Sie in <a href="ressources/archivseite/Zeitung1/Fuzzy-Logik.txt">folgendem Artikel </a>lesen.
								<button type="button">Beschreibung ändern</button>
							</p>
						</details>
						<details>
							<summary>
								Der Durchbruch im Verständnis der temporalen Logik
								<button type="button"> Titel ändern</button>
								<br>
							</summary>
							<p>
								Dieses Paper widmet sich der Frage nach dem Verständnis der temporalen Logik. Der Schlüssel
								unserer Forschung ist die Annahme, dass das Wichtigste bei dieser Diziplin das Tempo ist.Wie genau
								das Tempo maßgeblich für das Verstehen der temporalen Logik ist,
								können Sie in <a href="ressources/archivseite/Zeitung1/temporale-Logik.txt">folgendem Artikel </a>lesen.
								<button type="button">Beschreibung ändern</button>
							</p>
						</details>
						<details>
							<summary>
								Neuer Durchbruch im Bereich der neuronalen Netze nutzenden Ki
								<button type="button"> Titel ändern</button>
								<br>
							</summary>
							<p>
								In diesem Paper geht es darum, wie Forscher Edward Schneitzel mit seinen Mitarbeitern des renormierten Instituts Berkely für angewandte
								Neurolinguistik es geschafft hat einer KI das Dichten wie Shakespeare innnerhalb weniger Stunden anzutrainieren. Es wurde dafür eine
								neue Technik namens Randolinguisierung angewandt, bei der zufällig Wörterketten produziert werden. Das Ergebnis imitiert Shakespeare
								perfekt. Lesen Sie den vollständigen Artikel <a href="ressources/archivseite/Zeitung1/ki.txt">hier.</a>
								<button type="button">Beschreibung ändern</button>
							</p>
						</details>
					</div>
				</section>
			</article>
		</main>
		<footer>
            <address>
                Hier steht so footer-typisches Zeug und so..
                Hier steht so footer-typisches Zeug und so..
                Hier steht so footer-typisches Zeug und so..
                Hier steht so footer-typisches Zeug und so..
                Hier steht so footer-typisches Zeug und so..
                Hier steht so footer-typisches Zeug und so..
                Hier steht so footer-typisches Zeug und so..
            </address>
        </footer>
    </body>
</html>
