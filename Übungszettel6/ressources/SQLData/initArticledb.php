<?php

global $MagazineDb;
$MagazineDb = new PDO('sqlite:articles.db');

$sql = "SELECT * from article";

if (!$MagazineDb ->query($sql)) {
    $MagazineDb->exec("CREATE TABLE article (
                    id integer PRIMARY KEY AUTOINCREMENT,
                    owner integer,
                    abstract TEXT,
                    title VARCHAR(40),
                    author VARCHAR(1000),
                    uploadDate VARCHAR(20),
                    statusOfArticle integer,
                    magazine integer 
                )");


    $MagazineDb->exec("DElETE FROM article");

    $MagazineDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle) VALUES (1,'Ich bin eine Inhaltsangabe', 'Erster Artikel', 'Ich bin Autoren', 0)");
    $MagazineDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle) VALUES (1,'Ich bin eine Inhaltsangabe', 'Zweiter Artikel', 'Ich bin Autoren', 0)");
    $MagazineDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle) VALUES (1,'Ich bin eine Inhaltsangabe', 'Dritter Artikel', 'Ich bin Autoren', 1)");
    $MagazineDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle) VALUES (1,'Ich bin eine Inhaltsangabe', 'Vierter Artikel', 'Ich bin Autoren', 1)");
    $MagazineDb->exec("INSERT INTO articles (owner, abstract, title, author, statusOfArticle) VALUES (1,'Ich bin eine Inhaltsangabe', 'Fünfter Artikel', 'Ich bin Autoren', 2)");
    $MagazineDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle) VALUES (1,'Ich bin eine Inhaltsangabe', 'Sechster Artikel', 'Ich bin Autoren', 2)");
}
/* Damit ihr die Daten mal anschauen könnt einfach einkommentieren

print "<tr><td>Id</td><td>owner</td><td>abstract</td><td>title</td></tr>";
$result = $articlesDb->query('SELECT * FROM article');
foreach($result as $row)
{
    print "<tr><td>".$row['id']."</td>";
    print "<td>".$row['owner']."</td>";
    print "<td>".$row['abstract']."</td>";
    print "<td>".$row['title']."</td>";
    print "<td>".$row['statusOfArticle']."</tr>";
}
print "</table>";
/**/
// close the database connection
$MagazineDb = NULL;


?>