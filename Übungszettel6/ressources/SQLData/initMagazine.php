<?php

global $magazinesDb;
$magazinesDb = new PDO('sqlite:ressources/SQLData/magazines.db');

$sql = "SELECT * from Magazine";

if (!$magazinesDb->query($sql)) {
    $magazinesDb->exec("CREATE TABLE Magazine(
                                id integer PRIMARY KEY AUTOINCREMENT,
                                description TEXT ,
                                title TEXT
                                )");


    $magazinesDb->exec("DElETE FROM article");
    $magazinesDb->exec(("INSERT INTO Magazine (description, title) 
    VALUES ('Das ist eine Beschreibung', 'Das ist ein Titel')"));
}


/* Damit ihr die Daten mal anschauen könnt einfach einkommentieren

print "<tr><td>Id</td><td>owner</td><td>abstract</td><td>title</td></tr>";
$result = $MagazineDb->query('SELECT * FROM Magazine');
foreach($result as $row)
{
    print "<tr><td>".$row['description']."</td>";
    print "<td>".$row['title']."</td>";
}
print "</table>";
/**/
// close the database connection



?>