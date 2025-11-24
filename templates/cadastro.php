<?php
if(isset($_POST['nome'], $_POST['email'], $_POST['password'])){
    include 'connect.php';
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senhaHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    try {
        $stmt->execute([$nome, $email, $senhaHash]);
        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        $erro = "Erro ao cadastrar. Email já existe?";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <form method="POST">
    <h2>Cadastro</h2>
    <?php if(isset($erro)) echo "<div class='error'>$erro</div>"; ?>
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Senha" required>
        <button type="submit">Cadastrar</button>
        <a href="login.php">Voltar ao login</a>
    </form>
</body>
</html>