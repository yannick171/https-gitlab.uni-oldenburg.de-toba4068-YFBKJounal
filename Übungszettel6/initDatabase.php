<?php
require_once('tcpdf/tcpdf.php');

//UserDb initialisieren
$userDb = new PDO('sqlite:ressources/SQLData/user.db');

$sql = "SELECT * FROM user";

$anzahlBenutzer = 10;
$anzahlArtikel = 3;

if (!$userDb->query($sql)) {
    $userDb->exec("CREATE TABLE user (
                    id integer PRIMARY KEY AUTOINCREMENT,
                    email VARCHAR(100),
                    password VARCHAR(100),
                    firstName VARCHAR(20),
                    lastName VARCHAR(20),
                    regDate VARCHAR(20),
                    infoText TEXT
                    )");

    for ($i=1; $i<=$anzahlBenutzer;$i++){
        $newpw = password_hash("testtest$i", PASSWORD_DEFAULT);
        $userDb->exec("INSERT INTO user (email, firstName, lastName, password, infoText) VALUES ('test$i@test.de','TestVorname$i', 'TestNachname$i', '$newpw' , 'Ich bin ein Testprofil Nr. $i')");
    }
}

//ArtikelDB initialisieren
$articlesDb = new PDO('sqlite:ressources/SQLData/articles.db');

$sql = "SELECT * from article";

if (!$articlesDb->query($sql)) {
    $articlesDb->exec("CREATE TABLE article (
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

    //Erstellt für jeden User Dummyartikel mit Status 0-2 + pdf
    $artikelCounter=1;
    for ($user=1;$user <= $anzahlBenutzer; $user++) {
        for ($artikel=1;$artikel <= $anzahlArtikel;$artikel++) {
            $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $obj_pdf->SetCreator(PDF_CREATOR);
            $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
            $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
            $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $obj_pdf->SetDefaultMonospacedFont('helvetica');
            $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
            $obj_pdf->setPrintHeader(false);
            $obj_pdf->setPrintFooter(false);
            $obj_pdf->SetAutoPageBreak(TRUE, 10);
            $obj_pdf->SetFont('helvetica', '', 12);
            $obj_pdf->AddPage();

            $content = $artikel . ' ter Artikel von User mit Id:'.$user;
            $obj_pdf->writeHTML($content);
            $obj_pdf->Output(__DIR__ . '/ressources/archiv/artikel/artikel%'. $artikelCounter.'.pdf', 'F');

            $date = date("d.m.Y, H:i:s");
            $articlesDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle, magazine, pdfPath,uploadDate) 
                                VALUES ($user,'Ich bin eine Inhaltsangabe von $user. Hier kommt ein sehr langer Text um die Darstellung des Sliders auf der Startseite zu testen:' ||
                                 ' ABCDEFGHIJKLMNOPQRSTUVWXYZ ABCDEFGHIJKLMNOPQRSTUVWXYZ ABCDEFGHIJKLMNOPQRSTUVWXYZ ABCDEFGHIJKLMNOPQRSTUVWXYZ ABCDEFGHIJKLMNOPQRSTUVWXYZ' ||
                                  ' ABCDEFGHIJKLMNOPQRSTUVWXY  ABCDEFGHIJKLMNOPQRSTUVWXYZ ABCDEFGHIJKLMNOPQRSTUVWXYZ ABCDEFGHIJKLMNOPQRSTUVWXYZ ABCDEFGHIJKLMNOPQRSTUVWXYZ ABCDEFGHIJKLMNOPQRSTUVWXYZ ABCDEFGHIJKLMNOPQRSTUVWXYZZ', '$artikel. Artikel von User: $user', 'Ich bin der Autor mit ID:$user', $artikel-1 , 1, 'pdfsOfArticles/artikel%$artikelCounter.pdf', '$date' )");


            $artikelCounter++;
        }
        $artikel = 0;
    }

}

$articlesDb = NULL;

//MagazinDB initialisieren

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


?>