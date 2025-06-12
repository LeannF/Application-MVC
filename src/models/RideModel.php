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
             $sql = 
                "SELECT
                    r.id_ride,
                    r.departure_date,
                    r.departure_time,
                    r.arrival_date,
                    r.arrival_time,
                    r.total_seat,
                    r.available_seat,
                    ad.city AS departure_city,
                    aa.city AS arrival_city
                FROM ride r
                JOIN agency ad ON r.id_agency_departure = ad.id_agency
                JOIN agency aa ON r.id_agency_arrival = aa.id_agency  
                ORDER BY r.departure_date, r.departure_time ASC            
            ";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOneRide(int $id){
            $stmt = $this->db->query("SELECT * FROM ride WHERE id_ride = :id");
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getRidesByAvailableSeats(){
            $sql = 
                "SELECT
                    r.id_ride,
                    r.departure_date,
                    r.departure_time,
                    r.arrival_date,
                    r.arrival_time,
                    r.total_seat,
                    r.available_seat,
                    r.id_user,
                    ad.city as departure_city,
                    aa.city as arrival_city
                FROM ride r
                JOIN agency ad ON r.id_agency_departure = ad.id_agency
                JOIN agency aa ON r.id_agency_arrival = aa.id_agency
                WHERE r.available_seat > 0 
                AND TIMESTAMP(r.departure_date, r.departure_time) > NOW() 
                ORDER BY r.departure_date, r.departure_time ASC               
            ";
            $stmt = $this->db->query($sql);
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addRide(array $data): bool{
            $stmt = $this->db->prepare(
                "INSERT INTO ride (
                    id_agency_departure, departure_date, departure_time, 
                    id_agency_arrival, arrival_date, arrival_time,total_seat, available_seat, id_user
                ) VALUES (
                    :id_agency_departure, :departure_date, :departure_time,
                    :id_agency_arrival, :arrival_date, :arrival_time,
                    :total_seat, :available_seat, :id_user
                )
            ");

            return $stmt->execute([
                ':id_agency_departure' => $data['id_agency_departure'],
                ':departure_date' => $data['departure_date'],
                ':departure_time' => $data['departure_time'],
                ':id_agency_arrival' => $data['id_agency_arrival'],
                ':arrival_date' => $data['arrival_date'],
                ':arrival_time' => $data['arrival_time'],
                ':total_seat' => $data['total_seat'],
                ':available_seat' => $data['available_seat'],
                ':id_user' => $data['id_user']        
            ]);
        }

        public function editRide(int $id_ride, array $data): bool{
            $fields = [];
            $params = [];

            foreach ($data as $key => $value) {
                $fields[] = "$key = :$key";
                $params[":$key"] = $value;
            }

            $params[':id_ride'] = $id_ride;

            $sql = "UPDATE ride SET " . implode(', ', $fields) . " WHERE id_ride = :id_ride";
            
            $stmt = $this->db->prepare($sql);
            
            return $stmt->execute($params);
        }

        public function deleteRideById(int $id): bool{
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