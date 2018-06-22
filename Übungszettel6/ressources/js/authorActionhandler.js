$(document).ready(function(){
    var counter = 0;
    var newFirstNameId, newLastNameId, newAutor;
    var updateAutor;

    var temp_infoText;
    var temp_email;
    var temp_nachname;
    var temp_vorname;
    $("#autorProfil").on("click", "a", function () {
        temp_infoText = $("#infotextInput").val();
        temp_email = $("#emailInput").val();
        temp_nachname = $("#nachnameInput").val();
        temp_vorname = $("#vornameInput").val();

        $("#autorProfil").css("display","none");
        $("#autorProfilBearbeiten").css("display", "grid");
    });

    $("#autorProfilBearbeiten").on("click", "a", function () {
        $("#autorProfil").css("display","grid");
        $("#autorProfilBearbeiten").css("display", "none");
    });

    $("#autorProfilBearbeiten").on("click", ".verwerfen", function () {
        $("#infotextInput").val(temp_infoText);
        $("#emailInput").val(temp_email);
        $("#nachnameInput").val(temp_nachname);
        $("#vornameInput").val(temp_vorname);

        $("#autorProfil").css("display","grid");
        $("#autorProfilBearbeiten").css("display", "none");
    });

    updateAutor = function () {
        newFirstNameId = "vorname-" + counter.toString();
        newLastNameId = "nachname-" + counter.toString();
        newAutor = $('<div class="form-row"></div>').html('<div class="form-row" id="autor-' + counter.toString() + '"></div>').html('<button style="" id="removeButton-' + counter.toString() + '" style="background-color:transparent;" type = "button" class= "btn " name="logout"><i class="material-icons">clear</i></button><div class="col-md-4 mb-3"><input value="testAutorvorname-' + counter.toString() + '" name="autor' + newFirstNameId + '" type="text" class="form-control" id="vorname-' + counter.toString() + '"  placeholder="Vorname"></div>'
            + '<div class="col-md-4 mb-3"><input value="testAutorNachname-' + counter.toString() + '" name="autor' + newLastNameId + '" type="text" class="form-control" id="nachname-' + counter.toString() + '"  placeholder="Nachname"></div>');
        $("#autorInput").append(newAutor);
        $("#anzahlAutoren").val(counter);
        counter++;
    };
    updateAutor();

    $("#autorInput").on("click","button", function(){
        $(this).parent().remove();

    });

    $("#newAutorButton").on("click", function(){
        updateAutor();
    });

    $("#startUpload").click(function(){
        $("#uploadArea").toggle();
    });

    $("#authorProfil").submit(function (event) {

        event.preventDefault();

        var infoText = $("#infotextInput").val();
        var email = $("#emailInput").val();
        var nachname = $("#nachnameInput").val();
        var vorname = $("#vornameInput").val();
        $.ajax({
            type: "POST",
            url : "ressources/snippets/changeProfile.php",
            data: {
                email: email,
                nachname: nachname,
                infoText: infoText,
                vorname: vorname
                },
            dataType: "JSON",
            success: function(data){
                $("#autorbox").html(data.nachname + '<br><br>' +
                                    data.vorname + '<br><br>' +
                                    data.email  +   '<br><br>');
                $("#autorinfobox").html(data.infoText + '<br><br>');
                $("#autorProfil").css("display","grid");
                $("#autorProfilBearbeiten").css("display", "none");
            }
        });
    });
})
