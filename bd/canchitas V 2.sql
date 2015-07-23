-- -----------------------------------------------------
-- Table  ubigeo 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  ubigeo  (
   id  INT NOT NULL,
   departamento  VARCHAR(45) NOT NULL,
   provincia  VARCHAR(45) NOT NULL,
   distrito  VARCHAR(45) NOT NULL,
  PRIMARY KEY ( id ),
  UNIQUE( id )
)ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table  datos_persona 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  datos_persona  (
   dni  CHAR(8) NOT NULL,
   nombre  VARCHAR(45) NOT NULL,
   apellido_paterno  VARCHAR(20) NOT NULL,
   apellido_materno  VARCHAR(20) NULL,
   fechanac  DATE NOT NULL,
   email  VARCHAR(45) NOT NULL,
   telefono  CHAR(9) NULL,
   celular  CHAR(11) NOT NULL,
   sexo  CHAR(1) NOT NULL,
  PRIMARY KEY ( dni )
)ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table  horario 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  horario  (
   idhorario  INT NOT NULL AUTO_INCREMENT,
   hora  TIME NOT NULL,
  PRIMARY KEY ( idhorario ))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table  administrador_negocio 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  administrador_negocio  (
   idadmin  INT NOT NULL AUTO_INCREMENT,
   dni  CHAR(8) NOT NULL,
  PRIMARY KEY ( idadmin ,  dni ),
  FOREIGN KEY ( dni ) REFERENCES  datos_persona  ( dni )
)ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table  campo_deportivo 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  campo_deportivo  (
   idcampo  INT NOT NULL AUTO_INCREMENT,
   nombre  VARCHAR(70) NOT NULL,
   direccion  VARCHAR(100) NOT NULL,
   referencia  VARCHAR(100) NULL,
   estado  CHAR(1) NULL,
   latitud  VARCHAR(10) NULL,
   longitud  VARCHAR(10) NULL,
   imagen  VARCHAR(255) NOT NULL DEFAULT 'default.png',
   idubigeo  INT NOT NULL,
   idhorario_inicio  INT NOT NULL,
   idhorario_fin  INT NOT NULL,
   idadmin  INT NOT NULL,
  PRIMARY KEY ( idcampo ,  nombre ,  idubigeo ),
  FOREIGN KEY ( idadmin ) REFERENCES  administrador_negocio  ( idadmin ),
  FOREIGN KEY ( idubigeo ) REFERENCES ubigeo ( id ),
  FOREIGN KEY ( idhorario_inicio ) REFERENCES  horario  ( idhorario ),
  FOREIGN KEY ( idhorario_fin ) REFERENCES  horario  ( idhorario )
)ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table  cliente 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  cliente  (
   idcliente  INT NOT NULL AUTO_INCREMENT,
   persona_dni  CHAR(8) NOT NULL,
   valoracion  ENUM('0','1','2','3','4','5') NOT NULL default '0',
   foto  VARCHAR(100) NULL,
  PRIMARY KEY ( idcliente ,  persona_dni ),
  FOREIGN KEY ( persona_dni ) REFERENCES  datos_persona  ( dni )
)ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table  login_cliente 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  login_cliente  (
   idlogin_cliente  INT NOT NULL AUTO_INCREMENT,
   usuario  VARCHAR(45) NOT NULL,
   password  VARCHAR(100) NOT NULL,
   idcliente  INT NOT NULL,
   UNIQUE(usuario),
  PRIMARY KEY ( idlogin_cliente ),
  FOREIGN KEY ( idcliente ) REFERENCES  cliente  ( idcliente )
)ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table  login_admin 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  login_admin  (
   idlogin_admin  INT NOT NULL AUTO_INCREMENT,
   usuario  VARCHAR(45) NOT NULL,
   password  VARCHAR(100) NOT NULL,
   idadmin  INT NOT NULL,
  PRIMARY KEY ( idlogin_admin ,  idadmin ),
  UNIQUE ( usuario ),
  FOREIGN KEY ( idadmin ) REFERENCES  administrador_negocio  ( idadmin )
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table  reserva 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  reserva  (
   idreserva  INT NOT NULL,
   fecha_sistema  DATE NOT NULL,
   hora_sistema  TIME NOT NULL,
   estado  CHAR(1) NULL,
   fecha_reserva  DATE NOT NULL,
   idcliente  INT NOT NULL,
   idcampo  INT NOT NULL,
   horario_incio  INT NOT NULL,
   horario_fin  INT NOT NULL,
  PRIMARY KEY ( idreserva ),
  FOREIGN KEY ( idcampo ) REFERENCES  campo_deportivo  ( idcampo ),
  FOREIGN KEY ( idcliente ) REFERENCES  cliente  ( idcliente ),
  FOREIGN KEY ( horario_incio ) REFERENCES  horario  ( idhorario ),
  FOREIGN KEY ( horario_fin ) REFERENCES  horario  ( idhorario )
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table  comentario 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  comentario  (
   idcomentario  INT NOT NULL AUTO_INCREMENT,
   comentario  TEXT NULL,
   fecha  DATETIME NOT NULL,
   idcampo  INT NOT NULL,
   idlogin  INT NOT NULL,
  PRIMARY KEY ( idcomentario ,  idcampo ,  idlogin ),
  FOREIGN KEY ( idcampo ) REFERENCES  campo_deportivo  ( idcampo ),
  FOREIGN KEY ( idlogin ) REFERENCES  login_cliente  ( idlogin_cliente )
)ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table  galeria 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  galeria  (
   idgaleria  INT NOT NULL AUTO_INCREMENT,
   url  VARCHAR(255) NOT NULL,
   descripcion  TEXT NULL,
   fecha  DATE NOT NULL,
   idcampo  INT NOT NULL,
  PRIMARY KEY ( idgaleria ,  idcampo ),
  UNIQUE  ( idgaleria),
  UNIQUE  ( url ),
  FOREIGN KEY ( idcampo ) REFERENCES  campo_deportivo  ( idcampo )
)ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table  valoracion 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  valoracion  (
   puntaje  ENUM('0','1','2','3','4','5') NOT NULL,
   idlogin  INT NOT NULL,
   idcampo  INT NOT NULL,
   fecha  DATETIME NOT NULL,
  UNIQUE ( puntaje, idlogin,idcampo),
  FOREIGN KEY ( idlogin ) REFERENCES  login_cliente  ( idlogin_cliente ),
  FOREIGN KEY ( idcampo ) REFERENCES  campo_deportivo  ( idcampo )
)ENGINE = InnoDB;

