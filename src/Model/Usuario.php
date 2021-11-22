<?php 

class Usuario{
    private $nome;
    private $email;
    private $senha;

    function __construct(string $nome,string $email,string $senha){

        $this->$nome = $nome;
        $this->$email = $email;
        $this->$senha = hash('sha256',$senha);

    }

    public function igual($email,$senha){
        return $this->$email === $email && $this->$senha === hash('sha256',$senha);
    }

    public function salvar(){
        $conn = Database:: getInstance();

        $stm = $conn -> prepare('INSERT INTO Usuarios(nome,email,senha) VALUES (:nome,:email:senha)');
        $stm-> bindValue(':nome',$this->nome);
        $stm-> bindValue(':email',$this->email);
        $stm-> bindValue(':senha',$this->senha);
        $stm -> execute();
    }

    static public function buscar($email){
        
        $conn = Database:: getInstance();
        $stm = $conn -> prepare('SELECT nome, email, senha FROM Usuarios WHERE email= :email');
        $stm-> bindValue(':email', $email);
        $stm->execute();

        $data = $stm ->fetch();

        if($data){
            $user = new Usuario($data['nome'],$data['email'],$data['senha']);
            $user->senha = $data['senha'];
            return $user;
        } else{
            return NULL;
        }

       
    }
}

?>