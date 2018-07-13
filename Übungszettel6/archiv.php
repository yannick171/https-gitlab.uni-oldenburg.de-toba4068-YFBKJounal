<?php
  include("ressources/snippets/session.php");
 ?>

<!DOCTYPE html>
<html lang = "de">
    <head>
        <?php include("ressources/snippets/globalsources.php") ?>
            <link rel="stylesheet" type="text/css" href="ressources/startseite/grid.css">
			<link rel="stylesheet" type="text/css" href="ressources/archivseite/archiv_style_sheet.css">
			
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <?php include("ressources/snippets/article.php"); ?>
    <?php include("ressources/snippets/globalsources.php") ?>
        <title>
            Archiv
        </title>
    </head>

    <body>

      <?php include ("ressources/snippets/head.php") ;?>

        <main class="defaultstyle">
			<div class = "container">
				<br><br>
				<h2>
				Archiv
				</h2>
					Willkommen im Archiv. Hier gibt es die gesammelten Ausgaben der letzten drei Jahre.<br>
					Nehmen Sie sich Zeit und stöbern Sie nach Herzenslust die folgende Sammlung durch.
					Wir bieten Ihnen alles künstlichen Immunsystemen bis zu KPL-Bäumen...<br>
					IN KÜNSTLICHEN IMMUNSYSTEMEN also begleiten Sie uns auf eine fantastische Reise bis an die Grenzen dieses
					Archivs und darüber hinaus, also viel Glück und genießen Sie dieses Abenteuer.<br><br>
					Ihre Redaktion
				
			</div>
			<br> <br>
			<div class = "jumbotron">
			<?php

				if(isset($_GET) && !empty($_GET))
				{
                    //$url = 'http://localhost/YFBKJounal/Übungszettel6/ressources/snippets/articleDb_server.php';
                    $url = 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']) . '/ressources/snippets/articleDb_server.php';

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
					<form method="get" action="archiv.php">
						<h2>
						Suchergebnisse für &nbsp;&nbsp;&nbsp;<input placeholder="Suchen" name="search" value="'.$_GET['search'].'" /><i class="fa fa-search"></i></h2>
						<br>
					</form>

					';

					if (is_array($content)){
                        foreach ($content as $article) 
						{
                            printArticle(htmlspecialchars($article["title"]), htmlspecialchars($article["abstract"]), htmlspecialchars($article["id"]), htmlspecialchars(
							$article["author"])); 
							echo '<br>';
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
                        echo "ERROR SQL NO Magazine";
                    }
					
                    $magazines = $sql->fetchAll();
					
					$i = 10;
					
					for ($i = count($magazines) - 2; $i >= 0; $i--)
					{
						echo'<h3>' . htmlspecialchars($magazines[$i]["title"]) . '</h3>';
						echo'<h5> Inhalt </h5>' . htmlspecialchars($magazines[$i]["description"]) . '<br><br>';
						$articlesOfMagazine = $articlesConnection->query('SELECT * FROM article where magazine = ' . $magazines[$i]["id"]);
						
						$maxcount = 2;
						$counter = 0;
						
						
						while ($article = $articlesOfMagazine->fetch())
						{
							if($counter % $maxcount == 0)
							{
								// Neue Reihe
								echo '<div class="row">';
							}
							
							echo '<div class="col-sm-' . intval(12 / $maxcount) . '">';
							
							printArticleBox(htmlspecialchars($article["title"]), htmlspecialchars($article["abstract"]), htmlspecialchars($article["id"]), htmlspecialchars($article["author"]), $article["uploadDate"], "");
							
							echo '</div>';
							
							if($counter % $maxcount == $maxcount - 1)
							{
								// Reihe Ende
								echo '</div><br>';
							}
							
							$counter ++;
							if($counter == $maxcount)
							{
								$counter = 0;
							}
						}
						
						if($counter != 0)
						{
							// Reihe Ende
							echo '</div><br>';
						}
						
						echo '<br><br><br>';
					}
				}
			
			?>
			</div>
            </main>
    <?php include ("ressources/snippets/footer.php") ;?>
    <?php include ("ressources/snippets/loadjavascript.php") ;?>
        </body>
</html>
