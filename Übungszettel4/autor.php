<?php
  include("ressources/snippets/session.php");
 ?>

<?php
$string = file_get_contents("ressources/json/article.json");
$articles = json_decode($string,true);

  $message = $error = '';

  foreach ($_POST as $name => $value) {
    if ($value=="Löschen") {
      unset($articles[substr($name,-1)]);
      $articleValues = array_values($articles);
      $updatedArticles = json_encode($articleValues);
      if(file_put_contents("ressources/json/article.json", $updatedArticles)){}else {
        echo "nicht hochgeladen";
      };
    }else {
      continue;
    }
  }

  if ( isset($_POST["titlename"]) && isset($_POST["abstract"]) ) {
    $append = array(
      "owner" => $_SESSION["email"],
      "abstract" => $_POST["abstract"],
      "title" => $_POST["titlename"],
      "authors"=> $_POST["autorvorname-1"] . " " . $_POST["autornachname-1"],
      "uploadDate" => date("r"),
      "status" => "0"
    );

    $_POST["titlename"] ="";
    array_push($articles, $append);
    $newFile = json_encode($articles);

    if (!is_writeable("ressources/json/article.json")) {
      echo "nicht writeable, ";
    }
    if(file_put_contents("ressources/json/article.json", $newFile)){}else {
      echo "nicht hochgeladen";
    };
  }
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
          <form method="post" action="" class="uploadAreaInvisible" id="uploadArea">
            <div class="form-group">
              <label for="uploadFile">Artikel hochloaden:</label>
              <input type="file" class="form-control-file" id="uploadFile" name="file">
            </div>
            <div class="form-group">
              <label for="articleTitle">Titel:</label>
              <textarea class="form-control" id="articleTitle" rows="1" name="titlename" required></textarea>
            </div>
            <div id="autorInput">
              <label>Autor(en)</label>

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
                  echo '<form action="" method="post"><tr><th scope="row"><input value="Löschen" type="submit" name="removeArticleButton-'.$counterWaiting++.'" id="'.$counterWaiting.'"></form></th>';
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

        <script>

          $(document).ready(function(){
            var autorCounter = 0;
            var newFirstNameId, newLastNameId, newAutor;


            var updateAutor=function(){
              autorCounter++;
              newFirstNameId = "vorname-" + autorCounter.toString();
              newLastNameId ="nachname-" +autorCounter.toString();
              newAutor = $('<div class="form-row"></div>').html('<div class="form-row" id="autor-'+autorCounter.toString()+'"></div>').html('<button style="" id="removeButton-' + autorCounter.toString() + '" style="background:transparent;" type = "button" class= "btn " name="logout"><i class="material-icons">clear</i></button><div class="col-md-4 mb-3"><input name="autor'+newFirstNameId+'" type="text" class="form-control" id="vorname-'+ autorCounter.toString() + '"  placeholder="Vorname"></div>'
                          + '<div class="col-md-4 mb-3"><input name="autor'+newLastNameId+'" type="text" class="form-control" id="nachname-'+ autorCounter.toString() + '"  placeholder="Nachname"></div>');
              $("#autorInput").append(newAutor);

            }
            updateAutor();


            $("#autorInput").on("click","button", function(){
              $(this).parent().remove();
            });

            $("#newAutorButton").on("click", function(){
              updateAutor();
            });



            $("#startUpload").click(function(){
                $("#uploadArea").toggle();
            });
          });
        </script>
    </body>
</html>
