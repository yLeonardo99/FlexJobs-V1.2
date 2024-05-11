<?php

// Aqui recebemos os dados do formulário.

require_once 'conecta.php';
print_r($_POST);
$nome = $_POST["nome"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$senha = md5($_POST["senha"]);

// Verificar se o email ou CPF já existem na tabela

$query = "SELECT COUNT(*) AS count FROM flexjobs WHERE email = :email OR cpf = :cpf";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':cpf', $cpf);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario['count'] > 0) {
    echo '<p style="color: red;">Erro: O email ou CPF já estão cadastrados.</p>';
    exit; // Sai do script após mostrar a mensagem de erro
} else {

    $query = "insert into flexjobs (nome, email, cpf, senha) values (:nome, :email,:cpf,:senha)";

    $stmt = $pdo->prepare($query);

    $stmt->bindValue(':nome',  $nome);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':cpf',   $cpf);
    $stmt->bindValue(':senha', $senha);

    $stmt->execute();
    echo 'Quantidades de registros: ' . $stmt->rowCount() . '<br>';
    echo 'ID do último registro inserido: ' . $pdo->lastInsertId();

    $stmt = null;
    $pdo = null;
}

?>


<br><br>

<a href="http://localhost/FlexJobs/Vagas.html">

    <button type="button" id="Inicio">Vagas</button> <br>

</a>


<a href="http://localhost/FlexJobs/login.html">
    <button type="button" id="Voltar">Voltar</button>
</a>

<style>
    #inicio {
        background-color: #512da8;
        color: white;
        border: 2px solid black;
        padding: 8px 39px;
        margin-top: auto;
        display: block;
        margin-right: 433px;
        transition: background-color 0.3s, color 0.3s;

    }

    #inicio:hover {
        background-color: #E6B037;
        color: black;
    }

    #Voltar {
        background-color: #512da8;
        color: white;
        border: 2px solid black;
        padding: 8px 39px;
        margin-top: auto;
        display: block;
        margin-right: 433px;
        transition: background-color 0.3s, color 0.3s;

    }

    #Voltar:hover {
        background-color: red;
        color: white;
    }
</style>