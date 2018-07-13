function addArticleToMagazine(id) {

    $.ajax({
        type: 'POST',
        url: 'ressources/redakteurseite/updateStateOfArticleAddedToMagazine.php',
        data: {id: id},
        success: function(){
            $('#testDerId').innerHTML = "asdfasdf";
        }
    });


    var proofedlist = document.getElementById("acceptedArticles").getElementsByTagName("INPUT");
    var selectedNode;

    for(var i = 0; i < proofedlist.length; i++)
    {
        if(proofedlist[i].value == id)
        {
            selectedNode = proofedlist[i].parentNode;
            break;
        }
    }
    var subNode = selectedNode.childNodes[0].childNodes[1];
    var insertNode = subNode.removeChild(subNode.childNodes[1]);

    var nextMagazine = document.getElementById("articleList");

    nextMagazine.insertBefore(selectedNode, nextMagazine[0]);

    for(var i = 0; i < proofedlist.length; i++)
    {
        if(proofedlist[i].value = id)
        {
            selectedNode.parentNode.removeChild(proofedlist[i].parentNode);
            break;
        }
    }




}