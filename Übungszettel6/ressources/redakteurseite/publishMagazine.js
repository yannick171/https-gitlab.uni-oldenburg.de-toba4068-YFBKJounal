function publish() {
    $("#articleList").empty();
    document.getElementById("nextMagazineTitle").innerHTML = "Ich bin ein Titel";
    document.getElementById("descriptionOfMagazine").innerHTML = "Ich bin eine Beschreibung";
    $.ajax({
        url: "ressources/redakteurseite/publishMagazine.php?placeHolder=0"
    });
}