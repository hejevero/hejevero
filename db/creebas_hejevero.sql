-- MySQL Script generated by MySQL Workbench
-- Sun Dec 20 15:18:47 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema hejevero
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema hejevero
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hejevero` DEFAULT CHARACTER SET utf8 ;
USE `hejevero` ;

-- -----------------------------------------------------
-- Table `hejevero`.`level`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero`.`level` (
  `id_level` INT NOT NULL,
  `name_level` VARCHAR(45) NULL,
  `state_level` VARCHAR(5) NULL,
  PRIMARY KEY (`id_level`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero`.`user` (
  `id_user` INT NOT NULL,
  `code_user` VARCHAR(45) NULL,
  `name_user` VARCHAR(45) NULL,
  `lastname_user` VARCHAR(45) NULL,
  `nick_user` VARCHAR(45) NULL,
  `pass_user` VARCHAR(45) NULL,
  `state_user` VARCHAR(5) NULL,
  `level_id_level` INT NOT NULL,
  PRIMARY KEY (`id_user`),
  INDEX `fk_user_level_idx` (`level_id_level` ASC) ,
  CONSTRAINT `fk_user_level`
    FOREIGN KEY (`level_id_level`)
    REFERENCES `hejevero`.`level` (`id_level`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero`.`warehause`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero`.`warehause` (
  `id_warehause` INT NOT NULL,
  `code_warehause` VARCHAR(45) NULL,
  `name_warehause` VARCHAR(45) NULL,
  `date_warehause` VARCHAR(45) NULL,
  `country_warehause` VARCHAR(45) NULL,
  `city_warehause` VARCHAR(45) NULL,
  `direction_warehause` VARCHAR(45) NULL,
  `state_warehause` VARCHAR(5) NULL,
  PRIMARY KEY (`id_warehause`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero`.`product` (
  `id_product` INT NOT NULL,
  `code_product` VARCHAR(45) NULL,
  `name_product` VARCHAR(45) NULL,
  `detail_product` VARCHAR(200) NULL,
  `date_product` VARCHAR(45) NULL,
  `state_product` VARCHAR(5) NULL,
  PRIMARY KEY (`id_product`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero`.`storage`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero`.`storage` (
  `id_storage` INT NOT NULL,
  `name_storage` VARCHAR(45) NULL,
  `detail_storage` VARCHAR(200) NULL,
  `total_storage` VARCHAR(45) NULL,
  `state_storage` VARCHAR(5) NULL,
  `warehause_id_warehause` INT NOT NULL,
  PRIMARY KEY (`id_storage`),
  INDEX `fk_storage_warehause1_idx` (`warehause_id_warehause` ASC) ,
  CONSTRAINT `fk_storage_warehause1`
    FOREIGN KEY (`warehause_id_warehause`)
    REFERENCES `hejevero`.`warehause` (`id_warehause`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero`.`sto_pro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero`.`sto_pro` (
  `id_sto_pro` INT NOT NULL,
  `state_sto_pro` VARCHAR(5) NULL,
  `storage_id_storage` INT NOT NULL,
  `product_id_product` INT NOT NULL,
  PRIMARY KEY (`id_sto_pro`),
  INDEX `fk_sto_pro_storage1_idx` (`storage_id_storage` ASC) ,
  INDEX `fk_sto_pro_product1_idx` (`product_id_product` ASC) ,
  CONSTRAINT `fk_sto_pro_storage1`
    FOREIGN KEY (`storage_id_storage`)
    REFERENCES `hejevero`.`storage` (`id_storage`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sto_pro_product1`
    FOREIGN KEY (`product_id_product`)
    REFERENCES `hejevero`.`product` (`id_product`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero`.`config`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero`.`config` (
  `id_config` INT NOT NULL,
  `name_config` VARCHAR(45) NULL,
  `state_config` VARCHAR(5) NULL,
  PRIMARY KEY (`id_config`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero`.`priority`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero`.`priority` (
  `id_priority` INT NOT NULL,
  `name_priority` VARCHAR(45) NULL,
  `detail_priority` VARCHAR(45) NULL,
  `state_priority` VARCHAR(5) NULL,
  PRIMARY KEY (`id_priority`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero`.`level_prio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero`.`level_prio` (
  `id_level_prio` INT NOT NULL,
  `state_level_priocol` VARCHAR(5) NULL,
  `level_id_level` INT NOT NULL,
  `priority_id_priority` INT NOT NULL,
  `config_id_config` INT NOT NULL,
  `warehause_id_warehause` INT NOT NULL,
  PRIMARY KEY (`id_level_prio`),
  INDEX `fk_level_prio_level1_idx` (`level_id_level` ASC) ,
  INDEX `fk_level_prio_priority1_idx` (`priority_id_priority` ASC) ,
  INDEX `fk_level_prio_config1_idx` (`config_id_config` ASC) ,
  INDEX `fk_level_prio_warehause1_idx` (`warehause_id_warehause` ASC) ,
  CONSTRAINT `fk_level_prio_level1`
    FOREIGN KEY (`level_id_level`)
    REFERENCES `hejevero`.`level` (`id_level`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_level_prio_priority1`
    FOREIGN KEY (`priority_id_priority`)
    REFERENCES `hejevero`.`priority` (`id_priority`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_level_prio_config1`
    FOREIGN KEY (`config_id_config`)
    REFERENCES `hejevero`.`config` (`id_config`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_level_prio_warehause1`
    FOREIGN KEY (`warehause_id_warehause`)
    REFERENCES `hejevero`.`warehause` (`id_warehause`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero`.`record`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero`.`record` (
  `id_record` INT NOT NULL,
  `code_record` VARCHAR(45) NULL,
  `name_record` VARCHAR(45) NULL,
  `table_record` VARCHAR(45) NULL,
  `id_changed_record` VARCHAR(45) NULL,
  `state_record` VARCHAR(5) NULL,
  `user_id_user` INT NOT NULL,
  PRIMARY KEY (`id_record`),
  INDEX `fk_record_user1_idx` (`user_id_user` ASC) ,
  CONSTRAINT `fk_record_user1`
    FOREIGN KEY (`user_id_user`)
    REFERENCES `hejevero`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero`.`price`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero`.`price` (
  `id_price` INT NOT NULL,
  `start_date_price` VARCHAR(45) NULL,
  `end_price_price` VARCHAR(45) NULL,
  `new_price` VARCHAR(45) NULL,
  `level_price` VARCHAR(45) NULL,
  `state_price` VARCHAR(5) NULL,
  `product_id_product` INT NOT NULL,
  PRIMARY KEY (`id_price`),
  INDEX `fk_price_product1_idx` (`product_id_product` ASC) ,
  CONSTRAINT `fk_price_product1`
    FOREIGN KEY (`product_id_product`)
    REFERENCES `hejevero`.`product` (`id_product`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
