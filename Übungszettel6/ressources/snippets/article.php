<?php

function printArticle($title, $abstract, $idOfArticle, $author)
{
    $id = uniqid();

    $urlPrefix = "ressources/archiv/artikel/" . urlencode( 'artikel%'.$idOfArticle) . ".pdf";
    echo '<div class="card margin">'
            . '<div class="card-header">'
                . '<h3 class="mb-0">'
                    . '<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#' . $id . '" aria-expanded="false" aria-controls="' . $id . '">'
                    .  $title
                . '</h3>'
                . '<div style="text-align: right;">'
                    .'von <i>'. $author .'</i>'
                . '</div>'
            . '</div>'
            . '<div id="' . $id . '" class="collapse" aria-labelledby="headingFour">'
                . '<div class="card-body">'
                    .  $abstract
                . '</div>'
                . '<div class="card-body" style="border-top: 3px solid black;">'
                    . '<div style="text-align: right;">'
                        .  '<a href ='. $urlPrefix .'>Hier zum vollständigen Artikel</a>'
                    .'</div>'
                . '</div>'
            . '</div>'
        . '</div>'
        . '<input type="hidden" name="id" value="' . $idOfArticle . '">';
}
?>