<?php
include_once __DIR__ . '/../../db/Database.php';
 
session_start();

try {
  Database::createSchema(); // cria o schema do banco de dados

  $db = Database::getInstance();
   $imagem=filter_input(INPUT_POST,'imagem',FILTER_SANITIZE_STRING);
   if($imagem){
    filter_input(INPUT_POST,'imagem',FILTER_SANITIZE_STRING);

   }else{
    $_SESSION['msg'] =  "p style = 'color:red';>ErrO ao salvar os dados</p>";
   }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (key_exists('nome', $_POST) && $_POST['nome'] !== '') {
      $stm = $db->prepare('INSERT INTO Midia (nome,tipo,descricao,trailer,imagem) VALUES (:nome,:tipo,:descricao,:trailer,:imagem)');
      $stm->execute(array(':nome' => $_POST['nome'],),);

     /*  $ultimo_id = $stm->lastInsertId();
      $diretorio='/../../assets/movieImages/'.ultimo_id.'/'; // Local em que imagem será salva
      //criar pasta de foto
      mkdir($diretorio,0755);  */// 0755 é o número da permissão

      $stm->execute(
        array('nome' => $_POST['nome'], 'tipo' => $_POST['tipo'],  'trailer' => $_POST['trailer'], 'descricao' => $_POST['descricao'],'imagem' => $_POST['imagem'])
        
      );
     
    }
  }

  $usuarios = $db->query('SELECT * FROM Usuarios ORDER BY adicionado_em DESC')->fetchAll();
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
  <link rel="stylesheet" href="index.css" />
  <!--Link do Icone-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="..\.\\index.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Minha Crtitica</title>
</head>

<body>

  <body class="body">
    <!-- MENU-->
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
              <a onclick="menuFilme()"> Filmes </a>
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
    <!-- MENU-->
    <!-- Capa , Título e Sinopse-->
    <form method="POST" class="formStyle">
      <div class="divPrincipal">
        <div class="">
          <!-- Esta div e responsavel por pela capa, categoria, duração e URL do filme-->
         
          <div class="formMin">
            <input class = "all" type="file" name ="imagem"/>
            <br/>
            <input name="nome" class="all" type="text" placeholder="Título"/>
            <input name="trailer" class="all" type="text" placeholder="URL do Trailer"/>
          </div>
        </div>
        <!-- Esta div e responsavel por pela capa, categoria, duração e URL do filme-->
        <div class="capa">
          <input class="all" name="tipo" type="text" placeholder="Categoria da obra">
          <input class="all" name="descricao" type="text" placeholder="Insira a sinopse da obra">
          <button  name = "sendCadImg" type="submit" class="botao">adicionar</button>
        </div>
      </div>
      </div>
      </div>
    </form>
    <!-- Capa , Título e Sinopse-->

  </body>

</html>