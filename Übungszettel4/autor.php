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

        echo '<div class="autorInfobox">';
        echo "<strong>Name: </strong>" . $user[user1]["nachname"] . '<br><br>';
        echo "<strong>Vorname: </strong>" . $user[user1]["vorname"] . "<br><br>" ;
        echo "<strong>E-Mail: </strong>" . $user[user1]["email"] . "<br><br>" ;
        echo '</div>';

        echo '<div class="autorIntrobox">';
        echo $user[user1]["infoText"] . "<br><br>" ;
        echo '</div>';
      ?>
      <div class="uploadArea">
        <button type="button" class="btn btn-primary btn-lg btn-block" id="startUpload">Neuen Artikel einreichen</button>
      <div>
          <form class="uploadAreaInvisible" id="uploadArea">
            <div class="form-group">
              <label for="uploadFile">Artikel hochloaden:</label>
              <input type="file" class="form-control-file" id="uploadFile">
            </div>
            <div class="form-group">
              <label for="articleTitle">Titel:</label>
              <textarea class="form-control" id="articleTitle" rows="1"></textarea>
            </div>
            <div id="autorInput">
              <label>Autor(en)</label>
                <div class="form-row">
                </div>
            </div>
              <div class="form-group">
                <label for="abstract">Kurze Inhaltsangabe:</label>
                <textarea class="form-control" id="abstract" rows="10"></textarea>
              </div>
              <button class="btn-primary" id="artikelEinreichen" >Einreichen</button>
          </form>
      </div>
      <div class="articleInformation-1">
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

                $counterWaiting = 1;
                foreach ($articleInfos as $key) {
                  if ($key["owner"] != "user1" || $key["status"] != "0") {
                    continue;
                  };
                  echo '<tr><th scope="row">'.$counterWaiting++. '</th>';
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
                  if ($key["owner"] != "user1" || $key["status"] != "1") {
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
                  if ($key["owner"] != "user1" || $key["status"] != "2") {
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
</div>
        <?php include ("ressources/snippets/footer.php") ;?>
        <?php include ("ressources/snippets/loadjavascript.php") ;?>

        <script>

          $(document).ready(function(){
            var autorCounter = 0;
            var newFirstNameId, newLastNameId, newAutor;

            var updateAutor=function(){
              $("#autorInput").append(newAutor);
              autorCounter++;
              newFirstNameId = "vorname-" + autorCounter.toString();
              newLastNameId ="nachname-" +autorCounter.toString();
              newAutor = $('<div class="form-row"></div').html('<div class="col-md-4 mb-3"><input type="text" class="form-control" id="vorname-'+ autorCounter.toString() + '"  placeholder="Vorname"></div>'
                          + '<div class="col-md-4 mb-3"><input type="text" class="form-control" id="nachname-'+ autorCounter.toString() + '"  placeholder="Nachname"></div>');
              $("#autorInput").append(newAutor);
            }

            updateAutor();

            $("#autorInput").on("change", "input", function(){
              if ($("#"+newFirstNameId).val() && $("#"+newLastNameId).val()) {
                $("#"+newLastNameId +",#"+newFirstNameId).unbind("change");
                updateAutor();
              }
            });

            $("#startUpload").click(function(){
                $("#uploadArea").toggle();
            });
          });
        </script>
    </body>
</html>
