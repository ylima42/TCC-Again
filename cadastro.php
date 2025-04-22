<?php
include 'db.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Verifica se as senhas coincidem
if ($password !== $confirm_password) {
    echo "As senhas não coincidem. <a href='cadastro.html'>Tente novamente</a>";
    exit();
}

// Criptografa a senha
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insere no banco
$sql = "INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $hashed_password);

if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso! <a href='index.html'>Entrar</a>";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}
?>
