<?php
include_once __DIR__ . '/../../db/Database.php';

try {
  Database::createSchema(); // cria o schema do banco de dados

  $db = Database::getInstance();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (key_exists('nome', $_POST) && $_POST['nome'] !== '') {
      $stm = $db->prepare('INSERT INTO Usuarios (nome,email) VALUES (:nome,:email)');
     // $stm->execute(array(':nome' => $_POST['nome'],),);

      $stm->execute(array(':nome'   => $_POST['nome'],
      'email' => $_POST['email']));
      
      echo 'Nome inserido com sucesso! <br/><br/>';
    }
   /*  if (key_exists('email', $_POST) && $_POST['email'] !== '') {
      $stm = $db->prepare('INSERT INTO Usuarios (email) VALUES (:email)');
      $stm->execute(array(':email' => $_POST['email']));
      echo 'Email inserido com sucesso! <br/><br/>';
    } */

    
   /*  $stm = $db->prepare('INSERT INTO Usuarios (nome, email, senha) VALUES (:nome, :email, :senha)');
    $stm->bindValue(':nome', $this->nome);
    $stm->bindValue(':email', $this->email);
    $stm->bindValue(':senha', $this->senha);
    $stm->execute(); */
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
            <a> Início </a>
          </li>
          <li>
            <a> Filmes </a>
          </li>
          <li>
            <a> Séries </a>
          </li>
          <li>
            <a> Livros </a>
          </li>
          <li>
            <a> Login </a>
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
          
          <input type="text" email ="email" id = "email" placeholder="E-mail"  />
          <input type="password" senha = "senha"  placeholder="Senha" />
          <input type="password" placeholder="Confirmar Senha" />
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