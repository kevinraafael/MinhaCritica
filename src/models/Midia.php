<?php

namespace src\models;

use src\Database;

/**
 * Classe reponsável por representar os dados de um usuário na aplicação
 */
class Midia
{

    /**
     * @var string Email do usuário
     */
    private $nome;

    /**
     * @var string Senha (codificada) do usuário
     */
    private $tipo;

    /**
     * @var string Nome fornecido pelo usuário
     */
    private $trailer;

    /**
     * @var string Nome fornecido pelo usuário
     */
    private $descricao;

    /**
     *   $  Nome fornecido pelo usuário
     */
    /**
     * @var $POST Nome fornecido pelo usuário
     */
    private $imagem;


    function __construct(string $nome, string $tipo, string $trailer, string $descricao, $imagem)
    {

        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->trailer = $trailer;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
    }


    /**
     *  Método get genérico para todos os campos
     */
    public function __get($campo)
    {
        return $this->$campo;
    }

    /**
     *  Método set genérico para todos os campos
     */
    public function __set($campo, $valor)
    {
        return $this->$campo = $valor;
    }

    /**
     *  Função que auxilia na verificação da identidade fornecida.
     *  Para isso, os dados providos são comparados com a instância atual.
     */
    public function igual(string $email, string $senha): bool
    {
        return $this->email === $email && $this->senha === hash('sha256', $senha);
    }


    /**
     *  Função que salva os dados do usuário no banco de dados
     */
    public function salvar(): void
    {
        $db = Database::getInstance();

        $stm = $db->prepare('INSERT INTO Usuarios (nome, tipo, trailer,descricao,imagem) VALUES (:nome, :tipo, :trailer,:descricao,:imagem)');
        $stm->bindValue(':nome', $this->nome);
        $stm->bindValue(':tipo', $this->tipo);
        $stm->bindValue(':descricao', $this->descricao);
        $stm->bindValue(':imagem', $this->imagem);
        $imagem = $_FILES['imagem'];
        $nomeArquivo = 'imagem_' . $imagem['name'];
        $diretorio = __DIR__ . '\..\..\uploads';

        $stm->execute(
            array('nome' => $_POST['nome'], 'tipo' => $_POST['tipo'], 'descricao' => $_POST['descricao'], 'imagem' => $_POST['imagem'])
        );
        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio  . "\\" . $nomeArquivo);
        echo "To em salvar filme";
    }



    static public function buscarUsuario($email): ?Usuario
    {
        $db = Database::getInstance();
        $stm = $db->prepare('SELECT email, nome, senha FROM Usuarios WHERE email = :email');
        $stm->bindParam(':email', $email);

        $stm->execute();
        $resultado = $stm->fetch();

        if ($resultado) {
            $usuario = new Usuario($resultado['email'], $resultado['senha'], $resultado['nome']);
            $usuario->senha = $resultado['senha'];
            return $usuario;
        } else {
            return null;
        }
    }




    static public function buscarTodos(): array
    {
        $con = Database::getInstance();
        $stm = $con->prepare('SELECT email, nome, senha FROM Usuarios');
        $stm->execute();

        $resultados = [];

        while ($resultado = $stm->fetch()) {
            $usuario = new Usuario($resultado['email'], $resultado['senha'], $resultado['nome']);
            $usuario->senha = $resultado['senha'];
            array_push($resultados, $usuario);
        }

        return $resultados;
    }


    /*  public function deletar()
    {
        $db = Database::getInstance();

        $stm = $db->prepare('DELETE FROM Usuarios WHERE email = :email');
        $stm->bindValue(':email', $this->email);
        $stm->execute();
    } */

    static public function saveAll(): void
    {

        if (key_exists('nome', $_POST) && $_POST['nome'] !== '') {
            if ($_FILES['imagem']['error'] != UPLOAD_ERR_OK) {
                die();
                //ToDo
                // deu errado
            }
            $db = Database::getInstance();

            $stm = $db->prepare('INSERT INTO Midia (nome,tipo,descricao,trailer,imagem) VALUES (:nome,:tipo,:descricao,:trailer,:imagem)');

            //$ultimo_id = $stm->lastInsertId();
            // ('sqlite:'. __DIR__.'\..\db.sqlite3');
            $diretorio = __DIR__ . '\..\..\uploads';
            //  $diretorio='/../../assets/uploads/'; // Local em que imagem será salva
            //criar pasta de foto
            mkdir($diretorio, 0755);  /// 0755 é o número da permissão 
            //var_dump($imagem);
            $imagem = $_FILES['imagem'];
            $nomeArquivo = 'Imagem' . $imagem['name']; // substitui pelo id da sessao

            $stm->execute(
                array('nome' => $_POST['nome'], 'tipo' => $_POST['tipo'],  'trailer' => $_POST['trailer'], 'descricao' => $_POST['descricao'], 'imagem' => $nomeArquivo)

            );

            move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio  . "\\" . $nomeArquivo);
        }
    }
}
