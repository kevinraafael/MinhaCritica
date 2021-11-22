<?php


namespace src\controller;



use PDOException;
use src\models\Usuario\Usuario;



class LoginController extends Controller
{



    private $loggedUser;



    public function register(): void
    {


        // try  {
        $user = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha']);
        echo " erro no try user";
        var_dump($user);
        // $user->salvar();
        echo "Sucesso no Register";
    }

    public function registerIndex(): void
    {
        $this->view('/pages/Registration/index');
    }


    public function loginIndex(): void
    {
        $this->view('/pages/Login/index');
    }
}
