CREATE DATABASE IF NOT EXISTS eStante;

USE eStante;

CREATE TABLE IF NOT EXISTS person (
    personID INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(250),
    registration VARCHAR(250),
    cpf varchar(11),
    email VARCHAR(250),
    password VARCHAR(256),
    type ENUM('student', 'employee'),
    course VARCHAR(250),
    campus VARCHAR(250),
    regular BOOLEAN,
    permissionLevel ENUM('admin', 'employee', 'moderator', 'reader') DEFAULT 'reader',

    PRIMARY KEY(personID)
);

CREATE TABLE IF NOT EXISTS collection (
    collectionID INT NOT NULL AUTO_INCREMENT,
    type VARCHAR(250),
    cdu VARCHAR(250),

    PRIMARY KEY(collectionID)
);

CREATE TABLE IF NOT EXISTS item (
    itemID INT NOT NULL AUTO_INCREMENT,
    isbn varchar(100),
    title VARCHAR(250),
    subtitle VARCHAR(250),
    edition INT,
    publisher VARCHAR(250),
    year INT,
    section VARCHAR(250),
    synthesis VARCHAR(1500),
    place VARCHAR(250),
    inventory INT,
    library VARCHAR(250),
    physicalDescription VARCHAR(100),
    classification VARCHAR(250),
    isDigital BOOLEAN,
    link VARCHAR(500),
    number VARCHAR(100),
    cover VARCHAR(250),
    collectionID INT NOT NULL,

    PRIMARY KEY(itemID),
    FOREIGN KEY (collectionID) REFERENCES collection (collectionID)
);

CREATE TABLE IF NOT EXISTS author (
    authorID INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(250),

    PRIMARY KEY(authorID)
);

CREATE TABLE IF NOT EXISTS translator (
    translatorID INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(250),

    PRIMARY KEY(translatorID)
);

CREATE TABLE IF NOT EXISTS itemAutor (
    authorID INT NOT NULL,
    itemID INT NOT NULL,

    PRIMARY KEY (authorID, itemID),
    FOREIGN KEY (authorID) REFERENCES author(authorID),
    FOREIGN KEY (itemID) REFERENCES item(itemID)
);

CREATE TABLE IF NOT EXISTS itemTranslator (
    translatorID INT NOT NULL,
    itemID INT NOT NULL,

    PRIMARY KEY (translatorID, itemID),
    FOREIGN KEY (translatorID) REFERENCES translator(translatorID),
    FOREIGN KEY (itemID) REFERENCES item(itemID)
);

CREATE TABLE IF NOT EXISTS tag (
    tagID INT NOT NULL AUTO_INCREMENT,
    value varchar(100),

    PRIMARY KEY(tagID)
);

CREATE TABLE IF NOT EXISTS itemTag (
    tagID INT NOT NULL,
    itemID INT NOT NULL,

    PRIMARY KEY (tagID, itemID),
    FOREIGN KEY (tagID) REFERENCES tag(tagID),
    FOREIGN KEY (itemID) REFERENCES item(itemID)
);

CREATE TABLE IF NOT EXISTS comment (
    commentID INT NOT NULL AUTO_INCREMENT,
    personID INT NOT NULL,
    itemID INT NOT NULL,
    content VARCHAR(2000),
    replyTo INT,

    PRIMARY KEY(commentID),
    FOREIGN KEY (personID) REFERENCES person(personID),
    FOREIGN KEY (itemID) REFERENCES item(itemID),
    FOREIGN KEY (replyTo) REFERENCES comment(commentID)
);

CREATE TABLE IF NOT EXISTS evaluation (
    personID INT NOT NULL,
    itemID INT NOT NULL,
    value INT,
    
    PRIMARY KEY(personID, itemID),
    FOREIGN KEY (personID) REFERENCES person(personID),
    FOREIGN KEY (itemID) REFERENCES item(itemID)
);

CREATE TABLE IF NOT EXISTS itemPerson (
    personID INT NOT NULL,
    itemID INT NOT NULL,

    PRIMARY KEY (personID, itemID),
    FOREIGN KEY (personID) REFERENCES person(personID),
    FOREIGN KEY (itemID) REFERENCES item(itemID)
);