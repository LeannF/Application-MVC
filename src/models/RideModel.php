<?php

    //trajets par place dispo trié par date de depart croissante 
    //supp trajet
    //crea trajet
    //modif 
    // ne pas afficher trajets depasses

    namespace App\Models;
    use PDO;

    class RideModel {
        private $db;
        
        public function __construct(PDO $db) {
            $this->db = $db;
        }

        public function getAllRide(){
            $stmt = $this->db->query("SELECT * FROM ride");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getRidesByAvailableSeats(){
            $stmt = $this->db->query("SELECT * FROM ride WHERE available_seat > 0 AND CONCAT(departure_date, '', departure_time) > NOW() ORDER BY departure_date, departure_time ASC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addRide(array $data): bool{
            $stmt = $this->db->prepare("
                INSERT INTO ride (
                    id_agency_departure, departure_date, departure_time, 
                    id_agency_arrival, arrival_date, arrival_time, available_seat
                ) VALUES (
                    :id_agency_departure, :departure_date, :departure_time,
                    :id_agency_arrival, :arrival_date, :arrival_time,
                    :available_seat
                )
            ");
            return $stmt->execute([
                ':id_agency_departure' => $data['id_agency_departure'],
                ':departure_date' => $data['departure_date'],
                ':departure_time' => $data['departure_time'],
                ':id_agency_arrival' => $data['id_agency_arrival'],
                ':arrival_date' => $data['arrival_date'],
                ':arrival_time' => $data['arrival_time'],
                ':available_seat' => $data['available_seat']          
            ]);
        }

        public function editRide(int $id_ride, array $data){
            $stmt = $this->db->prepare("
                UPDATE ride SET 
                    id_agency_departure = :id_agency_departure, 
                    departure_date = :departure_date,
                    departure_time = :departure_time,
                    id_agency_arrival = :id_agency_arrival, 
                    arrival_date = :arrival_date,
                    arrival_time = :arrival_time,
                    available_seat = :available_seat 
                WHERE id_ride = :id_ride"
            );
            return $stmt->execute([
                ':id_agency_departure' => $data['id_agency_departure'],
                ':departure_date' => $data['departure_date'],
                ':departure_time' => $data['departure_time'],
                ':id_agency_arrival' => $data['id_agency_arrival'],
                ':arrival_date' => $data['arrival_date'],
                ':arrival_time' => $data['arrival_time'],
                ':available_seat' => $data['available_seat'],   
                ':id_ride' => $id_ride,       
            ]);
        }

        public function deleteRide(int $id): bool{
            $stmt = $this->db->prepare("DELETE FROM ride WHERE id_ride = :id");
            return $stmt->execute([':id' => $id]);
        }

        public function getAgencyIdByCity(string $city): ?int {
            $stmt = $this->db->prepare("SELECT id_agency FROM agency WHERE city = :city");
            $stmt->execute([':city' => $city]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? (int)$result['id_agency'] : null;
        }
    }
?>