CREATE DATABASE site_adm;
USE site_adm;
 
CREATE TABLE categorias (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL
);
 
CREATE TABLE usuarios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  telefone VARCHAR(30) NOT NULL,
  data_nascimento DATE,
  cpf VARCHAR(11) NOT NULL
);
 
CREATE TABLE produtos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  descricao VARCHAR(255) NOT NULL,
  id_categoria INT NOT NULL,
  preco decimal(7,2) NOT NULL,
 
  FOREIGN KEY (id_categoria) REFERENCES categorias(id)
);