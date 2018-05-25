<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" type="text/css" href="ressources/startseite/grid.css">

  <?php include("ressources/snippets/globalsources.php") ?>

</head>

<body>

  <!-- Header -->
  <?php include ("ressources/snippets/head.php") ;?>

<div class="hintergrundbild">
  <div class="defaultstyle">
    <main class="">
        <div class="wrapper">
          <div class="box-1">
            <img class="introimg" src="ressources/startseite/introimg.jpg">
          </div>
          <div class="box-2">
            <h2>sharing is caring!</h2> Hier findet ihr eine Plattform zur veröffentlichung eurer Artikel, egal ob Fuzzylogik, künstliche neurale Netze, Evolutionäre Algorithmen oder andere Themen aus der KI. Helft uns dabei das Interesse an der KI weiter zu erhalten. Hier finden alle
            eure Beiträge gehör.  Hier findet ihr eine Plattform zur veröffentlichung eurer Artikel, egal ob Fuzzylogik, künstliche neurale Netze, Evolutionäre Algorithmen oder andere Themen aus der KI. Helft uns dabei das Interesse an der KI weiter zu erhalten. Hier finden alle
            eure Beiträge gehör.  Hier findet ihr eine Plattform zur veröffentlichung eurer Artikel, egal ob Fuzzylogik, künstliche neurale Netze, Evolutionäre Algorithmen oder andere Themen aus der KI. Helft uns dabei das Interesse an der KI weiter zu erhalten. Hier finden alle
            eure Beiträge gehör.
          </div>
          <div class="box-4">
            <h2>Aktuelle Ausgabe</h2>
            <h3>Do Voles Select Dense Vegetation for Movement Pathways at the Microhabitat Level?</h3>

            <h6>Biological Sciences</h6>
            The relationship between habitat use by voles (Rodentia: Microtus) and the density of vegetative cover was
            studied to determine if voles select forage areas at the microhabitat level.  Using live traps, I trapped,
            powdered, and released voles at 10 sites.  At each trap site I analyzed the type and height of the vegetation
            in the immediate area.  Using a black light, I followed the trails left by powdered voles through the vegetation.  I mapped the trails using a compass to ascertain the tortuosity, or amount the trail twisted and turned, and visually checked the trails to determine obstruction of the movement path by vegetation.  I also checked vegetative obstruction on 4 random paths near the actual trail, to compare the cover on the trail with other nearby alternative pathways.  There was not a statistically significant difference between the amount of cover on a vole trail and the cover off to the sides of the trail when
            completely covered; there was a significant difference between on and off the trail when the path was completely
            open.  These results indicate that voles are selectively avoiding bare areas, while not choosing among dense patches
            at a fine microhabitat scale.
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      1. Neue Erkenntnisse im Bereich der Fuzzy-Logik
                    </button>
                  </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    Aufgrund langer und intensiver Forschung konnten ich, der großartige Huan Lee,
                    und mein Team neue Erkenntnisse im Bereich der Fuzzy-Logik gewinnen. Welche dies genau sind,
                    können Sie in <a href="ressources/archivseite/Zeitung1/Fuzzy-Logik.txt">folgendem Artikel </a>lesen.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      2. Der Durchbruch im Verständnis der temporalen Logik
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    Dieses Paper widmet sich der Frage nach dem Verständnis der temporalen Logik. Der Schlüsssel
                          unserer Forschung ist die Annahme, dass das Wichtigste bei dieser Diziplin das Tempo ist.Wie genau
                          das Tempo maßgeblich für das Verstehen der temporalen Logik ist,
                          können Sie in <a href="ressources/archivseite/Zeitung1/temporale-Logik.txt">folgendem Artikel </a>lesen.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      3. Neuer Durchbruch im Bereich der neuronalen Netze nutzenden Ki
                    </button>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    In diesem Paper geht es darum, wie Forscher Edward Schneitzel mit seinen Mitarbeitern des renormierten Instituts Berkely für angewandte
                    Neurolinguistik es geschafft hat einer KI das Dichten wie Shakespeare innnerhalb weniger Stunden anzutrainieren. Es wurde dafür eine
                    neue Technik namens Randolinguisierung angewandt, bei der zufällig Wörterketten produziert werden. Das Ergebnis imitiert Shakespeare

                    perfekt. Lesen Sie den vollständigen Artikel <a href="ressources/archivseite/Zeitung1/ki.txt">hier.</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row" id="artikel">
        <div onload="slider()" src="/ressources/archiv/artikel/artikel1.txt" class="randomArticle1" id="randomArticleSlot1">

        </div>
        <div src=""; class="randomArticle2" id="randomArticleSlot2">
          test2
        </div>
        <div class="randomArticle3" id="randomArticleSlot3">
          test3
        </div>
  </main>
</div>
</div>

  <?php include ("ressources/snippets/footer.php") ;?>

  <?php include ("ressources/snippets/loadjavascript.php") ;?>

  <script>
    var folder = "/ressources/archiv/artikel/"
    var files = [folder + "artikel1.txt",folder + "artikel2.txt",folder + "artikel3.txt",folder + "artikel4.txt", folder + "artikel5.txt",folder + "artikel6.txt",folder + "artikel7.txt",folder + "artikel8.txt"];
    var counter = 0;

    //Permutation der Dateien um "Zufälligkeit" zu erzeugen
    for(var i=0; i < files.length; i++){
      var randomIndex = Math.floor(Math.random()*(files.length-1));
      var temp = files[randomIndex];
      files[randomIndex] = files[i];
      files[i] = temp;
    }


    function slider(){
      counter = (counter+3) % files.length;

      for(var i= 1; i < 4; i++){
        $("#randomArticle"+i).load(files[counter-i]);
      }
    }
  </script>
</body>
</html>
