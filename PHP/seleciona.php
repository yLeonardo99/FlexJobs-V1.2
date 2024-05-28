<!-- PAGINA PARA EXIBIÇÃO DA TABELA ADM -->

<?php

require_once 'conecta.php';

$query = "SELECT * FROM flexjobs";
$stmt = $pdo->prepare($query);
$stmt->execute();

?>

<h1> Area administrador </h1><br>
<h3> Tabela de Usuários</h3>
<table border="3" width="65%">
  <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>E-MAIL</th>
    <th>CPF</th>
    <th>SENHA</th>
  </tr>

  <?php

  while ($result = $stmt->fetch()) {

    echo "<tr>";
    echo "<td>" . $result['id'] . "</td>";
    echo "<td>" . $result['nome'] . "</td>";
    echo "<td>" . $result['email'] . "</td>";
    echo "<td>" . $result['cpf'] . "</td>";
    echo "<td>" . md5($result['senha']) . "</td>"; # Criptografia na senha, exibição da Tabela.

    echo "</td>";
    echo "</tr>";
  }

  echo "</table>";

  $result = null;
  $stmt = null;
  $pdo = null;

  ?>

  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/style.css" rel="stylesheet">
    <link href="complementsstyles/fonts.css" rel="stylesheet">
    <link rel="Website icon" type="png" href="complements/images/3.png">
    <title>FlexJobs - Sobre</title>
  </head>

  <body>

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

  <!-- CSS da Tabela -->

  <style>
    h1 {
      background-color: #007bff;
      color: #fff;
      padding: 10px;
      text-align: center;
      background: linear-gradient(to bottom, rgb(3, 3, 84) 76%, rgb(33, 98, 220) 97%);
    }

    h3 {
      background-color: #007bff;
      color: #fff;
      padding: 10px;
      text-align: center;
      background: linear-gradient(to bottom, rgb(3, 3, 84) 76%, rgb(33, 98, 220) 97%);
    }

    table {
      border-collapse: collapse;
      width: 65%;
      margin-top: 20px;
      margin-left: auto;
      margin-right: auto;
      font-size: 18px;

    }

    th {
      background-color: #007bff;
      color: #fff;
      padding: 10px;
      text-align: left;
      background: linear-gradient(to bottom, rgb(3, 3, 84) 76%, rgb(33, 98, 220) 97%);
    }


    td {
      padding: 8px;
    }


    tr:nth-child(even) {
      background-color: #fff;
      font-size: 18px;
    }


    a {
      color: #007bff;
      text-decoration: none;
      margin-right: 10px;
    }

    a:hover {
      text-decoration: underline;
    }

    tr:hover {
      background-color: #cfe2f3;

      /* Cor de fundo ao passar o mouse */

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
  </style>