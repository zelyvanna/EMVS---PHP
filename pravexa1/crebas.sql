-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema dbRomandie
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbRomandie
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbRomandie` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `dbRomandie` ;

-- -----------------------------------------------------
-- Table `dbRomandie`.`tblEquipe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbRomandie`.`tblEquipe` (
  `equId` INT NOT NULL,
  `equNom` VARCHAR(45) NULL,
  PRIMARY KEY (`equId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbRomandie`.`tblCycliste`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbRomandie`.`tblCycliste` (
  `cyclId` INT NOT NULL,
  `tblEquipe_equId` INT NOT NULL,
  `cyclNom` VARCHAR(45) NULL,
  `cyclPrenom` VARCHAR(45) NULL,
  `cyclDateNaissance` DATE NULL,
  `cyclNationalite` VARCHAR(45) NULL,
  `cyclDossard` INT NULL,
  PRIMARY KEY (`cyclId`),
  INDEX `fk_tblCycliste_tblEquipe_idx` (`tblEquipe_equId` ASC),
  CONSTRAINT `fk_tblCycliste_tblEquipe`
    FOREIGN KEY (`tblEquipe_equId`)
    REFERENCES `dbRomandie`.`tblEquipe` (`equId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
