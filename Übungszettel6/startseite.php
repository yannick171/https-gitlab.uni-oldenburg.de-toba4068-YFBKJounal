<?php
include("ressources/snippets/session.php");
?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="ressources/startseite/grid.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <?php include("ressources/snippets/article.php"); ?>
    <?php include("ressources/snippets/globalsources.php") ?>
    <title>
        Evolve Startseite
    </title>
</head>

<body>

<!-- Header -->
<?php include("ressources/snippets/head.php"); ?>


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

                <div class="box-4">
                    <?php
                    // Datenbankconnextion
                    $articlesConnection = new PDO('sqlite:ressources/SQLData/articles.db');
                    $magazinesConnection = new PDO('sqlite:ressources/SQLData/magazines.db');

                    //getting highest id
                    $sql = $magazinesConnection->query('SELECT max(id) FROM Magazine');
                    $highestMagazineId = $sql->fetch();

                    $newestMagazine = $magazinesConnection->query('SELECT * FROM Magazine where id ='. $highestMagazineId["max(id)"])->fetch();

                    $articlesOfMagazine = $articlesConnection->query('SELECT * FROM article where magazine = ' . $highestMagazineId["max(id)"]);

                    if (!$articlesOfMagazine->fetch()) {
                        $articlesOfMagazine = $articlesConnection->query('SELECT * FROM article where magazine = ' . --$highestMagazineId["max(id)"]);
                        $newestMagazine = $magazinesConnection->query('SELECT * FROM Magazine where id ='. $highestMagazineId["max(id)"])->fetch();
                    }
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
                </div>
            </div>


            <div class="row" id="artikel">
                <button type="button" id="leftArrow">
                    <i class="material-icons randomButton">keyboard_arrow_left</i>
                </button>
                <div class="randomArticleSlot-1">
                    <p id="randomArticle-1"></p>
                </div>
                <div class="randomArticleSlot-2">
                    <p id="randomArticle-2"></p>
                </div>
                <div class="randomArticleSlot-3">
                    <p id="randomArticle-3"></p>
                </div>
                <button type="button" id="rightArrow">
                    <i class="material-icons randomButton">keyboard_arrow_right</i>
                </button>
            </div>
        </main>
    </div>
</div>

<?php include("ressources/snippets/footer.php"); ?>

<?php include("ressources/snippets/loadjavascript.php"); ?>

<script>
    $(document).ready(function () {
        var path = "ressources/archiv/artikel/";
        var files = [path + "artikel1.txt", path + "artikel2.txt", path + "artikel3.txt", path + "artikel4.txt", path + "artikel5.txt"];
        //var files = [path+"img1.jpeg",path + "img2.jpeg",path + "img3.png",path + "img4.jpeg",path + "img5.png"];

        for (var i = 0; i < files.length; i++) {
            var temp = files[i];
            var permutation = Math.floor((Math.random() * files.length));
            files[i] = files[permutation];
            files[permutation] = temp;
        }

        $("#randomArticle-1").load(files[0]);
        $("#randomArticle-2").load(files[1]);
        $("#randomArticle-3").load(files[2]);

        var relativePosition = 0;
        var range = 3;
        var fadeSpeed = 350;

        $(window).resize(function () {
            if ($(window).width() < 768) {
                range = 2;
            }
            else if ($(window).width() < 600) {
                range = 1;
            }
            else {
                range = 3;
            }
        })
        $("#rightArrow").click(function () {
            relativePosition = (relativePosition + range + files.length) % files.length;
            $("#randomArticle-1").fadeOut(fadeSpeed);

            setTimeout(function () {
                $("#randomArticle-1").load(files[relativePosition]);
                $("#randomArticle-1").fadeIn(fadeSpeed);
            }, fadeSpeed);

            setTimeout(function () {
                $("#randomArticle-2").fadeOut(fadeSpeed);

                setTimeout(function () {
                    $("#randomArticle-2").load(files[(relativePosition + 1) % files.length]);
                    $("#randomArticle-2").fadeIn(fadeSpeed);
                }, fadeSpeed);

            }, 200);

            setTimeout(function () {
                $("#randomArticle-3").fadeOut(fadeSpeed);

                setTimeout(function () {
                    $("#randomArticle-3").load(files[(relativePosition + 2) % files.length]);
                    $("#randomArticle-3").fadeIn(fadeSpeed);
                }, fadeSpeed);

            }, fadeSpeed);
        });

        $("#leftArrow").click(function () {
            relativePosition = (relativePosition - range + files.length) % files.length;
            $("#randomArticle-3").fadeOut(fadeSpeed);

            setTimeout(function () {
                $("#randomArticle-3").load(files[(relativePosition + 2) % files.length]);
                $("#randomArticle-3").fadeIn(fadeSpeed);
            }, fadeSpeed);

            setTimeout(function () {
                $("#randomArticle-2").fadeOut(fadeSpeed);

                setTimeout(function () {
                    $("#randomArticle-2").load(files[(relativePosition + 1) % files.length]);
                    $("#randomArticle-2").fadeIn(fadeSpeed);
                }, fadeSpeed);

            }, 200);

            setTimeout(function () {
                $("#randomArticle-1").fadeOut(fadeSpeed);

                setTimeout(function () {
                    $("#randomArticle-1").load(files[(relativePosition)]);
                    $("#randomArticle-1").fadeIn(fadeSpeed);
                }, fadeSpeed);

            }, fadeSpeed);
        });
    })
</script>
</body>
</html>
