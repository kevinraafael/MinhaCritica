<?php

namespace src\controller;

use src\models\Midia;

class MovieController extends Controller
{
    public function addMovieIndex(): void
    {
        //if (!$this->loggedUser) {
        $this->view('/pages/AddMovies/index');
        // } 
    }

    public function addMovieRegister(): void
    {
        // try{
        $midia = new Midia($_POST['nome'], $_POST['tipo'], $_POST['trailer'], $_POST['descricao'], $_POST['imagem']);
        $midia->saveAll();
        // }catch(error){

        // }
    }
}
