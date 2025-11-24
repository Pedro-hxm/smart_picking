<?php
$conn = new mysqli("localhost", "root", "", "estoque");


if ($conn->connect_error) {
die("Falha na conexão: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id = $_POST['id'];
$quant = $_POST['quant'];


$sql = "UPDATE itens SET quantidade = quantidade - $quant WHERE id = $id";
$conn->query($sql);
}


$result = $conn->query("SELECT * FROM itens");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/retirar.css">
    <title>Retirar Itens Do Estoque</title>
</head>
<body>
    <h1>Retirar Itens</h1>
    <form method="POST">
        <select name="id">
            <?php while($row = $result->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= $row['nome'] ?> (<?= $row['quantidade'] ?>)</option>
            <?php endwhile; ?>
        </select>
        <input type="number" name="quant" placeholder="Quantidade para retirar" required>
        <button type="submit">Retirar</button>
    </form>
</body>
</html>