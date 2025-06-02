<?php 

    namespace Models;
    use PDO;

    class User {
        private PDO $db;

        public function __construct(PDO $db) {
            $this->db = $db;
        }

        public function getAllUser(){
            $stmt = $this->db->query("SELECT * FROM user");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>