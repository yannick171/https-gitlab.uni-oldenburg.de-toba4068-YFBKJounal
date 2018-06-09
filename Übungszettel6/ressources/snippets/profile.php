<!--- Profil -->
    <div class="wrapper" id="autorProfil">
      <div class='changeProfileButton'>
        <a id="autorProfilButton">Profil bearbeiten</a>
      </div>
      <div class="metadata">
        <strong>Name: </strong><br><br>
        <strong>Vorname: </strong><br><br>
        <strong>E-Mail: </strong>
      </div>
        <?php
          $string = file_get_contents("ressources/json/user.json");
          $user = json_decode($string, true);

          echo '<div class="autorInfobox autorInformationStyle">';
          echo $_SESSION["nachname"] . '<br><br>';
          echo $_SESSION["vorname"] . "<br><br>" ;
          echo $_SESSION["email"] . "<br><br>" ;
          echo '</div>';

          echo '<div class="autorIntrobox autorInformationStyle">';
          echo $_SESSION["infoText"] . "<br><br>" ;
          echo '</div>';
        ?>
      </div>
      <!--- Profil ende -->
      <script src = "ressources/js/changeProfile.js"></script>
      <!-- Profil bearbeiten -->
      <form method="post" action="asd">
      <div class="wrapper" id="autorProfilBearbeiten">
        <div class="changeProfileButton">
          <a href="#" onclick="$(this).closest('form').submit()" class="zustimmen"> Bestätigen </a>
          <a class="verwerfen"> Verwerfen </a>
        </div>
        <div class="metadata">

        </div>
        <div class="autorInfobox autorInformationStyle">
          <strong>Name: </strong> <input class="form-control" type="text" name="email" value="<?php echo $_SESSION["vorname"]; ?>"><br><br>
          <strong>Vorname: </strong><input class="form-control" type="text" name="vorname" value="<?php echo $_SESSION["nachname"]; ?>"><br><br>
          <strong>E-Mail: </strong><input class="form-control" type="email" name="nachname" value="<?php echo $_SESSION["email"]; ?>"><br><br>
        </div>
        <div class="<div class="autorIntrobox autorInformationStyle">
          <p><strong>Was wollt ihr den Besuchern Ihres Profils mitteilen?:</strong></p>
          <textarea style="font-size: 20px;" class="form-control" rows="9" name="abstract"><?php echo $_SESSION["infoText"]; ?></textarea>
        </div>
    </div>
    </form>    
        <!-- Profil bearbeiten ende -->