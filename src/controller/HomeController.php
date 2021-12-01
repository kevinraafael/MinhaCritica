<?php

namespace src\controller;

class HomeController extends Controller
{
    public function homeIndex(): void
    {
        //if (!$this->loggedUser) {
        $this->view('/pages/Home/index');
        // } 
    }
}
