<?php

namespace src\controller;

class MovieController extends Controller
{
    public function addMovieIndex(): void
    {
        //if (!$this->loggedUser) {
        $this->view('/pages/AddMovies/index');
        // } 
    }
}
