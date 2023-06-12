-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


CREATE SCHEMA IF NOT EXISTS `agencia` DEFAULT CHARACTER SET utf8 ;
USE `agencia` ;





CREATE TABLE IF NOT EXISTS `agencia`.`cliente` (
  `cpf` VARCHAR(30) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `dataNascimento` VARCHAR(10) NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`cpf`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrinhoCompras`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agencia`.`estado` (
  `Uf` VARCHAR(5) NOT NULL,
  `Nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Uf`)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `agencia`.`municipio` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Codigo` INT NOT NULL,
  `Nome` VARCHAR(100) NOT NULL,
  `estado_Uf` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`Id`, `estado_Uf`),
  INDEX `fk_municipio_estado1_idx` (`estado_Uf` ASC),
  CONSTRAINT `fk_municipio_estado1`
    FOREIGN KEY (`estado_Uf`)
    REFERENCES `agencia`.`estado` (`Uf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `agencia`.`carrinho` (
  `idcarrinho` INT NOT NULL AUTO_INCREMENT,
  `cliente_cpf` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idcarrinho`, `cliente_cpf`),
  INDEX `fk_carrinho_cliente1_idx` (`cliente_cpf` ASC),
  CONSTRAINT `fk_carrinho_cliente1`
    FOREIGN KEY (`cliente_cpf`)
    REFERENCES `agencia`.`cliente` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `agencia`.`carrinho_has_pacote` (
  `carrinho_idcarrinho` INT NOT NULL,
  `pacotes_codigo` INT NOT NULL,
    PRIMARY KEY (`carrinho_idcarrinho`, `pacotes_codigo`),
  INDEX `fk_carrinho_has_pacote_pacote1_idx` (`pacotes_codigo` ASC),
  INDEX `fk_carrinho_has_pacote_carrinho1_idx` (`carrinho_idcarrinho` ASC),
  CONSTRAINT `fk_carrinho_has_pacote_carrinho1`
    FOREIGN KEY (`carrinho_idcarrinho`)
    REFERENCES `agencia`.`carrinho` (`idcarrinho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carrinho_has_pacote_pacote1`
    FOREIGN KEY (`pacote_codigo`)
    REFERENCES `agencia`.`pacotes` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `agencia`.`finalizaCompra` (
  `idfinalizaCompra` INT NOT NULL AUTO_INCREMENT,
  `carrinho_idcarrinho` INT NOT NULL,
  `status` ENUM('AB', 'CL') NOT NULL,
  `municipio_Id` INT NOT NULL,
  PRIMARY KEY (`idfinalizaCompra`),
  INDEX `fk_finalizaCompra_carrinho1_idx` (`carrinho_idcarrinho` ASC),
  INDEX `fk_finalizaCompra_municipio1_idx` (`municipio_Id` ASC),
  CONSTRAINT `fk_finalizaCompra_carrinho1`
    FOREIGN KEY (`carrinho_idcarrinho`)
    REFERENCES `agencia`.`carrinho` (`idcarrinho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_finalizaCompra_municipio1`
    FOREIGN KEY (`municipio_Id`)
    REFERENCES `agencia`.`municipio` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `agencia`.`pedidoConcluido` (
  `idpedidoConcluido` INT NOT NULL AUTO_INCREMENT,
  `cliente_cpf` VARCHAR(30) NOT NULL,
  `nomepacote` VARCHAR(45) NOT NULL,
  `valorpacote` FLOAT NOT NULL,
  PRIMARY KEY (`idpedidoConcluido`, `cliente_cpf`),
  INDEX `fk_pedidoConcluido_cliente1_idx` (`cliente_cpf` ASC),
  CONSTRAINT `fk_pedidoConcluido_cliente1`
    FOREIGN KEY (`cliente_cpf`)
    REFERENCES `agencia`.`cliente` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;



Insert into estado (Uf, Nome) values ('AC', 'Acre');
Insert into estado (Uf, Nome) values ('AL', 'Alagoas');
Insert into estado (Uf, Nome) values ('AP', 'Amapá');
Insert into estado (Uf, Nome) values ('AM', 'Amazonas');
Insert into estado (Uf, Nome) values ('BA', 'Bahia');
Insert into estado (Uf, Nome) values ('CE', 'Ceará');
Insert into estado (Uf, Nome) values ('DF', 'Distrito Federal');
Insert into estado (Uf, Nome) values ('ES', 'Espírito Santo');
Insert into estado (Uf, Nome) values ('GO', 'Goiás');
Insert into estado (Uf, Nome) values ('MA', 'Maranhão');
Insert into estado (Uf, Nome) values ('MT', 'Mato Grosso');
Insert into estado (Uf, Nome) values ('MS', 'Mato Grosso do Sul');
Insert into estado (Uf, Nome) values ('MG', 'Minas Gerais');
Insert into estado (Uf, Nome) values ('PA', 'Pará');
Insert into estado (Uf, Nome) values ('PB', 'Paraíba');
Insert into estado (Uf, Nome) values ('PR', 'Paraná');
Insert into estado (Uf, Nome) values ('PE', 'Pernambuco');
Insert into estado (Uf, Nome) values ('PI', 'Piauí');
Insert into estado (Uf, Nome) values ('RJ', 'Rio de Janeiro');
Insert into estado (Uf, Nome) values ('RN', 'Rio Grande do Norte');
Insert into estado (Uf, Nome) values ('RS', 'Rio Grande do Sul');
Insert into estado (Uf, Nome) values ('RO', 'Rondônia');
Insert into estado (Uf, Nome) values ('RR', 'Roraima');
Insert into estado (Uf, Nome) values ('SC', 'Santa Catarina');
Insert into estado (Uf, Nome) values ('SP', 'São Paulo');
Insert into estado (Uf, Nome) values ('SE', 'Sergipe');
Insert into estado (Uf, Nome) values ('TO', 'Tocantins');


INSERT INTO municipio (Codigo, Nome, estado_Uf) VALUES
(9876, 'Rio Branco', 'AC'),
(1234, 'Maceió', 'AL'),
(5678, 'Macapá', 'AP'),
(2468, 'Manaus', 'AM'),
(1357, 'Salvador', 'BA'),
(9870, 'Fortaleza', 'CE'),
(5432, 'Brasília', 'DF'),
(8642, 'Vitória', 'ES'),
(9753, 'Goiânia', 'GO'),
(2837, 'São Luís', 'MA'),
(6589, 'Cuiabá', 'MT'),
(7241, 'Campo Grande', 'MS'),
(3141, 'Belo Horizonte', 'MG'),
(8910, 'Belém', 'PA'),
(9632, 'João Pessoa', 'PB'),
(4444, 'Curitiba', 'PR'),
(2222, 'Recife', 'PE'),
(7777, 'Teresina', 'PI'),
(9999, 'Rio de Janeiro', 'RJ'),
(1111, 'Natal', 'RN'),
(8888, 'Porto Alegre', 'RS'),
(6666, 'Porto Velho', 'RO'),
(5555, 'Boa Vista', 'RR'),
(3333, 'Florianópolis', 'SC'),
(2223, 'São Paulo', 'SP'),
(8889, 'Aracaju', 'SE'),
(9990, 'Palmas', 'TO');



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
