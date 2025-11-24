<?php
$conn = new mysqli("localhost", "root", "", "estoque");
$result = $conn->query("SELECT * FROM itens");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/visualizar.css">
    <title>Visualizar Estoque</title>
</head>
<body>
    <h1>Estoque</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Quantidade</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nome'] ?></td>
            <td><?= $row['quantidade'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>