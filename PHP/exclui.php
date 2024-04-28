<?php
require_once 'conecta.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Query para deletar o registro com o ID especificado
    
    $query = "DELETE FROM flexjobs WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    try {
        $stmt->execute();
        echo 'Registro excluído com sucesso.';
    } catch (PDOException $e) {
        echo "Erro ao excluir registro: " . $e->getMessage();
    }
} else {
    echo "ID de registro não fornecido.";
}

$pdo = null;
