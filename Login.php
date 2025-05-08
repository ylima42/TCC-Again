<?php 
session_start();
include 'connetion.php';

if(isset($_SESSION['user_id'])) {
    // Se já está logado, redireciona
    if($_SESSION['user_type'] == 'admin'){
        header('location:admin.php');
    } else {
        header('location:index.php');
    }
    exit();
}

// Remover todo o código de processamento de login que estava incorreto
// O processamento será feito em process_login.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Login</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./Login 10_files/css" rel="stylesheet">
    <link rel="stylesheet" href="./Login 10_files/font-awesome.min.css">
    <link rel="stylesheet" href="./Login 10_files/style.css">
</head>
<body class="img js-fullheight" style="background-image: url('./images/back_login.jpg'); height: 961px;">
    <?php
        if (isset($_SESSION['message'])) {    
            echo '<div class="message">
                <span>'.$_SESSION['message'].'</span>
                <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
            </div>';
            unset($_SESSION['message']);
        }
    ?>
    
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                    <form class="signin-form" method="POST" action="process_login.php">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required="">
                        </div>
                        <div class="form-group">
                            <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required="">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Entrar</button>
                        </div>
                    </form>
                    <p class="w-100 text-center">— Ainda não tem uma conta? —</p>
                    <div class="social d-flex text-center">
                        <a href="signup.php" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-user mr-2"></span> Cadastrar</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="./Login 10_files/jquery.min.js"></script>
    <script src="./Login 10_files/popper.js"></script>
    <script src="./Login 10_files/bootstrap.min.js"></script>
    <script src="./Login 10_files/main.js"></script>
</body>
</html>