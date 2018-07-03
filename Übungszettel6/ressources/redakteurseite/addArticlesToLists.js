function addArticleToMagazine(id) {

    $.ajax({
        type: 'POST',
        url: 'ressources/redakteurseite/updateStateOfArticleAddedToMagazine.php',
        data: {id: id},
        success: function () {
            $('#testDerId').innerHTML = "asdfasdf";
        }
    });


    var proofedlist = document.getElementById("acceptedArticles").getElementsByTagName("INPUT");
    var selectedNode;

    for (var i = 0; i < proofedlist.length; i++) {
        if (proofedlist[i].value == id) {
            selectedNode = proofedlist[i].parentNode;
            selectedNode.parentNode.removeChild(proofedlist[i].parentNode);
            break;
        }
    }
    var subNode = selectedNode.childNodes[0].childNodes[1];
    var insertNode = subNode;
    insertNode.removeChild(insertNode.childNodes[1]);

    //create new Button Node

    var button = document.createElement("BUTTON");
    var text = document.createTextNode("Artikel nach geprüft zurücklegen");

    button.appendChild(text);
    button.setAttribute("class", "btn btn-danger btn-block");
    button.setAttribute("onclick", "addArticleToProofedFromNextMagazine('" + id + "')");

    // add button to selected node
    insertNode.appendChild(button);


    var nextMagazine = document.getElementById("articleList");

    nextMagazine.insertBefore(selectedNode, nextMagazine[0]);
    //document.getElementById("testDerId").innerHTML = selectedNode;
}

function addArticleToProofed(id) {

    $.ajax({
        type: 'POST',
        url: 'ressources/redakteurseite/updateStateOfArticleAddedToProofed.php',
        data: {id: id}
    });


    var toProofList = document.getElementById("todoArticles").getElementsByTagName("INPUT");
    var selectedNode;

    for (var i = 0; i < toProofList.length; i++) {
        if (toProofList[i].value == id) {
            selectedNode = toProofList[i].parentNode;
            selectedNode.parentNode.removeChild(toProofList[i].parentNode);
            break;
        }
    }
    var subNode = selectedNode.childNodes[0].childNodes[1];
    var insertNode = subNode;
    insertNode.removeChild(subNode.childNodes[1]);


    var button = document.createElement("BUTTON");
    var text = document.createTextNode("Artikel zur nächsten Ausgabe hinzufügen");

    button.appendChild(text);
    button.setAttribute("class", "btn btn-success btn-block");
    button.setAttribute("onclick", "addArticleToMagazine('" + id + "')");

    // add button to selected node
    insertNode.appendChild(button);


    var proofedList = document.getElementById("acceptedArticles");

    proofedList.insertBefore(selectedNode, proofedList[0]);
    //document.getElementById("testDerId").innerHTML = selectedNode;
}

function addArticleToProofedFromNextMagazine(id) {

    $.ajax({
        type: 'POST',
        url: 'ressources/redakteurseite/updateStateOfArticleAddedToProofedFromNextMagazine.php',
        data: {id: id}
    });


    var nextMagazine = document.getElementById("articleList").getElementsByTagName("INPUT");
    var selectedNode;

    for (var i = 0; i < nextMagazine.length; i++) {
        if (nextMagazine[i].value == id) {
            selectedNode = nextMagazine[i].parentNode;
            selectedNode.parentNode.removeChild(nextMagazine[i].parentNode);
            break;
        }
    }

    var subNode = selectedNode.childNodes[0].childNodes[1];
    var insertNode = subNode;
    insertNode.removeChild(subNode.childNodes[1]);


    var button = document.createElement("BUTTON");
    var text = document.createTextNode("Artikel zur nächsten Ausgabe hinzufügen");

    button.appendChild(text);
    button.setAttribute("class", "btn btn-success btn-block");
    button.setAttribute("onclick", "addArticleToMagazine('" + id + "')");

    // add button to selected node
    insertNode.appendChild(button);

    var proofedList = document.getElementById("acceptedArticles");

    proofedList.insertBefore(selectedNode, proofedList[0]);
    //document.getElementById("testDerId").innerHTML = selectedNode;
}