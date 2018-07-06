<?php
    session_start();

    function checkPassword(){
        if (!isset($_POST['pw']) || !isset($_POST['email'])){
            return false;
        }

        try {
            $db = new PDO('sqlite:../SQLData/user.db');

            $db->beginTransaction();
            $stmt = $db->prepare("SELECT email, password FROM user WHERE email=:inputEmail ");
            $stmt->bindValue(":inputEmail", $_POST['email'], PDO::PARAM_STR);
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

    function login(){

        if (checkPassword()){
            try {
                $db = new PDO('sqlite:../SQLData/user.db');

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
                $db = NULL;

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

    if (isset($_POST)){
        if ($_POST['context']=='login'){
            if(login()==false){
                echo 0;
            }else{
                echo 1;
            }
        }
    }
?>