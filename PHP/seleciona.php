<?php
require_once 'conecta.php';

$query = "SELECT * FROM flexjobs";
$stmt = $pdo->prepare($query);
$stmt->execute();

?>

<!-- CSS da Tabela -->

<style>
  h1 {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    text-align: center  ;
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


<h1> Tabela de Usuários </h1>
<table border="3" width="65%">
  <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>E-MAIL</th>
    <th>CPF</th>
    <th>SENHA</th>
    <th>AÇÕES</th> <!-- Adicionando coluna para as ações -->
  </tr>
  <?php
  while ($result = $stmt->fetch()) {

    echo "<tr>";
    echo "<td>" . $result['id'] . "</td>";
    echo "<td>" . $result['nome'] . "</td>";
    echo "<td>" .  $result['email'] . "</td>";
    echo "<td>" . $result['cpf'] . "</td>";
    echo "<td>" . $result['senha'] . "</td>";
    echo "<td>";

    // Formulário para Alteração
    // input do tipo hidden é usado para enviar dados via formulário sem exibir o campo no navegador.

    echo "<form action='altera.php' method='POST'>";
    echo "<input type='hidden' name='id' value='" . $result['id'] . "'>";
    echo "<button type='submit'>Alterar</button>";
    echo "</form>";

    // Formulário para Exclusão

    echo "<form action='exclui.php' method='POST'>";
    echo "<input type='hidden' name='id' value='" . $result['id'] . "'>";
    echo "<button type='submit'>Excluir</button>";
    echo "</form>";

    echo "</td>";
    echo "</tr>";
  }

  echo "</table>";

  $result = null;
  $stmt = null;
  $pdo = null;

  ?>