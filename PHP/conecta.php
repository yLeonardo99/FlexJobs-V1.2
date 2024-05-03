
<?php

define("USER", "root");
define("PASS", "");
$password = "";

// Informações de Conexão com Banco de Dados 

try {
  $pdo = new PDO('mysql:host=localhost;dbname=flexjobs', USER, PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'ERROR: ' . $e->getMessage();
}
