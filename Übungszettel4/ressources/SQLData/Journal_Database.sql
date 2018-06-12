DROP DATABASE Journal;
CREATE DATABASE Journal;

CREATE TABLE Magazine(
    id INT(3) AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(10000),
    title VARCHAR(100)
);

CREATE TABLE article(
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    owner VARCHAR(20),
    abstract  VARCHAR(20),
    title VARCHAR(20),
    author VARCHAR(1000),
    uploadDate VARCHAR(20),
    statusOfArticle INT(1),
    magazine INT(3),

    FOREIGN KEY (magazine) REFERENCES Magazine(id)
);

CREATE TABLE WebsiteUser(
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    passwordOfUser VARCHAR(100),
    firstName VARCHAR(20),
    lastName VARCHAR(20),
    regDate VARCHAR(20),
    infoText VARCHAR(100)
);

INSERT INTO WebsiteUser (email, passwordOfUser, firstName, lastName, regDate, infoText)
VALUES('John@gmail.com', '123', 'John', 'Titor', '20.05.1970', 'Ich komme aus der Zukunft');

INSERT INTO Magazine (description, title) VALUES('Das erste Magazin unseres coolen eJournals. Ich freue mich auf sie',
'Die große Premiere am Himmel der Wissenschaft');
INSERT INTO Article (owner, abstract, title, author, uploadDate, statusOfArticle, magazine)
VALUES ('El Psy Kongroo', 'Budibumbum','Budi..', 'Der verrückte Wissenschaftler','30.10.2020', 2,  1);

INSERT INTO Article (owner, abstract, title, author, uploadDate, statusOfArticle, magazine)
VALUES ('El Psy Kongroo', 'Budibumbum','Budi..', 'Der verrückte Wissenschaftler','30.10.2020', 2,  1);

INSERT INTO Article (owner, abstract, title, author, uploadDate, statusOfArticle, magazine)
VALUES ('El Psy Kongroo', 'Budibumbum','Budi..', 'Der verrückte Wissenschaftler','30.10.2020', 2,  1);

INSERT INTO Article (owner, abstract, title, author, uploadDate, statusOfArticle, magazine)
VALUES ('El Psy Kongroo', 'Budibumbum','Budi..', 'Der verrückte Wissenschaftler','30.10.2020', 2,  1);