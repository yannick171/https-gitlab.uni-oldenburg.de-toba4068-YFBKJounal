$(document).ready(function()
{
    document.getElementById("loginButton").onclick = changeUserLabel;
   
});
function changeUserLabel()
{
    if(document.getElementById("autorCheck").checked)
    {
        document.getElementById("Profil").innerHTML = '<a class="nav-link" href="autor.php">Administration</a>';
    }
    else
    {
        document.getElementById("Profil").innerHTML = '<a class="nav-link" href="redakteur.php">meine Beiträge</a>';
    }
};

