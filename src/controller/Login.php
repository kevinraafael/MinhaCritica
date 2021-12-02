<?php


namespace src\controller;



use PDOException;
use src\models\Usuario;



class LoginController extends Controller
{



    private $loggedUser;



    public function register(): void
    {


        // try  {
        $user = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha']);
        $user->salvar();
        $this->registerIndex();
    }

    public function registerIndex(): void
    {
        $this->view('/pages/Registration/index');
    }
    public function login(): void
    {
        $user = Usuario::buscarUsuario($_POST['email']);
        var_dump($user);
        echo "entrei";

        if ($user && $user->igual($_POST['email'], $_POST['senha'])) {
           echo "entrei aqui";
            $_SESSION['user'] = $this->loggedUser = $user;
            header('Location: /profile');
        } else {
            echo "entrei no else";
            header('Location:login?email=' . $_POST['email'] . '&mensagem=Usuário e/ou senha incorreta!');
        }
    } 

    public function loginIndex(): void
    {
        $this->view('/pages/Login/index');
    }

    public function profileIndex(): void{
        $this->view('/pages/Profile/index');
    }

    public function sair(): void
    {
        if (!$this->loggedUser) {
            header('Location:login?email=' . $_POST['email'] . 'mensagem=Você precisa se identificar primeiro');
            return;
        }
        unset($_SESSION['user']);
        header('Location:login?email=' . $_POST['email'] . 'login?mensagem=Usuário deslogado com sucesso!');
    }
}
