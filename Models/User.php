<?php 
    require './bin/Conn.php';

    class User extends Conn {
        protected string $table;
        protected object $conn;

        public function __construct() {
            $this->table = 'users';
            $this->conn = $this->getConnection();
        }

        public function findByEmail($email) {
            $email = $email;
            $sql = "SELECT * FROM {$this->table} WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email',$email);

            if($stmt->execute()) {
                return $stmt->fetch(PDO::FETCH_OBJ);
            } else {
                return [];
            }
        }

        public function findUser($email, $password) {
            $email = $email;
            $password = $password;
            $sql = "SELECT * FROM {$this->table} WHERE email = :email AND password= :password";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':password',$password);

            if($stmt->execute()) {
                return $stmt->fetch(PDO::FETCH_OBJ);
            } else {
                return [];
            }
        }

        public function insertUser($email,$hash,$name) {
            $email = $email;
            $passwordHash = $hash;
            $name = $name;
            $sql = "INSERT INTO {$this->table} (email,password,name,created_at) VALUES (:email,:password,:name,NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':password',$passwordHash);
            $stmt->bindParam(':name',$name);

            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }