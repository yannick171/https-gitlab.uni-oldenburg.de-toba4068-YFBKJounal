<?php
include("ressources/snippets/session.php");

if (!isset($_SESSION) || empty($_SESSION) || !$_SESSION['loggedIn'])
{
    header("Location: startseite.php");
}
?>
<!--?php include("ressources/SQLData/initArticledb.php"); ?-->
<!--?php include("ressources/SQLData/initMagazine.php"); ?-->

<?php include("initDatabase.php"); ?>
<!--PHP Script for sorting Articles in the Lists and save modified Lists -->
<?php
$articlesDb = new PDO('sqlite:ressources/SQLData/articles.db');
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
?>

<!-- PHP Script for getting the newest Magazine-->
<?php
$MagazineDb = new PDO('sqlite:ressources/SQLData/magazines.db');
$resultMagazine = $MagazineDb->query('SELECT * FROM Magazine');
global $newestMagazine;
$newestMagazine = $resultMagazine->fetch();
while ($magazine = $resultMagazine->fetch()) {
    if (($magazine["id"] > $newestMagazine["id"]) || is_null($newestMagazine)) {
        $newestMagazine = $magazine;
    }
}

?>
<!-- PHP Script for changing the Despription for the next Magazine-->
<?php

if (isset($_POST["newDescription"])) {
    $description = $_POST['newDescription'];
    $newMagazineId = $newestMagazine["id"];
    $MagazineDb = new PDO('sqlite:ressources/SQLData/magazines.db');
    $updateDescription = "UPDATE Magazine SET description = '$description' WHERE id = '$newMagazineId'";
    $ergebnis = $MagazineDb->exec($updateDescription);
    header("location: redakteur.php");
}
?>
<!-- PHP Script for changing the Title of the next Magazine-->
<?php
if (isset($_POST['newTitle'])) {
    $title = $_POST['newTitle'];
    $newMagazineId = $newestMagazine["id"];
    $MagazineDb = new PDO('sqlite:ressources/SQLData/magazines.db');
    $updateTitle = "UPDATE Magazine SET title = '$title' WHERE id = '$newMagazineId'";
    $ergebnis1 = $MagazineDb->exec($updateTitle);
    header("location: redakteur.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Redakteur Profil - Evolve
    </title>
    <?php include("ressources/snippets/globalsources.php") ?>

    <!--?php include("ressources/redakteurseite/php/updateAccepted.php");?-->

    <link rel="stylesheet" type="text/css" href="ressources/css/autorseite.css">
    <link rel="stylesheet" type="text/css" href="ressources/redakteurseite/redakteur.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link href="ressources/css/article.css" rel="stylesheet">
    <link href="ressources/css/countdown.css" rel="stylesheet">

</head>

<body>

<?php include("ressources/snippets/head.php"); ?>


<main class="defaultstyle">

    <?php include("ressources/snippets/profile.php"); ?>

    <div class="trennlinie"></div>

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
                        . htmlspecialchars($proof["title"])
                        . '</h5>'
                        . '</div>'
                        . '<div id="' . $id . '" class="collapse" aria-labelledby="headingFour">'
                        . '<div class="card-body">'
                        . htmlspecialchars($proof["abstract"])
                        . '</div>'
                        . '<button onclick="addArticleToProofed(' . $proof["id"] . ')" class="btn btn-success btn-block">Artikel als geprüft markieren</button>'
                        . '<button onclick="addArticleToDeclinedToProof(' .$proof["id"] . ')" class="btn btn-danger btn-block">Artikel ablehnen</button>'
                        . '</div>'
                        . '</div>'
                        . '<input type="hidden" name="id" value="' . $proof["id"] . '">'
                        . '</li>';
                }
                ?>
            </ul>
        </div>

        <input type="hidden" name="seperator" value="a">
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
                        . htmlspecialchars($proof["title"])
                        . '</h5>'
                        . '</div>'
                        . '<div id="' . $id . '" class="collapse" aria-labelledby="headingFour">'
                        . '<div class="card-body">'
                        . htmlspecialchars($proof["abstract"])
                        . '</div>'
                        . '<button onclick="addArticleToMagazine(' . $proof["id"] . ')" class="btn btn-success btn-block">Artikel zur nächsten Ausgabe hinzufügen</button>'
                        . '<button onclick="addArticleToDeclinedProofed(' . $proof["id"] . ')" class="btn btn-danger btn-block">Artikel ablehnen</button>'
                        . '</div>'
                        . '</div>'
                        . '<input type="hidden" name="id" value="' . $proof["id"] . '">'
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
                        <?php echo htmlspecialchars($newestMagazine["title"]); ?>
                    </p>
                    <div class="centerButton">
                        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalTitle">
                            Titel ändern
                        </button>
                    </div>
                </div>
                <div class="containerChild">
                    <h3>
                        Einleitungstext der Ausgabe
                    </h3>
                    <span style="display: block; word-wrap:break-word;">
                        <?php echo htmlspecialchars($newestMagazine["description"]); ?>
                    </span>
                    <div class="centerButton">
                        <button class="btn btn-default" data-toggle="modal" data-target="#modalDescription">
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
                            . htmlspecialchars($next["title"])
                            . '</h5>'
                            . '</div>'
                            . '<div id="' . $id . '" class="collapse" aria-labelledby="headingFour">'
                            . '<div class="card-body">'
                            . htmlspecialchars($next["abstract"])
                            . '</div>'
                            . '<button onclick="addArticleToProofedFromNextMagazine(' . $next["id"] . ')" class="btn btn-warning btn-block">Artikel nach geprüft zurücklegen</button>'
                            . '<button onclick="addArticleToDeclinedNextMagazine(' . $next["id"] . ')" class="btn btn-danger btn-block">Artikel ablehnen</button>'
                            . '</div>'
                            . '</div>'
                            . '<input type="hidden" name="id" value="' . $next["id"] . '">'
                            . '</li>';

                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <button type="submit" onclick="publish()" class="btn btn-primary btn-block">Ausgabe veröffentlichen</button>
    <!-- Here are the Modals-->

    <!-- Modal -->
    <div class="modal fade" id="modalTitle" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" action= <?php $_SERVER['PHP_SELF'] ?>>
                    <div class="modal-body">
                        <p>Geben Sie den neuen Titel ein : </p>
                        <input name="newTitle" class="form-control mr-sm-2" type="text" placeholder="..."
                               aria-label="text">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Anwenden</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalDescription" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" action= <?php $_SERVER['PHP_SELF'] ?>>
                    <div class="modal-body">
                        <p>Geben Sie eine neue Beschreibung an : </p>
                        <div class="form-group">
                            <label for="discription">neue Beschreibung : </label>
                            <textarea class="form-control" rows="5" id="comment" name="newDescription"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Anwenden</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</main>
<?php include("ressources/snippets/footer.php"); ?>
<?php include("ressources/snippets/loadjavascript.php"); ?>
<?php include("ressources/snippets/loadjavascriptRedakteur.php"); ?>

<script src="ressources/js/formvalid.js"></script>
<script src="ressources/js/profile.js"></script>
</body>
</html>
