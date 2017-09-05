-- MySQL Script generated by MySQL Workbench
-- Tue Sep  5 11:12:47 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema chatbox
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema chatbox
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `chatbox` DEFAULT CHARACTER SET utf8 ;
USE `chatbox` ;

-- -----------------------------------------------------
-- Table `chatbox`.`USER`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chatbox`.`USER` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nickname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `last_logout` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `nickname_UNIQUE` (`nickname` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chatbox`.`CONVERSATION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chatbox`.`CONVERSATION` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chatbox`.`MESSAGE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chatbox`.`MESSAGE` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(45) NOT NULL,
  `conversation` INT NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_MESSAGE_CONVERSATION1_idx` (`conversation` ASC),
  CONSTRAINT `fk_MESSAGE_CONVERSATION1`
    FOREIGN KEY (`conversation`)
    REFERENCES `chatbox`.`CONVERSATION` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chatbox`.`USER_CONVERSATION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chatbox`.`USER_CONVERSATION` (
  `user` INT NOT NULL,
  `conversation` INT NOT NULL,
  PRIMARY KEY (`user`, `conversation`),
  INDEX `fk_USER_has_CONVERSATION_CONVERSATION1_idx` (`conversation` ASC),
  INDEX `fk_USER_has_CONVERSATION_USER_idx` (`user` ASC),
  CONSTRAINT `fk_USER_has_CONVERSATION_USER`
    FOREIGN KEY (`user`)
    REFERENCES `chatbox`.`USER` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USER_has_CONVERSATION_CONVERSATION1`
    FOREIGN KEY (`conversation`)
    REFERENCES `chatbox`.`CONVERSATION` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
