<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include "index.css" ?>
    </style>
    <title>Minha Crítica</title>
</head>

<body>

    <body class="body">
        <div class="header">
            <div id="mainMenu">

                <div class="searchBar">
                    <h1>Minha Crítica</h1>
                    <input type="text" id="search" name="searchBox" placeHolder="Pesquise aqui" />

                </div>
                <input type="checkbox" id="bt_menu" />
                <label for="bt_menu">&#9776;</label>
                <nav id="navigation">
                    <ul>
                        <li>
                            <a>
                                Início
                            </a>
                        </li>
                        <li>
                            <a>
                                Filmes
                            </a>
                        </li>
                        <li>
                            <a>
                                Séries
                            </a>
                        </li>
                        <li>
                            <a>
                                Livros
                            </a>
                        </li>
                        <li>
                            <a>
                                Login
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="infoContainer">
            <div class="loginContainer">
                <div class=mainTitle>Login</div>
                <div class="input">
                    <form method="post">
                        <input type="email" id="user" name="email" placeHolder="Usuário" />
                        <input type="password" id="password" name="senha" placeholder="Senha" />
                        <div class="containerPassword">
                            <a id="forgivePassowrd">
                                Esqueceu a senha ?
                            </a>
                        </div>
                        <button class="containerButton" type="submit">
                            Entrar

                        </button>
                    </form>    
                </div>
            </div>
            <div class="loginContainer">
                <div class="mainTitle">
                    Não possui conta?
                </div>
                <div class="containerButton" id="button">
                    <a href="<?= "/" ?>cadastro">
                        Criar Conta
                    </a>
                </div>
            </div>

        </div>

        </div>

    </body>

</html>