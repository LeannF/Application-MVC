--
-- Base de données : `klaxon`
--
DROP DATABASE IF EXISTS `Klaxon`;
CREATE DATABASE IF NOT EXISTS `Klaxon`;
USE `Klaxon`;


-- Suppression des tables dans le bon ordre

DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `ride`;
DROP TABLE IF EXISTS `agency`;


--
-- Structure de la table agency
--

CREATE TABLE IF NOT EXISTS `agency` (
    `id_agency` INT AUTO_INCREMENT,
    `city` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id_agency`),
    KEY `city` (`city`)
);

--
-- Structure de la table ride
--

CREATE TABLE IF NOT EXISTS `ride` (
    `id_ride` INT AUTO_INCREMENT,
    `id_agency_departure` INT NOT NULL,
    `id_agency_arrival` INT NOT NULL,
    `departure_time` DATETIME NOT NULL,
    `arrival_time` DATETIME NOT NULL,
    `total_seat` INT NOT NULL,
    `available_seat` INT NOT NULL,
    `contact` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id_ride`),
    FOREIGN KEY (`id_agency_departure`) REFERENCES agency(`id_agency`) ON DELETE CASCADE,
    FOREIGN KEY (`id_agency_arrival`) REFERENCES agency(`id_agency`) ON DELETE CASCADE
);

--
-- Structure de la table user
--

CREATE TABLE IF NOT EXISTS `user` (
    `id_user` INT AUTO_INCREMENT,
    `firstname` VARCHAR(50) NOT NULL,
    `lastname` VARCHAR(50) NOT NULL,
    `phonenumber` VARCHAR(20) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `role` VARCHAR(50) NOT NULL,
    `id_ride` INT,
    PRIMARY KEY (`id_user`),
    KEY `lastname` (`lastname`),
    FOREIGN KEY (`id_ride`) REFERENCES ride(`id_ride`) ON DELETE CASCADE,
    UNIQUE KEY `email` (`email`),
    UNIQUE KEY `phonenumber` (`phonenumber`)
);