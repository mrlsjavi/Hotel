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
	rol 
);