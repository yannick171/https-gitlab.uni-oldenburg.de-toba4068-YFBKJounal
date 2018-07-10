<?php
  include("ressources/snippets/session.php");
 ?>

<!DOCTYPE html>
<html lang = "de">
    <head>
        <?php include("ressources/snippets/globalsources.php") ?>
        <link rel = "stylesheet" type="text/css" href = "ressources/archivseite/archiv_style_sheet.css">
            <link rel="stylesheet" type="text/css" href="ressources/startseite/grid.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <?php include("ressources/snippets/article.php"); ?>
    <?php include("ressources/snippets/globalsources.php") ?>
        <title>
            Archiv
        </title>
    </head>

    <body>

      <?php include ("ressources/snippets/head.php") ;?>

        <main class="">
            <h1>
                Archiv
            </h1>
            <div class = "headingGrid">
                <p id = "headingParagraph">
                    Willkommen im Archiv. Hier gibt es die gesammelten Ausgaben der letzten drei Jahre.<br>
                    Nehmen Sie sich Zeit und stöbern Sie nach Herzenslust die folgende Sammlung durch.
                    Wir bieten Ihnen alles künstlichen Immunsystemen bis zu KPL-Bäumen...<br>
                    IN KÜNSTLICHEN IMMUNSYSTEMEN also begleiten Sie uns auf eine fantastische Reise bis an die Grenzen dieses
                    Archivs und darüber hinaus, also viel Glück und genießen Sie dieses Abendteuer.<br><br>
                    Ihre Redaktion
                </p>
                <!--img src = "../ressources/archivseite/buch.jpg" alt = "Buch zur Aufhüschung" class = "headingImage"-->
            </div>

			<?php

				if(isset($_GET) && !empty($_GET))
				{
                    $url = 'http://localhost/YFBKJounal/Übungszettel6/ressources/snippets/articleDb_server.php';

                    $searchflag = false;
                    if (isset($_GET['search'])){
                        if(!$searchflag){
                            $searchflag = true;
                            $url = $url . '?search=' . urlencode($_GET['search']);
                        }else{
                            $url = $url . '&search=' . urlencode($_GET['search']);
                        }
                    }

                    if (isset($_GET['author']) && $_GET['author'] != ''){
                        if(!$searchflag){
                            $searchflag = true;
                            $url = $url . '?author=' .urlencode($_GET['author']);
                        }else{
                            $url = $url . '&author=' .urlencode($_GET['author']);
                        }
                    }
                    if (isset($_GET['uploadDate'])){
                        if(!$searchflag) {
                            $searchflag = true;
                            $url = $url . '?uploadDate=' .urlencode($_GET['uploadDate']);
                        }else {
                            $url = $url . '&uploadDate=' .urlencode($_GET['uploadDate']);
                        }
                    }

                    $antwort = file_get_contents($url);
                    $content = json_decode($antwort,true)[0];

					echo '
					<br>
					<form method="get" action="archiv.php">
						<h2>
						Suchergebnisse für &nbsp;&nbsp;&nbsp;<input placeholder="Suchen" name="search" value="'.$_GET['search'].'" /><i class="fa fa-search"></i></h2>
						<br>
					</form>

					';

					if (is_array($content)){
                        foreach ($content as $article) {
                            printArticle(htmlspecialchars($article["title"]), htmlspecialchars($article["abstract"]), htmlspecialchars($article["id"]), htmlspecialchars(
                                $article["author"]));
					    }
                    }else{
                        echo 'Keine Treffer.<br><br><br><br><br><br><br><br><br><br>';
                    }
				}
				else
				{
					echo'
					<div class="box-4">
                    <h2>Aktuelle Ausgaben</h2>
					<br>
					';
                    // Datenbankconnextion
                    $articlesConnection = new PDO('sqlite:ressources/SQLData/articles.db');
                    $magazinesConnection = new PDO('sqlite:ressources/SQLData/magazines.db');
                    
					// Abfrage der 3 letzten Artikel
                    $sql = $magazinesConnection->query('SELECT * FROM Magazine');
                    if($sql == false)
                    {
                        echo "asdfasdf";
                    }
					
                    $magazines = $sql->fetchAll();
					
					$i = 10;
					
					for ($i = 0; $i < count($magazines) && $i < 3; $i++)
					{
						echo'<h3>' . htmlspecialchars($magazines[$i]["title"]) . '</h3>';
						echo'<h5> Inhalt </h5>' . htmlspecialchars($magazines[$i]["description"]) . '<br><br>';
						$articlesOfMagazine = $articlesConnection->query('SELECT * FROM article where magazine = ' . $magazines[$i]["id"]);
						
						while ($article = $articlesOfMagazine->fetch())
						{
							printArticle(htmlspecialchars($article["title"]), htmlspecialchars($article["abstract"]), htmlspecialchars($article["id"]), htmlspecialchars($article["author"]), htmlspecialchars($article["pdfPath"]));
						}
						echo '<br><br><br>';
					}
				}
			
			?>
			
            </main>
    <?php include ("ressources/snippets/footer.php") ;?>
    <?php include ("ressources/snippets/loadjavascript.php") ;?>
        </body>
</html>
