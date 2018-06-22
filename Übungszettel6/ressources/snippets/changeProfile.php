<?php
    session_start();

    if(isset($_POST)){
        try {
            $db = new PDO("sqlite:../SQLData/user.db");
            $id = $_SESSION["userId"];

            $db->beginTransaction();
            isset($_POST["email"]) ? $_SESSION["email"] = $_POST["email"] : "";
            isset($_POST["vorname"]) ? $_SESSION["vorname"] = $_POST["vorname"] : "";
            isset($_POST["nachname"]) ? $_SESSION["nachname"] = $_POST["nachname"] : "";
            isset($_POST["infoText"]) ? $_SESSION["infoText"] = $_POST["infoText"] : "";

            $stmt = $db->prepare("UPDATE user SET email=:newEmail, lastName =:newLastname, firstName =:newFirstname, infoText =:newInfotext WHERE id='$id'");

            $stmt->bindValue(":newEmail", $_SESSION["email"], PDO::PARAM_STR);
            $stmt->bindValue(":newLastname", $_SESSION["nachname"], PDO::PARAM_STR);
            $stmt->bindValue(":newFirstname", $_SESSION["vorname"], PDO::PARAM_STR);
            $stmt->bindValue(":newInfotext", $_SESSION["infoText"], PDO::PARAM_STR);


            $stmt->execute();
            $db->commit();

            $result = $_SESSION;
            echo json_encode($result);

        } catch (Exception $e){
            $db->rollBack();
            echo "An error has occurred";
        }
    }