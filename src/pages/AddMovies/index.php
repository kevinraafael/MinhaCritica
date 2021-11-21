<?php
include_once __DIR__ . '/../../db/Database.php';

session_start();

try {
  Database::createSchema(); // cria o schema do banco de dados

  $db = Database::getInstance();

  /*  if($imagem){
    filter_input(INPUT_POST,'imagem',FILTER_SANITIZE_STRING);

   }else{
 $_SESSION['msg'] =  "p style = 'color:red';>ErrO ao salvar os dados</p>";
   }
 */
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (key_exists('nome', $_POST) && $_POST['nome'] !== '') {
      if ($_FILES['imagem']['error'] != UPLOAD_ERR_OK) {
        die();
        //ToDo
        // deu errado
      }

      $stm = $db->prepare('INSERT INTO Midia (nome,tipo,descricao,trailer,imagem) VALUES (:nome,:tipo,:descricao,:trailer,:imagem)');

      //$ultimo_id = $stm->lastInsertId();
      // ('sqlite:'. __DIR__.'\..\db.sqlite3');
      $diretorio = __DIR__ . '\..\..\uploads';
      //  $diretorio='/../../assets/uploads/'; // Local em que imagem será salva
      //criar pasta de foto
      mkdir($diretorio, 0755);  /// 0755 é o número da permissão 
      //var_dump($imagem);
      $imagem = $_FILES['imagem'];
      $nomeArquivo = 'Hudson_' . $imagem['name']; // substitui pelo id da sessao

      $stm->execute(
        array('nome' => $_POST['nome'], 'tipo' => $_POST['tipo'],  'trailer' => $_POST['trailer'], 'descricao' => $_POST['descricao'], 'imagem' => $nomeArquivo)

      );

      move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio  . "\\" . $nomeArquivo);
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
  <link rel="stylesheet" href="index.css" />

  <style>
    <?php include "index.css" ?>
  </style>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
              <a href="<?= "/" ?>home"> Início </a>
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
              <a href="<?= "/" ?>login"> Login </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- MENU-->
    <!-- Capa , Título e Sinopse-->
    <form enctype="multipart/form-data" method="POST" class="formStyle">
      <div class="divPrincipal">
        <div class="">
          <!-- Esta div e responsavel por pela capa, categoria, duração e URL do filme-->

          <div class="formMin">
            <!--             <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
 -->
            <input class="all" type="file" name="imagem" />

            <br />
            <input name="nome" class="all" type="text" placeholder="Título" />
            <input name="trailer" class="all" type="text" placeholder="URL do Trailer" />
          </div>
        </div>
        <!-- Esta div e responsavel por pela capa, categoria, duração e URL do filme-->
        <div class="capa">
          <input class="all" name="tipo" type="text" placeholder="Categoria da obra">
          <input class="all" name="descricao" type="text" placeholder="Insira a sinopse da obra">
          <button name="sendCadImg" type="submit" class="botao">adicionar</button>
        </div>
      </div>
      </div>
      </div>
    </form>
    <!-- Capa , Título e Sinopse-->

  </body>

</html>