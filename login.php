<?php
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
    
    require 'connect.php';
    require 'UsuarioClass.php';


    $email = $_POST = ['email'];
    $senha = $_POST = ['password'];



} else {
    header("Location: login.html");

}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css" media="screen" />
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="left-panel">
                <h1>Bem-<span class="white">Vindo</span> <span class="white">novamente!</span></h1>
                <p>Acesse agora sua conta empresarial!</p>
                <img src="Logo.png" alt="Logo">
            </div>
            <div class="right-panel">
                
                <form action="" method="POST">

                            <script>
                                alert("{{ message }}");
                            </script>
                <div class="form-container">
                    <h2>LOGIN</h2>
                    <p>Preencha seus dados</p>

                    <div class="form-group">
                        <input type="text" id="email" name="email" placeholder="Email/Matrícula">
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
    </div>
</body>
</html>