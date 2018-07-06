<?php
    session_start();

    if(isset($_POST)){
        try {
            $db = new PDO("sqlite:../SQLData/user.db");
            $id = $_SESSION["userId"];

            $db->beginTransaction();


            $doesEmailExist = $db -> prepare( "SELECT email FROM user WHERE email =:newEmail and id !='$id' ");
            $doesEmailExist->bindValue(":newEmail", $_POST["email"], PDO::PARAM_STR);

            $doesEmailExist ->execute();
            $fetch = $doesEmailExist->fetch(PDO::FETCH_ASSOC);
            if (is_array($fetch)){
                echo "emailExists";
                $db->rollBack();
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

                $result = $_POST;
                echo json_encode($result);
            }

        } catch (Exception $e){
            $db->rollBack();
            echo "An error has occurred";
        }
    }