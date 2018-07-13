$(document).ready(function(){
    var counter = 0;
    var newFirstNameId, newLastNameId, newAutor;
    var updateAutor;

    updateAutor = function () {
        newFirstNameId = "vorname-" + counter.toString();
        newLastNameId = "nachname-" + counter.toString();

        if (counter == 0){
            newAutor = $('<div class="form-row"></div>').html('<div class="form-row" id="autor-' + counter.toString() + '"></div>').html('<div class="col-md-4 mb-3"><input required value="testAutorvorname-' + counter.toString() + '" name="autor' + newFirstNameId + '" type="text" class="form-control" id="vorname-' + counter.toString() + '"  placeholder="Vorname"></div>'
                + '<div class="col-md-4 mb-3"><input required value="testAutorNachname-' + counter.toString() + '" name="autor' + newLastNameId + '" type="text" class="form-control" id="nachname-' + counter.toString() + '"  placeholder="Nachname"></div>');
        }else{

            newAutor = $('<div class="form-row"></div>').html('<div class="form-row" id="autor-' + counter.toString() + '"></div>').html('<div class="col-md-4 mb-3"><input required value="testAutorvorname-' + counter.toString() + '" name="autor' + newFirstNameId + '" type="text" class="form-control" id="vorname-' + counter.toString() + '"  placeholder="Vorname"></div>'
                + '<div class="col-md-4 mb-3"><input required value="testAutorNachname-' + counter.toString() + '" name="autor' + newLastNameId + '" type="text" class="form-control" id="nachname-' + counter.toString() + '"  placeholder="Nachname"></div><button style="" id="removeButton-' + counter.toString() + '" style="background-color:transparent;" type = "button" class= "btn " name="logout"><i class="material-icons">clear</i></button>');
        }
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
});
