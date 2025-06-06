<?php
 namespace App\Models;
    use PDO;

    class AgencyModel {
        private PDO $db;
        
        public function __construct(PDO $db) {
            $this->db = $db;
        }

        public function getAllAgency(){
            $stmt = $this->db->query("SELECT * FROM agency");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addAgency(array $data): bool{
            $stmt = $this->db->prepare("INSERT INTO agency (city) VALUES (:city)");
            return $stmt->execute([
                ':city' => $data['city']
            ]);
        }

        public function editAgency(int $id_agency, array $data){
            $stmt = $this->db->prepare("UPDATE agency SET city = :city WHERE id_agency = :id_agency");
            return $stmt->execute([
                ':id_agency' => $id_agency,
                ':city' => $data['city']
            ]);
        }

        public function deleteAgency(int $id_agency): bool{
            $stmt = $this->db->prepare("DELETE FROM agency WHERE id_agency = :id_agency");
            return $stmt->execute([':id_agency' => $id_agency]);
        }
    }
?>