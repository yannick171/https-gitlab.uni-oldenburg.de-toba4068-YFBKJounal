function publish() {
    $("#articleList").empty();
    $.ajax({
        url: "ressources/redakteurseite/publishMagazine.php?placeHolder=0"
    });


}