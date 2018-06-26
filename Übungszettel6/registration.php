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
			$userDb = new PDO('sqlite:ressources/SQLData/user.db');
			
			$emailerr = False;
			
			if(isset($_POST["email"]))
			{
				$sql = "SELECT email FROM user";
				
			    $result = $userDb->query($sql);
				if ($result) 
				{
					foreach($result as $row)
					{
						if(strcmp($row['email'], $_POST["email"]) == 0)
						{
							//Muh! Es gibt die email schon!
							$emailerr = True;
						}
					}
				}
			}
		
			if(isset($_POST["email"]) && !$emailerr)
			{
				
				$sql = "SELECT * FROM user";
				
			    if (!$userDb ->query($sql)) {
					$userDb->exec("CREATE TABLE user (
									id integer PRIMARY KEY AUTOINCREMENT,
									email VARCHAR(100),
									password VARCHAR(100),
									firstName VARCHAR(20),
									lastName VARCHAR(20),
									regDate VARCHAR(20),
									infoText TEXT
									)");
				
					$userDb->exec("INSERT INTO user (email, firstName, lastName, password, infoText) VALUES ('test@test.test','TestVorname', 'TestNachname', 'test', 'Ich bin ein Testprofil')");
				}
				
				try
				{
					$userDb->beginTransaction();
					$sql = "INSERT INTO user (email, firstName, lastName, password, infoText, regDate) VALUES (:paramEmail, :paramFName, :paramLName, :paramPswd, '---', '" . date("d.m.Y") . "')";
					$stmt = $userDb->prepare($sql);
					$stmt->bindParam(":paramEmail", $_POST["email"]);
					$stmt->bindParam(":paramFName", $_POST["firstname"]);
					$stmt->bindParam(":paramLName", $_POST["lastname"]);
					$stmt->bindParam(":paramPswd" , $_POST["pswd"]);
					$stmt->execute();
					$userDb->commit();
				} 
				catch (Exception $ex)
				{
					$articlesDb->rollBack();
					echo "Error: " . $ex;
				}
				
				echo'
				<main class="defaultstyle">
				<div class ="container">
					<h2>Registration</h2>
					<br>
					Du bist nun registriert! 
				</div>';
				
				// close the database connection
				$userDb = NULL;
	
				echo'</main>';
			}
			else
			{
				echo'
		
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
                    <p id = "error" style="color:red">';
					if($emailerr)
					{
						echo 'Die Angegebene Email existiert bereits!';
					}
					echo'
                    </p>

                </form>
				<button onclick="validateForm()">Registrieren</button>
            </div>
        </main>';
			}
		?>

		
        <?php include ("ressources/snippets/footer.php") ;?>
        <?php include ("ressources/snippets/loadjavascript.php") ;?>
        <script src = "ressources/js/formvalid.js"></script>
    </body>
</html>
