<?php
include_once __DIR__ . '/../../db/Database.php';


try {
  Database::createSchema(); // cria o schema do banco de dados

  $db = Database::getInstance();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (key_exists('nome', $_POST) && $_POST['nome'] !== '') {
      $stm = $db->prepare('INSERT INTO Midia (nome) VALUES (:nome)');
      // $stm->execute(array(':nome' => $_POST['nome'],),);
     
      
      $stm->execute(
        array('nome' => $_POST['nome'] )
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
    <link rel="stylesheet" href="index.css" />
    <!--Link do Icone-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <title>Minha Crtitica</title>
  </head>
  <body>

    <body class="body">
       <!-- MENU-->
        <div class="header">
          <div id="mainMenu">
            <div class="searchBar">
              <h1>Minha Crítica</h1>
              <input
                type="text"
                id="search"
                name="searchBox"
                placeholder="Pesquise aqui"
              />
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
                  <a> Login </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      <!-- MENU-->
      <!-- Capa , Título e Sinopse-->
      <div class="divPrincipal" >
        <div class="divCapa">
          <!-- Esta div e responsavel por pela capa, categoria, duração e URL do filme-->
           <h1 class="tituloCapa"> Capa</h1>
           <div class="capa_background">
             <p>Arraste e solte capa aqui</p>
              <i class="material-icons" id="arrow">north</i>
             
           </div> 
         <div class="formCapa">
           <form class="inputCapa">
             <input type="text" placeholder="Categoria">
            
             <input type="text" placeholder="URL do Trailer">
           </form>
         </div>
      </div>
      <!-- Esta div e responsavel por pela capa, categoria, duração e URL do filme-->
      <div class="divTituloandSinopse">
        <div class="divTitulo">
          <h1>Título</h1>
          <form method = "POST" action="">
             <input  name = "nome" class="inputTitulo"  type="text" placeholder="Insira o titulo da obra">
             <button  type="submit" class="botao">adicionar</button>
            </form>
        </div>
        <div class="divSinopse">
          <h1>Sinopse</h1>
          <form action="">  
            <input class="inputSinopse" type="text" placeholder="Insira a sinopse da obra">
            
          </form>
        </div>  
        
      </div>  
      
      
    </div>
        <!-- Capa , Título e Sinopse-->
    
  </body>
</html>
