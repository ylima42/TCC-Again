<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto - Admin</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }
        .top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #222;
    padding: 10px 20px;
    color: white;
    flex-wrap: wrap;  /* Permite que os itens da barra se ajustem */
}
.admin-label {
  font-size: 18px;
  font-weight: bold;
}

nav {
    display: flex;
    gap: 20px;
    flex-wrap: wrap; /* Ajusta o menu para telas pequenas */
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

        .form-container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        .button-container button {
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 48%;
    margin-bottom: 10px;  /* Ajuste para telas menores */
}


        .button-container .cancel-btn {
            background-color: #e74c3c;
            color: white;
        }

        .button-container .submit-btn {
            background-color: #3498db;
            color: white;
        }
        @media (max-width: 768px) {
    .form-container {
        padding: 15px;  /* Ajusta o padding para telas menores */
    }
    .button-container button {
        width: 100%;  /* Faz com que os botões ocupem toda a largura */
    }
}

    </style>
    <script>
        function atualizarCategorias() {
            var categoriaSelecionada = document.getElementById("categoria").value;
            var tipoSalgado = document.getElementById("tipo-salgado");
            var tipoDoce = document.getElementById("tipo-doce");

            // Esconder ambos os tipos inicialmente
            tipoSalgado.style.display = "none";
            tipoDoce.style.display = "none";

            // Mostrar a lista correta com base na seleção
            if (categoriaSelecionada === "salgado") {
                tipoSalgado.style.display = "block";
            } else if (categoriaSelecionada === "doce") {
                tipoDoce.style.display = "block";
            }
        }

        // Atualizar os submenus de doces conforme a seleção
        document.getElementById("produto-doce").addEventListener("change", function () {
            var produtoSelecionado = this.value;
            var tipoBolo = document.getElementById("tipo-bolo");
            var tipoTorta = document.getElementById("tipo-torta");
            var tipoDocesColher = document.getElementById("tipo-doces-colher");

            // Esconder todas as subcategorias
            tipoBolo.style.display = "none";
            tipoTorta.style.display = "none";
            tipoDocesColher.style.display = "none";

            // Mostrar a subcategoria correta com base na seleção
            if (produtoSelecionado === "bolos") {
                tipoBolo.style.display = "block";
            } else if (produtoSelecionado === "tortas") {
                tipoTorta.style.display = "block";
            } else if (produtoSelecionado === "doces-colher") {
                tipoDocesColher.style.display = "block";
            }
        });
    </script>
</head>
<body>

    <div class="top-bar">
        <div class="admin-label">Administrador</div>
        <nav>
          <a href="produt.html" class="nav-link">Atualizar produto
          </a>
          <a href="page.html" class="nav-link">Painel admin
        </a>
            </nav>
        <button class="logout-btn">Sair</button>
      </div>
    

    <div class="form-container" style="padding: 15px">
        <h2>Adicionar Produto</h2>
        <form action="#" method="POST" enctype="multipart/form-data">

            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" required style="width: 97%;"/>

            <label for="foto">Foto do Produto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required style="width: 97%;"/>

            <label for="preco">Preço (Kz):</label>
            <input type="number" id="preco" name="preco" step="0.01" required style="width: 97%;"/>

            <!-- Menu para escolher Salgado ou Doce -->
            <label for="categoria">Escolha o Tipo de Produto:</label>
            <select id="categoria" name="categoria" onchange="atualizarCategorias()">
                <option value="">--Selecione--</option>
                <option value="salgado">Salgado</option>
                <option value="doce">Doce</option>
            </select>

            <!-- Menu de tipos de salgados -->
            <div id="tipo-salgado" style="display:none;">
                <label for="produto-salgado">Escolha o tipo de salgado:</label>
                <select id="produto-salgado" name="produto-salgado">
                    <option value="pasteis">Pastéis</option>
                    <option value="rissois">Rissóis</option>
                    <option value="chamucas">Chamuças</option>
                    <option value="coxinhas">Coxinhas</option>
                    <option value="empadas">Empadas</option>
                    <option value="pizzas">Pizzas</option>
                </select>
            </div>

            <!-- Menu de tipos de doces -->
            <div id="tipo-doce" style="display:none;">
                <label for="produto-doce">Escolha o tipo de doce:</label>
                <select id="produto-doce" name="produto-doce">
                    <option value="bolos">Bolos</option>
                    <option value="tortas">Tortas</option>
                    <option value="doces-colher">Doces de Colher</option>
                </select>

                <!-- Subcategorias de Bolos -->
                <div id="tipo-bolo" style="display:none;">
                    <label for="produto-bolo">Escolha o tipo de bolo:</label>
                    <select id="produto-bolo" name="produto-bolo">
                        <option value="chocolate">Bolos de Chocolate</option>
                        <option value="frutas">Bolos de Frutas</option>
                        <option value="decorados">Bolos Decorados</option>
                    </select>
                </div>

                <!-- Subcategorias de Tortas -->
                <div id="tipo-torta" style="display:none;">
                    <label for="produto-torta">Escolha o tipo de torta:</label>
                    <select id="produto-torta" name="produto-torta">
                        <option value="frutas">Tortas de Frutas</option>
                        <option value="creme">Tortas de Creme</option>
                    </select>
                </div>

                <!-- Subcategorias de Doces de Colher -->
                <div id="tipo-doces-colher" style="display:none;">
                    <label for="produto-doces-colher">Escolha o tipo de doce de colher:</label>
                    <select id="produto-doces-colher" name="produto-doces-colher">
                        <option value="mousse">Mousse</option>
                        <option value="pudins">Pudins</option>
                    </select>
                </div>
            </div>

            <div class="button-container">
                <button type="button" class="cancel-btn" onclick="window.location.href = '#';">Cancelar</button>
                <button type="submit" class="submit-btn">Adicionar Produto</button>
            </div>
        </form>
    </div>

</body>
</html>
