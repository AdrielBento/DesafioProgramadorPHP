CREATE DATABASE db_desafio;
USE db_desafio;

CREATE TABLE tb_produto(
	id INTEGER auto_increment,
	sku VARCHAR(10),
	nome VARCHAR(100),
	descricao VARCHAR(255),
	preco DECIMAL(10,2),
	CONSTRAINT PK_Produto PRIMARY KEY(id)
);

CREATE TABLE tb_pedido(
	id INTEGER auto_increment,
	total DECIMAL(10,5),
	dataPedido DATETIME,
	CONSTRAINT PK_Pedido PRIMARY KEY(id)
);


CREATE TABLE tb_itens_pedido(
	idProduto INTEGER ,
    idPedido INTEGER,
    quantidade INTEGER,    
    CONSTRAINT FK_Produto FOREIGN KEY(idProduto) REFERENCES tb_produto(id),
    CONSTRAINT FK_Pedido FOREIGN KEY(idPedido) REFERENCES tb_pedido(id),
    CONSTRAINT PK_ItensPedido PRIMARY KEY(idProduto,idPedido)
);