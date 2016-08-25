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
	alias Varchar(50),
	estado Int, 

	PRIMARY KEY(id)
);

create table rol_pagina(
	id Int NOT NULL AUTO_INCREMENT,
	rol Int,
	pagina Int,
	estado Int, 

	PRIMARY KEY(id)
);

CREATE INDEX relacion2 ON rol_pagina(rol);
CREATE INDEX relacion3 ON rol_pagina(pagina);

ALTER TABLE rol_pagina ADD CONSTRAINT relacion2 FOREIGN KEY(rol) REFERENCES rol(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE rol_pagina ADD CONSTRAINT relacion3 FOREIGN KEY(pagina) REFERENCES pagina(id) ON DELETE CASCADE ON UPDATE CASCADE;


create table accion(
	id Int NOT NULL AUTO_INCREMENT, 
	nombre Varchar(35),
	estado Int, 

	PRIMARY KEY(id)
);

create table pagina_accion(
	id Int NOT NULL AUTO_INCREMENT,
	pagina Int,
	accion Int, 
	alias Varchar(35), 
	estado Int, 

	PRIMARY KEY(id)
);

CREATE INDEX relacion4 ON pagina_accion(pagina);
CREATE INDEX relacion5 ON pagina_accion(accion);

ALTER TABLE pagina_accion ADD CONSTRAINT relacion4 FOREIGN KEY(pagina) REFERENCES pagina(id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE pagina_accion ADD CONSTRAINT relacion5 FOREIGN KEY(accion) REFERENCES accion(id) ON DELETE CASCADE ON UPDATE CASCADE;

