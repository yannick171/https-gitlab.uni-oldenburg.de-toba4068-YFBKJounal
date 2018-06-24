<?php
    $articlesDb = new PDO('sqlite:../SQLData/articles.db');
    /*$lists[0] is the toProof-List, $lists[1] is the Proofed List*/

    if (isset($_GET["id"])) {

        $lists = explode("seperator=a", $_SERVER['QUERY_STRING']);
        $idsWitoutAndToProof = str_replace("&", "", $lists[0]);
        $idsWithSpaceToProof = str_replace("id=", " ", $idsWitoutAndToProof);
        $idPartsToProof = preg_split("/[\s,]+/", $idsWithSpaceToProof);


        $idsWitoutAndProofed = str_replace("&", "", $lists[1]);
        $idsWithSpaceProofed = str_replace("id=", " ", $idsWitoutAndProofed);
        $idPartsProofed = preg_split("/[\s,]+/", $idsWithSpaceProofed);

        foreach ($idPartsToProof as $entry) {

            $sql = "UPDATE article SET statusOfArticle = 0 WHERE id = " . $entry;
            $articlesDb->exec($sql);
        }
        foreach ($idPartsProofed as $entry) {
        $sql = "UPDATE article SET statusOfArticle = 1 WHERE id = " . $entry;
        $articlesDb->exec($sql);
        }
    }
?>