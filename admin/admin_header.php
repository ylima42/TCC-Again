<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

  <title>Document</title>

</head>
  <body>
    <header class="header">
      <div class="flex">
        <a href="page.php" class="img/logo.jpg"></a>
            <nav class="navbar">
                <a href="page.php">Inicio</a>       
                <a href="produt.html" class="nav-link">Atualizar produtos</a>
                <a href="admin_order.php">Pedidos</a>
                <a href="admin_user.php">Usuario</a>
                <a href="admin_message">Menssagens</a>
                <a href="add_item.html" class="nav-link">Adicionar produto</a>
            </nav>
            <div class="icons">
                <i class="bi bi-person" id="user-btn"></i>
                <i class="bi bi-list" id="menu-btn"></i>
            </div>
            <div class="user-box">
                <p>Username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
                <p>Email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
                <form method="post">
                    <button type="submit" class="logout-btn">Sair</button>
                </form>
            </div>
        </div>     
    </header>
        <div class="bnner">
            < class="detail">
                <h1>Dashboard do administrador</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
</div>
        </div>
  </body>
</html>
