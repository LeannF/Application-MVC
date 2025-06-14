--
-- Database : `klaxon`
--
DROP DATABASE IF EXISTS `Klaxon`;
CREATE DATABASE IF NOT EXISTS `Klaxon`;
USE `Klaxon`;


-- DROP TABLE IN ORDER

DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `ride`;
DROP TABLE IF EXISTS `agency`;


--
-- AGENCY TABLE
--

CREATE TABLE IF NOT EXISTS `agency` (
    `id_agency` INT AUTO_INCREMENT,
    `city` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id_agency`),
    KEY `city` (`city`)
);

--
-- RIDE TABLE
--

CREATE TABLE IF NOT EXISTS `ride` (
    `id_ride` INT AUTO_INCREMENT,
    `id_agency_departure` INT ,
    `departure_date` DATE NOT NULL,
    `departure_time` TIME NOT NULL,
    `id_agency_arrival` INT,
    `arrival_date` DATE,
    `arrival_time` TIME,
    `total_seat` INT NOT NULL,
    `available_seat` INT NOT NULL,
    `id_user` INT,
    PRIMARY KEY (`id_ride`),
    FOREIGN KEY (`id_agency_departure`) REFERENCES agency(`id_agency`) ON DELETE CASCADE,
    FOREIGN KEY (`id_agency_arrival`) REFERENCES agency(`id_agency`) ON DELETE CASCADE
);

--
-- USER TABLE
--

CREATE TABLE IF NOT EXISTS `user` (
    `id_user` INT AUTO_INCREMENT,
    `firstname` VARCHAR(50) NOT NULL,
    `lastname` VARCHAR(50) NOT NULL,
    `phonenumber` VARCHAR(20) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `role` ENUM('admin', 'employee', 'guest') DEFAULT 'guest',
    PRIMARY KEY (`id_user`),
    KEY `lastname` (`lastname`),
    UNIQUE KEY `email` (`email`),
    UNIQUE KEY `phonenumber` (`phonenumber`)
);