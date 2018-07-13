<?php
include("ressources/snippets/session.php");
?>

<!DOCTYPE html>
<html>


<head>
    <link rel="stylesheet" type="text/css" href="ressources/startseite/grid.css" />
    <?php include("ressources/snippets/article.php"); ?>
    <?php include("ressources/snippets/globalsources.php"); ?>
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
                            <img class="introimg" src="ressources/startseite/introimg.jpg" alt="" />
                        </div>
                        <div class="box-2">
                            <?php echo htmlspecialchars($_SESSION["infoText"]); ?>
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
                    <h2>Aktuelle Ausgabe</h2><br />

                    <h3 style="text-align: center; font-size: 200%;">

                        <?php
                        echo $newestMagazine["title"];

                        ?>

                    </h3>
                    <div class="jumbotron">
                        <div class ="gridContainer">
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
                    $results = showArticles(array(3,4));

                    //Wähle zunächst alle Artikel, aber maximal 15 aus
                    $length = count($results);
                    $numberOfRandomArticles = min(15, $length);
                    echo "<input type='hidden' name='numberOfRandomArticles' value='$numberOfRandomArticles' id='numberOfRandomArticles'>";

                    //Wähle einen zufälligen Startpunkt und generiere einen Array der Länge $numberOfRandomArticles
                    $start = rand(0,$length-1);
                    $array = range($start,$start + $numberOfRandomArticles-1);
                    $i=0;

                    //Permutation des Arrays $array
                    while($i < $numberOfRandomArticles){
                        $temp = $array[$i];
                        $randomNumber = rand(1,$numberOfRandomArticles -1);
                        $array[$i] = $array[$randomNumber];
                        $array[$randomNumber] = $temp;
                        $i = $i +1;
                    }

                    $i=1;
                    $urlPrefix = "ressources/archiv/artikel/";

                    //Wähle "zufällige" Artikel aus $results, indem wir in der Kongruenzklasse von $numberOfRandomArticles rechnen
                    //Dies ist nicht wirklich zufällig, da wir vom Punkt $start die nächsten 15 Artikel nur Permutiert haben,
                    //der Startpunkt $start war jedoch "zufällig" (ich weiß nicht wie "gut" der random-number-generator ist) gewählt.
                    foreach ($array as $number){
                        $url = $urlPrefix . urlencode( "artikel%" . htmlspecialchars($results[$number % $numberOfRandomArticles]['id'])) . ".pdf";

                        echo "<div class='randomArticle'>";
                        echo "<h4 class='articleTitle'><b>" . htmlspecialchars($results[$number % $numberOfRandomArticles]['title']) . "</b><br><a href='$url' >Für den Volltext auf den Link klicken.</a></h4>";
                        echo "<hr>";
                        echo "<h6 class='articleAuthor'><b>Von:</b> " . htmlspecialchars($results[$number % $numberOfRandomArticles]['author']) . "</h6>";
                        echo "<hr>";
                        echo "<p class='articleAbstract'>" . htmlspecialchars($results[$number % $numberOfRandomArticles]['abstract']) . "</p>";
                        echo "</div>";
                        $i = $i+1;
                    }
                    ?>

                    <div class="SliderRow" id="artikel">
                        <button class="randomButton" id="leftArrow">
                            <i class="material-icons">keyboard_arrow_left</i>
                        </button>
                        <div class="randomArticleSlot" id="randomArticleSlot-1">

                        </div>
                        <div class="randomArticleSlot" id="randomArticleSlot-2">

                        </div>
                        <div class="randomArticleSlot" id="randomArticleSlot-3">

                        </div>
                        <button class="randomButton"  id="rightArrow">
                            <i class="material-icons">keyboard_arrow_right</i>
                        </button>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <?php include("ressources/snippets/footer.php"); ?>
</div>

<?php include("ressources/snippets/loadjavascript.php"); ?>
<script async="async" src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="ressources/js/slider.js"></script>

</body>
</html>