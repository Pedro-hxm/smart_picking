
<?php
$mensagem = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['password'] ?? '';
    //  validação simples
    if ($email === 'admin@empresa.com' && $senha === '1234') {
        $mensagem = "Login realizado com sucesso!";
    // Aqui você pode redirecionar ou iniciar sessão
    } else {
        $mensagem = "Email ou senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/Login.css" media="screen" />
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="left-panel">
                <h1>Bem-<span class="white">Vindo</span> <span class="white">novamente!</span></h1>
                <p>Acesse agora sua conta empresarial!</p>
                <img src="../css/img/logo.png" alt="Logo">
            </div>
            <div class="right-panel">
                <form action="Login.php" method="POST">
                    <h2>LOGIN</h2>
                    <p>Preencha seus dados</p>
                    <div class="form-group">
                        <input type="text" id="email_or_matricula" name="email" placeholder="Email/Matrícula">
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <button type="submit">ENTRAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
