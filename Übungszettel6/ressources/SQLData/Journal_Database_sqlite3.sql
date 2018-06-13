CREATE TABLE Magazine(
    id INT(3) PRIMARY KEY,
    description VARCHAR(10000),
    title VARCHAR(100)
);

CREATE TABLE article(
    id INT(10)  PRIMARY KEY,
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
    id INT(10) PRIMARY KEY,
    email VARCHAR(100),
    passwordOfUser VARCHAR(100),
    firstName VARCHAR(20),
    lastName VARCHAR(20),
    regDate VARCHAR(20),
    infoText VARCHAR(100)
);

INSERT INTO WebsiteUser (id, email, passwordOfUser, firstName, lastName, regDate, infoText)
VALUES(2, 'John@gmail.com', '123', 'John', 'Titor', '20.05.1970', 'Ich komme aus der Zukunft');

INSERT INTO Magazine (id, description, title) VALUES(1, 'Das erste Magazin unseres coolen eJournals. Ich freue mich auf sie',
'Die große Premiere am Himmel der Wissenschaft');
INSERT INTO Article (id, owner, abstract, title, author, uploadDate, statusOfArticle, magazine)
VALUES (3, 'El Psy Kongroo', 'Budibumbum','Budi..', 'Der verrückte Wissenschaftler','30.10.2020', 2,  1);

INSERT INTO Article (id, owner, abstract, title, author, uploadDate, statusOfArticle, magazine)
VALUES (4, 'El Psy Kongroo', 'Budibumbum','Budi..', 'Der verrückte Wissenschaftler','30.10.2020', 2,  1);

INSERT INTO Article (id, owner, abstract, title, author, uploadDate, statusOfArticle, magazine)
VALUES (5, 'El Psy Kongroo', 'Budibumbum','Budi..', 'Der verrückte Wissenschaftler','30.10.2020', 2,  1);

INSERT INTO Article (id, owner, abstract, title, author, uploadDate, statusOfArticle, magazine)
VALUES (6, 'El Psy Kongroo', 'Budibumbum','Budi..', 'Der verrückte Wissenschaftler','30.10.2020', 2,  1);