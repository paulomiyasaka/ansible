CREATE DATABASE IF NOT EXISTS aula_dirceu;
USE aula_dirceu;

CREATE TABLE IF NOT EXISTS users(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT, -- id
    name VARCHAR(60) NOT NULL, -- nome
    email VARCHAR(80) NOT NULL, -- email
    gender ENUM('m', 'f') NOT NULL, -- gênero (masculino, feminino)
    birthdate DATE NOT NULL, -- data de nascimento
    PRIMARY KEY(id)
) COLLATE=utf8_unicode_ci;
