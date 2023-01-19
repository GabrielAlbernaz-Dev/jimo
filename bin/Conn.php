<?php 
    require  __DIR__ . '/../vendor/autoload.php';
    require 'Env.php';
    (new DotEnv('.env'))->load();

    //Conn Consts
    define('HOST',getenv('DB_HOST'));
    define('USER',getenv('DB_USERNAME'));
    define('PASSWORD',getenv('DB_PASSWORD'));
    define('DBNAME',getenv('DB_NAME'));

    abstract class Conn {
        protected string $host = HOST;
        protected string $user = USER;
        protected string $password = PASSWORD;
        protected string $dbName = DBNAME;
        protected object $conn;

        public function getConnection() {
            try {
               $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->user, $this->password);
               return $this->conn;
            } catch (PDOException $err) {
                die($err->getMessage());
            }
        }
    }