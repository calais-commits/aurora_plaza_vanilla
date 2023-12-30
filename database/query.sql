CREATE DATABASE aurora_plaza_vanilla;

CREATE TABLE `product` (
    `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `product_name` VARCHAR(30), 
    `product_size` INT(11),
    `floor` INT(2),
    'description' VARCHAR(200),
    'url' VARCHAR(300)
);

CREATE TABLE `user`(
    `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(30),
    `email` VARCHAR(50),
    `password` VARCHAR(50),
    'admin' INT(1)
);