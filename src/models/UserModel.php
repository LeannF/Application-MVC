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

        public function getUserByEmail(string $email): array|false {
            $stmt = $this->db->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->execute([':email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>