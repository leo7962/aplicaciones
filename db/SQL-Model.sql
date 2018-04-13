-- MySQL Script generated by MySQL Workbench
-- Thu Apr 12 19:01:49 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`OS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`OS` (
  `idOS` INT NOT NULL,
  `OSnombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idOS`),
  UNIQUE INDEX `idOS_UNIQUE` (`idOS` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`historial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`historial` (
  `idhistorial` INT NOT NULL,
  `seguimiento` VARCHAR(45) NULL,
  PRIMARY KEY (`idhistorial`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Producto` (
  `idProducto` INT NOT NULL,
  `Productonombre` VARCHAR(45) NULL,
  `Productocodigo` INT NULL,
  `historial_idhistorial` INT NOT NULL,
  `Productodescripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idProducto`),
  UNIQUE INDEX `idProducto_UNIQUE` (`idProducto` ASC),
  INDEX `fk_Producto_historial1_idx` (`historial_idhistorial` ASC),
  CONSTRAINT `fk_Producto_historial1`
    FOREIGN KEY (`historial_idhistorial`)
    REFERENCES `mydb`.`historial` (`idhistorial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`OT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`OT` (
  `idOT` INT NOT NULL,
  `OTnombre` VARCHAR(45) NULL,
  `OS_idOS` INT NOT NULL,
  `Producto_idProducto` INT NOT NULL,
  PRIMARY KEY (`idOT`),
  UNIQUE INDEX `idOT_UNIQUE` (`idOT` ASC),
  INDEX `fk_OT_OS_idx` (`OS_idOS` ASC),
  INDEX `fk_OT_Producto1_idx` (`Producto_idProducto` ASC),
  CONSTRAINT `fk_OT_OS`
    FOREIGN KEY (`OS_idOS`)
    REFERENCES `mydb`.`OS` (`idOS`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_OT_Producto1`
    FOREIGN KEY (`Producto_idProducto`)
    REFERENCES `mydb`.`Producto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;