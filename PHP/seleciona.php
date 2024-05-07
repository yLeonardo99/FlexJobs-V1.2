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
    echo "<td>" . md5($result['senha'] ). "</td>"; # Criptografia na senha, exibição da Tabela.

    echo "</td>";
    echo "</tr>";
  }

  echo "</table>";

  $result = null;
  $stmt = null;
  $pdo = null;

  ?>

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
  </style>