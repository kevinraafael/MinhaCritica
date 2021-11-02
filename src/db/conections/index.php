<?php
    class Database {
        private static $conexao;
         private function construct () {

         }

         public static function getInstance() :PDO{
             if (is_null(self::$conexao)){
                self::$conexao = new PDO('sqlite:db.sqlite3');
             }
             return self::conexao;
         }
         public static function createSchema(){
             $db = self::getInstance();
         }

    }
    
?>
