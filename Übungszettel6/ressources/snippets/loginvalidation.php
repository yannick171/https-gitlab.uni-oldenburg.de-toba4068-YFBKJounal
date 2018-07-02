<?php
    session_start();

    try {
        $db = new PDO('sqlite:../SQLData/user.db');

        $db->beginTransaction();
        $stmt = $db->prepare("SELECT email, firstName, lastName, password, infoText, id FROM user WHERE email=:inputEmail ");
        $stmt->bindValue(":inputEmail", $_POST["email"], PDO::PARAM_STR);
        $stmt ->execute();

        $entry = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($_POST['pw'], $entry['password'])){
            echo "drinne";
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["nachname"] = $entry["firstName"];
            $_SESSION["vorname"] = $entry["lastName"];
            $_SESSION["infoText"] = $entry["infoText"];
            $_SESSION["userId"] = $entry["id"];
            $_SESSION["loggedIn"] = "true";
            //echo "alles korrekt";
        }
        $db->rollBack();
        $db = NULL;

    }catch(Exception $ex){
        $db->rollBack();
    }
    header("Location: ../../startseite.php");
    exit();
?>