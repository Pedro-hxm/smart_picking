<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "estoque");


if ($conn->connect_error) {
die("Falha na conexão: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];


$sql = "INSERT INTO itens (nome, quantidade) VALUES ('$nome', '$quantidade')";
$conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=../css/cadastrar.css>
    <title>Cadastrar Itens No Estoque</title>
</head>
<body>
    <div class="container">
    <h1>Cadastrar Itens</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome do item" required>
        <input type="number" name="quantidade" placeholder="Quantidade" required>
        <button type="submit">Cadastrar</button>
    </form>
</div>
</body>
</html>