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

    //for testing purpose
    document.getElementById("test").innerHTML = subNode.childNodes[0];

    insertNode.removeChild(insertNode.childNodes[1]);
    insertNode.removeChild(insertNode.childNodes[1]);

    //create new Button Node for sending article back to this list
    var button = document.createElement("BUTTON");
    var text = document.createTextNode("Artikel nach geprüft zurücklegen");

    button.appendChild(text);
    button.setAttribute("class", "btn btn-warning btn-block");
    button.setAttribute("onclick", "addArticleToProofedFromNextMagazine('" + id + "')");

    //create new Button for declining article
    var buttonDecline = document.createElement("BUTTON");
    var textDecline = document.createTextNode("Artikel ablehnen");

    buttonDecline.appendChild(textDecline);
    buttonDecline.setAttribute("class", "btn btn-danger btn-block");
    buttonDecline.setAttribute("onclick", "addArticleToDeclinedNextMagazine('" + id + "')");

    // add button to selected node
    insertNode.appendChild(button);
    insertNode.appendChild(buttonDecline);

    var nextMagazine = document.getElementById("articleList");

    nextMagazine.insertBefore(selectedNode, nextMagazine[0]);
}

function addArticleToDeclinedToProof(id) {
    $.ajax({
        type: 'POST',
        url: 'ressources/redakteurseite/updateStateOfArticleToDeclined.php',
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
}

function addArticleToDeclinedProofed(id) {
    $.ajax({
        type: 'POST',
        url: 'ressources/redakteurseite/updateStateOfArticleToDeclined.php',
        data: {id: id}
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
}

function addArticleToDeclinedNextMagazine(id) {
    $.ajax({
        type: 'POST',
        url: 'ressources/redakteurseite/updateStateOfArticleToDeclined.php',
        data: {id: id}
    });

    var nextMagazineList = document.getElementById("articleList").getElementsByTagName("INPUT");
    var selectedNode;

    for (var i = 0; i < nextMagazineList.length; i++) {
        if (nextMagazineList[i].value == id) {
            selectedNode = nextMagazineList[i].parentNode;
            selectedNode.parentNode.removeChild(nextMagazineList[i].parentNode);
            break;
        }
    }
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
    insertNode.removeChild(subNode.childNodes[1]);

    //button for sending article to next magazine
    var button = document.createElement("BUTTON");
    var text = document.createTextNode("Artikel zur nächsten Ausgabe hinzufügen");

    button.appendChild(text);
    button.setAttribute("class", "btn btn-success btn-block");
    button.setAttribute("onclick", "addArticleToMagazine('" + id + "')");


    //create new Button for declining article
    var buttonDecline = document.createElement("BUTTON");
    var textDecline = document.createTextNode("Artikel ablehnen");

    buttonDecline.appendChild(textDecline);
    buttonDecline.setAttribute("class", "btn btn-danger btn-block");
    buttonDecline.setAttribute("onclick", "addArticleToDeclinedProofed('" + id + "')");

    // add button to selected node
    insertNode.appendChild(button);
    insertNode.appendChild(buttonDecline);

    var proofedList = document.getElementById("acceptedArticles");

    proofedList.insertBefore(selectedNode, proofedList[0]);
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
    insertNode.removeChild(subNode.childNodes[1]);

    //button for reverting adding article to next magazine
    var button = document.createElement("BUTTON");
    var text = document.createTextNode("Artikel zur nächsten Ausgabe hinzufügen");

    button.appendChild(text);
    button.setAttribute("class", "btn btn-success btn-block");
    button.setAttribute("onclick", "addArticleToMagazine('" + id + "')");

    //create new Button for declining article
    var buttonDecline = document.createElement("BUTTON");
    var textDecline = document.createTextNode("Artikel ablehnen");

    buttonDecline.appendChild(textDecline);
    buttonDecline.setAttribute("class", "btn btn-danger btn-block");
    buttonDecline.setAttribute("onclick", "addArticleToDeclinedNextMagazine('" + id + "')");

    // add button to selected node
    insertNode.appendChild(button);
    insertNode.appendChild(buttonDecline);

    var proofedList = document.getElementById("acceptedArticles");

    proofedList.insertBefore(selectedNode, proofedList[0]);
}