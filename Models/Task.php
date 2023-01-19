<?php 
    require './bin/Conn.php';

    class Task extends Conn {
        protected string $table;
        protected object $conn;
        public function __construct() {
            $this->table = 'tasks';
            $this->conn = $this->getConnection();
        }

        public function findAllTasks($userId) : array {
            $sql = "SELECT * FROM {$this->table} WHERE user_id = :user_id ORDER BY created_at DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id',$userId);
            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                return [];
            }
        }

        public function findAllFilteredTasks($filter,$userId) : array {
            $sql = "SELECT * FROM {$this->table} WHERE {$filter} = 1 AND user_id = :user_id ORDER BY created_at DESC" ;
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id',$userId);
            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                return [];
            }
        }

        public function insertTask($name,$favorite,$today,$important,$userId) : bool {
            $sql = "INSERT INTO {$this->table} (name, favorite,today,important,user_id,created_at) VALUES (:name, :favorite, :today,:important,:user_id, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name',$name);
            $stmt->bindParam(':favorite',$favorite);
            $stmt->bindParam(':today',$today);
            $stmt->bindParam(':important',$important);
            $stmt->bindParam(':user_id',$userId);

            if($stmt->execute())  {
                return true;
            } else {
                return false;
            }
        }

        public function updateTask($id,$name) : bool {
            $sql = "UPDATE {$this->table} SET name = :name, updated_at = NOW() WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':name',$name);
            if($stmt->execute())  {
                return true;
            } else {
                return false;
            }
        }

        function deleteTask($id) : bool {
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            if($stmt->execute())  {
                return true;
            } else {
                return false;
            }
        }

        public function doneTask($id,$done) {
            $sql = "UPDATE {$this->table} SET done = :done, updated_at = NOW() WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':done',$done);
            if($stmt->execute())  {
                return true;
            } else {
                return false;
            }
        }

        public function searchTasks($search,$userId) : array {
            $sql = "SELECT * FROM {$this->table} WHERE name REGEXP :search AND user_id = :user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':search',$search);
            $stmt->bindParam(':user_id',$userId);
            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                return [];
            }
        }
        
    }