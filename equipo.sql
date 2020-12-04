create database alpuyeca_fc;
use alpuyeca_fc;
create table jugadores(
    id int(11) auto_increment,
    nombre varchar(60) not null,
    segundonombre varchar(60),
    apellidoP varchar(60)not null,
    apellidoM varchar(60)not null,
    primary key(id)
);
insert into jugadores values(null, 'Cristian',null,'Rodriguez','Rodriguez');
insert into jugadores values(null, 'Josafat',null,'Muñoz','Valverde');
insert into jugadores values(null, 'Hector',null,'Mendoza','Martinez');
insert into jugadores values(null, 'Sebastian',null,'Cortes','Rodriguez');
insert into jugadores values(null, 'Nemrod','Emmanuel','Vega','De La Torre');