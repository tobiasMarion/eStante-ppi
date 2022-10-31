CREATE DATABASE IF NOT EXISTS eStante;

USE eStante;

CREATE TABLE IF NOT EXISTS user (
    userID INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(250),
    registration VARCHAR(250),
    cpf varchar(11),
    email VARCHAR(250),
    password VARCHAR(256),
    course VARCHAR(250),
    isStudent BOOLEAN,
    library VARCHAR(250),
    isAway BOOLEAN,

    PRIMARY KEY(userID)
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
    number VARCHAR(100) cover VARCHAR(250),
    
    collectionID INT NOT NULL,
    -- AUTHORS
    -- TRANSLATORS
    -- TAGS
    
    PRIMARY KEY(itemID),
    FOREIGN KEY (collectionID) REFERENCES Persons(collectionID)
);

CREATE TABLE IF NOT EXISTS comment (
    commentID INT NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL,
    itemID INT NOT NULL,
    content VARCHAR(2000),

    PRIMARY KEY(commentID),
    FOREIGN KEY (userID) REFERENCES Persons(userID),    
    FOREIGN KEY (itemID) REFERENCES Persons(itemID)
);

CREATE TABLE IF NOT EXISTS evaluation (
    evaluationID INT NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL,
    itemID INT NOT NULL,
    value INT,

    PRIMARY KEY(evaluationID),
    FOREIGN KEY (userID) REFERENCES Persons(userID),
    FOREIGN KEY (itemID) REFERENCES Persons(itemID)
);
