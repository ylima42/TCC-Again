<?php
session_start();
include_once "connetion.php";

// Pegando os dados do formulário
$email = trim($_POST["email"]);
$password = $_POST["password"];

// Buscar o usuário pelo email
$stmt = $conexao->prepare("SELECT id, nome, senha, tipo FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verificando a senha
    if (password_verify($password, $user['senha'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nome'];
        $_SESSION['user_tipo'] = $user['tipo'];

        // Redirecionamento com base no tipo
        if ($user['tipo'] === 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "<script>alert('Senha incorreta!'); window.location.href = 'Login 10.php';</script>";
    }
} else {
    echo "<script>alert('Email não encontrado!'); window.location.href = 'Login 10.php';</script>";
}
?>
