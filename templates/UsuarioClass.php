<?php
class Usuario {
    public function login($email, $senha) {
        include 'connect.php';
        $stmt = $pdo->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        if($usuario && password_verify($senha, $usuario['senha'])){
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            return true;
        }
        return false;
    }
}
?>
