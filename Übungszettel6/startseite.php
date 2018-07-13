<?php
include("ressources/snippets/session.php");
?>

<!DOCTYPE html>
<html>


<head>

    <link rel="stylesheet" type="text/css" href="ressources/startseite/grid.css">
    <?php include("ressources/snippets/article.php"); ?>
    <?php include("ressources/snippets/globalsources.php") ?>
    <title>
        Evolve Startseite
    </title>
</head>


<body>

<div class="hintergrundbild pagecontainer">

<!-- Header -->
<?php include("ressources/snippets/head.php"); ?>

<div class="pagecontainer">
<div class="hintergrundbild">
    <div class="defaultstyle">
        <main class="">
            <div class="wrapper">
                <div class="box-1">
                    <img class="introimg" src="ressources/startseite/introimg.jpg">
                </div>
                <div class="box-2">
                    <h2>sharing is caring!</h2>
                    Hier findet ihr eine Plattform zur veröffentlichung eurer Artikel, egal
                    ob Fuzzylogik, künstliche neurale Netze, Evolutionäre Algorithmen oder andere Themen aus der KI.
                    Helft uns dabei das Interesse an der KI weiter zu erhalten. Hier finden alle
                    eure Beiträge gehör. Hier findet ihr eine Plattform zur veröffentlichung eurer Artikel, egal ob
                    Fuzzylogik, künstliche neurale Netze, Evolutionäre Algorithmen oder andere Themen aus der KI. Helft
                    uns dabei das Interesse an der KI weiter zu erhalten. Hier finden alle
                    eure Beiträge gehör. Hier findet ihr eine Plattform zur veröffentlichung eurer Artikel, egal ob
                    Fuzzylogik, künstliche neurale Netze, Evolutionäre Algorithmen oder andere Themen aus der KI. Helft
                    uns dabei das Interesse an der KI weiter zu erhalten. Hier finden alle
                    eure Beiträge gehör.
                </div>

                <div class="box-3">
                    <a id="twitter-timeline" class="twitter-timeline" data-width="100%" data-height="500" data-theme="light" data-link-color="#2B7BB9" href="https://twitter.com/realDonaldTrump?ref_src=twsrc%5Etfw">Tweets by realDonaldTrump</a>
                </div>
            </div>
                    <?php
                    // Datenbankconnextion
                    $articlesConnection = new PDO('sqlite:ressources/SQLData/articles.db');
                    $magazinesConnection = new PDO('sqlite:ressources/SQLData/magazines.db');

                    //getting highest id
                    $sql = $magazinesConnection->query('SELECT max(id) FROM Magazine');
                    $highestMagazineId = $sql->fetch();

                    /*$newestMagazine = $magazinesConnection->query('SELECT * FROM Magazine where id ='. $highestMagazineId["max(id)"])->fetch();

                    $articlesOfMagazine = $articlesConnection->query('SELECT * FROM article where magazine = ' . $highestMagazineId["max(id)"]);

                    if (!$articlesOfMagazine->fetch()) {*/
                        $articlesOfMagazine = $articlesConnection->query('SELECT * FROM article where magazine = ' . --$highestMagazineId["max(id)"]);
                        $newestMagazine = $magazinesConnection->query('SELECT * FROM Magazine where id ='. $highestMagazineId["max(id)"])->fetch();
                    //}
                    ?>
                    <h2>Aktuelle Ausgabe</h2><br>

                    <h3 style="text-align: center; font-size: 200%;">

                        <?php
                            echo $newestMagazine["title"];

                        ?>

                    </h3>
                    <div class="jumbotron">
                        <div class = gridContainer>
                            <div class = "child">
                                <?php
                                    echo $newestMagazine["description"];
                                ?>
                            </div>
                            <div>
                                <?php
                                while ($article = $articlesOfMagazine->fetch()) {
                                    printArticle($article["title"], $article["abstract"], $article["id"], $article["author"], $article["pdfPath"]);
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                <?php
                require_once ("ressources/snippets/articleDb_server.php");
                $results = showArticles(1);

                //Permutation von einigen Artikeln aus der Datenbank
                $length = count($results);
                $numberOfRandomArticles = min(15, $length);
                echo "<input type='hidden' name='numberOfRandomArticles' value='$numberOfRandomArticles' id='numberOfRandomArticles'>";
                $start = rand(0, $length-$numberOfRandomArticles);
                $array = range($start,$numberOfRandomArticles-1);
                $i=0;

                while($i < $numberOfRandomArticles){
                    $temp = $array[$i];
                    $randomNumber = rand(1,$numberOfRandomArticles -1);
                    $array[$i] = $array[$randomNumber];
                    $array[$randomNumber] = $temp;
                    $i = $i +1;
                }

                $i=1;
                $urlPrefix = "ressources/archiv/artikel/";

                foreach ($array as $number){
                    $url = $urlPrefix . urlencode( "artikel%" . $results[$number]['id']) . ".pdf";

                    echo "<div class='randomArticle'>";
                    echo "<h4 class='articleTitle'><b>" . $results[$number]['title'] . "</b><br><a href='$url' >Für den Volltext auf den Link klicken.</a></h4>";
                    echo "<hr>";
                    echo "<h6 class='articleAuthor'><b>Von:</b> " . $results[$number]['author'] . "</h6>";
                    echo "<hr>";
                    echo "<p class='articleAbstract'>" . $results[$number]['abstract'] . "</p>";
                    echo "</div>";
                    $i = $i+1;
                }
                ?>

            <div class="SliderRow" id="artikel">
                <button type="button" class="randomButton" id="leftArrow">
                    <i class="material-icons">keyboard_arrow_left</i>
                </button>
                <div class="randomArticleSlot" id="randomArticleSlot-1">

                    </div>
                    <div class="randomArticleSlot" id="randomArticleSlot-2">

                    </div>
                    <div class="randomArticleSlot" id="randomArticleSlot-3">

                    </div>
                    <button type="button" class="randomButton"  id="rightArrow">
                        <i class="material-icons">keyboard_arrow_right</i>
                    </button>
                </div>
            </div>

        </main>
    </div>
</div>

<?php include("ressources/snippets/footer.php"); ?>
</div>

<?php include("ressources/snippets/loadjavascript.php"); ?>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="ressources/js/slider.js"></script>
</body>
</html>
