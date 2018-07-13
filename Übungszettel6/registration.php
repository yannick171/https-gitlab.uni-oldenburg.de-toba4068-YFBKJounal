<?php
include("ressources/snippets/session.php");

/*if (!empty($_SESSION)){
    header("Location: startseite.php");
}*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <?php include("ressources/snippets/globalsources.php");?>
    <link rel = "stylesheet" type="text/css" href = "ressources/registrierungsseite/registrierung_style_sheet.css" />
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

    if (!$userDb ->query($sql))
    {
        echo 'Error: Fehlerhanfte Datenbank!';
    }
    else
    {

        try
        {
            $passwordHashed = password_hash($_POST['pswd'], PASSWORD_DEFAULT);

            $userDb->beginTransaction();
            $stmt = $userDb->prepare("INSERT INTO user (email, firstName, lastName, password, infoText, regDate) VALUES (:em, :fn, :ln, :pw, '---', :dt)");
            $stmt->bindValue(":em", $_POST["email"]);
            $stmt->bindValue(":fn", $_POST["firstname"]);
            $stmt->bindValue(":ln", $_POST["lastname"]);
            $stmt->bindValue(":pw", $passwordHashed);
            $stmt->bindValue(":dt", date("d.m.Y"));
            $stmt->execute();

            $userDb->commit();

            $userDb->beginTransaction();
            $stmt = $userDb->prepare("SELECT firstName, lastName, infoText, id FROM user WHERE email=:inputEmail ");
            $stmt->bindValue(":inputEmail", $_POST["email"]);
            $stmt ->execute();

            $entry = $stmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION["email"] = $_POST["email"];
            $_SESSION["nachname"] = $entry["lastName"];
            $_SESSION["vorname"] = $entry["firstName"];
            $_SESSION["infoText"] = $entry["infoText"];
            $_SESSION["userId"] = $entry["id"];
            $_SESSION["loggedIn"] = "true";

            echo'
						<main class="defaultstyle">
							<div class ="container">
								<h2>Registration</h2>
								<br>
								<h3>Du bist nun registriert!</h3>
							</div>
						</main>';
        }
        catch(Exception $ex)
        {
            $userDb->rollBack();
            echo'
						<main class="defaultstyle">
							<div class ="container">
								<h2>Registration</h2>
								<br>
								<h3>Da ist etwas schiefgelaufen! Fehler: </h3> 
								'. $ex->getMessage() . '
							</div>
						</main>';
        }


    }
}
else
{
    echo'
		
        <main class="defaultstyle">
            <div class ="container">
                <h2>Registration</h2>
                <form action="registration.php" id="toSubmit" method="post">
                    <div class="form-group">
                        <label for="Name">Name:</label>
                        <input type="text" class="form-control toCheck" id="fname" placeholder="Vorname" name="firstname">
                    </div>
                    <div class="form-group">
                        <label for="Vorname">Vorname:</label>
                        <input type="text" class="form-control toCheck" id="lname" placeholder="Nachname" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control toCheck" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd2">Passwort:</label>
                        <input type="password" class="form-control toCheck" id="pwd2" placeholder="Enter password" name="pswd">
                    </div>
                    <div class="form-group">
                        <label for="pwdcnf">Passwort wiederholen:</label>
                        <input type="password" class="form-control toCheck" id="pwdcnf" placeholder="Retype password" name="pswdcnf">
                    </div>
                    <p id = "error" style="color:red">';
    if($emailerr)
    {
        echo 'Die Angegebene Email existiert bereits!';
    }
    echo'
                    </p>
                </form>
				<button onclick="validation()">Registrieren</button>
            </div>
        </main>';
}
?>


<?php include ("ressources/snippets/footer.php") ;?>
<?php include ("ressources/snippets/loadjavascript.php") ;?>
<script src = "ressources/js/formvalid.js"></script>
<script>
    function validation() {
        if(validateForm()){
            document.getElementById("toSubmit").submit();
        }
    }
</script>
</body>
</html>
