<?php

// Aqui está fazendo uma verificação se ID do usuário foi passado via POST

if (isset($_POST['id'])) {
    $userId = $_POST['id'];

    // Incluir o arquivo de conexão com o banco de dados

    require_once 'conecta.php';

    try {

        // Query para excluir o usuário do banco de dados

        $query = "DELETE FROM flexjobs WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        // Redirecionar para a página principal após a exclusão bem-sucedida

        header("Location: http://localhost/FlexJobs/index.html?mensagem=Dados+foram+excluido+com+sucesso!");

        exit();
    } catch (PDOException $e) {

        // Tratar erros se houver algum problema na exclusão

        echo "Erro ao excluir usuário: " . $e->getMessage();
    }
} 

// else {

//     // Se o ID do usuário não foi encontrado, exibir uma mensagem de erro
    
//     echo "Erro: ID do usuário não encontrado.";
// }
?>
