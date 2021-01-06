-- MySQL Script generated by MySQL Workbench
-- Wed Jan  6 15:22:07 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema hejevero2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema hejevero2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hejevero2` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci ;
USE `hejevero2` ;

-- -----------------------------------------------------
-- Table `hejevero2`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero2`.`user` (
  `Id_user` INT NOT NULL,
  `Cod_user` VARCHAR(45) NULL,
  `Nam_user` VARCHAR(45) NULL,
  `Lasn_user` VARCHAR(45) NULL,
  `Nick_user` VARCHAR(45) NULL,
  `Pass_user` VARCHAR(45) NULL,
  `Dat_user` VARCHAR(45) NULL,
  `Sta_user` VARCHAR(5) NULL,
  PRIMARY KEY (`Id_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero2`.`level`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero2`.`level` (
  `Id_level` INT NOT NULL,
  `Nam_level` VARCHAR(45) NULL,
  `Sta_level` VARCHAR(5) NULL,
  PRIMARY KEY (`Id_level`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero2`.`warehouse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero2`.`warehouse` (
  `Id_wh` INT NOT NULL,
  `Cod_wh` VARCHAR(45) NULL,
  `Name_wh` VARCHAR(45) NULL,
  `Dat_wh` VARCHAR(45) NULL,
  `Cou_wh` VARCHAR(45) NULL,
  `Cit_wh` VARCHAR(45) NULL,
  `Dir_wh` VARCHAR(45) NULL,
  `Sta_wh` VARCHAR(5) NULL,
  PRIMARY KEY (`Id_wh`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero2`.`level_user_warehouse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero2`.`level_user_warehouse` (
  `Id_luw` INT NOT NULL,
  `Sta_luw` VARCHAR(5) NULL,
  `user_Id_user` INT NOT NULL,
  `level_Id_level` INT NOT NULL,
  `warehouse_Id_wh` INT NOT NULL,
  PRIMARY KEY (`Id_luw`),
  INDEX `fk_level_user_warehouse_user1_idx` (`user_Id_user` ASC) ,
  INDEX `fk_level_user_warehouse_level1_idx` (`level_Id_level` ASC) ,
  INDEX `fk_level_user_warehouse_warehouse1_idx` (`warehouse_Id_wh` ASC) ,
  CONSTRAINT `fk_level_user_warehouse_user1`
    FOREIGN KEY (`user_Id_user`)
    REFERENCES `hejevero2`.`user` (`Id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_level_user_warehouse_level1`
    FOREIGN KEY (`level_Id_level`)
    REFERENCES `hejevero2`.`level` (`Id_level`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_level_user_warehouse_warehouse1`
    FOREIGN KEY (`warehouse_Id_wh`)
    REFERENCES `hejevero2`.`warehouse` (`Id_wh`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero2`.`system`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero2`.`system` (
  `Id_sys` INT NOT NULL,
  `State_sys` VARCHAR(5) NULL,
  `user_Id_user` INT NOT NULL,
  `level_Id_level` INT NOT NULL,
  PRIMARY KEY (`Id_sys`),
  INDEX `fk_system_user1_idx` (`user_Id_user` ASC) ,
  INDEX `fk_system_level1_idx` (`level_Id_level` ASC) ,
  CONSTRAINT `fk_system_user1`
    FOREIGN KEY (`user_Id_user`)
    REFERENCES `hejevero2`.`user` (`Id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_system_level1`
    FOREIGN KEY (`level_Id_level`)
    REFERENCES `hejevero2`.`level` (`Id_level`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero2`.`function`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero2`.`function` (
  `Id_fun` INT NOT NULL,
  `Nam_fun` VARCHAR(45) NULL,
  `Sta_fun` VARCHAR(5) NULL,
  PRIMARY KEY (`Id_fun`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero2`.`priority`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero2`.`priority` (
  `Id_pri` INT NOT NULL,
  `Pub_pri` VARCHAR(45) NULL,
  `Tab_pri` VARCHAR(45) NULL,
  `Sta_pri` VARCHAR(45) NULL,
  `function_Id_fun` INT NOT NULL,
  PRIMARY KEY (`Id_pri`),
  INDEX `fk_priority_function1_idx` (`function_Id_fun` ASC) ,
  CONSTRAINT `fk_priority_function1`
    FOREIGN KEY (`function_Id_fun`)
    REFERENCES `hejevero2`.`function` (`Id_fun`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero2`.`level_priority`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero2`.`level_priority` (
  `Id_lp` INT NOT NULL,
  `Sta_lp` VARCHAR(5) NULL,
  `level_Id_level` INT NOT NULL,
  `priority_Id_pri` INT NOT NULL,
  PRIMARY KEY (`Id_lp`),
  INDEX `fk_level_priority_level1_idx` (`level_Id_level` ASC) ,
  INDEX `fk_level_priority_priority1_idx` (`priority_Id_pri` ASC) ,
  CONSTRAINT `fk_level_priority_level1`
    FOREIGN KEY (`level_Id_level`)
    REFERENCES `hejevero2`.`level` (`Id_level`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_level_priority_priority1`
    FOREIGN KEY (`priority_Id_pri`)
    REFERENCES `hejevero2`.`priority` (`Id_pri`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero2`.`record`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero2`.`record` (
  `Id_rec` INT NOT NULL,
  `Cod_rec` VARCHAR(45) NULL,
  `Nam_rec` VARCHAR(45) NULL,
  `Tab_rec` VARCHAR(45) NULL,
  `Id_Chan_rec` VARCHAR(45) NULL,
  `Sta_rec` VARCHAR(5) NULL,
  `user_Id_user` INT NOT NULL,
  PRIMARY KEY (`Id_rec`),
  INDEX `fk_record_user2_idx` (`user_Id_user` ASC) ,
  CONSTRAINT `fk_record_user2`
    FOREIGN KEY (`user_Id_user`)
    REFERENCES `hejevero2`.`user` (`Id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero2`.`family`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero2`.`family` (
  `Id_fam` INT NOT NULL,
  `Nam_fam` VARCHAR(45) NULL,
  `Sta_fam` VARCHAR(5) NULL,
  PRIMARY KEY (`Id_fam`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero2`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero2`.`product` (
  `Id_pro` INT NOT NULL,
  `Cod_pro` VARCHAR(45) NULL,
  `Nam_pro` VARCHAR(45) NULL,
  `Det_pro` VARCHAR(300) NULL,
  `Dat_pro` VARCHAR(45) NULL,
  `Stock_pro` VARCHAR(45) NULL,
  `Sta_pro` VARCHAR(5) NULL,
  `family_Id_fam` INT NOT NULL,
  PRIMARY KEY (`Id_pro`),
  INDEX `fk_product_family1_idx` (`family_Id_fam` ASC) ,
  CONSTRAINT `fk_product_family1`
    FOREIGN KEY (`family_Id_fam`)
    REFERENCES `hejevero2`.`family` (`Id_fam`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero2`.`storage`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero2`.`storage` (
  `Id_stor` INT NOT NULL,
  `Dat_stor` VARCHAR(45) NULL,
  `Det_stor` VARCHAR(300) NULL,
  `Tot_stor` VARCHAR(45) NULL,
  `Sta_stor` VARCHAR(5) NULL,
  `warehouse_Id_wh` INT NOT NULL,
  PRIMARY KEY (`Id_stor`),
  INDEX `fk_storage_warehouse1_idx` (`warehouse_Id_wh` ASC) ,
  CONSTRAINT `fk_storage_warehouse1`
    FOREIGN KEY (`warehouse_Id_wh`)
    REFERENCES `hejevero2`.`warehouse` (`Id_wh`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero2`.`storage_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero2`.`storage_product` (
  `Id_sp` INT NOT NULL,
  `Tot_sp` VARCHAR(45) NULL,
  `Qua_sp` VARCHAR(45) NULL,
  `Act_Stock_sp` VARCHAR(45) NULL,
  `Sta_sp` VARCHAR(5) NULL,
  `storage_Id_stor` INT NOT NULL,
  `product_Id_pro` INT NOT NULL,
  PRIMARY KEY (`Id_sp`),
  INDEX `fk_storage_product_storage1_idx` (`storage_Id_stor` ASC) ,
  INDEX `fk_storage_product_product1_idx` (`product_Id_pro` ASC) ,
  CONSTRAINT `fk_storage_product_storage1`
    FOREIGN KEY (`storage_Id_stor`)
    REFERENCES `hejevero2`.`storage` (`Id_stor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_storage_product_product1`
    FOREIGN KEY (`product_Id_pro`)
    REFERENCES `hejevero2`.`product` (`Id_pro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hejevero2`.`price`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hejevero2`.`price` (
  `Id_price` INT NOT NULL,
  `Cod_price` VARCHAR(45) NULL,
  `Start_dat_price` VARCHAR(45) NULL,
  `End_dat_price` VARCHAR(45) NULL,
  `New_price` VARCHAR(45) NULL,
  `State_price` VARCHAR(5) NULL,
  `product_Id_pro` INT NOT NULL,
  PRIMARY KEY (`Id_price`),
  INDEX `fk_price_product2_idx` (`product_Id_pro` ASC) ,
  CONSTRAINT `fk_price_product2`
    FOREIGN KEY (`product_Id_pro`)
    REFERENCES `hejevero2`.`product` (`Id_pro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
