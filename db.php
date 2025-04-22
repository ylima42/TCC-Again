<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "usuarios";

// Criar conexão
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
