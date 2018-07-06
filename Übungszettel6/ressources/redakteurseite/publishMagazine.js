function publish() {
    $.ajax({
        url: "ressources/redakteurseite/publishMagazine.php?placeHolder=0",
        success: function () {
            document.getElementById("testDerId").innerHTML = "asdfasdf";
        }
    });
}