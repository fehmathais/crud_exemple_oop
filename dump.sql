create database crud_php;

use crud_php;

create table products(
id int auto_increment primary key,
name varchar(255) not null,
description varchar(255) not null,
value decimal not null,
amount int not null
);

insert into products (name, description, value, amount) values ('Produto de teste 1', 'Produto de teste 1', 20.0, 20);
insert into products (name, description, value, amount) values ('Produto de teste 2', 'Produto de teste 2', 10.0, 20);
insert into products (name, description, value, amount) values ('Produto de teste 3', 'Produto de teste 3', 30.0, 20);
insert into products (name, description, value, amount) values ('Produto de teste 4', 'Produto de teste 4', 110.0, 20);
insert into products (name, description, value, amount) values ('Produto de teste 5', 'Produto de teste 5', 130.0, 20);
insert into products (name, description, value, amount) values ('Produto de teste 6', 'Produto de teste 6', 150.0, 20);
insert into products (name, description, value, amount) values ('Produto de teste 7', 'Produto de teste 7', 110.0, 20);
insert into products (name, description, value, amount) values ('Produto de teste 8', 'Produto de teste 8', 110.0, 20);
insert into products (name, description, value, amount) values ('Produto de teste 9', 'Produto de teste 9', 10.0, 20);
insert into products (name, description, value, amount) values	 ('Produto de teste 10', 'Produto de teste 10', 10.0, 20);
insert into products (name, description, value, amount) values ('Produto de teste 11', 'Produto de teste 11', 10.0, 20);
insert into products (name, description, value, amount) values ('Produto de teste 12', 'Produto de teste 12', 10.0, 20);
insert into products (name, description, value, amount) values ('Produto de teste 13', 'Produto de teste 13', 10.0, 20);
insert into products (name, description, value, amount) values ('Produto de teste 14', 'Produto de teste 14', 30.0, 20);
insert into products (name, description, value, amount) values ('Produto de teste 15', 'Produto de teste 15', 30.0, 20);
insert into products (name, description, value, amount) values ('Produto de teste 16', 'Produto de teste 16', 30.0, 20);