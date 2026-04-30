
CREATE DATABASE IF NOT EXISTS teamup
CHARACTER SET utf8
COLLATE utf8_general_ci;


USE teamup;


DROP TABLE IF EXISTS utilisateur;


CREATE TABLE utilisateur (
    id_utilisateur INT(11) NOT NULL AUTO_INCREMENT,
    utilisateur_nom VARCHAR(100) NOT NULL,
    utilisateur_login VARCHAR(100) NOT NULL,
    utilisateur_pwd VARCHAR(100) NOT NULL,
    utilisateur_email VARCHAR(100) NOT NULL,
    utilisateur_creation DATETIME DEFAULT NULL,
    PRIMARY KEY (id_utilisateur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO utilisateur (utilisateur_nom, utilisateur_login, utilisateur_pwd, utilisateur_email, utilisateur_creation)
VALUES 
('Jean Dupont', 'jdupont', 'secret', 'jean@example.com', NOW()),
('Marie Curie', 'mcurie', 'radio', 'marie@example.com', NOW()),
('Admin', 'admin', 'admin123', 'admin@teamup.com', NOW());