<?php

$articlesDb = new PDO('sqlite:articles.db');

$sql = "SELECT * from article";

if (!$articlesDb ->query($sql)) {
    $articlesDb->exec("CREATE TABLE article (
                    id integer PRIMARY KEY AUTOINCREMENT,
                    owner integer,
                    abstract TEXT,
                    title VARCHAR(40),
                    author VARCHAR(1000),
                    uploadDate VARCHAR(20),
                    statusOfArticle integer,
                    magazine integer 
                )");

    $articlesDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle) VALUES (1,'Ich bin eine Inhaltsangabe', 'Ich bin ein Titel', 'Ich bin Autoren', 0)");
    $articlesDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle) VALUES (1,'Ich bin eine weitere Inhaltsangabe', 'Ich bin ein weiterer Titel', 'Ich bin weitere Autoren', 0)");
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
$articlesDb = NULL;

?>
/
