<?php

$localhost = "localhost";
$user = "root";
$password = "";
$banco = "smart_picking";

global $pdo;

try {



    $pdo = new PDO("mysql:host=$localhost;dbname=$banco", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
}

// $sql = $pdo->query("SELECT * FROM user");
// $sql->execute();

// echo "Conexão realizada com sucesso!";
// echo $sql->rowCount();

?>

