<?php
include_once __DIR__ . '/../../db/Database.php';


try {
  Database::createSchema(); // cria o schema do banco de dados

  $db = Database::getInstance();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (key_exists('nome', $_POST) && $_POST['nome'] !== '') {
      $stm = $db->prepare('INSERT INTO Usuarios (nome,email,senha) VALUES (:nome,:email,:senha)');
      // $stm->execute(array(':nome' => $_POST['nome'],),);
     
      
      $stm->execute(
        array('nome' => $_POST['nome'], 'email' => $_POST['email'], 'senha' =>hash('sha256', $_POST['senha']))
      );

      
    }
  } 

  //$usuarios = $db->query('SELECT * FROM Usuarios ORDER BY adicionado_em DESC')->fetchAll();
} catch (\Throwable $th) {
  echo $th;
  die(1);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Minha Crítica</title>
  <link href="index.css" rel="stylesheet" />
  <script src="..\.\\index.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <div class="header">
    <div id="mainMenu">
      <div class="searchBar">
        <h1>Minha Crítica</h1>
        <input type="text" id="search" name="searchBox" placeholder="Pesquise aqui" />
      </div>
      <nav id="navigation">
        <ul>
          <li>
            <a onclick="goToHomePage()"> Início </a>
          </li>
          <li>
            <a onclick="movieMenu()"> Filmes </a>
          </li>
          <li>
            <a> Séries </a>
          </li>
          <li>
            <a> Livros </a>
          </li>
          <li>
            <a onclick="login()"> Login </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- Casdastro da tela do Usuario -->
  <div method="post" class="content">
    <div class="pos_title">
      <h1 class="title">CRIAR CONTA</h1>
    </div>
    <div class="cadastro">
      <!--entrada dos dados do usuario -->
      <div class="div_esq">
        <form method="POST" class="form">

          <input type="text" name="nome" id="nome" placeholder="Nome">

          <input type="text" name="email" id="email" placeholder="E-mail" />
          <input type="password" name="senha" placeholder="Senha" />
          <input type="password" name="confirmarSenha" placeholder="Confirmar Senha" />
          <button type="submit" class="botao_registro">Confirmar</button>

        </form>
      </div>
      <!--entrada dos dados do usuario -->

      <div class="div_dir">
        <!--entrada dos dados do usuario -->
        <form class="form">


        </form>
      </div>
      <!--entrada dos dados do usuario -->
    </div>
    <!-- casdastro-->
  </div>

  <!-- content -->
</body>

</html>