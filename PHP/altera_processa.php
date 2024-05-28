<?php
<<<<<<< HEAD
=======

// Verificar se o método de requisição é POST e se o ID está presente na URL
>>>>>>> 932d76b5c070ee71c27aa9703def97e209de4a77

// Verificar se a requisição é do tipo POST e se todos os campos obrigatórios estão presentes

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userId']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['cpf']) && isset($_POST['senha']) && isset($_POST['confirmar_senha'])) {
    
    // Incluir o arquivo de conexão com o banco de dados

    require_once 'conecta.php';

    // Obter os dados do formulário

    $userId = $_POST['userId'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmar_senha'];

    // Verificar se as senhas coincidem

    if ($senha !== $confirmarSenha) {
        echo "Erro: As senhas não coincidem.";
        exit();
    }

    // Criptografar a senha usando MD5
    
    $senhaCriptografada = md5($senha);
    $senhaCriptografada2 = md5($confirmarSenha);

    // Criptografar a senha usando MD5

    $senhaCriptografada = md5($senha);

    try {

        // Query para atualizar os dados no banco de dados

        $query = "UPDATE flexjobs SET nome = :nome, email = :email, cpf = :cpf, senha = :senha, confirmar_senha = :confirmar_senha WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':senha', $senhaCriptografada);
<<<<<<< HEAD
        $stmt->bindValue(':confirmar_senha', $senhaCriptografada2);
=======
>>>>>>> 932d76b5c070ee71c27aa9703def97e209de4a77
        $stmt->execute();

        // Redirecionar para uma página após a atualização bem-sucedida

        header("Location: http://localhost/FlexJobs/Vagas.html?mensagem=Dados+foram+atualizados");
        exit();

    } catch (PDOException $e) {

        // Tratar erros se houver algum problema na atualização

        echo "Erro ao atualizar registro: " . $e->getMessage();
    }
} else {

    // Se algum campo obrigatório estiver ausente, exibir uma mensagem de erro

    echo "Erro: Não foi possível processar a solicitação. Dados insuficientes.";

}

<<<<<<< HEAD

?>




=======
?>
>>>>>>> 932d76b5c070ee71c27aa9703def97e209de4a77
