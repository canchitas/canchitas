
create table datos_persona(
	dni char(8) not null,
	nombre varchar(45) not null,
	apellidos varchar(45) not null,
	fechanac date,
	email varchar(45),
	telefono char(9),
	celular char(9) not null,
	sexo char(1),
	primary key(dni),
	unique(celular,email)
);

create table administrador_negocio(
	idadmin int auto_increment,
	persona_dni char(8) not null,
	foreign key(persona_dni) references datos_persona(dni),
	primary key(idadmin,persona_dni)
);

create table cliente(
	idcliente int auto_increment,
	persona_dni char(8) not null,
	valoracion int default "0",
	foreign key(persona_dni) references datos_persona(dni),
	primary key(idcliente)
);

create table login_admin(
	idlogin_admin int auto_increment,
	usuario varchar(45) not null,
	password varchar(100) not null,
	negocio_idadmin int not null,
	foreign key(negocio_idadmin) references administrador_negocio(idadmin),
	primary key(idlogin_admin),
	unique(usuario)
);

create table login_cliente(
	idlogin_cliente int auto_increment,
	usuario varchar(45) not null,
	password varchar(100) not null,
	cliente_idcliente int not null,
	foreign key(cliente_idcliente) references cliente(idcliente),
	primary key(idlogin_cliente),
	unique(usuario)
);


-- *****************lugorares************+++
create table departamento(
	id_departamento int auto_increment,
	nombre varchar(45),
	primary key(id_departamento)
);
create table provincia(
	id_provincia int auto_increment,
	nombre varchar(45),
	iddepartamento int not null,
	primary key(id_provincia),
	foreign key(iddepartamento) references departamento(id_departamento)
);

create table distrito(
	id_distrito int auto_increment,
	nombre varchar(45),
	idprovincia int not null,
	primary key(id_distrito),
	foreign key(idprovincia) references provincia(id_provincia)
);

-- ***********************horarios*****************
create table horario(
	idhorario int auto_increment,
	hora time,
	primary key(idhorario)
);


create table campo_deportivo(
	idcampo int auto_increment,
	nombre varchar(45) not null,
	direccion varchar(45) not null,
	referencia text,
	estado char(1) default "1",
	hora_inicio time,
	hora_fin time,
	valoracion int default "0",
	iddistrito int not null,
	negocio_idadmin int not null,
	foreign key(iddistrito) references distrito(id_distrito),
	foreign key(negocio_idadmin) references administrador_negocio(idadmin),
	primary key(idcampo,iddistrito),
	unique(negocio_idadmin,idcampo)
);

-- ***************************************reservar************************

create table reserva(
	idreserva int auto_increment,
	fecha datetime,
	estado int,
	idcampo int,
	idcliente int,
	hora_inicio int,
	hora_fin int,
	foreign key(idcampo) references campo_deportivo(idcampo),
	foreign key(idcliente) references cliente(idcliente),
	foreign key(hora_inicio) references horario(idhorario),
	foreign key(hora_fin) references horario(idhorario),
	primary key(idreserva)
);

