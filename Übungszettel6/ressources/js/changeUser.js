$(document).ready(function()
{
    document.getElementById("loginButton").onclick = changeUserLabel;
   
});
function changeUserLabel()
{
    if(document.getElementById("autorCheck").checked)
    {
        document.getElementById("Profil").innerHTML = '<a class="nav-link" href="autor.php">meine Beiträge</a>';
    }
    else
    {
        document.getElementById("Profil").innerHTML = '<a class="nav-link" href="redakteur.php">Administration</a>';
    }
};

