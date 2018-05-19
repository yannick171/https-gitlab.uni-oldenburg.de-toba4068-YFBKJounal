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

		<main class="defaultstyle">
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

			<div class = "nextMagazine">
                <h2></h2>
				<h2>
                    Nächste Ausgabe
                </h2>
                <div class = "parentContainer">
                
                    <div class = "containerElement">
                        <div class = "containerChild">
                            <h3>
                                Titel der Ausgabe
                            </h3>
                            <p>
                                Neuronale Netze unter Vollauslastung
                            </p>
                            <div class = "centerButton">
                                <button type="button">
                                    Title ändern
                                </button>
                            </div>
                        </div>
                        <div class = "containerChild">
                            <h3>
                                Titelbild der Ausgabe
                            </h3>
                            <img src = "ressources/archivseite/TitelSeite.jpg" alt = "Titelseite des Magazins" class = "centerImage">
                            <div class = "centerButton">
                                <button type="button">Bild ändern</button>
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
                                <button type="button">
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
                            <li ckass = "list-group-item">
                                <div class="card">
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
                            <li ckass = "list-group-item">
                                <div class="card">
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
                            <li ckass = "list-group-item">
                                <div class="card">
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
		</main>
        <?php include ("ressources/snippets/footer.php") ;?>
        <?php include ("ressources/snippets/loadjavascript.php") ;?>
    </body>
</html>
