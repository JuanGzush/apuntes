DROP DATABASE IF EXISTS horario;
CREATE DATABASE horario;
USE horario;

CREATE TABLE ofertaEducativa (
codOe char(3) PRIMARY KEY,
nombre varchar(70),
descripcion varchar(255),
tipo ENUM('CFGS','CFGM', 'FPB'),
fechaLey timestamp);

CREATE TABLE profesor(
codProf char(3) PRIMARY KEY,
nombre varchar(20),
apellidos varchar(40),
fechaAlta date);


CREATE TABLE curso(
codOe char(3),
codCurso char(2),
codTutor char(3) UNIQUE NOT NULL,
PRIMARY KEY(codOe, codCurso),
CONSTRAINT FK_codOe FOREIGN KEY (codOe)
REFERENCES ofertaEducativa(codOe) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT FK_codTutor FOREIGN KEY (codTutor)
REFERENCES profesor(codProf) ON DELETE RESTRICT ON UPDATE CASCADE);

CREATE TABLE tramoHorario(
codTramo char(2) PRIMARY KEY,
horaInicio TIME,
horaFin TIME,
dia ENUM('LUNES' , 'MARTES' , 'MIERCOLES' , 'JUEVES', 'VIERNES'));

CREATE TABLE asignatura(
codAsig varchar(6) PRIMARY KEY,
nombre varchar(80) NOT NULL,
horasSemanales tinyint unsigned,
horasTotales smallint unsigned
);

CREATE TABLE reparto(
codOe char(3),
codCurso char(2),
codAsig VARCHAR(6),
codProf char(3),
PRIMARY KEY(codOe, codCurso, codAsig),
CONSTRAINT FK_CodOeYCurso FOREIGN KEY (codOe, codCurso)
REFERENCES curso(codOe,codCurso) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT FK_CodAsig FOREIGN KEY (codAsig)
REFERENCES asignatura(codAsig) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT FK_CodProf FOREIGN KEY (codProf)
REFERENCES profesor(codProf) ON DELETE RESTRICT ON UPDATE CASCADE);

CREATE TABLE horario(
codOe char(3),
codCurso char(2),
codAsig varchar(6),
codTramo char(2),
PRIMARY KEY(codOe, codCurso, codAsig, codTramo),
CONSTRAINT FK_CodOeCurso FOREIGN KEY (codOe, codCurso)
REFERENCES Curso(codOe,codCurso) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT FK_CodAsignatura FOREIGN KEY (codAsig)
REFERENCES Asignatura(codAsig) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT FK_CodTramo FOREIGN KEY (codTramo)
REFERENCES TramoHorario(codTramo) ON DELETE CASCADE ON UPDATE CASCADE);


