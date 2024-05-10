<?php
// Iniciar a sessão

session_start();

// Conexão com o banco de dados

require_once 'conecta.php';

/* Puxando as informações do nosso formulario Login.html  e verificando se o método utilizado foi POST - Se ambas as condições forem
verdadeiras, ou seja, se a requisição for do tipo POST e o botão "btnentrar" foi pressionado, então o código PHP continua executando 
as próximas linhas.
*/

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnentrar'])) {
    $email = $_POST['lgemail'];
    $senha = $_POST['lgsenha'];

    // Consulta SQL para buscar o usuário com o email e senha fornecidos que foram cadastrado em nosso banco de dados

    $query = "SELECT * FROM flexjobs WHERE email = :email AND senha = :senha";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':senha', $senha);
    $stmt->execute();

    // Verifica se encontrou algum registro

    if ($stmt->rowCount() > 0) {

        // Armazenar o email do usuário na sessão

        $_SESSION['email'] = $email;

        // Redirecionar para a página altera.php

        header("Location: altera.php");

        exit();
    } else {
        echo "Email ou senha incorretos.";
    }
} else {
    echo "Erro: Método de requisição inválido.";
}

$pdo = null;
