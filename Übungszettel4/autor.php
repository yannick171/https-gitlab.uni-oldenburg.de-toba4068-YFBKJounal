<!DOCTYPE html>
<html>
    <head>
        <?php include("ressources/snippets/globalsources.php") ?>

        <link rel="stylesheet" href="ressources/autorseite/Mystyle.css"/>
         <link rel="stylesheet" href="ressources/css/article.css"/>

   </head>
  <body>

         <?php include ("ressources/snippets/head.php") ;?>

            <main class="defaultstyle">
                <article>
                    <ul>
                       <h1> Autor Profil</h1>
                        </ul>
                    <section class="grid-container-article">
                    <div>
                        <img class="profilpic" src="ressources/redakteurseite/profilbild.png" alt="picture"/>

                    </div>
                     <div>
                          <p class ="item2">
                                        Name:<br>
                                          Yannick Watat <br><br>
                                        Email:<br>
                                           yannick.watat.sunou@uni-oldenburg.de <br><br>

                                        Titel:<br>
                                            noch nicht<br><br>
                          </p>
                    </div>
             <div class="item-down-article">
                       <ul>
                          <a>veröffentliche Beiträge </a>

                        </ul>
                    <ul>
                  <table id="listartikel">
					     <tr>
						<th>Datum </th>
                        <th>Titel </th>
                        <th>Autor/inen</th>
                        <th>Status</th>
					</tr>
					  <tr>
						<td>
							<a>2018</a>
                         </td>
                        <td>
                            <a href ="ressources/archivseite/Zeitung1/Zeitung%201.txt">
                            Die Grenzen der Computational Intelligence
							</a>
                        </td>
                        <td>
                            <a> teo Nagelmann </a>
                        </td>
                         <td>
                            <a id= "ressources/archivseite/Zeitung%202.txt">
								angenommen
							</a>
                        </td>

					</tr>
                      <tr>
						<td>
							<a>2018</a>
                         </td>
                        <td>
                            <a href = "ressources/archivseite/Zeitung1/temporale-Logik.txt">
								Der Weg des Computers zur Kreativität
							</a>
                        </td>
                        <td><a>hauptvogel Ann</a></td>
                        <td><a>angenommen</a></td>

					</tr>
                        <tr>
						   <td>
							<a>	2017</a>
                          </td>
                        <td>
                            <a href = "ressources/archivseite/Zeitung%202.txt">
								Gläserne Menschen
							</a>
                        </td>
                        <td>
                            <a>
								peter Hen
							</a>
                        </td>
                        <td>
                            <a>
								in Bearbeitung
							</a>
                        </td>

					    </tr>
                    </table>
                        </ul>
                 <ul>
                    <summary><b>Neuer Beitrag einreichen</b></summary><br>
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
                          <input list ="liste" type="file" name="img" multiple><br>
                          <input list ="liste" type="file" name="img" multiple><br>
                         </form>
                     </label>
                        <footer class="lign">&nbsp; </footer>
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
                     </ul>
                 </div>
                       </section>
                </article>
             </main><br><br>

    <?php include ("ressources/snippets/footer.php") ;?>
    <?php include ("ressources/snippets/loadjavascript.php") ;?>
    </body>
</html>
