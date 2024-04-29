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
            <link rel="stylesheet" type="text/css" href="style.css" media="screen">
            <title>Alterar Registro</title>
        </head>

        <body>

            <style>
                body {
                    background: linear-gradient(to bottom, rgb(3, 3, 84) 76%, rgb(33, 98, 220) 97%);
                }

                /* rodape */

                footer {
                    background-color: rgb(3, 3, 84);
                    color: white;
                    padding: 30px 0;
                    margin-top: 20px;
                }

                .footer-content {
                    display: flex;
                    justify-content: space-around;
                    flex-wrap: wrap;
                }

                .footer-section {
                    max-width: 300px;
                    margin-bottom: 20px;
                }

                .footer-section h2 {
                    font-size: 1.5em;
                    border-bottom: 2px solid rgb(51, 181, 220);
                    padding-bottom: 5px;
                }

                .footer-section p {
                    font-size: 1em;
                    margin-top: 10px;
                }

                .footer-section ul {
                    list-style-type: none;
                    padding: 0;
                }

                .footer-section a {
                    color: rgb(51, 181, 220);
                    text-decoration: none;
                }

                .footer-section a:hover {
                    text-decoration: underline;
                }

                .footer-bottom {
                    text-align: center;
                    padding-top: 20px;
                    border-top: 2px solid rgb(51, 181, 220);
                }

                /* Estilo para o formulário */
                h1 {
                    text-align: center;
                    margin-bottom: 20px;
                    color: #000;
                    background-color: #d3cfe2;
                    padding: 10px;
                    border-radius: 5px;

                }

                #altera-form {
                    max-width: 400px;
                    margin: 20px auto;
                    padding: 20px;
                    border-radius: 8px;
                    background-color: #d3cfe2;
                    box-shadow: -6px 20px 5px rgba(0, 0, 0, 0.1);
                }

                label {
                    display: block;
                    margin-bottom: 5px;
                }

                input[type="text"],
                input[type="email"],
                input[type="password"] {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 15px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }

                button[type="submit"] {
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    padding: 10px 20px;
                    border-radius: 5px;
                    cursor: pointer;
                }

                button[type="submit"]:hover {
                    text-align: center;
                    margin-bottom: 20px;
                    color: #000;
                    background-color: #007bff;
                    border-radius: 5px;
                }
            </style>

            <h1>Atualizar meus Dados </h1>

            <form id="altera-form" action="altera_processa.php" method="post" name="altera">

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

            <!-- rodape -->
            <footer>
                <div class="footer-content">
                    <div class="footer-section about">
                        <h2>Sobre nós</h2>
                        <p>FlexJobs é uma plataforma para conectar freelancers e contratantes em busca de talento. Oferecemos
                            oportunidades flexíveis para profissionais em todo o mundo.</p>
                    </div>

                    <div class="footer-section contact">
                        <h2>Entre em contato</h2>
                        <p>Email: contato@flexjobs.com</p>
                        <p>Telefone: (11) 5050-5050</p>
                    </div>

                    <div class="footer-section links">
                        <h2>Nos sigam nas redes</h2>
                        <ul>
                            <li>Instagram: @flexjobs</li>
                        </ul>
                    </div>
                </div>

                <div class="footer-bottom">
                    <p>&copy; 2023 FlexJobs. Todos os direitos reservados.</p>
                </div>
            </footer>

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