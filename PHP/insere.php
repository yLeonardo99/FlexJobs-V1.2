<?php

require_once 'conecta.php';
print_r($_POST);
$nome=$_POST["nome"];
$email=$_POST["email"];
$cpf=$_POST["cpf"];
$senha=$_POST["senha"];

//$conf_senha=$_POST["conf_senha"];

$query = "insert into flexjobs (nome, email, cpf, senha) values (:nome, :email,:cpf,:senha)";

$stmt = $pdo->prepare($query);

$stmt->bindValue(':nome',  $nome);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':cpf',   $cpf);
$stmt->bindValue(':senha', $senha);

//$stmt->bindValue(':conf_senha', '$conf_senha');

$stmt->execute();
echo 'Quantidades de registros: ' . $stmt->rowCount() . '<br>';
echo 'ID do último registro inserido: ' . $pdo->lastInsertId();

$stmt = null;
$pdo = null;

?>