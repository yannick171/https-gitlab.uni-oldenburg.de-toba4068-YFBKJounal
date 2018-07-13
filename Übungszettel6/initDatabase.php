<?php
require_once('tcpdf/tcpdf.php');

//UserDb initialisieren
$userDb = new PDO('sqlite:ressources/SQLData/user.db');

$sql = "SELECT * FROM user";

$anzahlBenutzer = 10;
$anzahlArtikel = 6;

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

    //Admin
        $intro = "<h2>Dein Wegbegleiter im neuronalen Irrgarten</h2>
                    Die moderne KI-Forschung ist wohl der spannendste Bereich der Informatik. 
					Neuronale Netze sind bereits jetzt die intelligentesten Schachspieler, Marktanalysten, Börsenexperten. 
					Am Vorbild des menschlichen Gehirns werden die Grenzen des bisher Möglichen gesprengt und
					der Mensch stößt in vollkommen unbeaknnte Welten technischer Möglichen vor;
					Dieses Journal dient als Sammlung aller neuen Publikationen. Jeden Monat wird aus 
					Beiträgen unserer Nutzer einer Selektion der spannendsten und geistig anregensten 
					Arbeiten zusammengestellt. Und das Beste: Jeder kann sich kostenlos registrieren und Beiträge hinzufügen!
                    ";
        $newpw = password_hash("root", PASSWORD_DEFAULT);
        $userDb->exec("INSERT INTO user (id, email, firstName, lastName, password, infoText) VALUES (0,'root@root.de','root', 'root', '$newpw' , '$intro')");
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

    //Erstellt für jeden User Dummyartikel mit Status 0-5 + pdf
    //Statuslegende:
    //0-Eingereicht
    //1-Reviewt
    //2-Erscheint in der nächsten Ausgabe
    //3-Ist in der aktuellen Ausgabe
    //4-Archiv
    //5-Abgelehnt
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
			
			$co = rand(0, 3);
			$status = rand(0, 4);
			$maga = 0;
			
			if($status > 2)
			{
				$maga = rand(1, 3);
				if($status == 3)
				{
					$maga = 3;
				}
			}
			
            if($co == 0) 
			{
                $articlesDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle, magazine, pdfPath,uploadDate) 
                                VALUES ($user, 'Aufgrund langer und intensiver Forschung konnten ich, der großartige Huan Lee, und mein Team neue Erkenntnisse im Bereich der Fuzzy-Logik gewinnen. Welche dies genau sind, können Sie in folgendem Artikel lesen.',
                                   'Neue Erkenntnisse im Bereich der Fuzzy-Logik', 'Huan Lee', $status, $maga, 'pdfsOfArticles/artikel%$artikelCounter.pdf',
                                   '$date' )");
            }
            else if($co == 1) 
			{
                $articlesDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle, magazine, pdfPath,uploadDate) 
                                VALUES ($user,'Dieses Paper widmet sich der Frage nach dem Verständnis der temporalen Logik. Der Schlüssel unserer Forschung ist die Annahme, dass das Wichtigste bei dieser Diziplin das Tempo ist.Wie genau das Tempo maßgeblich für das Verstehen der temporalen Logik ist, können Sie in folgendem Artikel lesen.',
                                   'Der Durchbruch im Verständnis der temporalen Logik', 'Theo Tempo', $status, $maga, 'pdfsOfArticles/artikel%$artikelCounter.pdf',
                                   '$date' )");
            }
            else if($co == 2) 
			{
                $articlesDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle, magazine, pdfPath,uploadDate) 
                                VALUES ($user,'In diesem Paper geht es darum, wie Forscher Edward Schneitzel mit seinen Mitarbeitern des renormierten Instituts Berkely für angewandte Neurolinguistik es geschafft hat einer KI das Dichten wie Shakespeare innnerhalb weniger Stunden anzutrainieren. Es wurde dafür eine neue Technik namens Randolinguisierung angewandt, bei der zufällig Wörterketten produziert werden. Das Ergebnis imitiert Shakespeare perfekt. Lesen Sie den vollständigen Artikel hier.',
                                'Neuer Durchbruch im Bereich der neuronalen Netze nutzenden Ki', 'Edward Schneitzel', $status, $maga, 'pdfsOfArticles/artikel%$artikelCounter.pdf',
                                    '$date' )");
            }
            else if($co == 3) 
			{
                $articlesDb->exec("INSERT INTO article (owner, abstract, title, author, statusOfArticle, magazine, pdfPath,uploadDate) 
                                VALUES ($user,'Große Ziele erfordern große Maßnahmen: Das Human Brain Project ist ein Forschungsprojekt der Europäischen Kommission, welches das gesamte Wissen über das menschliche Gehirn zusammenfassen und mittels computerbasierten Modellen und Simulationen nachbilden soll. Laden sie hier den gesamten Artikel herunter! Los tun sies! Die Datei ist sicher nicht leer!',
                                   'Human Brain Project Projecting Brained Humans', 'Peter MaffEi', $status, $maga, 'pdfsOfArticles/artikel%$artikelCounter.pdf',
                                    '$date' )");
            }

            $artikelCounter++;
        }
        $artikel = 1;
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


    $magazinesDb->exec(("INSERT INTO Magazine (description, title) 
    VALUES ('Nach erfolgreichem Abschluss der Lehrveranstaltung sollen Studierende die Fähigkeit erworben haben, die vorgestellten Methoden sicher in Theorie und Praxis zu beherrschen. Dabei sollen entsprechende Problemstellungen der Optimierung und Datenanalyse von den Studierenden selbst erkannt, modelliert und die Methoden zielsicher eingesetzt werden', 'Die Grenzen der Computational Intelligence')"));

    $magazinesDb->exec(("INSERT INTO Magazine (description, title) 
    VALUES ('Die Berechnung folgt einer einfachen Logik: Der Computer sucht in bekannten quantenmechanischen Vorgängen nach Mustern, die er anschließend auf unbekannte Moleküle überträgt. Je mehr Information der Rechner erhält, desto genauer ist die Berechnung. Es ist so, als würde man ihm erklären, was eine gerade und eine ungerade Zahl ist. Je mehr Zahlen man als Beispiele angibt, desto eher kann er das Prinzip durchschauen. Weiß er nur, dass 1 ungerade und 2 gerade ist, wäre die Vorhersage, was 3, 4 und 5 sind, unzuverlässig. Kennt er aber eine lange Reihe von Zahlen und ihre Eigenschaften, würde er das Muster erkennen, und die Vorhersage würde funktionieren.', 'Der Weg des Computers zur Kreativität')"));

    $magazinesDb->exec(("INSERT INTO Magazine (description, title) 
    VALUES ('Die Originalversion ist zweispaltig im gewohnten Layout und Design. Die eBookReader-optimierte Version ist einspaltig. Zusätzlich wurden Kopfzeilen, Fußzeilen und Randbemerkungen entfernt.

Für den Druck und das Lesen am Rechner ist die eBookReader-Version aufgrund der deutlich erhöhten Seitenanzahl, des weniger schönen Layouts und des Fehlens der Komfortmerkmale eher unattraktiv. Auf eBookReadern wird die Lesbarkeit so allerdings ganz nachhaltig verbessert und das Blättern reduziert.', 'Diesen Titel schrieb ein Neuronales Netz')"));

    $magazinesDb->exec(("INSERT INTO Magazine (description, title) 
    VALUES ('Stellen Sie sich eine Landfläche größer als Westeuropa vor und Sie haben eine ungefähre Vorstellung davon, wie groß das Amazonas-Becken in Brasilien ist. Wenn der Dschungel rechts und links der unzähligen Flussverläufe während der Regenzeit überschwemmt wird, kann der Amazonas bis zu 100 Kilometer Breite einnehmen. Nicht von ungefähr wird das schützenswerte Ökosystem von Experten als „Kronjuwel der Weltnatur“ bezeichnet. In den Amazonas-Regenwäldern wurden bisher über 40.000 Pflanzenarten und über 3.000 Fischarten identifiziert. Ganz abgesehen von den tausenden Vogelarten und mehreren hundert verschiedenen Säugetieren, darunter Jaguar und Flussdelfin. Auch für die indigene Bevölkerung ist das Amazonasgebiet ein wichtiger Lebensraum. Auf ihrer Flusskreuzfahrt auf dem Amazonas können Sie zum Beispiel beim Besuch eines Indianerdorfs einen Einblick in die ursprüngliche Lebensform der Ureinwohner erhalten.', 'Mit Wegfindungsalgorithmen durch den Amazonas')"));
}


?>