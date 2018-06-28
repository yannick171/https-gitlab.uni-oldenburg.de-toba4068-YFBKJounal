<?php

global $magazinesDb;
$magazinesDb = new PDO('sqlite:ressources/SQLData/articles.db');

$sql = "SELECT * from article";

if (!$magazinesDb->query($sql)) {
    $magazinesDb->exec("CREATE TABLE article (
                    id integer PRIMARY KEY AUTOINCREMENT,
                    owner integer,
                    abstract TEXT,
                    title VARCHAR(40),
                    author VARCHAR(1000),
                    uploadDate VARCHAR(20),
                    statusOfArticle integer,
                    magazine integer,
                    pdfPath TEXT 
                )");


    // $articlesDb->exec("DElETE FROM article");

    $magazinesDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle, magazine, pdfPath) 
                                VALUES (1,'Ich bin eine Inhaltsangabe', 'Erster Artikel', 'Ich bin Autoren', 0, 1, 'pdfsOfArticles/Check%20List.pdf')");
    $magazinesDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle, magazine, pdfPath) 
                                VALUES (1,'Ich bin eine Inhaltsangabe', 'Zweiter Artikel', 'Ich bin Autoren', 1, 1, 'pdfsOfArticles/Check%20List.pdf')");
    $magazinesDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle, magazine, pdfPath) 
                                VALUES (1,'Ich bin eine Inhaltsangabe', 'Dritter Artikel', 'Ich bin Autoren', 2, 1, 'pdfsOfArticles/Check%20List.pdf')");
    $magazinesDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle, magazine, pdfPath) 
                                VALUES (1,'Ich bin eine Inhaltsangabe', 'Vierter Artikel', 'Ich bin Autoren', 3, 1, 'pdfsOfArticles/Check%20List.pdf')");
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
$magazinesDb = NULL;


?>