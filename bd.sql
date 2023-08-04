CREATE DATABASE crud_pdo;

USE crud_pdo;
CREATE TABLE contacto(
    id int PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    email VARCHAR(100),
    telefono VARCHAR (20)
    );

    INSERT INTO `contacto`(
    `id`, 
    `nombre`,
    `email`,
    `telefono`) 
    VALUES(
    NULL, 
    'Juan Moretti', 
    'jmoretti@gmail.com', 
    '09104510332');