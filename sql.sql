-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema maisonneuve2195617
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema maisonneuve2195617
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `maisonneuve2195617` DEFAULT CHARACTER SET utf8 ;
USE `maisonneuve2195617` ;

-- -----------------------------------------------------
-- Table `maisonneuve2195617`.`ville`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `maisonneuve2195617`.`ville` (
  `id` INT NOT NULL,
  `nom` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `maisonneuve2195617`.`etudiant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `maisonneuve2195617`.`etudiant` (
  `id` INT NOT NULL,
  `nom` VARCHAR(45) NULL,
  `adresse` VARCHAR(45) NULL,
  `phone` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `date_naissance` VARCHAR(45) NULL,
  `ville_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_etudiant_ville_idx` (`ville_id` ASC),
  CONSTRAINT `fk_etudiant_ville`
    FOREIGN KEY (`ville_id`)
    REFERENCES `maisonneuve2195617`.`ville` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
