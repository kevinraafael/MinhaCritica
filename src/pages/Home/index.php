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

<body class="body">
  <div class="header">
    <div id="mainMenu">
      <div class="searchBar">
        <h1>Minha Crítica</h1>
        <input type="text" id="search" name="searchBox" placeholder="Pesquise aqui" onkeydown="search()" />
      </div>
      <nav id="navigation">
        <ul>
          <li>
            <a> Início </a>
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
            <a href="<?= "/" ?>login"> Login </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="containerMovie">
    <div id="mainMovie">
      <img width="1092" ; height="592" src="../../assets//images/vingadores-ultimato-4k.png" />
    </div>
  </div>
  <div class="containerTitle">
    <span class="title01"> FILMES MAIS BEM AVALIADOS </span>
  </div>
  <div>
    <nav id="moviesList">
      <ul class="slider">
        <li id="row">
          <a>
            <img height="225" width="150" src="../../assets/images/suicidesquad.jpg" onclick="goToSuicideSquad()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" src="../../assets/images/homemtrevas.jpg" onclick="goToTheTallMan()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" src="../../assets/images//freeguy.jpg" onclick="goToFreeGuy()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" src="../../assets/images/Clint.jpg" onclick="goTo3homensE1Destiono()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" class="poster" src="../../assets/images/Godzila.jpg" onclick="goToKingKongVs()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" class="poster" src="../../assets/images/spaceJam.jpg" onclick="goToSpaceJam()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" class="poster" src="../../assets/images/ritmoCoracao.jpg" onclick="goToTheBox()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" class="poster" src="../../assets/images/thepurge.jpg" onclick="goToThePurge()" />
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <div class="containerTitle">
    <span class="title01"> SÉRIES MAIS BEM AVALIADOS </span>
  </div>
  <div>
    <nav id="moviesList">
      <ul class="slider">
        <li id="row">
          <a>
            <img height="225" width="150" src="../../assets/images/suicidesquad.jpg" onclick="goToSuicideSquad()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" src="../../assets/images/homemtrevas.jpg" onclick="goToTheTallMan()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" src="../../assets/images//freeguy.jpg" onclick="goToFreeGuy()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" src="../../assets/images/Clint.jpg" onclick="goTo3homensE1Destiono()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" class="poster" src="../../assets/images/Godzila.jpg" onclick="goToKingKongVs()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" class="poster" src="../../assets/images/spaceJam.jpg" onclick="goToSpaceJam()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" class="poster" src="../../assets/images/ritmoCoracao.jpg" onclick="goToTheBox()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" class="poster" src="../../assets/images/thepurge.jpg" onclick="goToThePurge()" />
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <div class="containerTitle">
    <span class="title01"> LIVROS MAIS BEM AVALIADOS </span>
  </div>
  <div>
    <nav id="moviesList" class="teste">
      <ul class="slider">
        <li id="row">
          <a>
            <img height="225" width="150" src="../../assets/images/suicidesquad.jpg" onclick="goToSuicideSquad()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" src="../../assets/images/homemtrevas.jpg" onclick="goToTheTallMan()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" src="../../assets/images//freeguy.jpg" onclick="goToFreeGuy()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" src="../../assets/images/Clint.jpg" onclick="goTo3homensE1Destiono()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" class="poster" src="../../assets/images/Godzila.jpg" onclick="goToKingKongVs()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" class="poster" src="../../assets/images/spaceJam.jpg" onclick="goToSpaceJam()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" class="poster" src="../../assets/images/ritmoCoracao.jpg" onclick="goToTheBox()" />
          </a>
        </li>
        <li>
          <a>
            <img height="225" width="150" class="poster" src="../../assets/images/thepurge.jpg" onclick="goToThePurge()" />
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script type="text/javascript">
    $(".slider").slick({
      Infinity: true,
      slidesToShow: 7,
      slidesToScroll: 2,
      arrows: false,
    });
  </script>
</body>

</html>