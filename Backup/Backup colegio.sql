DROP SCHEMA IF EXISTS `colegio` ;

CREATE SCHEMA IF NOT EXISTS `colegio`;
USE `colegio` ;


DROP TABLE IF EXISTS `colegio`.`Usuario` ;

CREATE TABLE IF NOT EXISTS `colegio`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `User` VARCHAR(50) NOT NULL,
  `Password` VARCHAR(8) NOT NULL,
  `nombreUsuario` VARCHAR(50) NOT NULL,
  `apellidoUsuario` VARCHAR(45) NOT NULL,
  `tipoDocUsuario` VARCHAR(50) NOT NULL,
  `docUsuario` BIGINT NOT NULL,
  `estadoUsuario` TINYINT NOT NULL,
  `tipoUsuario` VARCHAR(50) NOT NULL,
  `especialidadUsuario` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idUsuario`));

DROP TABLE IF EXISTS `colegio`.`Salon` ;

CREATE TABLE IF NOT EXISTS `colegio`.`Salon` (
  `idSalon` INT NOT NULL AUTO_INCREMENT,
  `nombreSalon` VARCHAR(50) NOT NULL,
  `ubicacionSalon` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idSalon`));

DROP TABLE IF EXISTS `colegio`.`Curso` ;

CREATE TABLE IF NOT EXISTS `colegio`.`Curso` (
  `idCurso` INT NOT NULL AUTO_INCREMENT,
  `codigoCurso` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idCurso`));

DROP TABLE IF EXISTS `colegio`.`SeguimientoCurso` ;

CREATE TABLE IF NOT EXISTS `colegio`.`SeguimientoCurso` (
  `idSeguimientoCurso` INT NOT NULL AUTO_INCREMENT,
  `idUsuarioFK` INT NOT NULL,
  `idCursoFK` INT NOT NULL,
  `fechaSeguimiento` DATE NOT NULL,
  `idSalonFK` INT NOT NULL,
  PRIMARY KEY (`idSeguimientoCurso`),
  CONSTRAINT `idUsuarioFK_seguimiento`
    FOREIGN KEY (`idUsuarioFK`)
    REFERENCES `colegio`.`Usuario` (`idUsuario`),
  CONSTRAINT `idCursoFK_seguimiento`
    FOREIGN KEY (`idCursoFK`)
    REFERENCES `colegio`.`Curso` (`idCurso`),
  CONSTRAINT `idSalonFK_seguimiento`
    FOREIGN KEY (`idSalonFK`)
    REFERENCES `colegio`.`Salon` (`idSalon`));

DROP TABLE IF EXISTS `colegio`.`Observacion` ;

CREATE TABLE IF NOT EXISTS `colegio`.`Observacion` (
  `idObservacion` INT NOT NULL AUTO_INCREMENT,
  `fechaObservacion` DATE NOT NULL,
  `tipoFalta` VARCHAR(50) NOT NULL,
  `descripcionObservacion` VARCHAR(100) NOT NULL,
  `idUsuarioFK` INT NOT NULL,
  `idSeguimientoFK` INT NOT NULL,
  `descargosObservacion` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idObservacion`),
  CONSTRAINT `idUsuarioFK_observacion`
    FOREIGN KEY (`idUsuarioFK`)
    REFERENCES `colegio`.`Usuario` (`idUsuario`),
  CONSTRAINT `idSeguimientoFK_observacion`
    FOREIGN KEY (`idSeguimientoFK`)
    REFERENCES `colegio`.`SeguimientoCurso` (`idSeguimientoCurso`));

DROP TABLE IF EXISTS `colegio`.`Inasistencia` ;

CREATE TABLE IF NOT EXISTS `colegio`.`Inasistencia` (
  `idInasistencia` INT NOT NULL AUTO_INCREMENT,
  `idUsuarioFK` INT NOT NULL,
  `fechaInasistencia` DATE NOT NULL,
  `excusaInesistencia` VARCHAR(2) NOT NULL,
  `idSeguimientoFK` INT NULL,
  PRIMARY KEY (`idInasistencia`),
  CONSTRAINT `idUsuarioFK_inasistencia`
    FOREIGN KEY (`idUsuarioFK`)
    REFERENCES `colegio`.`Usuario` (`idUsuario`),
  CONSTRAINT `idSeguimientoFK_inasistencia`
    FOREIGN KEY (`idSeguimientoFK`)
    REFERENCES `colegio`.`SeguimientoCurso` (`idSeguimientoCurso`));

DROP TABLE IF EXISTS `colegio`.`Materia` ;

