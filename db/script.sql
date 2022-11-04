CREATE DATABASE IF NOT EXISTS eStante;

USE eStante;

CREATE TABLE IF NOT EXISTS person (
    personID INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(250),
    registration VARCHAR(250),
    cpf varchar(11),
    email VARCHAR(250),
    password VARCHAR(256),
    course VARCHAR(250),
    type ENUM('TEACHER', 'STUDENT', 'EMPLOYEE'),
    library VARCHAR(250),
    isAway BOOLEAN,
    permissionLevel ENUM('ADMIN', 'EMPLOYEE', 'MODERATOR', 'READER'),

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
    -- Verificar
    translators VARCHAR(100),
    authors VARCHAR(100),

    PRIMARY KEY(itemID),
    FOREIGN KEY (collectionID) REFERENCES collection (collectionID)
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
