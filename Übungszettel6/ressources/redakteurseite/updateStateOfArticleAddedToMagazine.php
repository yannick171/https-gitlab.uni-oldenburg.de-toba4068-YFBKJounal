<?php
if (isset($_POST["id"]))
    try {
        $articlesDB = new PDO('sqlite:../SQLData/articles.db');
        $articlesDB->beginTransaction();
        $stmt = $articlesDB->prepare("UPDATE article SET statusOfArticle = 2 WHERE id = (:articleId)");
        $stmt->bindParam(":articleId", $_POST["id"], PDO::PARAM_INT);
        $stmt->execute();
        $articlesDB->commit();
    } catch (Exception $ex) {
        $articlesDB->rollBack();
    }
?>