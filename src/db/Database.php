<?php
final class Database
{
    private static $conexao;
    private function construct()
    {
    }

    public static function getInstance(): PDO
    {
        if (is_null(self::$conexao)) {
            self::$conexao = new PDO('sqlite:'. __DIR__.'\..\db.sqlite3');
        }
        return self::$conexao;
    }
    public static function createSchema(): void
    {
        $db = self::getInstance();
        $db->exec(file_get_contents(__DIR__ . '/schemas/usuario.sql'));
        $db->exec(file_get_contents(__DIR__ . '/schemas/midia.sql'));
    }
}
