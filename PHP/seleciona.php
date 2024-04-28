<?php
require_once 'conecta.php';

$query = "SELECT * FROM flexjobs";
$stmt = $pdo->prepare($query);
$stmt->execute();

?>

<table border="1" width="500">
  <tr>
    <th>id</th>
    <th>nome</th>
    <th>email</th>
    <th>cpf</th>
    <th>senha</th>
    <th>Ações</th> <!-- Adicionando coluna para as ações -->
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