-- MySQL Workbench Synchronization
-- Generated: 2019-02-25 11:49
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: SGT

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE DATABASE IF NOT EXISTS `admincursos` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `admincursos`.`cpanel_user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(90) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `admincursos`.`tbfoto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NULL DEFAULT NULL,
  `conteudo` MEDIUMBLOB NULL DEFAULT NULL,
  `tipo` VARCHAR(20) NULL DEFAULT NULL,
  `tamanho` INT(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `admincursos`.`tbfacilitador` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `graduacao` TEXT NULL DEFAULT NULL,
  `facebook` VARCHAR(45) NULL DEFAULT NULL,
  `linkedin` VARCHAR(45) NULL DEFAULT NULL,
  `fk_idfoto` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbfacilitador_foto1_idx` (`fk_idfoto` ASC),
  CONSTRAINT `fk_tbfacilitador_foto1`
    FOREIGN KEY (`fk_idfoto`)
    REFERENCES `admincursos`.`tbfoto` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `admincursos`.`tbparceiros` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `site` VARCHAR(45) NULL DEFAULT NULL,
  `fk_idfoto` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbparceiros_foto1_idx` (`fk_idfoto` ASC),
  CONSTRAINT `fk_tbparceiros_foto1`
    FOREIGN KEY (`fk_idfoto`)
    REFERENCES `admincursos`.`tbfoto` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `admincursos`.`tbcurso` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(50) NULL DEFAULT NULL,
  `local` VARCHAR(255) NULL DEFAULT NULL,
  `horario` VARCHAR(45) NULL DEFAULT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `sigla` VARCHAR(45) NULL DEFAULT NULL,
  `ativo` INT(11) NULL DEFAULT '1',
  `fk_idfacilitador` INT(11) NOT NULL,
  `fk_idparceiro` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbcurso_tbfacilitador1_idx` (`fk_idfacilitador` ASC),
  INDEX `fk_tbcurso_tbparceiros1_idx` (`fk_idparceiro` ASC),
  CONSTRAINT `fk_tbcurso_tbfacilitador1`
    FOREIGN KEY (`fk_idfacilitador`)
    REFERENCES `admincursos`.`tbfacilitador` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tbcurso_tbparceiros1`
    FOREIGN KEY (`fk_idparceiro`)
    REFERENCES `admincursos`.`tbparceiros` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `admincursos`.`tbdepoimentos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `responsavel` VARCHAR(50) NULL DEFAULT NULL,
  `depoimento` TEXT NULL DEFAULT NULL,
  `fk_idcurso` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbdepoimentos_tbcurso1_idx` (`fk_idcurso` ASC),
  CONSTRAINT `fk_tbdepoimentos_tbcurso1`
    FOREIGN KEY (`fk_idcurso`)
    REFERENCES `admincursos`.`tbcurso` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `admincursos`.`tbinfo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `objetivo` TEXT NULL DEFAULT NULL,
  `beneficio` TEXT NULL DEFAULT NULL,
  `publico_alvo` TEXT NULL DEFAULT NULL,
  `fk_idcurso` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbinfo_tbcurso_idx` (`fk_idcurso` ASC),
  CONSTRAINT `fk_tbinfo_tbcurso`
    FOREIGN KEY (`fk_idcurso`)
    REFERENCES `admincursos`.`tbcurso` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `admincursos`.`tbinscricoes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL DEFAULT NULL,
  `cpf` VARCHAR(15) NULL DEFAULT NULL,
  `telefone` VARCHAR(14) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `informacaoadcional` TEXT NULL DEFAULT NULL,
  `fk_idcurso` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbincricoes_tbcurso1_idx` (`fk_idcurso` ASC),
  CONSTRAINT `fk_tbincricoes_tbcurso1`
    FOREIGN KEY (`fk_idcurso`)
    REFERENCES `admincursos`.`tbcurso` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `admincursos`.`tbfatura` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(9) NULL DEFAULT NULL,
  `cpf` VARCHAR(15) NULL DEFAULT NULL,
  `razao_socal` VARCHAR(45) NULL DEFAULT NULL,
  `nome_fantasia` VARCHAR(45) NULL DEFAULT NULL,
  `cnpj` VARCHAR(19) NULL DEFAULT NULL,
  `responsavel` VARCHAR(255) NULL DEFAULT NULL,
  `endereco` VARCHAR(255) NULL DEFAULT NULL,
  `bairro` VARCHAR(50) NULL DEFAULT NULL,
  `cidade` VARCHAR(255) NULL DEFAULT NULL,
  `cep` VARCHAR(9) NULL DEFAULT NULL,
  `estado` VARCHAR(2) NULL DEFAULT NULL,
  `telefone` VARCHAR(14) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `fk_idinscricoes` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbfatura_tbincricoes1_idx` (`fk_idinscricoes` ASC),
  CONSTRAINT `fk_tbfatura_tbincricoes1`
    FOREIGN KEY (`fk_idinscricoes`)
    REFERENCES `admincursos`.`tbinscricoes` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `admincursos`.`cpanel_user` (`id`, `nome`, `usuario`, `senha`, `email`) VALUES
(1, 'Joyce Carvalho', 'joyce', '$2y$10$18NBwHDQIPxmTj1INxA5rOlnrH5tQusMNh/tYWxKa//f3ZEAkoKxy', 'desenvolvimento@sgtgestaoetecnologia.com.br');


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
