<?php
  include("ressources/snippets/session.php");
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <?php include("ressources/snippets/globalsources.php");?>
        <link rel = "stylesheet" type="text/css" href = "ressources/registrierungsseite/registrierung_style_sheet.css">
    </head>
    <body>
		<script src = "ressources/js/formvalid.js"></script>
        <?php include ("ressources/snippets/head.php");?>
        <main class="defaultstyle">
            <div class ="container">
                <h2>Registration</h2>
                <form action="/action_page.php" id="registerform">
                    <div class="form-group">
                        <label for="Name">Name:</label>
                        <input type="text" class="form-control" id="fname" placeholder="Vorname" name="firstname">
                    </div>
                    <div class="form-group">
                        <label for="Vorname">Vorname:</label>
                        <input type="text" class="form-control" id="lname" placeholder="Nachname" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd2">Passwort:</label>
                        <input type="password" class="form-control" id="pwd2" placeholder="Enter password" name="pswd">
                    </div>
                    <div class="form-group">
                        <label for="pwdcnf">Passwort wiederholen:</label>
                        <input type="password" class="form-control" id="pwdcnf" placeholder="Retype password" name="pswdcnf">
                    </div>
                    <p id = "error">
                    </p>

                </form>
				<button onclick="validateForm()">Registrieren</button>
            </div>
        </main>
        <?php include ("ressources/snippets/footer.php") ;?>
        <?php include ("ressources/snippets/loadjavascript.php") ;?>
    </body>
</html>
