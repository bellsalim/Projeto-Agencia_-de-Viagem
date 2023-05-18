CREATE DATABASE Agencia;
USE Agencia;

CREATE TABLE adm(
	codigo int PRIMARY KEY NOT NULL,
	nome varchar(40) NOT NULL,
	senha varchar(20) NOT NULL,
	email varchar(20),
	telefone varchar(15)
);

CREATE TABLE gerenciamento(
	codigo_adm int(4),
  cod_eventos int(4)
);


CREATE TABLE pacotes(
	codigo int(4)PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nome VARCHAR (40) NOT NULL,
	data_ida date NOT NULL,
	data_volta date NOT NULL,
	duracao int (3) NOT NULL,
	valor float (7,2) NOT NULL,
	descricao varchar(100),
	disponivel set ("S", "N") NOT NULL


);

CREATE TABLE companhia_viagem(
  cnpj varchar(25) PRIMARY KEY NOT NULL,
  nome varchar(40) NOT NULL,
  email varchar(20),
  telefone varchar(15) 
);



CREATE TABLE compra(
  codigo_cliente int(4) NOT NULL,
  data_compra datetime NOT NULL, 
  poltrona varchar(4) NOT NULL
);


CREATE TABLE users(
  CPF varchar(11) PRIMARY KEY NOT NULL UNIQUE,
  username VARCHAR(30) NOT NULL UNIQUE,
  password VARCHAR (255) NOT NULL,
  nome varchar(50) NOT NULL,
  n_cartão varchar(16) NOT NULL,
  cvc varchar(3) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO pacotes (nome,data_ida,data_volta, duracao,valor, descricao, disponivel) VALUES
('Pacote 4 Noites Hotel Akmani Legian', '2023-06-12','2023-06-29', 2,1250.00,'📍 Bali - Indonésia
																			    ᯤ WIFI
																				☕︎ Café da manhã incluso', 'S'),
('Pacote The Grace Hotel', '2023-06-12','2023-06-29', 17,20.000, 'S','S','S','S','S'),
('Pacote Hotel Milat Cave', '2023-06-12','2023-06-29', 17,20.000, 'S','S','S','S','S');
('Pacote Hotel Milat Cave', '2023-06-12','2023-06-29', 17,20.000, 'S','S','S','S','S', images/logo.png);
