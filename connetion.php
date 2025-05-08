<?php
session_start(); // Iniciar sessão em todas as páginas de conexão

$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'doces_db';

$conn = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>