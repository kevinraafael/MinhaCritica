<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Minha Crítica</title>
  <style>
    <?php include "index.css" ?>
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
  <script src="..\.\\index.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="body" onload="getRequest()">
  <div class="header">
    <div id="mainMenu">
      <div class="searchBar">
        <h1>Minha Crítica</h1>
        <input type="text" id="search" name="searchBox" placeholder="Pesquise aqui" onkeydown="search()" />
      </div>
      <nav id="navigation">
        <ul>
          <li>
            <a onclick="goToHomePage()"> Início </a>
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

  <div class="search_page">
    <ul id="enquadramento_pesquisa">
      <li id="result_pesq" class="result_pesq">
        Resultado para <strong>nome_da_pesquisa_aqui"</strong>
      </li>
    </ul>
    <ul id="enquadramento_pesquisa">
      <li><a>All</a></li>
      <li><a>Movies</a></li>
      <li><a>Books</a></li>
    </ul>

    <ul>
      <li id="titulo_pesquisa">Movies</li>
    </ul>
    <ul id="resultado_filme_books">
      <li>
        <a onclick="goToTheTallMan()">
          <img class="style_img" height="225" width="150" src="../../assets/images/homemtrevas.jpg" />
        </a>
        <a id="titulo_centro" onclick="goToTheTallMan()">O homem que nasceu nas trevas</a>
      </li>
      <li>
        <a onclick="goToKingKongVs()">
          <img class="style_img" height="225" width="150" src="../../assets/images/Godzila.jpg" />
        </a>
        <a id="titulo_centro" onclick="goToKingKongVs()">Godzila Vs Kong</a>
      </li>
      <a>
        <p id="more">More+</p>
      </a>
    </ul>
    <ul>
      <li id="titulo_pesquisa">Books</li>
    </ul>
    <ul id="resultado_filme_books">
      <li>
        <a onclick="goToSpiderMan()">
          <img class="style_img" height="225" width=" 150" src="../../assets/images/Spider_Man_01.jpg" />
        </a>
        <a id="titulo_centro" href="../../assets/images/Spider_Man_01.jpg">Spider-Man: Forever Young</a>
      </li>
      <li>
        <a href="../../assets/images/Spider_Man_01.jpg">
          <a>
            <img class="style_img" height="225" width=" 150" src="../../assets/images/Spider_Man_01.jpg" />
          </a>
          <a id="titulo_centro" href="">Spider-Man: Spider-Man versus Electro</a>
      </li>
      <a>
        <p id="more">More+</p>
      </a>
    </ul>
  </div>
</body>

</html>