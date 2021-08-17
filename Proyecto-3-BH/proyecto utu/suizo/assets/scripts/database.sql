create database if not exists Netclip;
use NetClip;
create table if not exists usuarios (
  ID_usuarios int NOT NULL AUTO_INCREMENT,
  Password varchar(70) NOT NULL,
  Nombre varchar(15) NOT NULL,
  Apellido varchar(15) NOT NULL,
  Email varchar(50) NOT NULL,
  Num_tarjeta decimal(20,0),
  primary key (`ID_usuarios`)
)
select * from usuarios;

