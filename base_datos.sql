SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `base_datos` ;
CREATE SCHEMA IF NOT EXISTS `base_datos` DEFAULT CHARACTER SET utf8 ;
USE `base_datos` ;

-- -----------------------------------------------------
-- Table `base_datos`.`paises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `base_datos`.`paises` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `base_datos`.`provincias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `base_datos`.`provincias` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base_datos`.`departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `base_datos`.`departamento` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `provincias_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_localidades_provincias1_idx` (`provincias_id` ASC),
  CONSTRAINT `fk_localidades_provincias1`
    FOREIGN KEY (`provincias_id`)
    REFERENCES `base_datos`.`provincias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base_datos`.`localidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `base_datos`.`localidad` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `localidades_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_ciudades_localidades1_idx` (`localidades_id` ASC),
  CONSTRAINT `fk_ciudades_localidades1`
    FOREIGN KEY (`localidades_id`)
    REFERENCES `base_datos`.`departamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `base_datos`.`personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `base_datos`.`personas` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dni` INT(10) UNSIGNED NOT NULL,
  `apellido` VARCHAR(80) NOT NULL,
  `nombre` VARCHAR(80) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `lugar_nacimiento_id` INT UNSIGNED NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `pais_id` INT UNSIGNED NOT NULL,
  `domicilio` VARCHAR(45) NOT NULL,
  `ciudades_id` INT UNSIGNED NOT NULL,
  `fecha_expedicion` DATE NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `dni_UNIQUE` (`dni` ASC),
  INDEX `fk_personas_nacionalidades1_idx` (`pais_id` ASC),
  INDEX `fk_personas_ciudades1_idx` (`ciudades_id` ASC),
  INDEX `fk_personas_provincias1_idx` (`lugar_nacimiento_id` ASC),
  CONSTRAINT `fk_personas_nacionalidades1`
    FOREIGN KEY (`pais_id`)
    REFERENCES `base_datos`.`paises` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_personas_ciudades1`
    FOREIGN KEY (`ciudades_id`)
    REFERENCES `base_datos`.`localidad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_personas_provincias1`
    FOREIGN KEY (`lugar_nacimiento_id`)
    REFERENCES `base_datos`.`provincias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `base_datos`.`paises`
-- -----------------------------------------------------
START TRANSACTION;
USE `base_datos`;
INSERT INTO `base_datos`.`paises` (`id`, `nombre`) VALUES (1, 'argentina');
INSERT INTO `base_datos`.`paises` (`id`, `nombre`) VALUES (2, 'brazil');
INSERT INTO `base_datos`.`paises` (`id`, `nombre`) VALUES (3, 'chile');

COMMIT;


-- -----------------------------------------------------
-- Data for table `base_datos`.`provincias`
-- -----------------------------------------------------
START TRANSACTION;
USE `base_datos`;
INSERT INTO `base_datos`.`provincias` (`id`, `nombre`) VALUES (1, 'chubut');
INSERT INTO `base_datos`.`provincias` (`id`, `nombre`) VALUES (2, 'rio negro');
INSERT INTO `base_datos`.`provincias` (`id`, `nombre`) VALUES (3, 'buenos aires');
INSERT INTO `base_datos`.`provincias` (`id`, `nombre`) VALUES (4, 'cordoba');
INSERT INTO `base_datos`.`provincias` (`id`, `nombre`) VALUES (5, 'santa cruz');
INSERT INTO `base_datos`.`provincias` (`id`, `nombre`) VALUES (6, 'mendoza');

COMMIT;


-- -----------------------------------------------------
-- Data for table `base_datos`.`departamento`
-- -----------------------------------------------------
START TRANSACTION;
USE `base_datos`;
INSERT INTO `base_datos`.`departamento` (`id`, `nombre`, `provincias_id`) VALUES (1, 'rawson', 1);
INSERT INTO `base_datos`.`departamento` (`id`, `nombre`, `provincias_id`) VALUES (2, 'sarmiento', 1);
INSERT INTO `base_datos`.`departamento` (`id`, `nombre`, `provincias_id`) VALUES (3, 'san antonio', 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `base_datos`.`localidad`
-- -----------------------------------------------------
START TRANSACTION;
USE `base_datos`;
INSERT INTO `base_datos`.`localidad` (`id`, `nombre`, `localidades_id`) VALUES (1, 'trelew', 1);
INSERT INTO `base_datos`.`localidad` (`id`, `nombre`, `localidades_id`) VALUES (2, 'rawson', 2);
INSERT INTO `base_datos`.`localidad` (`id`, `nombre`, `localidades_id`) VALUES (3, 'san antonio oeste', 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `base_datos`.`personas`
-- -----------------------------------------------------
START TRANSACTION;
USE `base_datos`;
INSERT INTO `base_datos`.`personas` (`id`, `dni`, `apellido`, `nombre`, `fecha_nacimiento`, `lugar_nacimiento_id`, `sexo`, `pais_id`, `domicilio`, `ciudades_id`, `fecha_expedicion`) VALUES (1, 35604223, 'garay', 'micaela', '11-10-1990', 1, 'f', 1, 'a.p.bell 35', 1, '28-08-2015');

COMMIT;

