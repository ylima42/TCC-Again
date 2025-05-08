<?php
session_start();
include_once "connetion.php"; // Corrigido o nome do arquivo

// Pegando os dados do formulário
$email = trim($_POST["email"]);
$password = $_POST["password"];

// Buscar o usuário pelo email
$stmt = $conn->prepare("SELECT id, name, password, user_type FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verificando a senha
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_type'] = $user['user_type'];

        // Redirecionamento com base no tipo
        if ($user['user_type'] === 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        $_SESSION['message'] = 'Senha incorreta!';
        header("Location: Login.php");
        exit();
    }
} else {
    $_SESSION['message'] = 'Email não encontrado!';
    header("Location: Login.php");
    exit();
}
?>