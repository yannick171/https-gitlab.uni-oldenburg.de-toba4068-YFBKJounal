<?php

$userDb = new PDO('sqlite:user.db');

$sql = "SELECT * FROM user";

if (!$userDb ->query($sql)) {
    $userDb->exec("CREATE TABLE user (
                    id integer PRIMARY KEY AUTOINCREMENT,
                    email VARCHAR(100),
                    password VARCHAR(100),
                    firstName VARCHAR(20),
                    lastName VARCHAR(20),
                    regDate VARCHAR(20),
                    infoText TEXT
                    )");

    $userDb->exec("INSERT INTO user (email, firstName, lastName, password, infoText) VALUES ('test@test.test','TestVorname', 'TestNachname', 'test', 'Ich bin ein Testprofil')");

}

    /* Damit ihr die Daten mal anschauen könnt einfach einkommentieren*/

    print "<tr><td>Id</td><td>Vorname</td><td>nachName</td><td>Beschreibung</td></tr>";
    $result = $userDb->query('SELECT * FROM user');
    foreach($result as $row)
    {
        print "<tr><td>".$row['id']."</td>";
        print "<td>".$row['email']."</td>";
        print "<td>".$row['firstName']."</td>";
        print "<td>".$row['lastName']."</td>";
        print "<td>".$row['infoText']."</tr>";
    }
    print "</table>";
    /**/
    // close the database connection
    $userDb = NULL;
  ?>
/
