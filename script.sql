/*
Created: 01/09/2016
Modified: 05/10/2016
Model: MySQL 5.5
Database: MySQL 5.5
*/


-- Create tables section -------------------------------------------------

-- Table transaccion

CREATE TABLE transaccion
(
  id Int NOT NULL AUTO_INCREMENT,
  usuario Int,
  habitacion Int,
  motel Int,
  arduino Int,
  hora_inicio Datetime,
  hora_salida Datetime,
  precio Decimal(13,5),
  horas Int,
  PRIMARY KEY (id)
)
;

CREATE INDEX IX_Relationship15 ON transaccion (usuario)
;

CREATE INDEX IX_Relationship16 ON transaccion (habitacion)
;

CREATE INDEX IX_Relationship22 ON transaccion (motel)
;

-- Table motel

CREATE TABLE motel
(
  id Int NOT NULL AUTO_INCREMENT,
  nombre Varchar(75),
  direccion Varchar(150),
  inicio_hora_libre Time DEFAULT '23:59:59',
  fin_hora_libre Time DEFAULT '07:59:59',
  tiempo_gracia Time,
  columna_matriz Int,
  fila_matriz Int,
  estado Int,
  PRIMARY KEY (id)
)
;

-- Table habitacion

CREATE TABLE habitacion
(
  id Int NOT NULL AUTO_INCREMENT,
  motel Int,
  nombre Varchar(50),
  precio Decimal(13,5),
  duracion Int,
  columna_matriz Int,
  fila_matriz Int,
  estado Int,
  PRIMARY KEY (id)
)
;

CREATE INDEX IX_Relationship3 ON habitacion (motel)
;

-- Table promocion_habitacion

CREATE TABLE promocion_habitacion
(
  id Int NOT NULL AUTO_INCREMENT,
  habitacion Int,
  fecha_inicio Datetime,
  fecha_fin Datetime,
  precio_normal Decimal(13,5),
  precio_nocturno Decimal(13,5),
  estado Int,
  PRIMARY KEY (id)
)
;

CREATE INDEX IX_Relationship18 ON promocion_habitacion (habitacion)
;

-- Table bitacora

CREATE TABLE bitacora
(
  id Int NOT NULL AUTO_INCREMENT,
  accion Int,
  usuario Int,
  tabla Varchar(30),
  tupla Int,
  fecha Datetime,
  descripcion Text,
  PRIMARY KEY (id)
)
;

CREATE INDEX IX_Relationship5 ON bitacora (accion)
;

CREATE INDEX IX_Relationship10 ON bitacora (usuario)
;

-- Table accion

CREATE TABLE accion
(
  id Int NOT NULL AUTO_INCREMENT,
  titulo Varchar(35),
  PRIMARY KEY (id)
)
;

insert into accion (id, titulo) values("", "insertar");
insert into accion (id, titulo) values("", "editar");
insert into accion (id, titulo) values("", "eliminar");

-- Table responsable

CREATE TABLE responsable
(
  usuario Int NOT NULL
)
;

ALTER TABLE responsable ADD  PRIMARY KEY (usuario)
;

-- Table rol

CREATE TABLE rol
(
  id Int NOT NULL AUTO_INCREMENT,
  nombre Varchar(35),
  estado Int,
  PRIMARY KEY (id)
)
;
insert into rol (id, nombre, estado) values("", "admin", 1);
-- Table usuario

CREATE TABLE usuario
(
  id Int NOT NULL AUTO_INCREMENT,
  rol Int,
  motel Int,
  nombre Varchar(200),
  login Varchar(100),
  password Varchar(75),
  estado Int,
  PRIMARY KEY (id)
)
;
insert into usuario (id, rol, nombre, login, password, estado) values("", 1, "admin", "admin.hotel", "21232f297a57a5a743894a0e4a801fc3", 1);


CREATE INDEX IX_Relationship11 ON usuario (rol)
;

CREATE INDEX IX_Relationship20 ON usuario (motel)
;

-- Table pagina

CREATE TABLE pagina
(
  id Int NOT NULL AUTO_INCREMENT,
  nombre Varchar(30),
  alias Varchar(50),
  orden Int,
  estado Int,
  PRIMARY KEY (id)
)
;
insert into pagina (id, nombre, alias, orden, estado) values ("", "rol", "Roles", 1, 1);
insert into pagina (id, nombre, alias, orden, estado) values ("", "pagina", "Menu", 2, 1);
insert into pagina (id, nombre, alias, orden, estado) values ("", "usuario", "Usuarios", 3, 1);
insert into pagina (id, nombre, alias, orden, estado) values ("", "permiso", "Permisos", 4, 1);
-- Table permiso_rol

CREATE TABLE permiso_rol
(
  id Int NOT NULL AUTO_INCREMENT,
  pagina Int,
  rol Int,
  estado Int,
  PRIMARY KEY (id)
)
;

insert into permiso_rol (id, pagina, rol, estado) values ("", 1, 1,1);
insert into permiso_rol (id, pagina, rol, estado) values ("", 2, 1,1);
insert into permiso_rol (id, pagina, rol, estado) values ("", 3, 1,1);
insert into permiso_rol (id, pagina, rol, estado) values ("", 4, 1,1);

CREATE INDEX IX_Relationship13 ON permiso_rol (pagina)
;

CREATE INDEX IX_Relationship17 ON permiso_rol (rol)
;

-- Create relationships section ------------------------------------------------- 

ALTER TABLE habitacion ADD CONSTRAINT Relationship3 FOREIGN KEY (motel) REFERENCES motel (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE bitacora ADD CONSTRAINT Relationship5 FOREIGN KEY (accion) REFERENCES accion (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE responsable ADD CONSTRAINT Relationship6 FOREIGN KEY (usuario) REFERENCES usuario (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE bitacora ADD CONSTRAINT Relationship10 FOREIGN KEY (usuario) REFERENCES usuario (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE usuario ADD CONSTRAINT Relationship11 FOREIGN KEY (rol) REFERENCES rol (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE permiso_rol ADD CONSTRAINT Relationship13 FOREIGN KEY (pagina) REFERENCES pagina (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE transaccion ADD CONSTRAINT Relationship15 FOREIGN KEY (usuario) REFERENCES usuario (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE transaccion ADD CONSTRAINT Relationship16 FOREIGN KEY (habitacion) REFERENCES habitacion (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE permiso_rol ADD CONSTRAINT Relationship17 FOREIGN KEY (rol) REFERENCES rol (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE promocion_habitacion ADD CONSTRAINT Relationship18 FOREIGN KEY (habitacion) REFERENCES habitacion (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE usuario ADD CONSTRAINT Relationship20 FOREIGN KEY (motel) REFERENCES motel (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE transaccion ADD CONSTRAINT Relationship22 FOREIGN KEY (motel) REFERENCES motel (id) ON DELETE RESTRICT ON UPDATE RESTRICT
;
