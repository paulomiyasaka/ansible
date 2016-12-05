<?php
  
// constantes com as credenciais de acesso ao banco MySQL
define('DB_HOST', '192.168.0.40');
define('DB_USER', 'root');
define('DB_PASS', '1234567');
define('DB_NAME', 'aula_dirceu');
  
// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
 
date_default_timezone_set('America/Sao_Paulo');
  
// inclui o arquivo de funçõees
require_once 'functions.php';

?>
