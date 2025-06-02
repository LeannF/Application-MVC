<?php

    //trajets par place dispo trié par date de depart croissante 
    //supp trajet
    //crea trajet
    //modif 
    // ne pas afficher trajets depasses

    namespace Models;
    use PDO;

    class Ride {
        private PDO $db;

        public function __construct(PDO $db) {
            $this->db = $db;
        }

        public function getAllRide(){
            $stmt = $this->db->query("SELECT * FROM ride");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getRidesByAvailableSeats(){
            $stmt = $this->db->query("SELECT * FROM ride WHERE available_seat > 0 ORDER BY departure_time ASC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addRide(array $data): bool{
            $stmt = $this->db->prepare("INSERT INTO ride (departure_city, arrival_city, departure_time, available_seat) VALUES (:departure_city, :arrival_city, :departure_time, :available_seat)");
            return $stmt->execute([
                'departure_city' => $data['departure_city'],
                'arrival_city' => $data['arrival_city'],
                'departure_time' => $data['departure_time'],
                'available_seat' => $data['avaiilable_seat']
            ]);
        }

        public function editRide(int $id, array $data){
            $stmt = $this->db->prepare("UPDATE ride SET departure_city = :departure_city, arrival_city = :arrival_city, departure_time = :departure_time, available_seat = :available_seat WHERE id_ride = :id");
            return $stmt->execute([
                'id' => $id,
                'departure_city' => $data['departure_city'],
                'arrival_city' => $data['arrival_city'],
                'departure_time' => $data['departure_time'],
                'available_seat' => $data['avaiilable_seat']
            ]);
        }

        public function deleteRide(int $id): bool{
            $stmt = $this->db->prepare("DELETE FROM ride WHERE id_ride = :id");
            return $stmt->execute(['id' => $id]);
        }
    }

?>
