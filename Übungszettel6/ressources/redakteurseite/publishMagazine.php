<?php
    if(isset($_GET["placeHolder"]))
    {
        $articlesDB = new PDO('sqlite:../SQLData/articles.db');
        $magazinesDb = new PDO('sqlite:../SQLData/magazines.db');
        try
        {

            $articlesDB->beginTransaction();
            $articlesDB->exec("UPDATE article SET statusOfArticle = 4 WHERE statusOfArticle = 3");
            $articlesDB->commit();
        }
        catch(Exception $ex)
        {
            $articlesDB->rollBack();
        }
        try
        {

            $articlesDB->beginTransaction();
            $articlesDB->exec("UPDATE article SET statusOfArticle = 3 WHERE statusOfArticle = 2");
            $articlesDB->commit();

            $magazinesDb->beginTransaction();
            $highestId  = $magazinesDb->query('SELECT max(id) FROM Magazine');
            $magazinesDb->commit();
            $highestMagazineId = $highestId->fetch();

            $articlesDB->beginTransaction();
            $stmt = $articlesDB->prepare("Update article set magazine =(:idMagazine) where statusOfArticle = 3");
            $stmt->bindParam(":idMagazine", $highestMagazineId["max(id)"], PDO::PARAM_INT);
            $stmt->execute();
            $articlesDB->commit();
        }
        catch(Exception $ex)
        {
            $articlesDB->rollBack();
            $magazinesDb->rollBack();
        }
        try
        {
            $magazinesDb->beginTransaction();
            $magazinesDb->exec(("INSERT INTO Magazine (description, title) VALUES ('Das ist eine Beschreibung', 'Das ist ein Titel')"));
            $magazinesDb->commit();
        }
        catch(Exception $ex)
        {
            $magazinesDb->rollBack();
        }
    }
?>