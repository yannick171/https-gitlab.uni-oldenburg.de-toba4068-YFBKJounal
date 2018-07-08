<?php
    session_start();

    function checkPassword($db){
        if (!isset($_POST['pw'])){
            return false;
        }

        if (isset($_SESSION['email'])){
            $email = $_SESSION['email'];
        }

        if (isset($_POST['email'])){
            $email = $_POST['email'];
        }

        //            $db = new PDO('sqlite:../SQLData/user.db');
        try {

            $db->beginTransaction();
            $stmt = $db->prepare("SELECT email, password FROM user WHERE email=:inputEmail ");
            $stmt->bindValue(":inputEmail", $email, PDO::PARAM_STR);
            $stmt->execute();

            $entry = $stmt->fetch(PDO::FETCH_ASSOC);
            $db->rollBack();

            if(password_verify($_POST['pw'], $entry['password'])){
                return true;
            }else{
                return false;
            }
        }catch (exception $e){
            $db->rollBack();
            echo $e->getMessage();
            return false;
        }
    }

    function login($db){

        //$db = new PDO('sqlite:../SQLData/user.db');
        if (checkPassword($db)){
            try {

                $db->beginTransaction();
                $stmt = $db->prepare("SELECT firstName, lastName, infoText, id FROM user WHERE email=:inputEmail ");
                $stmt->bindValue(":inputEmail", $_POST["email"], PDO::PARAM_STR);
                $stmt ->execute();

                $entry = $stmt->fetch(PDO::FETCH_ASSOC);

                $_SESSION["email"] = $_POST["email"];
                $_SESSION["nachname"] = $entry["lastName"];
                $_SESSION["vorname"] = $entry["firstName"];
                $_SESSION["infoText"] = $entry["infoText"];
                $_SESSION["userId"] = $entry["id"];
                $_SESSION["loggedIn"] = "true";

                $db->rollBack();
                return true;
            }catch(Exception $ex){
                $db->rollBack();
                echo $ex->getMessage();

                return false;
            }
        }else{
            return false;
        }
    }

    //Bietet die Funktionalität, damit der Autor seine Daten ändern kann
    //falls changePw == 1, so soll nur das PW geändert werden
    function changeProfile($db, $changePw = 0){

        $id = $_SESSION["userId"];

        if ($changePw == 1){
            try{
                $db->beginTransaction();
                $stmt = $db->prepare("UPDATE user SET password=:newpassword WHERE id='$id'");
                $newPw = $passwordHashed = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
                $stmt->bindValue(":newpassword", $newPw, PDO::PARAM_STR);
                $stmt->execute();
                $db->commit();

                return 1;
            }catch (exception $e){
                $db->rollBack();
                echo $e->getMessage();
                return 0;
            }
        }else{
            try {

                if (checkEmail($db)){
                    return "Email existiert bereits";
                }else{
                    $stmt = $db->prepare("UPDATE user SET email=:newEmail, lastName =:newLastname, firstName =:newFirstname, infoText =:newInfotext WHERE id='$id'");
                    $stmt->bindValue(":newEmail", $_POST["email"], PDO::PARAM_STR);
                    $stmt->bindValue(":newLastname", $_POST["nachname"], PDO::PARAM_STR);
                    $stmt->bindValue(":newFirstname", $_POST["vorname"], PDO::PARAM_STR);
                    $stmt->bindValue(":newInfotext", $_POST["infoText"], PDO::PARAM_STR);
                    $stmt->execute();
                    $db->commit();

                    $_SESSION["email"] = htmlspecialchars($_POST["email"]);
                    $_SESSION["vorname"] = htmlspecialchars($_POST["vorname"]);
                    $_SESSION["nachname"] = htmlspecialchars($_POST["nachname"]);
                    $_SESSION["infoText"] = htmlspecialchars($_POST["infoText"]);

                    //$result = $_POST;
                    return 1;
                }
            }catch (Exception $e){
                $db->rollBack();
                echo $e->getMessage();
                return "Es ist ein Fehler unterlaufen";
            }
        }
    }

    //Falls email bereits existiert, dann gibt die Funktion true zurück
    function checkEmail($db){
        $id = $_SESSION["userId"];

        $db->beginTransaction();
        $doesEmailExist = $db -> prepare( "SELECT email FROM user WHERE email =:newEmail and id !='$id' ");
        $doesEmailExist->bindValue(":newEmail", $_POST["email"], PDO::PARAM_STR);
        $doesEmailExist ->execute();
        $fetch = $doesEmailExist->fetch(PDO::FETCH_ASSOC);

        if (is_array($fetch)) {
            return 1;
            $db->rollBack();
        }else{
            return 0;
            $db->rollBack();
        }
    }

//Webserver zur Verwaltung der Database-Anfrage. Es wird nach dem Kontext unterschieden:

    if (isset($_POST['context']) && !empty($_POST['context'])){

        $db = new PDO('sqlite:../SQLData/user.db');

        if ($_POST['context']=='login'){

            if(login($db)==false){
                echo 0;
            }else{
                echo 1;
            }

        }elseif ($_POST['context'] == 'checkPw'){

            if (checkPassword($db)){
                echo 1;
            }else{
                echo 0;
            }

        }elseif ($_POST['context'] == 'changeProfile'){

            echo changeProfile($db,0);

        }elseif ($_POST['context'] == 'changePw'){
            if (checkPassword($db)){
                echo changeProfile($db, 1);
            }else{
                echo "Passwort falsch";
            }
        }

        $db = NULL;
    }
?>