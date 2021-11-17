<?php
include_once __DIR__ . '/Database.php';

try {
    Database::createSchema(); // cria o schema do banco de dados

    $db = Database::getInstance();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (key_exists('nome', $_POST) && $_POST['nome'] !== '') {
            $stm = $db->prepare('INSERT INTO Usuarios (nome) VALUES (:nome)');
            $stm->execute(array(':nome' => $_POST['nome']));
            echo 'Nome inserido com sucesso! <br/><br/>';
        } else {
            $stm = $db->prepare('DELETE FROM Usuarios'); // apaga todos os dados do banco
            $stm->execute();
        }
    }

    $usuarios = $db->query('SELECT * FROM Usuarios ORDER BY adicionado_em DESC')->fetchAll();
} catch (\Throwable $th) {
    echo $th;
    die(1);
    //salvar imagemo no0 disco e caminho banco
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usando PDO</title>
</head>

<body>

    <form method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome">
        <button type="submit">Enviar</button>
    </form>

    <hr>

    <ul>
        <?php foreach ($usuarios as $usuario) { ?>
            <li>
                <?= $usuario['id'] ?>: <?= $usuario['nome'] ?> (adicionado em <?= $usuario['adicionado_em'] ?>)
            </li>
        <?php } ?>
    </ul>

</body>

</html>