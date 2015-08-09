
create table datos_persona(
	id_persona int auto_increment,
	dni char(8) not null,
	nombre varchar(45) not null,
	apellidos varchar(45) not null,
	fechanac date,
	email varchar(45),
	telefono char(9),
	celular char(9) not null,
	sexo char(1),
	primary key(id_persona),
	unique(celular,email)
);

create table administrador_negocio(
	idadmin int auto_increment,
	persona int not null,
	foreign key(persona) references datos_persona(id_persona),
	primary key(idadmin,persona)
);

create table cliente(
	idcliente int auto_increment,
	persona int not null,
	valoracion int default "0",
	foreign key(persona) references datos_persona(id_persona),
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
create table ubigeo(
	id int auto_increment,
	departamento varchar(45) not null,
	provincia varchar(45) not null,
	distrito varchar(45) not null,
	primary key(id)
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
	hora_inicio int,
	hora_fin int,
	valoracion int default "0",
	id int not null,
	negocio_idadmin int not null,
	foreign key(hora_inicio) references horario(idhorario),
	foreign key(hora_fin) references horario(idhorario),
	foreign key(id) references ubigeo(id),
	foreign key(negocio_idadmin) references administrador_negocio(idadmin),
	primary key(idcampo),
	unique(negocio_idadmin,idcampo)
);
CREATE table galeria(
	idgaleria int auto_increment,
	url varchar(255),
	descripcion text,
	fecha datetime,
	idcampo int,
	foreign key(idcampo) references campo_deportivo(idcampo),
	primary key(idgaleria)
);
CREATE  TABLE valoracion(
	idvaloracion int auto_increment,
	puntaje ENUM('0','1','2','3','4','5') NOT NULL default '0',
	idlogin INT NOT NULL ,
	idcampo INT NOT NULL ,
	fecha DATETIME NOT NULL,
	foreign key(idcampo) references campo_deportivo(idcampo),
	primary key(idvaloracion) 
);
-- **************************************COMENTARIO*************************
create table comentario(
	idcomentario int auto_increment,
	comentario text,
	fecha datetime,
	idcampo int,
	idlogin int,
	foreign key(idlogin) references login_cliente(idlogin_cliente),
	foreign key(idcampo) references campo_deportivo(idcampo),
	primary key(idcomentario)
);
-- ***************************************reservar************************

create table reserva(
	idreserva int auto_increment,
	fecha_sistema date,
	hora_sistema time,
	fecha_reserva date,
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

