-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema blog
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 ;
USE `blog` ;

-- -----------------------------------------------------
-- Table `blog`.`author`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`author` (
  `author_id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(512) NOT NULL,
  `full_name` VARCHAR(45) NOT NULL,
  `active` TINYINT NULL DEFAULT 0,
  PRIMARY KEY (`author_id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `blog`.`article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`article` (
  `article_id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `content` MEDIUMTEXT NOT NULL,
  `published_date` DATE NOT NULL,
  `excerpt` TINYTEXT NOT NULL,
  `image` VARCHAR(100) NOT NULL,
  `author_id` INT NOT NULL,
  PRIMARY KEY (`article_id`),
  INDEX `fk_article_author_idx` (`author_id` ASC),
  CONSTRAINT `fk_article_author`
    FOREIGN KEY (`author_id`)
    REFERENCES `blog`.`author` (`author_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `blog`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`category` (
  `category_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`category_id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `blog`.`article_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`article_category` (
  `article_id` INT NOT NULL,
  `category_id` INT NOT NULL,
  PRIMARY KEY (`article_id`, `category_id`),
  INDEX `fk_article_category_category_idx` (`category_id` ASC),
  INDEX `fk_article_category_article_idx` (`article_id` ASC),
  CONSTRAINT `fk_article_category_article`
    FOREIGN KEY (`article_id`)
    REFERENCES `blog`.`article` (`article_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_article_category_category`
    FOREIGN KEY (`category_id`)
    REFERENCES `blog`.`category` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
