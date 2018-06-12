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
        <?php include ("ressources/snippets/head.php");?>

		<?php
			if(isset($_POST["email"]))
			{
				$string = file_get_contents("ressources/json/user.json");
				$articles = json_decode($string);
				$newUser = array
				(
					"email" => $_POST["email"],
					"passwort" => $_POST["pswd"],
					"vorname" => $_POST["firstname"],
					"nachname" => $_POST["lastname"],
					"regDate" => date("d.m.Y"),
					"infoText" => "Leer"
				);
				
				array_push($articles, $newUser);
				$string = json_encode($articles, JSON_PRETTY_PRINT);
				file_put_contents("ressources/json/user.json", $string);
				
				echo'
		<main class="defaultstyle">
            <div class ="container">
                <h2>Registration</h2>
				<br>
				Du bist nun registriert!
			</div>
		</main>
				';
			}
			else
			{
				echo'
		<script src = "ressources/js/formvalid.js"></script>
        <main class="defaultstyle">
            <div class ="container">
                <h2>Registration</h2>
                <form action="registration.php" id="registerform" method="post">
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
        </main>';
			}
		?>

		
        <?php include ("ressources/snippets/footer.php") ;?>
        <?php include ("ressources/snippets/loadjavascript.php") ;?>
    </body>
</html>
