<?php
  
/**
 * Conecta com o MySQL usando PDO
 */
function db_connect()
{
  $dbname = 'aula_dirceu';
    $con = mysql_connect("192.168.0.40","root","1234567");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
if (mysql_num_rows(mysql_query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '". $dbname ."'"))) {
        echo "Database $dbname already exists.";
    }
    else {
        $sql = "CREATE DATABASE aula_dirceu;
USE aula_dirceu;

CREATE TABLE users(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT, -- id
    name VARCHAR(60) NOT NULL, -- nome
    email VARCHAR(80) NOT NULL, -- email
    gender ENUM('m', 'f') NOT NULL, -- gênero (masculino, feminino)
    birthdate DATE NOT NULL, -- data de nascimento
    PRIMARY KEY(id)
) COLLATE=utf8_unicode_ci;";
      
        mysql_query($sql,$con);
        echo "Database $dbname created.";
    }
  
  
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
  
    return $PDO;
}
  
 
/**
 * Converte datas entre os padrões ISO e brasileiro
 * Fonte: http://rberaldo.com.br/php-conversao-de-datas-formato-brasileiro-e-formato-iso/
 */
function dateConvert($date)
{
    if ( ! strstr( $date, '/' ) )
    {
        // $date está no formato ISO (yyyy-mm-dd) e deve ser convertida
        // para dd/mm/yyyy
        sscanf($date, '%d-%d-%d', $y, $m, $d);
        return sprintf('%02d/%02d/%04d', $d, $m, $y);
    }
    else
    {
        // $date está no formato brasileiro e deve ser convertida para ISO
        sscanf($date, '%d/%d/%d', $d, $m, $y);
        return sprintf('%04d-%02d-%02d', $y, $m, $d);
    }
 
    return false;
}
 
 
/**
 * Calcula a idade a partir da data de nascimento
 *
 * Sobre a classe DateTime: http://rberaldo.com.br/php-usando-a-classe-nativa-datetime/
 */
function calculateAge($birthdate)
{
    $now = new DateTime();
    $diff = $now->diff(new DateTime($birthdate));
     
    return $diff->y;
}
