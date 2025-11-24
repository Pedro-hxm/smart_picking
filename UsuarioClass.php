<?php

Class Usuario {

    public function login($email, $senha){
        global $pdo;

        $sql = "SELECT * FROM user WHERE email = :email AND senha = :senha"  ;
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();

            $_SESSION['idUser'] = $dado['id_user'];

            return true;
        }else {
            return false;
        }
    }




}



?>