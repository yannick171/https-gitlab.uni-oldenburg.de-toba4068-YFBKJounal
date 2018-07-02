<?php
    session_start();
/*
$post_data = http_build_query(
    array(
        'secret' => '6Ldb3mEUAAAAAKNeWzRKDel5Du4NF__wS8G-X7_5',
        'response' => $_POST['g-recaptcha-response'],
        'remoteip' => $_SERVER['REMOTE_ADDR']
    )
);
$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $post_data
    )
);
$context  = stream_context_create($opts);
$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
$result = json_decode($response);
print_r($result);
if (!$result->success) {
    throw new Exception('Gah! CAPTCHA verification failed', 1);

}*/

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