INSERT INTO ofertaEducativa VALUES
("SMR","Grado Medio de Sistemas Microinformáticos y Redes","El CFGM SMR tiene una duración de 2000 horas
 repartidas entre dos cursos académicos incluyendo un trimestre de Formacion en centros de trabajo (FCT)
 en empresas del Sector",'CFGM','2009-07-07'),
("DAM","Grado Superior de Desarollo de Aplicaciones Multiplataforma","El CFGs DAM tiene una duración de 2000 horas repartidas entre dos cursos académicos incluyendo 400 horas de Formacion en centros de trabajo (FCT) en empresas del Sector",'CFGS','2011-06-16');

INSERT INTO profesor VALUES
("AGL","Ana","Gutiérrez Lozano",'1999-09-01'),
("PJM","Pedro","Joya Máñez",'2000-09-01'),
("EPM","Eva","Peralta Macías",'2009-09-01'),
("AAR","Antonio","Aguilar Rodríguez",'2011-09-01'),
("PBG","Pilar","Baena García",'2007-09-01'),
("MGD","María","Gallego Díaz",'2016-09-01'),
("SAA","Santiago","Acha Aller",'2018-09-20'),
("EGT","Eva","González Torres",'2018-10-17'),
("AFS","Antonio","Fernández Safra",'2011-12-21'),
("ADS","Antonio","Díaz Santamaría",'2014-02-11'),
("CVC","Carmelo","Villegas Cruz",'2013-09-01'),
("SFE","Soraya","Ferrando España",'2018-10-15'),
("LEL","Lola","Enríquez Lara",'2018-10-15');

INSERT INTO curso VALUES
("SMR","1A","AFS"),
("SMR","2A","AAR"),
("DAM","1A","AGL"),
("DAM","2A","PJM");

INSERT INTO asignatura VALUES
("RED", "Redes Locales", 7,224),
("@RED", "Desdoble de Redes Locales", 3,96),
("SISM1", "Sistemas operativos monopuestos", 3,96),
("SISM2", "Sistemas operativos monopuestos", 2,64),
("MONT", "Montaje y mantenimiento de equipos", 7,224),
("@MONT", "Desdoble de Montaje y mantenimiento de equipos", 3,96),
("APLI", "Aplicaciones ofimáticas", 8, 256),
("@APLI", "Desdoble de Aplicaciones ofimáticas 1", 4, 128),
("SEG", "Seguridad informática", 5,105),
("HLC", "Horas de Libre Configuración", 3,63),
("SISR", "Sistemas operativos en red",7,147),
("SERV","Servicios en red",7,147),
("APLIW","Aplicaciones web",4,84),
("EIEM", "Empresa e iniciativa empresarial", 4,84),
("SIST","Sistemas informáticos",6,192),
("@SIST","Desdoble de Sistemas informáticos", 3, 96),
("BDD","Bases de Datos", 6, 192),
("@BDD","Desdoble de Bases de Datos 1", 3, 96),
("PROG","Programación",8, 256),
("@1PROG","Desdoble de Programación 1", 3, 96),
("@2PROG","Desdoble de Programación 2", 3, 96),
("ENT","Entornos de desarrollo",3,96),
("MARC","Lenguajes de marcas y sistemas de gestión de información", 4,128),
("FOL","Formación y orientación laboral",3,96),
("AD","Acceso a datos",5,105),
("DI","Desarrollo de interfaces",7,147),
("PSPRO","Programación de servicios y procesos",3,63),
("PMDMO","Programación multimedia y dispositivos móviles",4,84),
("EIE","Empresa e iniciativa emprendedora",4,84),
("SGE","Sistemas de gestión empresarial",4,84);


INSERT INTO tramoHorario VALUES
("L1", "08:15:00", "09:15:00", 'LUNES'), ("L2", "09:15:00", "10:15:00", 'LUNES'), ("L3", "10:15:00", "11:15:00", 'LUNES'),
("L4", "11:45:00", "12:45:00", 'LUNES'), ("L5", "12:45:00", "13:45:00", 'LUNES'), ("L6", "13:45:00", "14:45:00", 'LUNES'),
("M1", "08:15:00", "09:15:00", 'MARTES'), ("M2", "09:15:00", "10:15:00", 'MARTES'), ("M3", "10:15:00", "11:15:00", 'MARTES'),
("M4", "11:45:00", "12:45:00", 'MARTES'), ("M5", "12:45:00", "13:45:00", 'MARTES'), ("M6", "13:45:00", "14:45:00", 'MARTES'),
("X1", "08:15:00", "09:15:00", 'MIERCOLES'), ("X2", "09:15:00", "10:15:00", 'MIERCOLES'), ("X3", "10:15:00", "11:15:00", 'MIERCOLES'),
("X4", "11:45:00", "12:45:00", 'MIERCOLES'), ("X5", "12:45:00", "13:45:00", 'MIERCOLES'), ("X6", "13:45:00", "14:45:00", 'MIERCOLES'),
("J1", "08:15:00", "09:15:00", 'JUEVES'), ("J2", "09:15:00", "10:15:00", 'JUEVES'), ("J3", "10:15:00", "11:15:00", 'JUEVES'),
("J4", "11:45:00", "12:45:00", 'JUEVES'), ("J5", "12:45:00", "13:45:00", 'JUEVES'), ("J6", "13:45:00", "14:45:00", 'JUEVES'),
("V1", "08:15:00", "09:15:00", 'VIERNES'), ("V2", "09:15:00", "10:15:00", 'VIERNES'), ("V3", "10:15:00", "11:15:00", 'VIERNES'),
("V4", "11:45:00", "12:45:00", 'VIERNES'), ("V5", "12:45:00", "13:45:00", 'VIERNES'), ("V6", "13:45:00", "14:45:00", 'VIERNES');


INSERT INTO reparto VALUES
("SMR","1A","RED","AAR"),
("SMR","1A","@RED","ADS"),
("SMR","1A","SISM1","AFS"),
("SMR","1A","SISM2","CVC"),
("SMR","1A","MONT","AFS"),
("SMR","1A","@MONT","CVC"),
("SMR","1A","APLI","AFS"),
("SMR","1A","@APLI","LEL"),
("SMR","1A","FOL","EGT"),

("SMR","2A","SEG","AGL"),
("SMR","2A","HLC","PJM"),
("SMR","2A","SISR","PBG"),
("SMR","2A","SERV","AAR"),
("SMR","2A","APLIW","PJM"),
("SMR","2A","EIEM","EGT"),

("DAM","1A","SIST","LEL"),
("DAM","1A","@SIST","PBG"),
("DAM","1A","BDD","AGL"),
("DAM","1A","@BDD","PJM"),
("DAM","1A","PROG","EPM"),
("DAM","1A","@1PROG","AGL"),
("DAM","1A","@2PROG","MGD"),
("DAM","1A","ENT","EPM"),
("DAM","1A","MARC","MGD"),
("DAM","1A","FOL","EGT"),

("DAM","2A","AD","EPM"),
("DAM","2A","DI","CVC"),
("DAM","2A","PSPRO","PJM"),
("DAM","2A","PMDMO","PJM"),
("DAM","2A","EIE","SFE"),
("DAM","2A","SGE","SAA"),
("DAM","2A","HLC","MGD");

-- 1 CFGM
INSERT INTO horario VALUES
("SMR", "1A", "RED", "L1"), ("SMR", "1A", "RED", "L2"),
("SMR", "1A", "APLI", "L3"), ("SMR", "1A", "APLI", "L4"),
("SMR", "1A", "APLI", "L5"), ("SMR", "1A", "RED", "M1"),
("SMR", "1A", "APLI", "M2"), ("SMR", "1A", "SISM1", "L2"),
("SMR", "1A", "RED", "M4"), ("SMR", "1A", "RED", "M5"),
("SMR", "1A", "MONT", "X1"), ("SMR", "1A", "MONT", "X2"),
("SMR", "1A", "MONT", "X3"), ("SMR", "1A", "APLI", "X4"),
("SMR", "1A", "FOL", "X5"), ("SMR", "1A", "SISM2", "J1"),
("SMR", "1A", "APLI", "J2"), ("SMR", "1A", "MONT", "J3"),
("SMR", "1A", "MONT", "J4"), ("SMR", "1A", "MONT", "J5"),
("SMR", "1A", "APLI", "V1"), ("SMR", "1A", "MONT", "V2"),
("SMR", "1A", "APLI", "V3"), ("SMR", "1A", "SISM1", "V1"),
("SMR", "1A", "SISM2", "J2"), ("SMR", "1A", "SISM1", "X6"),
("SMR", "1A", "FOL", "M6"), ("SMR", "1A", "RED", "X6"),
("SMR", "1A", "RED", "J6"), ("SMR", "1A", "FOL", "V6"),
("SMR", "1A", "@APLI", "L4"),("SMR", "1A", "@APLI", "L5"),
("SMR", "1A", "@RED", "M1"),("SMR", "1A", "@APLI", "M2"),
("SMR", "1A", "@RED", "M4"), ("SMR", "1A", "@RED", "M5"),
("SMR", "1A", "@MONT", "X3"),("SMR", "1A", "@MONT", "J3"),
("SMR", "1A", "@MONT", "V2"),

-- 2 CFGM
("SMR","2A","SEG","L1"),("SMR","2A","EIEM","L2"),("SMR","2A","SERV","L3"),
("SMR","2A","APLIW","L4"),("SMR","2A","SISR","L5"),("SMR","2A","SISR","L6"),
("SMR","2A","HLC","M1"),("SMR","2A","EIEM","M2"),("SMR","2A","SEG","M3"),
("SMR","2A","SERV","M4"),("SMR","2A","APLIW","M5"),("SMR","2A","SISR","M6"),
("SMR","2A","SEG","X1"),("SMR","2A","SISR","X2"),("SMR","2A","SERV","X3"),
("SMR","2A","EIEM","X4"),("SMR","2A","APLIW","X5"),("SMR","2A","HLC","X6"),
("SMR","2A","SERV","J1"),("SMR","2A","APLIW","J2"),("SMR","2A","HLC","J3"),
("SMR","2A","SERV","J4"),("SMR","2A","SEG","J5"),("SMR","2A","SISR","J6"),
("SMR","2A","SERV","V1"),("SMR","2A","SERV","V2"),("SMR","2A","SISR","V3"),
("SMR","2A","SISR","V4"),("SMR","2A","EIEM","V5"),("SMR","2A","SEG","V6"),

-- 1 CFGS
("DAM","1A","MARC","L1"),("DAM","1A","BDD","L2"),("DAM","1A","BDD","L3"),
("DAM","1A","SIST","L4"),("DAM","1A","SIST","L5"),("DAM","1A","ENT","L6"),
("DAM","1A","BDD","M1"),("DAM","1A","BDD","M2"),("DAM","1A","SIST","M3"),
("DAM","1A","FOL","M4"),("DAM","1A","PROG","M5"),("DAM","1A","BDD","M6"),
("DAM","1A","PROG","X1"),("DAM","1A","PROG","X2"),("DAM","1A","SIST","X3"),
("DAM","1A","PROG","X4"),("DAM","1A","PROG","X5"),("DAM","1A","MARC","X6"),
("DAM","1A","ENT","J1"),("DAM","1A","PROG","J2"),("DAM","1A","PROG","J3"),
("DAM","1A","MARC","J4"),("DAM","1A","FOL","J5"),("DAM","1A","BDD","J6"),
("DAM","1A","SIST","V1"),("DAM","1A","ENT","V2"),("DAM","1A","PROG","V3"),
("DAM","1A","MARC","V4"),("DAM","1A","SIST","V5"),("DAM","1A","FOL","V6"),
("DAM","1A","@2PROG","X5"),("DAM","1A","@2PROG","X4"),("DAM","1A","@2PROG","V3"),
("DAM","1A","@1PROG","J2"),("DAM","1A","@1PROG","J3"),("DAM","1A","@1PROG","M5"),
("DAM","1A","@BDD","M6"),("DAM","1A","@BDD","L2"),("DAM","1A","@BDD","L3"),
("DAM","1A","@SIST","V1"),("DAM","1A","@SIST","X3"),("DAM","1A","@SIST","L4"),

-- 2 CFGS
("DAM","2A","DI","L1"),("DAM","2A","EIE","L2"),("DAM","2A","HLC","L3"), ("DAM","2A","AD","L4"),("DAM","2A","AD","L5"),("DAM","2A","SGE","L6"),
("DAM","2A","EIE","M1"),("DAM","2A","HLC","M2"),("DAM","2A","PMDMO","M3"), ("DAM","2A","PMDMO","M4"),("DAM","2A","DI","M5"),("DAM","2A","SGE","M6"),
("DAM","2A","HLC","X1"),("DAM","2A","EIE","X2"),("DAM","2A","AD","X3"), ("DAM","2A","PSPRO","X4"),("DAM","2A","DI","X5"),("DAM","2A","DI","X6"),
("DAM","2A","PSPRO","J1"),("DAM","2A","EIE","J2"),("DAM","2A","DI","J3"), ("DAM","2A","AD","J4"),("DAM","2A","AD","J5"),("DAM","2A","SGE","J6"),
("DAM","2A","DI","V1"),("DAM","2A","DI","V2"),("DAM","2A","SGE","V3"), ("DAM","2A","PMDMO","V4"),("DAM","2A","PMDMO","V5"),("DAM","2A","PSPRO","V6");
