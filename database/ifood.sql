create database ifood;
use ifood;

create table cliente(
    id int auto_increment primary key,
    nome varchar(100) not null,
    email varchar(100) not null,
    telefone varchar(20)not null,
    endereco varchar (20)
);

create table Restaurante(
    id int auto_increment primary key,
    nome varchar(100) not null,
  categoria varchar(50) not null,
    telefone varchar(50)
    endereco varchar(50)
);

create table Pedido(
    id int auto_increment primary key,
   cliente_id varchar(100) not null,
   restaurante_id varchar(50) not null,
    data_pedido varchar(50) not null,
    valor int,
  status int,
    foreign key (cliente_id) references clientes(id)
);