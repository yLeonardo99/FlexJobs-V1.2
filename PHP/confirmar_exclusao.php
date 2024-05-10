    <?php

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    ?>

        <!DOCTYPE html>
        <html lang="pt-BR">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Confirmação de Exclusão</title>
        </head>

        <body>

            <div class="container" id="container">

                <div class="form-container sign-up">
                    <form action="excluir_usuario.php" method="POST">

                        <h1>Confirmar Exclusão </h1> <br>
                        <h3>Deseja mesmo excluir sua conta?</h3> <br>

                        <!-- Campos do formulário de atualização -->

                        <input type="hidden" name="userId" value="<?= $usuario['id'] ?>">

                        <input type="hidden" name="id" value="<?= $id ?>">
                        <button type="submit" name="confirmarExclusao" id="Btn_Confirmar_Excluir">Sim, Excluir!</button>

                        <a href="http://localhost/FlexJobs/PHP/altera.php">
                            <button type="button" id="BTN_Voltar">Voltar</button>
                        </a>

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
                                <button id="inicio">Ir para Início</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

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

        <?php

    } else {
        echo "Erro: ID do usuário não encontrado.";
    }
        ?>

        

    <!-- Código CSS (Rodapé - Formulário) -->

    <style>
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
        h3 {
            margin-right: auto;
            margin-left: 2px;
            text-align: center;
        }

        .container h3 {
            text-decoration: underline;
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

        #Btn_Confirmar_Excluir {
            background-color: #512da8;
            color: white;
            border: 2px solid black;
            padding: 8px 16px;
            margin-top: auto;
            display: block;
            margin-right: 60%;
            transition: background-color 0.3s, color 0.3s;
        }

        #Btn_Confirmar_Excluir:hover {
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

        #BTN_Voltar {
            background-color: #512da8;
            color: white;
            border: 2px solid black;
            padding: 8px 39px;
            margin-top: auto;
            display: block;
            margin-right: 433px;
            transition: background-color 0.3s, color 0.3s;

        }

        #BTN_Voltar:hover {
            background-color: #E6B037;
            color: black;
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