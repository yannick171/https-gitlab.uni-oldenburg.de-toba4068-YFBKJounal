<?php

function search($p){
    //$Suchparameter = json_decode($p);
    $Suchparameter = $p;

    $articlesDb = new PDO('sqlite:../SQLData/articles.db');
    $allArticles = $articlesDb->query('SELECT * FROM article');

    $result = array();


    while ($article = $allArticles->fetch())
    {
        if(isset($Suchparameter['search']) && !empty($Suchparameter['search']) && !(strpos($article["title"], $Suchparameter['search']))){
            continue;
        }

        if (isset($Suchparameter['author']) && !empty($Suchparameter['author'])&& !(strpos($article["author"], $Suchparameter['author']))){
            continue;
        }

        if (isset($Suchparameter['uploadDate']) && !empty($Suchparameter['uploadDate']) && !(strpos($article["uploadDate"], $Suchparameter['uploadDate']))){
            continue;
        }

        else
        {

            $append = array('id'=> $article['id'],
                            'title' => $article["title"],
                            'abstract' => $article["abstract"],
                            'author' => $article["author"],
                            'pdfPath' => $article["pdfPath"]
                        );
            array_push($result,$append);
        }
    }
    //print_r($result);
    return $result;
}

if (isset($_GET)){
    echo json_encode(array(search($_GET)));
}

?>