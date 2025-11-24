<?php
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
    
    require 'connect.php';
    require 'UsuarioClass.php';

    $u = new Usuario();
    

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['password']);

    if($u->login($email, $senha)==true) {
        if(isset($_SESSION['idUser'])) {

            header("Location: dadosDaEmpresa.php");

        }else {
            header("Location: login.php");
        }
        

    } else {
        header("Location: login.php");
    }

} else {
    header("Location: login.php");

}

?>