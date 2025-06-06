<?php

    use App\Config\Database;
    use PHPUnit\Framework\TestCase;
    use App\Models\RideModel;

    class RideModelTest extends TestCase {

        private $rideModel;
        private $db;
        private $id_agency_departure;
        private $id_agency_arrival;

        protected function setUp(): void {
            parent::setUp();

            // 1. Stocker la connexion dans une propriété
            $this->db = Database::getInstance();

            if (!$this->db) {
                $this->fail("Impossible d'obtenir la connexion PDO");
            }
            $this->rideModel = new RideModel($this->db);

            // 2. Créer les agences et stocker leurs IDs dans les propriétés d'instance
            $stmt = $this->db->prepare("INSERT INTO agency (city) VALUES ('Po')");
            $stmt->execute();
            $this->id_agency_departure = $this->db->lastInsertId();

            $stmt = $this->db->prepare("INSERT INTO agency (city) VALUES ('FdF')");
            $stmt->execute();
            $this->id_agency_arrival = $this->db->lastInsertId();
        }

        protected function tearDown(): void {
            parent::tearDown();

            // Supprimer les agences créées
            $stmt = $this->db->prepare("DELETE FROM agency WHERE id_agency IN (?, ?)");
            $stmt->execute([$this->id_agency_departure, $this->id_agency_arrival]);
        }

        public function testAddRide() {
            $data = [              
                'id_agency_departure' => $this->id_agency_departure, 
                'departure_date' => '2025-06-04',
                'departure_time' => '06:00:00', 
                'id_agency_arrival' => $this->id_agency_arrival,
                'arrival_date' => '2025-06-04',
                'arrival_time' => '08:00:00', 
                'available_seat' => 4,
                'id_user' => 1
            ];
            $result = $this->rideModel->addRide($data);
            $this->assertTrue($result);
        }

        public function testEditRide() {
            // Ajouter un trajet avant édition
            $data = [
                'id_agency_departure' => $this->id_agency_departure, 
                'departure_date' => '2025-06-06',
                'departure_time' => '09:45:00', 
                'id_agency_arrival' => $this->id_agency_arrival,
                'arrival_date' => '2025-06-09',
                'arrival_time' => '12:00:00', 
                'available_seat' => 3,
                'id_user' => 1
            ];
            $this->rideModel->addRide($data);
            $id = $this->db->lastInsertId();

            $newData = [
                'id_agency_departure' => $this->id_agency_departure,
                'departure_date' => '2025-06-07',
                'departure_time' => '10:00:00',
                'id_agency_arrival' => $this->id_agency_arrival,
                'arrival_date' => '2025-06-07',
                'arrival_time' => '13:00:00',
                'available_seat' => 2
            ];
            $result = $this->rideModel->editRide((int)$id, $newData);
            $this->assertTrue($result);
        }

        public function testDeleteRide() {
            $data = [
                'id_agency_departure' =>  $this->id_agency_departure, 
                'departure_date' => '2025-06-05',
                'departure_time' => '20:30:00', 
                'id_agency_arrival' => $this->id_agency_arrival,
                'arrival_date' => '2025-06-06',
                'arrival_time' => '05:10:00', 
                'available_seat' => 2,
                'id_user' => 1
            ];
            $this->rideModel->addRide($data);
            $id = $this->db->lastInsertId();

            $result = $this->rideModel->deleteRide((int)$id);
            $this->assertTrue($result);
        }
    }
?>
