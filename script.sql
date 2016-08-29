create table rol(
	id Int NOT NULL AUTO_INCREMENT,
	nombre Varchar(30),
	estado int, 

	PRIMARY KEY(id)
);

create table usuario(
	id Int NOT NULL AUTO_INCREMENT,
	nombre Varchar(50),
	apellido Varchar(50),
	password Varchar (100),
	rol Int,
	estado Int,

	PRIMARY KEY(id)
);

CREATE INDEX relacion1 ON usuario(rol);
ALTER TABLE usuario ADD CONSTRAINT relacion1 FOREIGN KEY (rol) REFERENCES rol(id) ON DELETE CASCADE ON UPDATE CASCADE;

create table pagina(
	id Int NOT NULL AUTO_INCREMENT,
	nombre Varchar(50),
	padre Int,
	alias Varchar(50),
	orden Int,
	estado Int, 

	PRIMARY KEY(id)
);


create table permiso_rol(
	id Int NOT NULL AUTO_INCREMENT,
	rol Int,
	pagina Int,
	estado Int, 

	PRIMARY KEY(id)
);

CREATE INDEX relacion2 ON permiso_rol(rol);
CREATE INDEX relacion3 ON permiso_rol(pagina);

ALTER TABLE permiso_rol ADD CONSTRAINT relacion2 FOREIGN KEY(rol) REFERENCES rol(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE permiso_rol ADD CONSTRAINT relacion3 FOREIGN KEY(pagina) REFERENCES pagina(id) ON DELETE CASCADE ON UPDATE CASCADE;


