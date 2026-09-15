-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Biblioteca
-- -----------------------------------------------------
-- 
-- 

-- -----------------------------------------------------
-- Schema Biblioteca
--
-- 
-- 
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Biblioteca` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `Biblioteca` ;

-- -----------------------------------------------------
-- Table `Biblioteca`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Biblioteca`.`usuarios` (
  `id_usuarios` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  `senha` VARCHAR(45) NULL,
  PRIMARY KEY (`id_usuarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Biblioteca`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Biblioteca`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  `senha` VARCHAR(45) NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Biblioteca`.`emprestimo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Biblioteca`.`emprestimo` (
  `id_emprestimo` INT NOT NULL AUTO_INCREMENT,
  `data_emprestimo` DATE NULL,
  `data_devolucao` DATE NULL,
  `usuario_id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_emprestimo`),
  INDEX `fk_emprestimo_usuario1_idx` (`usuario_id_usuario` ASC) VISIBLE,
  CONSTRAINT `fk_emprestimo_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `Biblioteca`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Biblioteca`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Biblioteca`.`categoria` (
  `id_categoria` INT NOT NULL,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Biblioteca`.`livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Biblioteca`.`livro` (
  `id_livro` INT NOT NULL AUTO_INCREMENT,
  `ano_lancamento` INT NULL,
  `sinopse` TEXT NULL,
  `titulo` VARCHAR(45) NULL,
  `exemplares` INT NULL,
  `categoria_id_categoria` INT NOT NULL,
  PRIMARY KEY (`id_livro`),
  INDEX `fk_livro_categoria1_idx` (`categoria_id_categoria` ASC) VISIBLE,
  CONSTRAINT `fk_livro_categoria1`
    FOREIGN KEY (`categoria_id_categoria`)
    REFERENCES `Biblioteca`.`categoria` (`id_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Biblioteca`.`pedido_has_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Biblioteca`.`pedido_has_produto` (
  `pedido_id_pedido` INT NOT NULL,
  `produto_id_produto` INT NOT NULL,
  `quantidade` INT NULL,
  PRIMARY KEY (`pedido_id_pedido`, `produto_id_produto`),
  INDEX `fk_pedido_has_produto_pedido1_idx` (`pedido_id_pedido` ASC) VISIBLE,
  CONSTRAINT `fk_pedido_has_produto_pedido1`
    FOREIGN KEY (`pedido_id_pedido`)
    REFERENCES `Biblioteca`.`emprestimo` (`id_emprestimo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Biblioteca`.`emprestimo_has_livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Biblioteca`.`emprestimo_has_livro` (
  `emprestimo_id_emprestimo` INT NOT NULL,
  `livro_id_livro` INT NOT NULL,
  PRIMARY KEY (`emprestimo_id_emprestimo`, `livro_id_livro`),
  INDEX `fk_emprestimo_has_livro_livro1_idx` (`livro_id_livro` ASC) VISIBLE,
  INDEX `fk_emprestimo_has_livro_emprestimo1_idx` (`emprestimo_id_emprestimo` ASC) VISIBLE,
  CONSTRAINT `fk_emprestimo_has_livro_emprestimo1`
    FOREIGN KEY (`emprestimo_id_emprestimo`)
    REFERENCES `Biblioteca`.`emprestimo` (`id_emprestimo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_has_livro_livro1`
    FOREIGN KEY (`livro_id_livro`)
    REFERENCES `Biblioteca`.`livro` (`id_livro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
