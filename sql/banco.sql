DROP DATABASE IF EXISTS projetopgp;

CREATE DATABASE projetopgp DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE projetopgp;

DROP USER IF EXISTS 'admPGP'@'localhost';

CREATE USER 'admPGP'@'localhost' IDENTIFIED BY '12345'; 

GRANT SELECT, INSERT, UPDATE, DELETE ON projetointegrado.* TO 'admPGP'@'localhost';

CREATE TABLE usuario(
  nomeLogin VARCHAR(40) NOT NULL, 
  senha VARCHAR(100) NOT NULL,
  PRIMARY KEY (nomeLogin)
);

create table Mercado(
  IdProduto INTEGER AUTO_INCREMENT PRIMARY KEY,
  Produto VARCHAR(30) NOT NULL);
  
  CREATE TABLE Consulta( 
    idConsulta INTEGER AUTO_INCREMENT PRIMARY KEY, 
    nomeMedico VARCHAR(40) NOT NULL, 
    dataConsulta DATETIME NOT NULL, 
    sintomas VARCHAR(100) NOT NULL);
    
    create table Exames( 
      idExames INTEGER AUTO_INCREMENT PRIMARY KEY, 
      descricao VARCHAR(100) NOT NULL, 
      dataExame DATE NOT NULL);
