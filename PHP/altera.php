<?php
// Iniciar a sessão

session_start();

// Conexão com o banco de dados

require_once 'conecta.php';

// Verificar se o usuário está logado

if (!isset($_SESSION['email'])) {

    // Se não estiver logado, redirecionar para a página de login

    header("Location: login.html");
    exit();
}

// Consulta SQL para buscar os dados do usuário usando o email da sessão

$query = "SELECT * FROM flexjobs WHERE email = :email";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':email', $_SESSION['email']);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar se encontrou o usuário

if (!$usuario) {
    // Se não encontrou, redirecionar para o login

    header("Location: login.html");
    exit();
}

$pdo = null;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="JavaScript/Visible_Senha.js" defer></script>
    <script src="JavaScript/altera.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-*******************" crossorigin="anonymous" />
    <title>Atualizar Dados</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="altera_processa.php" method="POST" name="altera" id="alteraForm">
<<<<<<< HEAD

=======
                <h1 id="logar">Atualizar meus Dados</h1>
                <span>FlexJobs sempre com você.</span>
        
>>>>>>> 932d76b5c070ee71c27aa9703def97e209de4a77
                <input type="hidden" name="userId" value="<?= $usuario['id'] ?>">
                <input type="text" placeholder="Nome" name="nome" value="<?= $usuario['nome'] ?>" required>
                <input type="email" placeholder="Email" name="email" value="<?= $usuario['email'] ?>" required>
                <input type="text" placeholder="CPF" id="cpf" name="cpf" value="<?= $usuario['cpf'] ?>" maxlength="14" oninput="formatarCPF(this)" required>
<<<<<<< HEAD
                <span style="text-decoration: underline; color: navy;">Digite sua senha ou se preferir digite uma nova senha !</span>
                <input type="password" placeholder="Digite a Senha" id="senha" name="senha" required>
                <span id="olho" onclick="toggleSenha('senha')">👁️</span>

                <input type="password" placeholder="Confirmar senha " id="confirmarSenha" name="confirmar_senha" required>
                <span id="olhoConfirmar" onclick="toggleSenha('confirmarSenha')">👁️</span>

                <span id="senhaErro" style="color: red;"></span> <!-- Mensagem de erro para senhas diferentes -->
=======
                <input type="password" placeholder="Nova senha" id="senha" name="senha" required>
                <span toggle="#senha" class="eye field-icon toggle-password">
                    <i class="fa fa-eye"></i>
                </span>
>>>>>>> 932d76b5c070ee71c27aa9703def97e209de4a77
                <button type="submit" name="btnatualizar" id="salvar_alteracao">Salvar Alterações</button>
            </form>



            <!-- Aqui é o BTN de excluir ao ser precionado ele é direcionado ao confirmar exclusão  -->

            <form action="confirmar_exclusao.php" method="POST">
                <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                <button type="submit" name="excluirUsuario" id="excluir">Excluir Usuário</button>
            </form>

        </div>

        <div class="box-container">
            <div class="box">
                <div class="box-panel box-right">
                    <h1>FlexJobs!</h1><br><br>
                    <p>"FlexJobs simplifica sua busca por oportunidades flexíveis. Com uma plataforma intuitiva,
                        conectamos profissionais a empregadores que valorizam a flexibilidade.
                        Encontre trabalho remoto, meio período e freelance de forma simples e eficiente no FlexJobs.</p>
                    <br><br>
                    <a href="http://localhost/FlexJobs/">
                        <button id="inicio">Voltar ao Menu Inicial</button>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Script para visiualizar a senha  -->

    <script>
        function togglePassword(e) {
            const passwordFields = document.querySelectorAll(e.currentTarget.getAttribute("toggle"));
            passwordFields.forEach((passwordField) => {
                const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
                passwordField.setAttribute("type", type);
            });
        }

        document.querySelectorAll(".toggle-password").forEach((element) => {
            element.addEventListener("click", togglePassword);
        });


        // Formatação do CPF

        function formatarCPF(campo) {
            let cpf = campo.value.replace(/\D/g, ''); // Remove caracteres não numéricos
            if (cpf.length > 3 && cpf.length <= 6) {
                cpf = cpf.substring(0, 3) + '.' + cpf.substring(3);
            } else if (cpf.length > 6 && cpf.length <= 9) {
                cpf = cpf.substring(0, 3) + '.' + cpf.substring(3, 6) + '.' + cpf.substring(6);
            } else if (cpf.length > 9) {
                cpf = cpf.substring(0, 3) + '.' + cpf.substring(3, 6) + '.' + cpf.substring(6, 9) + '-' + cpf.substring(9);
            }
            campo.value = cpf;
        }

        /* Olho da input Insira senha

        Olho dos Input "Senha e Confirmar senha"*/

        function toggleSenha(inputId) {
            let input = document.getElementById(inputId);
            let olho = document.getElementById("olho");
            let olhoConfirmar = document.getElementById("olhoConfirmar");

            if (input.type === "password") {
                input.type = "text"; // Muda para texto visível
                if (inputId === "senha") {
                    olho.textContent = "🙈"; // Adiciona o ícone do macaquinho
                } else if (inputId === "confirmarSenha") {
                    olhoConfirmar.textContent = "🙈"; // Adiciona o ícone do macaquinho
                }
            } else {
                input.type = "password"; // Muda de volta para password
                if (inputId === "senha") {
                    olho.textContent = "👁️"; // Volta ao ícone original do olho
                } else if (inputId === "confirmarSenha") {
                    olhoConfirmar.textContent = "👁️"; // Volta ao ícone original do olho
                }
            }
        }

        // Script para caso se ambas senhas forem diferentes
            
        document.getElementById('alteraForm').addEventListener('submit', function(event) {
            let senha = document.getElementById('senha').value;
            let confirmarSenha = document.getElementById('confirmarSenha').value;
            let senhaErro = document.getElementById('senhaErro');

            if (senha !== confirmarSenha) {
                event.preventDefault(); // Impede o envio do formulário
                senhaErro.textContent = 'As senhas não coincidem, por favor verifique.';
            } else {
                senhaErro.textContent = ''; // Limpa a mensagem de erro se as senhas coincidirem
            }
        });

    </script>

    <!-- Rodapé -->

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


