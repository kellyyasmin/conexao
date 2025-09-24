<?php
require "db.php";
$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) { die("ID inválido."); }
$sql = "SELECT id, nome, email FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$usuario = $res->fetch_assoc();
$stmt->close();
$conn->close();
if (!$usuario) { die("Usuário não encontrado."); }
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Editar usuário</title>
<style>
body {
font-family: Arial, sans-serif;
background-color:  #ab9ff7ff;
color: #333;
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
margin: 0;
}
h2 {
color: #005a87;
text-align: center;
margin-bottom: 20px;
}
form {
background-color: #ffffff;
padding: 30px;
border-radius: 10px;
box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
width: 300px;
text-align: center;
}
label {
display: block;
text-align: left;
margin-bottom: 5px;
font-weight: bold;
color: #555;
}
input[type="text"],
input[type="email"] {
width: 100%;
padding: 10px;
margin-bottom: 20px;
border: 1px solid #ccc;
border-radius: 5px;
box-sizing: border-box;
font-size: 16px;
}
button[type="submit"] {
width: 100%;
padding: 12px;
background-color:  #8273e4ff;
color: white;
border: none;
border-radius: 5px;
font-size: 16px;
font-weight: bold;
cursor: pointer;
transition: background-color 0.3s ease;
margin-bottom: 10px;
}
button[type="submit"]:hover {
background-color: #0056b3;
}
a {
display: block;
width: 100%;
text-align: center;
padding: 12px;
background-color: #6c757d;
color: white;
text-decoration: none;
border-radius: 5px;
transition: background-color 0.3s ease;
box-sizing: border-box;
}
a:hover {
background-color: #5a6268;
}
</style>
</head>
<body>

<form method="post" action="salvar.php">
<!-- Se existir este hidden id, o salvar.php fará UPDATE -->
<input type="hidden" name="id" value="<?= (int)$usuario['id'] ?>">
<label>Nome:</label><br>
<input name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required><br><br>
<label>E-mail:</label><br>
<input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required><br><br>
<button type="submit">Salvar</button>
<a href="listar.php">Cancelar</a>
</form>
</body>
</html>