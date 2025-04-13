<?php
$host = 'localhost';     // ou 127.0.0.1
$usuario = 'root';       // teu usuário MySQL
$senha = '';             // tua senha do MySQL (deixa vazio se não tiver)
$banco = 'ecommerce'; // nome do banco

$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    /*
        $nome = "Gilson";
        $email = "gilson@gmail.com";
        $password = "12345";
        $senha = md5($password);
        $tipo = "user";

        $sql = "INSERT INTO users (nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha', '$tipo')";

        if (mysqli_query($conexao, $sql))
            echo "Usuário cadastrado com sucesso!";
        else
            echo "Erro ao cadastrar: " . mysqli_error($conexao);
    */

?>
