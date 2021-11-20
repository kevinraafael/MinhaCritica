<?php


namespace src\controller;



use PDOException;

/**
 * Classe responsável pela gestão das atividades relacionadas ao usuário.
 * Principalmente ao login e cadastro.
 */
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
    /* function __construct()
    {
        session_start();
        if (isset($_SESSION['user'])) $this->loggedUser = $_SESSION['user'];
    }
 */

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
    /* public function login(): void
    {
        $usuario = Usuario::buscarUsuario($_POST['email']);

        if ($usuario && $usuario->igual($_POST['email'], $_POST['senha'])) {
            $_SESSION['user'] = $this->loggedUser = $usuario;
            header('Location: /user/info');
        } else {
            header('Location: ' . BASEPATH . 'login?email=' . $_POST['email'] . '&mensagem=Usuário e/ou senha incorreta!');
        }
    } */

    /**
     *  Função que renderiza a página (visão) de cadastro
     */
    public function loginIndex(): void
    {
        $this->view('/pages/Login/index');
    }

    /**
     *  Função que trata de cadastrar um novo usuário na base de dados (atualmente na sessão).
     *  Verifica se o email já está cadastrado, se sim, informa o usuário.
     */


    /**
     *  Função responsável por renderizar as informações do usuário (se estiver logado).
     */


    /**
     *  Função que remove o usuário da seção (deslogar)
     */


    /**
     *  ============  EXERCÍCIO AVALIATIVO  ============
     *
     *  Nesta atividade avaliativa você deverá implementar a lógica para deletar um
     *  usuário cadastrado no banco de dados. Essencialmente, deve-se manter
     *  a arquitetura da aplicação nos moldes como foi definida.
     *
     *  Assim, você pode seguir os seguintes passos para resolver essa atividade:
     *
     *  Passo 1: Buscar pelo usuário o qual deseja-se remover do banco de dados.
     *           O email a ser deletado é passado no corpo da requisição POST.
     *           Além disso, a classe Usuário já possui um método de busca implementado.
     *
     *  Passo 2: Criar um método, não estático, em Usuário com nome 'deletar'
     *           que ao ser invocado, executa o commando delete no banco de dados
     *           usando como filtro o email da própria instrução. O método salvar
     *           da própria classe pode servir como inspiração.
     *
     *  O trecho de código abaixo está preenchido com base nas sugestões acima.
     *  Mas poderá ser modificado se achar necessário.
     *
     */
    /* public function deletar()
    {
        // TODO - Primeiro você deve buscar pelo usuário com email informado e armazenar em $usuario (sugestão).
       $usuario = Usuario::buscarUsuario($_POST['email']);

       
         try {
            $usuario->deletar($_POST['email']); // TODO - Nome de método sugerido e já definido em Usuário (devendo implementá-lo)
            header('Location: /user/list?mensagem=Usuário deletado com sucesso!');
        } catch (PDOException $erro) {
            header('Location: /user/list?mensagem=Erro ao deletar ' . $_GET["email"] . ' !');
        } 
    } */
}
