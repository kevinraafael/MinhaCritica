<?php

namespace src\models\Usuario;

use src\Database;

/**
 * Classe reponsável por representar os dados de um usuário na aplicação
 */
class Usuario
{

    /**
     * @var string Email do usuário
     */
    private $nome;

    /**
     * @var string Senha (codificada) do usuário
     */
    private $email;

    /**
     * @var string Nome fornecido pelo usuário
     */
    private $senha;


    function __construct(string $nome, string $email, string $senha)
    {

        $this->nome = $nome;
        $this->email = $email;
        $this->senha = hash('sha256', $senha);
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

        $stm = $db->prepare('INSERT INTO Usuarios (nome, email, senha) VALUES (:nome, :email, :senha)');
        $stm->bindValue(':nome', $this->nome);
        $stm->bindValue(':email', $this->email);
        $stm->bindValue(':senha', $this->senha);
        $stm->execute(
            array('nome' => $_POST['nome'], 'email' => $_POST['email'], 'senha' => hash('sha256', $_POST['senha']))
        );
        echo "To em salvar";
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


    public function deletar()
    {
        $db = Database::getInstance();

        $stm = $db->prepare('DELETE FROM Usuarios WHERE email = :email');
        $stm->bindValue(':email', $this->email);
        $stm->execute();
    }
}
