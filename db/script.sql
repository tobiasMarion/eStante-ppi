CREATE DATABASE IF NOT EXISTS eStante;

USE eStante;

CREATE TABLE IF NOT EXISTS Person (
    personID INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(250),
    registration VARCHAR(250),
    cpf varchar(11),
    email VARCHAR(250),
    password VARCHAR(255),
    type ENUM('student', 'employee'),
    course VARCHAR(250),
    campus VARCHAR(250),
    regular BOOLEAN,
    permissionLevel ENUM('admin', 'employee', 'moderator', 'reader') DEFAULT 'reader',
    avatar VARCHAR(255),

    PRIMARY KEY(personID)
);

CREATE TABLE IF NOT EXISTS Collection (
    collectionID INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(250),
    cdu VARCHAR(250),

    PRIMARY KEY(collectionID)
);

CREATE TABLE IF NOT EXISTS Item (
    itemID INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(250),
    subtitle VARCHAR(250),
    collectionID INT NOT NULL,
    isbn varchar(100),
    edition INT,
    publisher VARCHAR(250),
    year INT,
    place VARCHAR(250),
    section VARCHAR(250),
    synthesis VARCHAR(1500),
    isDigital BOOLEAN,
    inventory INT,
    library VARCHAR(250),
    physicalDescription VARCHAR(100),
    classification VARCHAR(250),
    url VARCHAR(500),
    number VARCHAR(100),
    cover VARCHAR(250),

    PRIMARY KEY(itemID),
    FOREIGN KEY (collectionID) REFERENCES Collection(collectionID)
);

CREATE TABLE IF NOT EXISTS Author (
    authorID INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(250),

    PRIMARY KEY(authorID)
);

CREATE TABLE IF NOT EXISTS Translator (
    translatorID INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(250),

    PRIMARY KEY(translatorID)
);

CREATE TABLE IF NOT EXISTS ItemAutor (
    authorID INT NOT NULL,
    itemID INT NOT NULL,

    PRIMARY KEY (authorID, itemID),
    FOREIGN KEY (authorID) REFERENCES Author(authorID),
    FOREIGN KEY (itemID) REFERENCES Item(itemID)
);

CREATE TABLE IF NOT EXISTS ItemTranslator (
    translatorID INT NOT NULL,
    itemID INT NOT NULL,

    PRIMARY KEY (translatorID, itemID),
    FOREIGN KEY (translatorID) REFERENCES Translator(translatorID),
    FOREIGN KEY (itemID) REFERENCES Item(itemID)
);

CREATE TABLE IF NOT EXISTS Tag (
    tagID INT NOT NULL AUTO_INCREMENT,
    name varchar(100),

    PRIMARY KEY(tagID)
);

CREATE TABLE IF NOT EXISTS ItemTag (
    tagID INT NOT NULL,
    itemID INT NOT NULL,

    PRIMARY KEY (tagID, itemID),
    FOREIGN KEY (tagID) REFERENCES Tag(tagID),
    FOREIGN KEY (itemID) REFERENCES Item(itemID)
);

CREATE TABLE IF NOT EXISTS Comment (
    commentID INT NOT NULL AUTO_INCREMENT,
    personID INT NOT NULL,
    itemID INT NOT NULL,
    content VARCHAR(2000),
    replyTo INT,

    PRIMARY KEY(commentID),
    FOREIGN KEY (personID) REFERENCES Person(personID),
    FOREIGN KEY (itemID) REFERENCES Item(itemID),
    FOREIGN KEY (replyTo) REFERENCES Comment(commentID)
);

CREATE TABLE IF NOT EXISTS Evaluation (
    personID INT NOT NULL,
    itemID INT NOT NULL,
    value INT,
    
    PRIMARY KEY(personID, itemID),
    FOREIGN KEY (personID) REFERENCES Person(personID),
    FOREIGN KEY (itemID) REFERENCES Item(itemID)
);

CREATE TABLE IF NOT EXISTS ItemPerson (
    personID INT NOT NULL,
    itemID INT NOT NULL,

    PRIMARY KEY (personID, itemID),
    FOREIGN KEY (personID) REFERENCES Person(personID),
    FOREIGN KEY (itemID) REFERENCES Item(itemID)
);