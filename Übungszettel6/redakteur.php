<?php
$articlesDb = new PDO('sqlite:articles.db');
$toProof = array();
$proofed = array();
$nextMagazine = array();

$result = $articlesDb->query('SELECT * FROM article');

foreach ($result as $article) {
    if (strcmp($article["statusOfArticle"], "0") == 0) {
        array_push($toProof, $article);
    }
    if (strcmp($article["statusOfArticle"], "1") == 0) {
        array_push($proofed, $article);
    }
    if (strcmp($article["statusOfArticle"], "2") == 0) {
        array_push($nextMagazine, $article);
    }
}

// so muss man das Ding aufspalten, weil php Probleme hat, wenn der String mit einem Delimiter anfängt
if(isset($_GET["id"])) {
    $url = $_SERVER['QUERY_STRING'];
    $idsWitoutAnd = str_replace("&", "", $url);
    $idsWithSpace = str_replace("id=", " ", $idsWitoutAnd);
    $split = str_split($idsWithSpace);
    global $repaired;
    $length = count($split);
    for ($i = 1; $i < $length; $i++) {
        $repaired = $repaired . $split[$i];
    }
    $idParts = preg_split("/[\s,]+/", $repaired);
}
if (isset($_GET['id']) && isset($_GET['proofed'])) {
    foreach ($idParts as $entry) {

        $sql = "UPDATE article SET statusOfArticle = 1 WHERE id = " . $entry;
        $articlesDb->exec($sql);
        /*header("Refresh: ". $_SERVER['PHP_SELF']);*/
        header("location: redakteur.php");
    }
}
if (isset($_GET['id']) && isset($_GET['toProof'])) {
    foreach ($idParts as $entry) {
        $sql = "UPDATE article SET statusOfArticle = 0 WHERE id = " . $entry;
        $articlesDb->exec($sql);
        //header("Refresh: ". $_SERVER['PHP_SELF']);
        header("location: redakteur.php");
    }
}


/*$getAllElements = $articlesDb->query("SELECT * FROM article");
while ($zeile = $getAllElements->fetch()){
    $isInList = 0;
    for($i = 0; $i < count($idParts); $i++) {
        if($zeile["id"] == $idParts[$i])
        {
            $isInList = 1;
        }
    }
    if($isInList == 0)
    {
        $deleteZeile = "DELETE FROM article WHERE id = ". $zeile["id"];
        $articlesDb->exec($deleteZeile);
    }
}
/*parse_str($_GET['id'], $ids);
echo $ids[0];
echo $ids['id'][1];
echo $_GET['id'];*/

?>
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
    <?php include ("ressources/SQLData/initMagazine.php"); ?>
    <!--?php include("ressources/redakteurseite/php/updateAccepted.php");?-->

    <link rel="stylesheet" type="text/css" href="ressources/redakteurseite/redakteur.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link href="ressources/css/article.css" rel="stylesheet">
    <link href="ressources/css/countdown.css" rel="stylesheet">

</head>

<body>

<?php include("ressources/snippets/head.php"); ?>
<?php
include("ressources/SQLData/initArticledb.php");
?>

<!--script>
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
</script-->
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

    ?>
    <h1>Arbeitsbereich</h1>


    <div class="parentContainer">
        <form method="get" action= <?php $_SERVER['PHP_SELF'] ?>>
            <div class="containerElement">
                <h2 id="zuPrüfen" class=workingArea>
                    zu prüfen
                </h2>
                <input type="hidden" name="toProof" value="proof">
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
                            . '<input type="hidden" name="id" value="' . $proof["id"] . '">'
                            . '</li>';
                    }
                    ?>
                </ul>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Speichern</button>
        </form>
        <form method="get" action= <?php $_SERVER['PHP_SELF'] ?>>
            <div class="containerElement">
                <h2 id="geprüft" class="workingArea">
                    geprüft
                </h2>
                <input type="hidden" name="proofed" value="proof">
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
                            . '<input type="hidden" name="id" value="' . $proof["id"] . '">'
                            . '</li>';
                    }
                    ?>
                </ul>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Speichern</button>
        </form>
    </div>


    <h1>
        Nächste Ausgabe:
    </h1>
    <?php
    $MagazineDb = new PDO('sqlite:magazines.db');
    $resultMagazine = $MagazineDb->query('SELECT * FROM Magazine');
    $newestMagazine = $resultMagazine->fetch();
    //echo fetchAll($resultMagazine);
    while ($magazine = $resultMagazine->fetch()) {
        if (($magazine["id"] > $newestMagazine["id"]) || is_null($newestMagazine)) {
            $newestMagazine = $magazine;
        }
    }

    ?>


    <div class="nextMagazine">
        <div class="parentContainer">
            <div class="containerElement">
                <div class="containerChild">
                    <h3>
                        Titel der Ausgabe
                    </h3>
                    <p id="nextMagazineTitle">
                        <?php echo $newestMagazine["title"];?>
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
                        <?php echo $newestMagazine["description"];?>
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
                </form>
            </div>
        </div>
    </div>

</main>
<?php include("ressources/snippets/footer.php"); ?>
<?php include("ressources/snippets/loadjavascript.php"); ?>
<?php include("ressources/snippets/loadjavascriptRedakteur.php"); ?>
</body>
</html>
