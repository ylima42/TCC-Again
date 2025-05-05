<?php 
	include 'connection.php';

	if (isset($_POST['btn_register'])) {
		$filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$name = mysqli_real_escape_string($conn, $filter_name);
		
		$filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$email = mysqli_real_escape_string($conn, $filter_email);

		$filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		$password = mysqli_real_escape_string($conn, $filter_password);
		
		$filter_cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING);
		$cpassword = mysqli_real_escape_string($conn, $filter_cpassword);

		$select_user = mysqli_query($conn, "SELECT * FROM 'users' WHERE email = '$email'") or die ('query failed');

		if (mysqli_num_rows($select_user) > 0) {
			$message[] = 'Este usuario ja existe';
		} else {
			if ($password != $cpassword) {
				$message[] = 'Password errada';
			}else {
				mysqli_query($conn,"INSERT INTO 'users'('name', 'email', 'password') VALUES ('$name','$email','$password')") or die ('query failed');
				$message[] = 'Cadastrado com sucesso';
				header('location:Login.php');
			}
			
		}
	}
?>

<!DOCTYPE html>
<!-- saved from url=(0059)https://preview.colorlib.com/theme/bootstrap/login-form-20/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  	<title>Cadastro</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="./Login 10_files/css" rel="stylesheet">

	<link rel="stylesheet" href="./Login 10_files/font-awesome.min.css">
	
	<link rel="stylesheet" href="./Login 10_files/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url('./images/back_login.jpg'); height: 961px;">
	
	<?php
			if (isset($message)) {	
				foreach ($message as $message) {
					echo '	
						<div class="message">
							<span>'.$message.'</span>
							<i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
						</div>
						
						';
			}
		}
	?>
	
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Cadastre-se</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<form action="register_user.php" method="post" class="signin-form">
		      		<div class="form-group">
		      			<input type="text" name="name" class="form-control" placeholder="Nome" required="">
		      		</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Email" required="">
					</div>
	            <div class="form-group">
	              <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required="">
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
				<div class="form-group">
					<input id="password-field" name="cpassword" type="password" class="form-control" placeholder="Insira novamente" required="">
					<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
				</div>
	            <div class="form-group">
	            	<button type="submit" name="btn_register" class="form-control btn btn-primary submit px-3">Cadastro</button>
	            </div>
	          </form>
	          <p class="w-100 text-center">— Ja tem uma conta? —</p>
	          <div class="social d-flex text-center">
	          	<a href="Login.php" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Login</a>
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

	<script defer="" src="./Login 10_files/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon="{&quot;rayId&quot;:&quot;92e150a82dd7eeea&quot;,&quot;serverTiming&quot;:{&quot;name&quot;:{&quot;cfExtPri&quot;:true,&quot;cfL4&quot;:true,&quot;cfSpeedBrain&quot;:true,&quot;cfCacheStatus&quot;:true}},&quot;version&quot;:&quot;2025.3.0&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;}" crossorigin="anonymous"></script>



</body></html>