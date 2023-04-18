create database APSM;
use APSM;

create table if not exists tb_categoria ( 
	idCategoria INT NOT NULL AUTO_INCREMENT,
 	nm_categoria VARCHAR (60) NOT NULL,
	constraint pk_categoria
		primary key (idCategoria))
engine innoDB;

create table if not exists tb_administrador ( 
	idAdministrador INT NOT NULL AUTO_INCREMENT,
 	nm_email VARCHAR (60) NOT NULL,
 	nm_senha VARCHAR (20) NOT NULL,
	constraint pk_administrador
		primary key (idAdministrador))
engine innoDB;

create table if not exists tb_produto ( 
	idProduto INT NOT NULL AUTO_INCREMENT,
 	nm_produto VARCHAR(60) NOT NULL,
 	tp_unitario VARCHAR (3) NOT NULL,
 	vl_produto DOUBLE NOT NULL,
	nm_imagem VARCHAR (100) NOT NULL,
 	idCategoria INT NOT NULL,
 	constraint fk_categoria_produto
		foreign key (idCategoria)
			references tb_categoria(idCategoria),
	constraint pk_produto
		primary key (idProduto))
engine innoDB;


create table if not exists tb_fornada ( 
	idFornada INT NOT NULL AUTO_INCREMENT,
 	quantidade INT NOT NULL,
 	dt_fornada DATETIME NOT NULL,
	constraint pk_Fornada
		primary key (idFornada))
engine innoDB;


INSERT into tb_administrador (nm_email, nm_senha) VALUES ('sonhomeu@gmail.com', 'sonhomeu');
INSERT into tb_categoria (nm_categoria) VALUES ('Padaria'), ('Alimentos'), ('Hortifruti'), ('Bebidas'), ('Congelados e frios'), ('Higiene pessoal'), ('Produtos de limpeza'), ('Latcinios'), ('Outros');