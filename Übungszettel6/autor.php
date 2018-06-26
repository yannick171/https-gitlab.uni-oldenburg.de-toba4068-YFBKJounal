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
    <div class="trennlinie" ></div>

    <!--- Profil  --->
    <?php include ("ressources/snippets/profile.php"); ?>

    <div class="trennlinie"></div>
      <div class="uploadArea">
        <button type="button" class="btn btn-primary btn-lg btn-block" id="startUpload">Neuen Artikel einreichen</button>
      <div>
          <form method="post" action="ressources/snippets/uploadFile.php" enctype="multipart/form-data" class="uploadAreaInvisible" id="uploadArea">
            <div class="form-group">
              <label for="uploadFile">Artikel hochladen:</label>
              <input type="file" class="form-control-file" id="uploadFile" name="uploadFile">
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
              require "ressources/snippets/loadarticles.php";
              $result = showArticles(0,$_SESSION["userId"]);
                $counterWaiting = 0;
                foreach ($result as $row) {
                    //print_r($row);
                    echo '<form action="ressources/snippets/withdrawArticle.php" method="post"><tr><th scope="row"><input value="Zurückziehen" type="submit" name="' . $row["id"] . '"></form></th>';
                    echo '<td>'.$row["title"]. '</td>';
                    echo '<td>'.$row["author"]. '</td>';
                    echo '<td>'.$row["uploadDate"]. '</td>';
                    echo "</tr>";
                    ++$counterWaiting;
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
                  $counterAccepted = 1;

                  $result = showArticles(1,$_SESSION["userId"]);
                  foreach ($result as $row) {
                      //print_r($row);
                      echo '<tr><th></th>';
                      echo '<td>'.$row["title"]. '</td>';
                      echo '<td>'.$row["author"]. '</td>';
                      echo '<td>'.$row["uploadDate"]. '</td>';
                      echo "</tr>";
                      ++$counterAccepted;
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
              $counterAbgelehnt = 1;

              $result = showArticles(1,$_SESSION["userId"]);
              foreach ($result as $row) {
                  //print_r($row);
                  echo '<tr><th></th>';
                  echo '<td>'.$row["title"]. '</td>';
                  echo '<td>'.$row["author"]. '</td>';
                  echo '<td>'.$row["uploadDate"]. '</td>';
                  echo "</tr>";
                  ++$counterAbgelehnt;
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