<<<<<<< HEAD
=======
    <!-- Script para visiualizar a senha  -->

    <script>
        function togglePassword(e) {
            const passwordField = document.querySelector(e.currentTarget.getAttribute("toggle"));
            const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);
        }

        document.querySelectorAll(".toggle-password").forEach((element) => {
            element.addEventListener("click", togglePassword);
        });

    </script>

>>>>>>> 932d76b5c070ee71c27aa9703def97e209de4a77
    <!-- CSS (Rodapé - Formulário) -->

    <style>
        #confirmarSenha {
            margin-top: -20px;
            /* Ajuste a seu gosto */
        }


        #olhoConfirmar {

            position: relative;
            top: -35px;
            left: 45%;
        }

        #olho {
            cursor: pointer;
            position: relative;
            top: -36px;
            left: 45%;

        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            background: linear-gradient(to bottom,
                    rgb(3, 3, 84) 76%,
                    rgb(33, 98, 220) 97%);
            background-attachment: fixed;

        }

        .container h1,
        span {
            margin-right: auto;
            margin-left: 2px;
            text-align: center;
        }

        .box-container h1 {
            margin-top: 10px;
            margin-right: 3%;
        }

        .box p {
            margin-top: 10%;
            margin-right: 10%;
        }

        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            position: absolute;
            top: 37%;
            left: 50%;
            transform: translate(-50%, -50%);
            overflow: hidden;
            width: 758px;
            max-width: 100%;
            min-height: 400px;
            margin-bottom: 150px;

        }

        .container h1 {
            color: write;
            margin-top: 20px;
        }

        .container span {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        .container a {
            color: #333;
            font-size: 13px;
            text-decoration: none;
            margin: 10px 0 10px;
            display: block;
        }

        .container button {
            background-color: #512da8;
            color: #fff;
            font-size: 14px;
            padding: 12px 50px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 1px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: auto;
            margin-left: 40px;

        }


        .container button.hidden {
            background-color: transparent;
            border-color: #fff;
        }

        .container form {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 20px;

        }

        .container input {
            background-color: #ececec;
            border: none;
            margin: 8px 0;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 8px;
            width: 100%;
            outline: none;
        }

        .form-container {
            width: 100%;
        }

        .box-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: all 0.6s ease-in-out;
            border-radius: 150px 0 0 100px;
            z-index: 1000;
        }

        .container.active .box-container {
            transform: translateX(-100%);
            border-radius: 0 150px 100px 0;
        }

        .box {
            background-color: #512da8;
            height: 100%;
            background: linear-gradient(to right, #5c6bc0, #000000);
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
        }

        .container.active .box {
            transform: translateX(50%);
        }

        .box-panel {
            position: absolute;
            width: 50%;
            height: 98%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 30px;
            text-align: center;
            top: 0;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .box-right {
            right: 0;
            transform: translateX(0);
        }

        #excluir {
            background-color: #512da8;
            color: white;
            border: 2px solid black;
            padding: 8px 16px;
            margin-top: auto;
            display: block;
            margin-right: 60%;
            transition: background-color 0.3s, color 0.3s;
        }

        #excluir:hover {
            background-color: red;
        }

        #inicio {
            background-color: #512da8;
            color: white;
            border: 2px solid black;
            padding: 8px 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        #inicio:hover {
            background-color: #4caf50;
            color: white;
        }

        #salvar_alteracao {
            background-color: #512da8;
            color: white;
            border: 2px solid black;
            padding: 8px 16px;
            transition: background-color 0.3s, color 0.3s;
            margin-right: 60%;
        }


        #salvar_alteracao:hover {
            background-color: green;
            color: write;
        }

        /* CSS_Rodapé */

        footer {
            background-color: rgb(3, 3, 84);
            color: white;
            padding: 1px;
            margin-top: auto;
            position: fixed;
            bottom: 0;
            width: 100%;
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
            margin-top: 5px;
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
            padding-top: 12px;
            border-top: 2px solid rgb(51, 181, 220);
        }
    </style>

</body>

</html>
