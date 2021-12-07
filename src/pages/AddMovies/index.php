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


<<<<<<< HEAD <body class="body">
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
      =======

      <body class="body">
        <!-- MENU-->
        <div class="header">
          <div id="mainMenu">
            <div class="searchBar">
              <h1>Minha Crítica</h1>
              <input type="text" id="search" name="searchBox" placeholder="Pesquise aqui" />
              >>>>>>> 5b815ad5acbb5cefe9f7316f6f30adf899178b14
            </div>
            <input type="checkbox" id="bt_menu" />
            <label for="bt_menu">&#9776;</label>
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
                  <a> Login </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- MENU-->
        <!-- Capa , Título e Sinopse-->
        <form enctype="multipart/form-data" method="POST" class="formStyle">
          <div class="divPrincipal">
            <div>
              <!-- Esta div e responsavel por pela capa, categoria, duração e URL do filme-->
              <h1 class="capa">Capa</h1>
              <div class="formMin">
                <!--<input type="hidden" name="MAX_FILE_SIZE" value="30000" />-->
                <br />
                <div class="inputCapa">
                  <input class="all" id="inserirImg" type="file" name="imagem" />
                </div>
                <h1 class="capa">Titulo</h1>
                <input name="nome" class="all" type="text" placeholder="Título" />
                <input name="trailer" class="all" type="text" placeholder="URL do Trailer" />
              </div>
            </div>
            <!-- Esta div e responsavel por pela capa, categoria, duração e URL do filme-->
            <div class="divCapa">

              <input class="all" name="tipo" type="text" placeholder="Categoria da obra">
              <h1 class="capa">Sinopse</h1>
              <input class="all" name="descricao" type="text" placeholder="Insira a sinopse da obra">
            </div>
            <button name="sendCadImg" type="submit" class="botao">adicionar</button>
          </div>
        </form>
        <!-- Capa , Título e Sinopse-->

      </body>

</html>