<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Painel Admin</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #F4F4F4
;
    }  /* Ajustando o topo no painel admin */
.top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #222;
    padding: 15px 30px;
    color: white;
    flex-wrap: wrap; /* Permite que o conteúdo se ajuste */
}.admin-label {
    font-size: 20px;
    font-weight: bold;
    padding-right: 20px; /* Adiciona um pouco de espaçamento à direita */
}nav {
    display: flex;
    gap: 15px;
    flex-wrap: wrap; /* Ajusta os itens para telas pequenas */
}.nav-link {
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    padding: 10px 15px; /* Adiciona espaçamento interno aos links */
    border-radius: 5px; /* Adiciona borda arredondada aos links */
}
.nav-link:hover {
    color: #27AE60
;
    background: #444;
}.logout-btn {
    background: #E74C3C
;
    color: white;
    border: none;
    padding: 12px 25px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
}/* Ajustando para telas menores */
@media (max-width: 768px) {
    .top-bar {
        flex-direction: column;
        align-items: flex-start;
        padding: 15px; /* Ajuste o padding no layout pequeno */
    }
    .admin-label {
        font-size: 18px;
        padding-right: 0;
    }    .nav-link {
        font-size: 14px;
        padding: 8px 12px; /* Ajuste no padding dos links em telas pequenas */
    }    .logout-btn {
        width: 100%;
        margin-top: 15px;
        padding: 15px 0; /* Maior padding para o botão de logout em telas pequenas */
    }
}    .card-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      max-width: 800px;
      margin: 40px auto;
    }    .card {
      background: white;
      height: 100px;
      display: grid;
      align-items: center;
      justify-content: center;
      text-align: center;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 8px;
      font-weight: bold;
      color: #333;
      padding: 1rem 0;
    }
    .card span {
      font-size: 2rem;
      color: #919191
;
    }
    @media (max-width: 768px) {
    .card-container {
        grid-template-columns: 1fr 1fr; /* 2 colunas para telas menores */
    }
}@media (max-width: 480px) {
    .card-container {
        grid-template-columns: 1fr; /* 1 coluna para telas muito pequenas */
    }
}
  </style>
</head>
<body>  <body>
    <div class="top-bar">
        <div class="admin-label">Administrador</div>
        <nav>
          <a href="produt.html" class="nav-link">Atualizar produto
          </a>
          <a href="add_item.html" class="nav-link">Adicionar produto</a>
        </nav>
        <button class="logout-btn">Sair</button>
      </div>  <div class="card-container " style="padding: 15px">
    <div class="card"><span>42</span> Produtos</div>
    <div class="card"><span>210</span>  Vendidos</div>
    <div class="card"><span>59</span>  Faturas</div>
    <div class="card"><span>94</span>  Clientes</div>
    <div class="card"><span>73</span>  Stock</div>
    <div class="card"><span>1</span>  Admins</div>
  </div></body>
</html>
