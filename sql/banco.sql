DROP DATABASE IF EXISTS projetoPGP;

CREATE DATABASE projetoPGP DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE projetoPGP;

DROP USER IF EXISTS 'admPGP'@'localhost';

CREATE USER 'admPGP'@'localhost' IDENTIFIED BY '12345'; 

GRANT SELECT, INSERT, UPDATE, DELETE ON projetointegrado.* TO 'admPGP'@'localhost';

CREATE TABLE usuario(
  nomeLogin VARCHAR(40) NOT NULL, 
  senha VARCHAR(100) NOT NULL,
  PRIMARY KEY (nomeLogin)
);

create table animal(
  IdProduto INTEGER AUTO_INCREMENT PRIMARY KEY,
  Produto VARCHAR(30) NOT NULL);