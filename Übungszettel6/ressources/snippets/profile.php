<!--- Profil -->
<html>
	<head>  
	
	<link rel = "stylesheet" type="text/css" href = "ressources/css/Button.css">
	</head>
<body>
    <div class="wrapper" id="autorProfil">
      <div class='changeProfileButton'>
        <button id="autorProfilButton" class="zustimmen">Profil bearbeiten</button>
          <button id="changePasswordButton" class="verwerfen">Passwort ändern</button>
      </div>
        <?php

          echo '<div id="autorbox" class="autorInfobox autorInformationStyle">';
          echo '<table><tr><td><b>Nachname: </b></td><td id="nachnameProfil">' . $_SESSION["nachname"] . '</td></tr>';
            echo '<tr><td><b>Vorname: </b></td><td id="vornameProfil">' .$_SESSION["vorname"]. '</td></tr>';
        echo '<tr><td><b>E-Mail: </b></td><td id="emailProfil">' .$_SESSION["email"] .'</td></tr></table>';
          echo '</div>';

          echo '<div id="autorinfobox" class="autorIntrobox autorInformationStyle">';
          echo '<p id="abstractProfil">' . $_SESSION["infoText"] . '</p>' ;
          echo '</div>';
        ?>
      </div>
      <!--- Profil ende -->

<form id="toSubmitPw" method="post">
    <div class="wrapper" id="autorChangepw">
        <div class='changeProfileButton'>
            <button type="submit" id="savePw" class="zustimmen">Bestätigen</button>
            <button class="verwerfen">Zurück</button>
        </div>
        <div class="autorIntrobox">
            <table>
                <tr>
                    <td>
                        <b>Altes Passwort:</b>
                    </td>
                    <td>
                        <input type="password" name="oldpw" id="oldpw">
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Neues Passwort:</b>
                    </td>
                    <td>
                        <input type="password" name="newpw1" id="newpw1">
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Neues Passwort wiederholen:</b>
                    </td>
                    <td>
                        <input type="password" name="newpw2" id="newpw2">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" id="errorChangePw" style="color: red"></td>
                </tr>
            </table>
        </div>
    </div>
</form>
      <!-- Profil bearbeiten -->
      <form id="toSubmit">
      <div class="wrapper" id="autorProfilBearbeiten">
        <div class="changeProfileButton">
            <button type="submit" style="float:left; padding-left:10%">Bestätigen</button>
          <button class="verwerfen"> Verwerfen </button>
        </div>
        <div class="metadata">

        </div>
        <div class="autorInfobox autorInformationStyle">
            <strong>Name: </strong> <input id="lname" class="form-control toCheck" type="text" name="nachname" value="<?php echo htmlspecialchars($_SESSION["nachname"]); ?>"><br><br>
            <strong>Vorname: </strong><input id="fname" class="form-control toCheck" type="text" name="vorname" value="<?php echo htmlspecialchars($_SESSION["vorname"]); ?>"><br><br>
            <strong>E-Mail: </strong><input id="email" class="form-control toCheck" type="email" name="email" value="<?php echo htmlspecialchars($_SESSION["email"]); ?>"><br><br>
            <div id="error"></div> 
        </div>
        <div class=div class="autorIntrobox autorInformationStyle">
          <p><strong>Was wollt ihr den Besuchern Ihres Profils mitteilen?:</strong></p>
			
		
	<form action="" method="post">
        <?php if ($_SESSION['userId']==0) {
            include("ressources/snippets/adminbutton.php");
            }
        ?>
    <textarea id="infotextInput" style="font-size: 20px;" class="form-control toCheck" rows="9" name="infoText">
        <?php
            if ($_SESSION['userId']==0) {
                echo $_SESSION["infoText"];
            }else{
                echo htmlspecialchars($_SESSION["infoText"]);
            }
        ?>
    </textarea>
					
    <script>
		
    function insertTag(startTag, endTag, textareaId, tagType) {
    var field  = document.getElementById(textareaId); 
    var scroll = field.scrollTop;
    field.focus();
        
    if (window.ActiveXObject) { // wenn es IE ist
        var textRange = document.selection.createRange();            
        var currentSelection = textRange.text;
                
        textRange.text = startTag + currentSelection + endTag;
        textRange.moveStart("character", -endTag.length - currentSelection.length);
        textRange.moveEnd("character", -endTag.length);
        textRange.select();     
    } else { // wenn nicht
        var startSelection   = field.value.substring(0, field.selectionStart);
        var currentSelection = field.value.substring(field.selectionStart, field.selectionEnd);
        var endSelection     = field.value.substring(field.selectionEnd);
                
        field.value = startSelection + startTag + currentSelection + endTag + endSelection;
        field.focus();
        field.setSelectionRange(startSelection.length + startTag.length, startSelection.length + startTag.length + currentSelection.length);
    } 

    field.scrollTop = scroll; // et on redéfinit le scroll.
}

	
	</script>
              </form>
			     
          
        </div>
    </div>
    </form>
</body>
 </html>
