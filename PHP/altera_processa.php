<!-- Este é um código PHP que atualiza um registro em um banco de dados utilizando a extensão PDO 
ou seja  este código atualiza um registro no banco de dados com os valores enviados via POST,
utilizando a extensão PDO para se conectar ao banco de dados e executar uma consulta de atualização. -->

<?php
require_once 'conecta.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    try {
        // Query para atualizar os dados no banco de dados

        $query = "UPDATE flexjobs SET nome = :nome, email = :email, cpf = :cpf, senha = :senha WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':senha', $senha);

        $stmt->execute();

        echo 'Registro atualizado com sucesso.';
    } catch (PDOException $e) {
        echo "Erro ao atualizar registro: " . $e->getMessage();
    }
} else {
    echo "Erro: Não foi possível processar a solicitação.";
}

$pdo = null;
?>