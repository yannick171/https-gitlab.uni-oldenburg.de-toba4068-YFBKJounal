<?php
include("ressources/snippets/session.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Redakteur Profil - Evolve
    </title>
    <?php include("ressources/snippets/globalsources.php") ?>

    <link rel="stylesheet" type="text/css" href="ressources/redakteurseite/redakteur.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link href="ressources/css/article.css" rel="stylesheet">
    <link href="ressources/css/countdown.css" rel="stylesheet">

</head>

<body>

<?php include("ressources/snippets/head.php"); ?>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var weeks = Math.floor(distance / (1000 * 60 * 60 * 24 * 7));
        distance -= weeks * (1000 * 60 * 60 * 24 * 7);
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        distance -= days * (1000 * 60 * 60 * 24);
        var hours = Math.floor(distance / (1000 * 60 * 60));
        distance -= hours * (1000 * 60 * 60);
        var minutes = Math.floor(distance / (1000 * 60));

        // Output the result in an element with id="demo"
        document.getElementById("cdw").innerHTML = weeks;
        document.getElementById("cdd").innerHTML = days;
        document.getElementById("cdm").innerHTML = hours;
        document.getElementById("cds").innerHTML = minutes;

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>

<div class="jumbotron">
    <div id="countdown">
        <div id="cdhead">
            Countdown wie lange noch Artikel für die Ausgabe angenommen werden :
        </div>
        <div id="cdtime">
            <ul>
                <li><span id="cdw">5</span> Wochen</li>
                <li><span id="cdd"> 3</span> Tage</li>
                <li><span id="cdm">17</span> Stunden</li>
                <li><span id="cds">50</span> Minuten</li>
            </ul>
        </div>
    </div>
</div>

<main class="defaultstyle">
    <h1>Redakteur Profil</h1>
    <article>
        <section class="grid-container-article">
            <div>
                <img class="profilpic" src="ressources/redakteurseite/profilbild.png" alt="picture"/>
                <button type="button">Bild ändern</button>

            </div>
            <div>
                <p class="item2">
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
                blabla dudu ich bin so ein Typ der in seinem Leben nichts anderes zu tun hat als Artikel für
                irgendsoeine Onlinezeitschrift zu prüfen die sowieso niemand liest und weil mein leben so langweilig ist
                bin ich nicht in der Lage einen Punkt zu schreiben blbablabla
                <button type="button">Ändern</button>
            </div>
        </section>
    </article>
    <h1>
        Redakteur Profil</h1>

    <?php
    $content = file_get_contents("ressources/json/article.json");
    $articles = json_decode($content, true);
    $toProof = array();
    $proofed = array();
    $nextMagazine = array();

    foreach ($articles as $article) {
        if (strcmp($article["status"], "0") == 0) {
            array_push($toProof, $article);
        }
        if (strcmp($article["status"], "1") == 0) {
            array_push($proofed, $article);
        }
        if (strcmp($article["status"], "0") == 0) {
            array_push($nextMagazine, $article);
        }
    }
    ?>
    <h1>Arbeitsbereich</h1>

    <div class="parentContainer">
        <div class="containerElement">
            <h2 id="zuPrüfen" class=workingArea>
                zu prüfen
            </h2>
            <ul id="todoArticles" class="list-group">

                <?php
                foreach ($toProof as $proof) {
                    $id = uniqid();
                    echo '<li class = "list-group-item">'
                        . '<div class="card margin">'
                        . '<div class="card-header">'
                        . '<h5 class="mb-0">'
                        . '<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#' . $id . '" aria-expanded="false" aria-controls="' . $id . '">'
                        . $proof["title"]
                        . '</h5>'
                        . '</div>'
                        . '<div id="' . $id . '" class="collapse" aria-labelledby="headingFour">'
                        . '<div class="card-body">'
                        . $proof["abstract"]
                        . '</div>'
                        . '</div>'
                        . '</div>'
                        . '</li>';
                }
                ?>
            </ul>
        </div>
        <div class="containerElement">
            <h2 id="geprüft" class="workingArea">
                geprüft
            </h2>
            <ul id="acceptedArticles" class="list-group">
                <?php
                foreach ($proofed as $proof) {
                    $id = uniqid();
                    echo '<li class = "list-group-item">'
                        . '<div class="card margin">'
                        . '<div class="card-header">'
                        . '<h5 class="mb-0">'
                        . '<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#' . $id . '" aria-expanded="false" aria-controls="' . $id . '">'
                        . $proof["title"]
                        . '</h5>'
                        . '</div>'
                        . '<div id="' . $id . '" class="collapse" aria-labelledby="headingFour">'
                        . '<div class="card-body">'
                        . $proof["abstract"]
                        . '</div>'
                        . '</div>'
                        . '</div>'
                        . '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <h1>
        Nächste Ausgabe:
    </h1>

    <div class="nextMagazine">
        <div class="parentContainer">
            <div class="containerElement">
                <div class="containerChild">
                    <h3>
                        Titel der Ausgabe
                    </h3>
                    <p id="nextMagazineTitle">
                        Neuronale Netze unter Vollauslastung
                    </p>
                    <div class="centerButton">
                        <button type="button" data-toggle="modal" data-target="#modalTitle">
                            Titel ändern
                        </button>
                    </div>
                </div>
                <div class="containerChild">
                    <h3>
                        Titelbild der Ausgabe
                    </h3>
                    <img src="ressources/archivseite/TitelSeite.jpg" alt="Titelseite des Magazins" class="centerImage">
                    <div class="centerButton">
                        <button type="button" data-toggle="modal" data-target="#modalImage">Bild ändern</button>
                    </div>
                </div>
                <div class="containerChild">
                    <h3>
                        Einleitungstext der Ausgabe
                    </h3>
                    <p>
                        Diese Ausgabe wird von Beiträgen zum Thema der Grenzen der Computational Intelligence dominiert.
                        Begleiten Sie uns auf einer Reise zu den Grenzen des Machbaren.
                        Laden Sie sich die Ausgabe <a href="ressources/archivseite/Zeitung1/Zeitung%201.txt">hier</a>
                        herunter
                    </p>
                    <div class="centerButton">
                        <button type="button" data-toggle="modal" data-target="#modalDescription">
                            Beschreibung ändern
                        </button>
                    </div>

                </div>
            </div>
            <div class="containerElement">
                <h3>
                    Inhalt
                </h3>
                <ul id="articleList" class="list-group">
                    <?php
                    foreach ($nextMagazine as $next) {
                        $id = uniqid();
                        echo '<li class = "list-group-item">'
                            . '<div class="card margin">'
                            . '<div class="card-header">'
                            . '<h5 class="mb-0">'
                            . '<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#' . $id . '" aria-expanded="false" aria-controls="' . $id . '">'
                            . $next["title"]
                            . '</h5>'
                            . '</div>'
                            . '<div id="' . $id . '" class="collapse" aria-labelledby="headingFour">'
                            . '<div class="card-body">'
                            . $next["abstract"]
                            . '</div>'
                            . '</div>'
                            . '</div>'
                            . '<div class="centerButton">'
                            . '<button type="button" class="btn btn-danger">Artikel löschen</button>'
                            . '</div>'
                            . '</li>';

                    }
                    ?>
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
<?php include("ressources/snippets/footer.php"); ?>
<?php include("ressources/snippets/loadjavascript.php"); ?>
<?php include("ressources/snippets/loadjavascriptRedakteur.php"); ?>
</body>
</html>
