<?php
session_start();
include_once "connetion.php"; // Corrigido o nome do arquivo

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$user_type = "Usuario"; // Alterado para corresponder ao valor padrão na tabela users

// Verificar se as senhas correspondem
if($password !== $cpassword) {
    $_SESSION['message'] = 'As senhas não correspondem!';
    header("Location: signup.php");
    exit();
}

// Hash da senha com segurança
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Verifica se o e-mail já existe
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['message'] = 'Este email já está cadastrado!';
    header("Location: signup.php");
    exit();
} else {
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, user_type) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $hashed_password, $user_type);

    if ($stmt->execute()) {
        $_SESSION['message'] = 'Cadastro realizado com sucesso!';
        header("Location: Login.php");
    } else {
        $_SESSION['message'] = 'Erro ao cadastrar. Tente novamente.';
        header("Location: signup.php");
    }
    exit();
}
?>