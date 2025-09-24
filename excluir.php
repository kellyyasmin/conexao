<?php
require "db.php";

// Pega o ID enviado via GET e garante que é inteiro
$id = (int)($_GET['id'] ?? 0);

// Se o ID for inválido, para o script
if ($id <= 0) { 
    die("ID inválido."); 
}

// Query de exclusão
$sql = "DELETE FROM usuarios WHERE id = ?";

// Prepara a query
$stmt = $conn->prepare($sql);

// Liga o parâmetro ID na query
$stmt->bind_param("i", $id);

// Executa a exclusão
if ($stmt->execute()) {
    // Se deu certo, volta para a lista
    header("Location: listar.php?msg=excluido");
    exit;
} else {
    // Se deu erro, mostra mensagem
    echo "Erro ao excluir: " . $stmt->error;
}

// Fecha conexões
$stmt->close();
$conn->close();
