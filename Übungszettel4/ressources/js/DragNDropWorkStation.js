$(document).ready(function()
{
    $("#todoArticles, #acceptedArticles").sortable(
    {
       connectWith: ".list-group"
    });
});