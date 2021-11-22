<?php


namespace src\controller;


use PDOException;
use Usuario;


class LoginController extends Controller
{

    /**
     * @var Usuario Variável que indica se um usuário está logado.
     */
    private $loggedUser;

    /**
     *  Método construtor da classe.
     *  Ao ser instanciado, inicia a seção e verifica se já existe um usuário logado.
     */
     function __construct()
    {
        session_start();
        if (isset($_SESSION['user'])) $this->loggedUser = $_SESSION['user'];
    }

    public function cadastro()
    {
       $user = new Usuario($_POST['nome'],$_POST['email'],$_POST['senha']);
      

        try {
            $user->salvar();
            header('Location:/login?email='.$_POST['email'].'&mensagem=Usuario cadastrado com sucesso');
        } catch (\Throwable $th) {
            header('Location:/register?email='.$_POST['email'].'&mensagem=Usuario já cadastrado na plataforma');        }

      
    }


    /**
     *  Função que renderiza a página (visão) de login
     *  Se estiver logado, redireciona para a página do usuário.
     */
    public function register(): void
    {
        //if (!$this->loggedUser) {
        $this->view('/pages/Registration/index');
        // } 
    }

    /**
     *  Função que trata de verificar a identididade de um usuário.
     *  Se correta, adiciona o usuário à seção para o mesmo não precise fazer novamente.
     */
     public function login(): void
    {
        $user = Usuario::buscar($_POST['email']);

        if (isset($user) && $user->igual($_POST['email'], $_POST['senha'])) {
            $_SESSION['user'] = $this->loggedUser = $user;
            header('Location: /user/info');
        } else {
            header('Location:login?email=' . $_POST['email'] . '&mensagem=Usuário e/ou senha incorreta!');
        }
    } 

    /**
     *  Função que renderiza a página (visão) de cadastro
     */
    public function loginIndex(): void
    {
        $this->view('/pages/Login/index');
    }
    /**
     *  Função que remove o usuário da seção (deslogar)
     */
    public function sair(){
        if(!$this->loggedUser){
            header('Location: /Login?messagem=Voce precisa se identificar primeiro');
            return;
        }
        unset($_SESSION['user']);
        header('Location: /Login?messagem=Usuario deslogado com sucesso');
    }
   
}
?>