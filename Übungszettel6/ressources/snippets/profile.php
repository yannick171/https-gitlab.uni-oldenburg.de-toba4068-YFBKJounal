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

          echo '<div id="autorbox" class="autorInfobox autorInformationStyle">';
          echo $_SESSION["nachname"] . '<br><br>';
          echo $_SESSION["vorname"] . "<br><br>" ;
          echo $_SESSION["email"] . "<br><br>" ;
          echo '</div>';

          echo '<div id="autorinfobox" class="autorIntrobox autorInformationStyle">';
          echo $_SESSION["infoText"] . "<br><br>" ;
          echo '</div>';
        ?>
      </div>
      <!--- Profil ende -->

      <!-- Profil bearbeiten -->
      <form id="toSubmit">
      <div class="wrapper" id="autorProfilBearbeiten">
        <div class="changeProfileButton">
          <!--a href="#" onclick="$(this).closest('form').submit()" class="zustimmen"> Bestätigen </a-->
            <!--a href="#" onclick="validateForm()" class="zustimmen"> Bestätigen </a -->
            <button onclick="$(this).closest('form').submit()">Bestätigen</button>
          <a href="#" class="verwerfen"> Verwerfen </a>
        </div>
        <div class="metadata">

        </div>
        <div class="autorInfobox autorInformationStyle">
            <strong>Name: </strong> <input id="nachnameInput" class="form-control toCheck" type="text" name="nachname" value="<?php echo $_SESSION["nachname"]; ?>"><br><br>
            <strong>Vorname: </strong><input id="vornameInput" class="form-control toCheck" type="text" name="vorname" value="<?php echo $_SESSION["vorname"]; ?>"><br><br>
            <strong>E-Mail: </strong><input id="email" class="form-control toCheck" type="email" name="email" value="<?php echo $_SESSION["email"]; ?>"><br><br>
            <div id="error"></div>
        </div>
        <div class="<div class="autorIntrobox autorInformationStyle">
          <p><strong>Was wollt ihr den Besuchern Ihres Profils mitteilen?:</strong></p>
          <textarea id="infotextInput" style="font-size: 20px;" class="form-control toCheck" rows="9" name="infoText"><?php echo $_SESSION["infoText"]; ?></textarea>
        </div>
    </div>
    </form>    

