

CREATE TABLE Transaccion
(
  id Int NOT NULL AUTO_INCREMENT,
  usuario Int,
  habitacion Int,
  arduino Int,
  hora_inicio Datetime,
  hora_salida Datetime,
  precio Double,
  horas Double,
  PRIMARY KEY (id)
)
;

CREATE INDEX IX_Relationship15 ON Transaccion (usuario)
;

CREATE INDEX IX_Relationship16 ON Transaccion (habitacion)
;

-- Table motel

CREATE TABLE motel
(
  motel Int NOT NULL AUTO_INCREMENT,
  nombre Varchar(50),
  direccion Varchar(75),
  columna_matriz Int,
  fila_matriz Int,
  estado Int,
  PRIMARY KEY (motel)
)
;

-- Table Habitacion

CREATE TABLE Habitacion
(
  habitacion Int NOT NULL AUTO_INCREMENT,
  motel Int,
  nombre Varchar(50),
  precio_servicio Double,
  precio_noche Double,
  duracion Int,
  hora_nocturna Double,
  fin_hora_nocturna Time,
  columna_matriz Int,
  fila_matriz Char(20),
  estado Int,
  PRIMARY KEY (habitacion)
)
;

CREATE INDEX IX_Relationship3 ON Habitacion (motel)
;

-- Table promocion_habitacion

CREATE TABLE promocion_habitacion
(
  habitacion Int NOT NULL,
  fecha_inicio Datetime,
  fecha_fin Datetime,
  precio_normal Double,
  precio_nocturno Double,
  estado Int
)
;

ALTER TABLE promocion_habitacion ADD  PRIMARY KEY (habitacion)
;

-- Table bitacora

CREATE TABLE bitacora
(
  id Int NOT NULL AUTO_INCREMENT,
  accion Int,
  usuario Int,
  tabla Varchar(30),
  tupla Int,
  fecha Timestamp NULL,
  descripcion Varchar(150),
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
  accion Int NOT NULL AUTO_INCREMENT,
  titulo Varchar(35),
  PRIMARY KEY (accion)
)
;

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
  rol Int NOT NULL AUTO_INCREMENT,
  nombre Varchar(35),
  estado Int,
  PRIMARY KEY (rol)
)
;

-- Table usuario

CREATE TABLE usuario
(
  usuario Int NOT NULL AUTO_INCREMENT,
  rol Int,
  nombre Varchar(30),
  apellido Varchar(50),
  password Varchar(75),
  estado Int,
  PRIMARY KEY (usuario)
)
;

CREATE INDEX IX_Relationship11 ON usuario (rol)
;

-- Table pagina

CREATE TABLE pagina
(
  pagina Int NOT NULL AUTO_INCREMENT,
  nombre Varchar(30),
  alias Varchar(35),
  orden Int,
  estado Int,
  PRIMARY KEY (pagina)
)
;

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

CREATE INDEX IX_Relationship13 ON permiso_rol (pagina)
;

CREATE INDEX IX_Relationship17 ON permiso_rol (rol)
;

-- Create relationships section ------------------------------------------------- 

ALTER TABLE Habitacion ADD CONSTRAINT Relationship3 FOREIGN KEY (motel) REFERENCES motel (motel) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE promocion_habitacion ADD CONSTRAINT Relationship4 FOREIGN KEY (habitacion) REFERENCES Habitacion (habitacion) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE bitacora ADD CONSTRAINT Relationship5 FOREIGN KEY (accion) REFERENCES accion (accion) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE responsable ADD CONSTRAINT Relationship6 FOREIGN KEY (usuario) REFERENCES usuario (usuario) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE bitacora ADD CONSTRAINT Relationship10 FOREIGN KEY (usuario) REFERENCES usuario (usuario) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE usuario ADD CONSTRAINT Relationship11 FOREIGN KEY (rol) REFERENCES rol (rol) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE permiso_rol ADD CONSTRAINT Relationship13 FOREIGN KEY (pagina) REFERENCES pagina (pagina) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE Transaccion ADD CONSTRAINT Relationship15 FOREIGN KEY (usuario) REFERENCES usuario (usuario) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE Transaccion ADD CONSTRAINT Relationship16 FOREIGN KEY (habitacion) REFERENCES Habitacion (habitacion) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE permiso_rol ADD CONSTRAINT Relationship17 FOREIGN KEY (rol) REFERENCES rol (rol) ON DELETE RESTRICT ON UPDATE RESTRICT
;
