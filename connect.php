<?php

session_start();

$localhost = "localhost";
$user = "root";
$password = "";
$banco = "smart_picking";

global $pdo;

try {

    $pdo = new PDO("mysql:dbname=" .$banco. "; host=" .$localhost, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
    exit;
}
?>

