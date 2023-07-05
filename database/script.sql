CREATE DATABASE cc_jesus;

CREATE TABLE `ocupacion`(
    `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nombre_ocupacion` VARCHAR(30) DEFAULT NULL
); CREATE TABLE `tipo_cedula`(
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `identificador` CHAR(1) DEFAULT NULL
); CREATE TABLE `personal`(
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `nombre` VARCHAR(30) DEFAULT NULL,
    `apellido` VARCHAR(30) DEFAULT NULL,
    `celular` VARCHAR(12) DEFAULT NULL,
    `cedula` INT(11) DEFAULT NULL,
    `id_tipo_cedula` INT(11) DEFAULT NULL,
    `id_ocupacion` INT(11) DEFAULT NULL,
    FOREIGN KEY(`id_tipo_cedula`) REFERENCES `tipo_cedula`(`id`),
    FOREIGN KEY(`id_ocupacion`) REFERENCES `ocupacion`(`id`)
); CREATE TABLE `tamano_tienda`(
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `tamano` INT(11) DEFAULT NULL
); CREATE TABLE `piso`(
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `nombre_piso` VARCHAR(30) DEFAULT NULL
); CREATE TABLE `tienda`(
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `nombre_tienda` VARCHAR(30) DEFAULT NULL
); CREATE TABLE `tienda_completa`(
    `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `id_tienda` int(30) DEFAULT NULL,
    `id_piso` INT(11) DEFAULT NULL,
    `id_tamano` INT(11),
    FOREIGN KEY(`id_piso`) REFERENCES `piso`(`id`),
    FOREIGN KEY(`id_tienda`) REFERENCES `tienda`(`id`),
    FOREIGN KEY(`id_tamano`) REFERENCES `tamano_tienda`(`id`)
); CREATE TABLE `hoja_de_calculo`(
    `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `concepto` VARCHAR(30) DEFAULT NULL,
    `saldo` FLOAT DEFAULT NULL,
    `fecha` DATE DEFAULT NULL
); CREATE TABLE `condominio_tienda`(
    `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `saldo_condominio` FLOAT DEFAULT NULL,
    `pagado` TINYINT(1) DEFAULT NULL,
    `id_tienda` INT(11) DEFAULT NULL,
    `fecha_emision` DATE DEFAULT NULL
);