CREATE TABLE IF NOT EXISTS `colegio`.`Materia` (
  `idMateria` INT NOT NULL AUTO_INCREMENT,
  `nombreMateria` VARCHAR(50) NOT NULL,
  `horasSemanales` INT NOT NULL,
  PRIMARY KEY (`idMateria`));

DROP TABLE IF EXISTS `colegio`.`AsignacionCarga` ;

CREATE TABLE IF NOT EXISTS `colegio`.`AsignacionCarga` (
  `idAsignacionCarga` INT NOT NULL AUTO_INCREMENT,
  `idMateriaFk` INT NOT NULL,
  `idUsuarioFK` INT NOT NULL,
  `idCursoFK` INT NOT NULL,
  `fechaAsignacion` DATE NOT NULL,
  PRIMARY KEY (`idAsignacionCarga`),
  CONSTRAINT `idMateriaFK_asignacion`
    FOREIGN KEY (`idMateriaFk`)
    REFERENCES `colegio`.`Materia` (`idMateria`),
  CONSTRAINT `idUsuarioFK_asignacion`
    FOREIGN KEY (`idUsuarioFK`)
    REFERENCES `colegio`.`Usuario` (`idUsuario`),
  CONSTRAINT `idCursoFK_asignacion`
    FOREIGN KEY (`idCursoFK`)
    REFERENCES `colegio`.`Curso` (`idCurso`));

DROP TABLE IF EXISTS `colegio`.`Calificacion` ;

CREATE TABLE IF NOT EXISTS `colegio`.`Calificacion` (
  `idCalificacion` INT NOT NULL AUTO_INCREMENT,
  `notaPeriodo1` INT NOT NULL,
  `notaPeriodo2` INT NOT NULL,
  `notaPeriodo3` INT NOT NULL,
  `notaFinal` INT NOT NULL,
  `fechaRegistro` DATE NOT NULL,
  `idAsignacionCargaFK` INT NOT NULL,
  `idCursoFK` INT NOT NULL,
  PRIMARY KEY (`idCalificacion`),
  CONSTRAINT `idAsignacionCargaFK_calificacion`
    FOREIGN KEY (`idAsignacionCargaFK`)
    REFERENCES `colegio`.`AsignacionCarga` (`idAsignacionCarga`),
  CONSTRAINT `idCursoFK_calificacion`
    FOREIGN KEY (`idCursoFK`)
    REFERENCES `colegio`.`Curso` (`idCurso`));
-- ---------------------------------------------------------
-- ---- Inserts --------------------------------------------
-- ---------------------------------------------------------
insert into colegio.usuario (
`user`, `password`, 
nombreUsuario, apellidoUsuario, tipoDocUsuario, docUsuario, 
estadoUsuario,tipoUsuario,especialidadUsuario) values (
"Asly","Asly1","Asly","Martinez","Cedula",9333485245,
1,"Administrador","Dirección");

insert into colegio.usuario (
`user`, `password`, nombreUsuario, apellidoUsuario, 
tipoDocUsuario, docUsuario, estadoUsuario,tipoUsuario,
especialidadUsuario) values (
"Jose","Jose1","Jose","Francisco",
"Cedula",2777365237,1,"Profesor",
"Física");

insert into colegio.usuario (
`user`, `password`, 
nombreUsuario, apellidoUsuario, tipoDocUsuario, 
docUsuario, estadoUsuario,tipoUsuario,
especialidadUsuario) values (
"Jaime","jaime1",
"Jaime","Gonzalo",
"Cedula",2567365245,
1,"Estudiante","Estudiar");

insert into colegio.salon (nombreSalon, ubicacionSalon) values ("5a","Segundo Piso");
insert into colegio.salon (nombreSalon, ubicacionSalon) values ("11b","Cuarto Piso");

insert into colegio.Curso (codigoCurso) values (1);
insert into colegio.Curso (codigoCurso) values (2);

insert into colegio.Materia (nombreMateria, horasSemanales) values ("Física",4);
insert into colegio.Materia (nombreMateria, horasSemanales) values ("Calculo",5);

insert into colegio.AsignacionCarga (idMateriaFK, idUsuarioFK, idCursoFK, fechaAsignacion) values (1,2,1,"2021-08-15");
insert into colegio.AsignacionCarga (idMateriaFK, idUsuarioFK, idCursoFK, fechaAsignacion) values (2,2,1,"2021-08-15");

insert into colegio.seguimientocurso (idUsuarioFK, idCursoFK, fechaSeguimiento, idSalonFK) values (2,1,"2021-08-15",1);
insert into colegio.seguimientocurso (idUsuarioFK, idCursoFK, fechaSeguimiento, idSalonFK) values (3,2,"2021-08-15",2);
