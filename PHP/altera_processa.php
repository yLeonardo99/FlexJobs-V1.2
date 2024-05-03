<?php
// Verificar se o método de requisição é POST e se o ID está presente na URL

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userId'])) {

    // Incluir o arquivo de conexão com o banco de dados

    require_once 'conecta.php';

    // Obter os dados do formulário

    $userId = $_POST['userId'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    try {
        // Query para atualizar os dados no banco de dados

        $query = "UPDATE flexjobs SET nome = :nome, email = :email, cpf = :cpf, senha = :senha WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        // Redirecionar para uma página após a atualização bem-sucedida, adicionando um parâmetro na URL

        header("Location: http://localhost/FlexJobs/Vagas.html?mensagem=Dados+foram+atualizados");

        exit();
    } catch (PDOException $e) {

        // Tratar erros se houver algum problema na atualização

        echo "Erro ao atualizar registro: " . $e->getMessage();
    }
} else {

    // Se o método de requisição não for POST ou se o ID não estiver presente, exibir uma mensagem de erro

    echo "Erro: Não foi possível processar a solicitação.";
}
