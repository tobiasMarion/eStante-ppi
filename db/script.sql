CREATE DATABASE IF NOT EXISTS eStante;

USE estacionamento;

CREATE TABLE IF NOT EXISTS usuario (
    id int NOT NULL AUTO_INCREMENT,
    name VARCHAR(250),
    registration VARCHAR(250),
    cpf varchar(11),
    email VARCHAR(250),
    curso VARCHAR(250),
    isStudent BOOLEAN,
    library VARCHAR(250),
    isAway BOOLEAN,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS collection (
    id int NOT NULL AUTO_INCREMENT,
    type VARCHAR(250),
    cdu VARCHAR(250),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS item (
    id int NOT NULL AUTO_INCREMENT,
    isbn varchar(100),
    title VARCHAR(250),
    subtitle VARCHAR(250),
    edition int,
    publisher VARCHAR(250),
    year int,
    section VARCHAR(250),
    synthesis VARCHAR(1500),
    place VARCHAR(250),
    inventory int,
    library VARCHAR(250),
    physicalDescription VARCHAR(100),
    classification VARCHAR(250),
    isDigital BOOLEAN,
    link VARCHAR(500),
    number VARCHAR(100)

    --TAGS
    collection int NOT NULL,
    authors VARCHAR(300),
    translators VARCHAR(160),
    -- COVER


    PRIMARY KEY(id)
)

