<?php 

    namespace App\Models;
    use PDO;

    class UserModel {
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