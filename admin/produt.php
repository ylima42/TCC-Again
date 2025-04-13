<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Atualizar Produto</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f4f4f4;
    }

 /* Ajustando o topo no painel admin */
.top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #222;
    padding: 10px 20px;
    color: white;
    flex-wrap: wrap; /* Permite que o conteúdo se ajuste */
}

.admin-label {
    font-size: 20px;
    font-weight: bold;
}

nav {
    display: flex;
    gap: 15px;
    flex-wrap: wrap; /* Ajusta os itens para telas pequenas */
}

.nav-link {
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
}

.nav-link:hover {
    color: #27ae60;
}

.logout-btn {
    background: #e74c3c;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
}
.container {
    width: 100%;
    padding: 0 20px; /* Adiciona padding nas laterais para dar espaçamento */
    box-sizing: border-box; /* Para garantir que o padding não afete a largura total */
}
.content-block {
    margin: 20px auto; /* Adiciona margem superior e inferior para espaçar os quadrados */
    padding: 20px;
    width: 100%;
    max-width: 800px; /* Define um máximo para o tamanho dos quadrados */
    box-sizing: border-box;
    background-color: #f8f8f8;
    border-radius: 8px;
}
/* Ajustando para telas menores */
@media (max-width: 768px) {
    .top-bar {
        flex-direction: column; /* Coloca os itens um abaixo do outro */
        align-items: flex-start; /* Alinha os itens à esquerda */
    }
    .nav-link {
        font-size: 14px; /* Diminui o tamanho da fonte para mobile */
    }
    .logout-btn {
        width: 100%; /* Faz o botão de logout ocupar toda a largura */
        margin-top: 10px; /* Adiciona um espaço entre os itens */
    }
    .container {
        width: 100%;
        padding: 0 155px; /* Garante que o conteúdo tenha um espaçamento nas laterais */
        margin-left: 10px; /* Espaço visível à esquerda */
        margin-right: 10px; /* Espaço visível à direita */
    }

    .content-block {
        margin: 20px auto; /* Garante que haja espaçamento entre os quadrados */
        padding: 15px; /* Ajuste o padding interno para dispositivos móveis */
        width: 100%;
        max-width: none; /* Remove o limite de largura máxima */
    }
}

    .card-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  max-width: 900px;
  margin: 40px auto;
}

.card {
  background: white;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  height: 300px;
  padding: 15px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  font-weight: bold;
  color: #333;
}

.card-img {
  width: 100%;
  height: 150px;
  object-fit: cover;
  border-radius: 8px;
}

.card-content {
  text-align: center;
  flex-grow: 1;
}

