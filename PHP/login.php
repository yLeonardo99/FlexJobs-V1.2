    <?php
    // Iniciar a sessão

    session_start();

    // Conexão com o banco de dados

    require_once 'conecta.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnentrar'])) {
        $email = $_POST['lgemail'];
        $senha = md5($_POST['lgsenha']);


        // Consulta SQL para buscar o usuário com o email e senha fornecidos

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
            echo '<p style="color: red;">Email ou senha incorretos.</p>';
            echo '<a href="http://localhost/FlexJobs/login.html">Voltar para o login</a>';
        }
    } else {
        echo "Erro: Método de requisição inválido.";
    }

    $pdo = null;

    ?>