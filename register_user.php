<?php
    include_once "connetion.php";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password_1"];
    $senha = md5($password);
    $tipo = "user";

    // Verifica se o e-mail já existe
    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conexao, $check_email);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
                alert('Já existe este email na base de dados!');
                window.location.href = 'register.php';
              </script>";
    } else {
        $sql = "INSERT INTO users (nome, email, senha, tipo) VALUES ('$name', '$email', '$senha', '$tipo')";

        if (mysqli_query($conexao, $sql)) {
            header("Location: login 10.php");
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($conexao);
        }
    }
?>

linkar a tela de login com a base de dados 
fazer verificacoes, se o email que esta a entrar o seu tipo for admin ele loga e reenvia ele paa a tela de admin.php  
se o email for do tipo user envia ele para a tela de index.php 
