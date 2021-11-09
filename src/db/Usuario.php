<?php

namespace App\Modelos;

use App\Database;

/**
 * Classe reponsável por representar os dados de um usuário na aplicação
 */
class Usuario
{

    /**
     * @var string Email do usuário
     */
    private $email;

    /**
     * @var string Senha (codificada) do usuário
     */
    private $senha;

    /**
     * @var string Nome fornecido pelo usuário
     */
    private $nome;

    /**
     *  Contrutor da classe, responsável por inicializar os dados.
     *  A senha é codificada usando sha256.
     */
    function __construct(string $email, string $senha, string $nome)
    {
        $this->email = $email;
        $this->senha = hash('sha256', $senha);
        $this->nome = $nome;
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
        $con = Database::getConnection();

        $stm = $con->prepare('INSERT INTO Usuarios (nome, email, senha) VALUES (:nome, :email, :senha)');
        $stm->bindValue(':nome', $this->nome);
        $stm->bindValue(':email', $this->email);
        $stm->bindValue(':senha', $this->senha);
        $stm->execute();
    }


    /**
     *  Função que busca por um usuário a partir do email fornecido.
     *  Se não existir, retorna NULL.
     */
    static public function buscarUsuario($email): Usuario
    {
        $con = Database::getConnection();
        $stm = $con->prepare('SELECT email, nome, senha FROM Usuarios WHERE email = :email');
        $stm->bindParam(':email', $email);

        $stm->execute();
        $resultado = $stm->fetch();

        if ($resultado) {
            $usuario = new Usuario($resultado['email'], $resultado['senha'], $resultado['nome']);
            $usuario->senha = $resultado['senha'];
            return $usuario;
        } else {
            return NULL;
        }
    }

    /**
     * 
     * Função que retorna todos os usuários cadastrados.
     * 
     * @return Usuario[]
     * 
     */
    static public function buscarTodos(): array
    {
        $con = Database::getConnection();
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

    /**
     *  Função que deleta um usuário no banco.
     */
    public function deletar()
    {
        $con = Database::getConnection();

        $stm = $con->prepare ('DELETE FROM Usuarios WHERE email = :email');
        $stm->bindValue(':email',$this->email);
        $stm->execute();
    }
}
