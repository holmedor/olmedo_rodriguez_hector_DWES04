CREATE DATABASE IF NOT EXISTS olmedo_rodriguez_hector_DWESBD04;
USE olmedo_rodriguez_hector_DWESBD04;

CREATE TABLE IF NOT EXISTS ADE(
idADE INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(255) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS MEDIA(
idMEDIA INT AUTO_INCREMENT PRIMARY KEY,
titulo VARCHAR(255) NOT NULL,
idADE INT,
medio VARCHAR(100) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (idADE) REFERENCES ADE(idADE)
);

INSERT INTO ADE (idADE, nombre) VALUES
(1,"Jean-Michel Jarre"),
(2,"Paul Thomas Anderson"),
(3,"Ed Wood Jr."),
(4,"Woody Allen"),
(5,"Alfred Hitchcock"),
(6,"William Gibson"),
(7,"Quentin Tarantino");

INSERT INTO MEDIA (idMEDIA, titulo, idADE,medio) VALUES
(1,"Zoolook", 1,"CD"),
(2,"Licorice Pizza",2,"DVD"),
(3,"Muerte de un travesti",3,"LIBRO"),
(4,"Plan 9 from outer space",3,"DVD"),
(5,"Match Point",4,"Bluray"),
(6,"Crimen perfecto",5,"Bluray3D"),
(7,"Neuromante",6,"LIBRO"),
(8,"A propósito de nada",4,"LIBRO"),
(9,"Meditaciones de cine",7,"LIBRO"),
(10,"Malditos Bastardos",7,"Bluray");
