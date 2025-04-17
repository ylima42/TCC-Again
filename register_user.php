<?php
include_once "connetion.php";

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$password = $_POST["password_1"];
$tipo = "user";

// Hash da senha com segurança
$senha = password_hash($password, PASSWORD_DEFAULT);

// Verifica se o e-mail já existe
$stmt = $conexao->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "<script>
            alert('Já existe este email na base de dados!');
            window.location.href = 'register.php';
          </script>";
} else {
    $stmt = $conexao->prepare("INSERT INTO users (nome, email, senha, tipo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $senha, $tipo);

    if ($stmt->execute()) {
        header("Location: login 10.php");
        exit();
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }
}
?>


linkar a tela de login com a base de dados 
fazer verificacoes, se o email que esta a entrar o seu tipo for admin ele loga e reenvia ele paa a tela de admin.php  
se o email for do tipo user envia ele para a tela de index.php 
