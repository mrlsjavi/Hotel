CREATE TABLE quiniela(
	id Int NOT NULL AUTO_INCREMENT,
	nombre Varchar(50),

	PRIMARY KEY(id)

);

CREATE TABLE seleccion(
	id Int NOT NULL AUTO_INCREMENT,
	nombre Varchar(50),

	PRIMARY KEY(id)
);


CREATE TABLE quiniela_seleccion(
	id Int NOT NULL AUTO_INCREMENT,
	quiniela Int,
	seleccion Int,

	PRIMARY KEY(id)
);

CREATE INDEX relacion1 ON quiniela_seleccion(quiniela);
CREATE INDEX relacion2 ON  quiniela_seleccion(seleccion);

ALTER TABLE quiniela_seleccion ADD CONSTRAINT relacion1 FOREIGN KEY (quiniela) REFERENCES quiniela(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE quiniela_seleccion ADD CONSTRAINT relacion2 FOREIGN KEY (seleccion) REFERENCES seleccion(id) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE partido(
	id Int NOT NULL AUTO_INCREMENT,
	quiniela int, 
	seleccion1 int, 
	seleccion2 int,
	fecha date,
	estadio Varchar(50),

	PRIMARY KEY(id)
);

CREATE INDEX relacion3 ON partido(quiniela);
CREATE INDEX relacion4 ON partido(seleccion1);
CREATE INDEX relacion5 ON partido(seleccion2);

ALTER TABLE partido ADD CONSTRAINT relacion3 FOREIGN KEY (quiniela) REFERENCES quiniela(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE partido ADD CONSTRAINT relacion4 FOREIGN KEY (seleccion1) REFERENCES seleccion(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE partido ADD CONSTRAINT relacion5 FOREIGN KEY (seleccion2) REFERENCES seleccion(id) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE resultado(
	id Int NOT NULL AUTO_INCREMENT,
	partido int, 
	seleccion int, 
	goles int,

	PRIMARY KEY(id)
);

CREATE INDEX relacion6 ON resultado(partido);
CREATE INDEX relacion7 ON resultado(seleccion);

ALTER TABLE resultado ADD CONSTRAINT relacion6 FOREIGN KEY (partido) REFERENCES partido(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE resultado ADD CONSTRAINT relacion7 FOREIGN KEY (seleccion) REFERENCES seleccion(id) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE rol(
	id Int NOT NULL AUTO_INCREMENT, 
	nombre Varchar(50),

	PRIMARY KEY(id)
);

CREATE TABLE usuario(
	id Int NOT NULL AUTO_INCREMENT, 
	nombre Varchar(50),
	apellido Varchar(50),
	password Varchar(75),
	rol int,

	PRIMARY KEY(id)
);

CREATE INDEX relacion11 ON usuario(rol);

ALTER TABLE usuario ADD CONSTRAINT relacion11 FOREIGN KEY (rol) REFERENCES rol(id) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE pronostico(
	id Int NOT NULL AUTO_INCREMENT,
	partido int, 
	seleccion int, 
	usuario int, 
	goles int,

	PRIMARY KEY(id)
);

CREATE INDEX relacion8 ON pronostico(partido);
CREATE INDEX relacion9 ON pronostico(seleccion);
CREATE INDEX relacion10 ON pronostico(usuario);

ALTER TABLE pronostico ADD CONSTRAINT relacion8 FOREIGN KEY (partido) REFERENCES partido(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE pronostico ADD CONSTRAINT relacion9 FOREIGN KEY (seleccion) REFERENCES seleccion(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE pronostico ADD CONSTRAINT relacion10 FOREIGN KEY (usuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE calificacion(
	id Int NOT NULL AUTO_INCREMENT,
	nombre Varchar(50),
	puntos int, 

	PRIMARY KEY(id)
);


CREATE TABLE punteo(
	id Int NOT NULL AUTO_INCREMENT,
	usuario int, 
	partido int, 
	calificacion int,

	PRIMARY KEY(id)
);


CREATE INDEX relacion12 ON punteo(usuario);
CREATE INDEX relacion13 ON punteo(partido);
CREATE INDEX relacion14 ON punteo(calificacion);

ALTER TABLE punteo ADD CONSTRAINT relacion12 FOREIGN KEY (usuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE punteo ADD CONSTRAINT relacion13 FOREIGN KEY (partido) REFERENCES partido(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE punteo ADD CONSTRAINT relacion14 FOREIGN KEY (calificacion) REFERENCES calificacion(id) ON DELETE CASCADE ON UPDATE CASCADE;



