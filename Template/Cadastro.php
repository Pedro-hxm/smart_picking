<?php
//  processar o formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['name'] ?? '';
    $matricula = $_POST['matricula'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['password'] ?? '';
    // Aqui você pode salvar no banco ou validar
    // mostrar mensagem
    $mensagem = "Cadastro realizado com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css" media="screen" />
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="left-panel">
                <h1>Bem-<span>Vindo</span><span class="white">!</span></h1>
                <p>Acesse agora sua conta empresarial!</p>
                <button onclick="window.location.href='Login.php';">ENTRAR</button>
                <img src="../css/img/_4f0175fe-f321-4cb1-a2e7-1e5bb5b34891-removebg-preview 2.png" alt="Logo">
            </div>
            <div class="right-panel">
                <form action="Cadastro.php" method="POST">
                    <h2>CADASTRO</h2>
                    <p>Preencha seus dados</p>
                    <div class="form-group">
                        <input type="text" id="name" name="name" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <input type="text" id="matricula" name="matricula" placeholder="Matrícula">
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <button type="submit">CADASTRAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>