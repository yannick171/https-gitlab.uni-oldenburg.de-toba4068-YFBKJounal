<?php
  include("ressources/snippets/session.php");
 ?>

<!DOCTYPE html>
<html>
    <head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>
			Meine Beiträge - Evolve
		</title>
        <?php include("ressources/snippets/globalsources.php") ?>

        <link rel = "stylesheet" type="text/css" href = "ressources/autorseite/autorseite.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<!--	<link href = "ressources/css/article.css" rel= "stylesheet"> -->
	<!--	<link href = "ressources/css/countdown.css" rel = "stylesheet">-->
	</head>

	<body>

		 <?php include ("ressources/snippets/head.php") ;?>

<div class="hintergrundbild" >
	<main class="defaultstyle">
    <div class="wrapper">
        <?php
          $string = file_get_contents("ressources/json/user.json");
          $user = json_decode($string, true);

          echo '<div class="autorInfobox autorInformationStyle">';
          echo "<strong>Name: </strong>" . $_SESSION["nachname"] . '<br><br>';
          echo "<strong>Vorname: </strong>" . $_SESSION["vorname"] . "<br><br>" ;
          echo "<strong>E-Mail: </strong>" . $_SESSION["email"] . "<br><br>" ;
          echo '</div>';

          echo '<div class="autorIntrobox autorInformationStyle">';
          echo $_SESSION["infoText"] . "<br><br>" ;
          echo '</div>';
        ?>
      </div>
      <div class="uploadArea">
        <button type="button" class="btn btn-primary btn-lg btn-block" id="startUpload">Neuen Artikel einreichen</button>
      <div>
          <form method="post" action="ressources/snippets/uploadFile.php" class="uploadAreaInvisible" id="uploadArea">
            <div class="form-group">
              <label for="uploadFile">Artikel hochladen:</label>
              <input type="file" class="form-control-file" id="uploadFile" name="file">
            </div>
            <div class="form-group">
              <label for="articleTitle">Titel:</label>
              <textarea class="form-control" id="articleTitle" rows="1" name="titlename" required></textarea>
            </div>
            <div id="autorInput">
              <label>Autor(en)</label>
                <input hidden name="authorCounter" value="0" id="anzahlAutoren">
            </div>
            <button type="button" class="btn btn-info" id="newAutorButton">weiteren Autor hinzufügen</button>
            <div class="form-group">
              <label for="abstract">Kurze Inhaltsangabe:</label>
              <textarea class="form-control" id="abstract" rows="10" name="abstract"></textarea>
            </div>
            <button class="btn-primary" id="artikelEinreichen" >Einreichen</button>
          </form>
      </div>
      <div class="articleInformation-1" id="uploads">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr class="table-warning">
                <th scope="col">#</th>
                <th scope="col">In Bearbeitung</th>
                <th scope="col">
                  Autor(en)
                </th>
                <th scope="col">Eingereicht am</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $string = file_get_contents("ressources/json/article.json");
                $articleInfos = json_decode($string,true);

                $counterWaiting = 0;
                foreach ($articleInfos as $key) {
                  if ($key["owner"] != $_SESSION["email"] || $key["status"] != "0") {
                    $counterWaiting++;
                    continue;
                  };
                  echo '<form action="ressources/snippets/withdrawArticle.php" method="post"><tr><th scope="row"><input value="Zurückziehen" type="submit" name="removeArticleButton-'.$counterWaiting++.'" id="'.$counterWaiting.'"></form></th>';
                  echo '<td>'.$key["title"]. '</td>';
                  echo '<td>'.$key["authors"]. '</td>';
                  echo '<td>'.$key["uploadDate"]. '</td>';
                  echo "</tr>";
                };
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="articleInformation-2">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr class="table-success">
                <th scope="col">#</th>
                <th scope="col">Angenommene Artikel</th>
                <th scope="col">
                  Autor(en)
                </th>
                <th scope="col">Eingereicht am</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $string = file_get_contents("ressources/json/article.json");
                $articleInfos = json_decode($string,true);

                $counterAccepted = 1;
                foreach ($articleInfos as $key) {
                  if ($key["owner"] != $_SESSION["email"] || $key["status"] != "1") {
                    continue;
                  };
                  echo '<tr><th scope="row">'.$counterAccepted++. '</th>';
                  echo '<td>'.$key["title"]. '</td>';
                  echo '<td>'.$key["authors"]. '</td>';
                  echo '<td>'.$key["uploadDate"]. '</td>';
                  echo "</tr>";
                };
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="articleInformation-3">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr class="table-danger">
                <th scope="col">#</th>
                <th scope="col">Abgelehnte Artikel</th>
                <th scope="col">
                  Autor(en)
                </th>
                <th scope="col">Eingereicht am</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $string = file_get_contents("ressources/json/article.json");
                $articleInfos = json_decode($string,true);

                $counterAbgelehnt = 1;
                foreach ($articleInfos as $key) {
                  if ($key["owner"] != $_SESSION["email"] || $key["status"] != "2") {
                    continue;
                  };
                  echo '<tr><th scope="row">'.$counterAbgelehnt++. '</th>';
                  echo '<td>'.$key["title"]. '</td>';
                  echo '<td>'.$key["authors"]. '</td>';
                  echo '<td>'.$key["uploadDate"]. '</td>';
                  echo "</tr>";
                };
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div>
    </div>
	</main>
        <?php include ("ressources/snippets/footer.php") ;?>
        <?php include ("ressources/snippets/loadjavascript.php") ;?>

         <script src = "ressources/js/authorActionhandler.js"></script>
    </body>
</html>
