<?php
require "db.php";
$sql = "SELECT id, nome, email FROM usuarios ORDER BY id DESC";
$result = $conn->query($sql);
$usuarios = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
    $result->free();
}
$conn->close();
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Lista de usuários</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color:#f0e6fa;
            color: #000000ff;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #005a87;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            font-size: 1.1em;
        }

        a {
            color:w7bff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        tr:hover {
            background-color: #8273e4ff;
            opacity: 0.5;
        }

        tr:last-child td {
            border-bottom: none;
        }

        td a {
            color: #007bff;
            margin-right: 10px;
        }

        td a.excluir {
            color: #dc3545;
        }

        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Usuários cadastrados</h2>
    <p><a href="form.html">Cadastrar novo</a></p>
    <?php if (empty($usuarios)): ?>
        <p>Ninguém cadastrado ainda.</p>
    <?php else: ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?=(int)$u['id']?></td>
                    <td><?=htmlspecialchars($u['nome'])?></td>
                    <td><?=htmlspecialchars($u['email'])?></td>
                    <td>
                        <a href="editar.php?id=<?=(int)$u['id']?>">Editar</a> |
                        <a href="excluir.php?id=<?=(int)$u['id']?>" 
                           onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>