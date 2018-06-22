var list = document.getElementById("todoArticles").getElementsByTagName("INPUT");
var ids = "";
for(var i = 0; i < list.length; i++)
{
    //ids.push(list[i].value);
    ids= ids + list[i].value;
    if(i < list.length - 1)
    {
        ids = ids + ":";
    }

}
$('#toProofList').submit(function (event) {
    event.preventDefault();
    $.ajax({
       type: 'GET',
        url: 'ressources/redakteurseite/receiveSaveState.php',
        data: $(this).serialize(),
        success: function(data){
           $('#test').html(data);
        }
    });
})