.card-buttons {
  display: flex;
  justify-content: space-between;
  width: 100%;
}
@media (max-width: 768px) {
    .card-container {
        grid-template-columns: 1fr 1fr; /* Ajusta para 2 colunas em telas menores */
    }
    .card {
        height: auto; /* Ajuste a altura do card para telas menores */
    }
}
.btn {
  background-color: #27ae60;
  color: white;
  padding: 8px 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn:hover {
  background-color: #2ecc71;
}

.card h3 {
  margin: 10px 0;
}

  </style>
</head>
<body>
    <div class="top-bar">
        <div class="admin-label">Administrador</div>
        <nav>
          <a href="page.html" class="nav-link">Painel admin
          </a>
          <a href="add_item.html" class="nav-link">Adicionar produto</a>
        </nav>
        <button class="logout-btn">Sair</button>
      </div>
      

  <div style="max-width: 600px; margin: 40px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); display: none;" >
    <h2 style="text-align: center;">Atualizar Produto</h2>
    <form action="atualizar_produto.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="produto_id" value="1" />

      <label for="nome">Nome do Produto:</label>
      <input type="text" id="nome" name="nome" value="" required style="width:100%; padding:10px; margin-bottom:15px; border-radius:4px; border:1px solid #ccc;" />

      <!-- FOTO DO PRODUTO -->
        <div style="margin-bottom: 20px;">
         <label for="foto" style="display: block; margin-bottom: 5px;">Foto do Produto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" style="display: block;" />
            </div>
  
  <!-- PREÇO DO PRODUTO -->
  <div style="margin-bottom: 20px;">
         <label for="preco" style="display: block; margin-bottom: 5px;">Preço (Kz):</label>
      <input type="number" id="preco" name="preco" value="500.00" step="0.01" required
      style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ccc;" />
     </div>
  
      <!-- Categoria -->
      <label for="categoria">Tipo de Produto:</label>
      <select id="categoria" name="categoria" onchange="atualizarCategorias()" required>
        <option value="">--Selecione--</option>
        <option value="salgado">Salgado</option>
        <option value="doce">Doce</option>
      </select>

      <!-- Salgados -->
      <div id="tipo-salgado" style="display:none; margin-top:10px;">
        <label for="produto_salgado">Tipo de Salgado:</label>
        <select id="produto_salgado" name="produto_salgado">
          <option value="pasteis">Pastéis</option>
          <option value="rissois">Rissóis</option>
          <option value="chamucas">Chamuças</option>
          <option value="coxinhas">Coxinhas</option>
          <option value="empadas">Empadas</option>
          <option value="pizzas">Pizzas</option>
        </select>
      </div>

      <!-- Doces -->
      <div id="tipo-doce" style="display:none; margin-top:10px;">
        <label for="produto_doce">Tipo de Doce:</label>
        <select id="produto_doce" name="produto_doce" onchange="atualizarSubcategorias()">
          <option value="bolos">Bolos</option>
          <option value="tortas">Tortas</option>
          <option value="doces_colher">Doces de Colher</option>
        </select>

        <div id="subtipo-bolo" style="display:none; margin-top:10px;">
          <label for="sub_bolo">Tipo de Bolo:</label>
          <select id="sub_bolo" name="sub_bolo">
            <option value="chocolate">Chocolate</option>
            <option value="frutas">Frutas</option>
            <option value="decorados">Decorados</option>
          </select>
        </div>

        <div id="subtipo-torta" style="display:none; margin-top:10px;">
          <label for="sub_torta">Tipo de Torta:</label>
          <select id="sub_torta" name="sub_torta">
            <option value="frutas">Frutas</option>
            <option value="creme">Creme</option>
          </select>
        </div>

        <div id="subtipo-colher" style="display:none; margin-top:10px;">
          <label for="sub_colher">Tipo de Doce de Colher:</label>
          <select id="sub_colher" name="sub_colher">
            <option value="mousse">Mousse</option>
            <option value="pudins">Pudins</option>
          </select>
        </div>
      </div>

      <div style="display: flex; justify-content: space-between; margin-top: 20px;">
        <button type="button" onclick="window.location.href='pagina_de_lista.php'" style="background-color:#e74c3c; color:white; padding:12px 20px; border:none; border-radius:4px; cursor:pointer; width:48%;">Apagar</button>
        <button type="submit" style="background-color:#27ae60; color:white; padding:12px 20px; border:none; border-radius:4px; cursor:pointer; width:48%;">Atualizar Produto</button>
      </div>
    </form>
  </div>
  <div class="card-container" style="padding: 15px;">
    <div class="card">
      <img src="foto1.jpg" alt="Imagem 1" class="card-img">
      <div class="card-content">
        <h3>Nome do Produto 1</h3>
        <div class="card-buttons">
          <button class="btn">Editar</button>
          <button class="btn">Excluir</button>
        </div>
      </div>
    </div>
  
    <div class="card">
      <img src="foto2.jpg" alt="Imagem 2" class="card-img">
      <div class="card-content">
        <h3>Nome do Produto 2</h3>
        <div class="card-buttons">
          <button class="btn">Editar</button>
          <button class="btn">Excluir</button>
        </div>
      </div>
    </div>
  
    <div class="card">
      <img src="foto3.jpg" alt="Imagem 3" class="card-img">
      <div class="card-content">
        <h3>Nome do Produto 3</h3>
        <div class="card-buttons">
          <button class="btn">Editar</button>
          <button class="btn">Excluir</button>
        </div>
      </div>
    </div>
  
    <div class="card">
      <img src="foto4.jpg" alt="Imagem 4" class="card-img">
      <div class="card-content">
        <h3>Nome do Produto 4</h3>
        <div class="card-buttons">
          <button class="btn">Editar</button>
          <button class="btn">Excluir</button>
        </div>
      </div>
    </div>
  
    <div class="card">
      <img src="foto5.jpg" alt="Imagem 5" class="card-img">
      <div class="card-content">
        <h3>Nome do Produto 5</h3>
        <div class="card-buttons">
          <button class="btn">Editar</button>
          <button class="btn">Excluir</button>
        </div>
      </div>
    </div>
  
    <div class="card">
      <img src="foto6.jpg" alt="Imagem 6" class="card-img">
      <div class="card-content">
        <h3>Nome do Produto 6</h3>
        <div class="card-buttons">
          <button class="btn">Editar</button>
          <button class="btn">Excluir</button>
        </div>
      </div>
    </div>
  </div>
  

  <script>
    function atualizarCategorias() {
      let categoria = document.getElementById('categoria').value;
      document.getElementById('tipo-salgado').style.display = categoria === 'salgado' ? 'block' : 'none';
      document.getElementById('tipo-doce').style.display = categoria === 'doce' ? 'block' : 'none';
    }

    function atualizarSubcategorias() {
      let tipo = document.getElementById('produto_doce').value;
      document.getElementById('subtipo-bolo').style.display = tipo === 'bolos' ? 'block' : 'none';
      document.getElementById('subtipo-torta').style.display = tipo === 'tortas' ? 'block' : 'none';
      document.getElementById('subtipo-colher').style.display = tipo === 'doces_colher' ? 'block' : 'none';
    }
  </script>
</body>
</html>
