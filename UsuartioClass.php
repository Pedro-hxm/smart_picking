<?php

Class Usuario {

    public function login($email, $senha){
        global $pdo;

        $sql = "SELECT * FROM user WHERE email = :email AND password = :senha"  ;
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

    }




}



?>