<!-- Em resumo, este código é usado para exibir um formulário para alterar os dados de um registro específico em um banco de dados. 
O formulário é preenchido com os dados do registro e é enviado via POST para o arquivo altera_processa.php -->


<?php
require_once 'conecta.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Busca os dados do registro com o ID fornecido

    $query = "SELECT * FROM flexjobs WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $registro = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($registro) {
?>


        <!DOCTYPE html>
        <html lang="pt-BR">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Alterar Registro</title>
        </head>

        <body>
            <h1>Alterar Registro</h1>

            <form action="altera_processa.php" method="post" name="altera">
                <input type="hidden" name="id" value="<?= $registro['id'] ?>">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= $registro['nome'] ?>" required><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $registro['email'] ?>" required><br><br>
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" value="<?= $registro['cpf'] ?>" required><br><br>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" value="<?= $registro['senha'] ?>" required><br><br>
                <button type="submit">Salvar Alterações</button>
            </form>

        </body>

        </html>

<?php
    } else {
        echo "Registro não encontrado.";
    }
} else {
    echo "Erro: Não foi possível processar a solicitação.";
}

$pdo = null;

?>