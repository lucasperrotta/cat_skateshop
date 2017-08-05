CREATE DATABASE cat_skateshop;
USE cat_skateshop;
CREATE TABLE produto (
	id_produto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nm_produto VARCHAR (50) NOT NULL,
	cat_produto VARCHAR (11) NOT NULL,
	desc_produto TEXT NOT NULL,
    qtd_produto INT NOT NULL,
    foto_produto CHAR(40),
	preco_produto DECIMAL(10,2) NOT NULL
);

CREATE TABLE cliente(
	id_cliente INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nm_cliente VARCHAR(60) NOT NULL,
    cpf_cliente CHAR(11) NOT NULL,
    sexo_cliente CHAR(1) NOT NULL,
    dt_nasc_cliente DATE NOT NULL,
    tel_cliente CHAR(10) NOT NULL,
    cel_cliente VARCHAR(11),
    cep_cliente CHAR(8) NOT NULL,
    uf_cliente CHAR(2) NOT NULL,
    cidade_cliente VARCHAR(70) NOT NULL,
    bairro_cliente VARCHAR(70)NOT NULL,
    rua_cliente VARCHAR(70) NOT NULL,
    numero_cliente VARCHAR(20) NOT NULL,
    complemento_cliente VARCHAR(70),
    email_cliente VARCHAR(70) NOT NULL,
    nm_usuario_cliente VARCHAR(20) NOT NULL,
    senha_cliente VARCHAR(20) NOT NULL,
    foto_cliente CHAR(40)
);

CREATE TABLE compra (
	id_compra INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dt_compra DATE,
    preco_compra DECIMAL,
    id_cliente INT NOT NULL,
    FOREIGN KEY (id_cliente) references cliente(id_cliente)
);

CREATE TABLE produto_compra (
	id_produto_compra INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	id_produto INT NOT NULL,
    qtd_produto_compra INT,
    preco_produto_compra DECIMAL,
    id_compra INT NOT NULL,
    FOREIGN KEY (id_produto) REFERENCES produto(id_produto),
    FOREIGN KEY (id_compra) REFERENCES compra(id_compra)
);