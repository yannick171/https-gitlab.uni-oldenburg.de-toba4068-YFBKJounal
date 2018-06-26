$(document).ready(function () {
    $("#autorProfil").on("click", "a", function () {
        $("#autorProfil").css("display","none");
        $("#autorProfilBearbeiten").css("display", "grid");
    });

    $("#autorProfilBearbeiten").on("click", ".verwerfen", function () {
        $("#autorProfil").css("display","grid");
        $("#autorProfilBearbeiten").css("display", "none");
    });
});