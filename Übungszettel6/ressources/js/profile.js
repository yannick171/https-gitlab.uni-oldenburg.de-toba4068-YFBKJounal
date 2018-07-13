$(document).ready(function() {

    var temp_infoText;
    var temp_email;
    var temp_nachname;
    var temp_vorname;

    function updateTempData(){
        temp_infoText = $("#infotextInput").val();
        temp_email = $("#email").val();
        temp_nachname = $("#nachnameInput").val();
        temp_vorname = $("#vornameInput").val();
    }

    $("#changePasswordButton").on("click", function () {
        $("#autorProfil").css("display", "none");
        $("#autorChangepw").css("display", "grid");
    });

    $("#autorProfilButton").on("click", function () {
        updateTempData();
        $("#autorProfil").css("display", "none");
        $("#autorProfilBearbeiten").css("display", "grid");
    });

    $("#autorProfilBearbeiten").on("click", ".zustimmen", function () {
        $("#autorProfil").css("display", "grid");
        $("#autorProfilBearbeiten").css("display", "none");
    });

    $("#autorProfilBearbeiten").on("click", ".verwerfen", function () {
        $("#infotextInput").val(temp_infoText);
        $("#email").val(temp_email);
        $("#nachnameInput").val(temp_nachname);
        $("#vornameInput").val(temp_vorname);

        $("#autorProfil").css("display", "grid");
        $("#autorProfilBearbeiten").css("display", "none");
    });

    $("#autorChangepw").on("click", ".verwerfen", function () {
        $("#autorChangepw").css("display", "none");
        $("#autorProfil").css("display", "grid");
    });

    $("#toSubmitPw").submit(function (event) {
        event.preventDefault();

        var oldPw = $("#oldpw").val();
        var newPw1 = $("#newpw1").val();
        var newPw2 = $("#newpw2").val();

        if (sicherheit(newPw1)) {
            if (comparePasswords(newPw1, newPw2)) {
                $.ajax({
                    type: "POST",
                    async: true,
                    url: "ressources/snippets/userDb_server.php",
                    data: {
                        pw: oldPw,
                        newpassword: newPw1, //email abschicken
                        context: "changePw"
                    },
                    dataType: "html",
                    success: function (data) {
                        $("#errorChangePw").html(data);
                        if (data == 1) {
                            location.reload();
                            $("#errorChangePw").css("color", "green");
                            alert("Passwort erfolgreich geändert.")
                        } else {
                            $("error").html("Altes Passwort ist nicht richtig.");
                        }
                    },
                    error: function (xhr) {
                        $("error").html("Nicht erfolgreich!");
                        $("#emailInput").val(temp_email);
                    }
                });
            } else {
                $("#errorChangePw").html("Die Passwörter stimmen nicht überein.");
            }
        } else {
            $("#errorChangePw").html("Bitte ein längeres Password eingeben.");
        }

    });
    $("#toSubmit").submit(function (event) {

        event.preventDefault();

        if (validateForm()) {
            var infoText = $("#infotextInput").val();
            var email = $("#email").val();
            var nachname = $("#nachnameInput").val();
            var vorname = $("#vornameInput").val();

            $.ajax({
                type: "POST",
                async: true,
                url: "ressources/snippets/userDb_server.php",
                data: {
                    email: email,
                    nachname: nachname,
                    infoText: infoText,
                    vorname: vorname,
                    context: "changeProfile"
                },
                dataType: "html",
                success: function (data) {

                    if (data == 1) {
                        $("#error").html("Änderung gespeichert!");
                        updateTempData();

                        $("#nachnameProfil").html(nachname);

                        $("#vornameProfil").html(vorname);

                        $("#emailProfil").html(email);

                        $("#abstractProfil").html(infoText);

                    } else {
                        $("#error").css("color", "red");
                        $("#error").html(data);
                    }

                },
                error: function (xhr) {
                    $("#error").html("Nicht erfolgreich!")
                    $("#emailInput").val(temp_email);
                }
            });
        }
    });
});