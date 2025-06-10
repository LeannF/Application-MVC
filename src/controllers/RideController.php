<?php

    namespace App\Controllers;
    use App\Config\Database;
    use App\Models\RideModel;

    /**
     * controller for the ride's table
     * 
     * functions to see, add, edit and delete from the table 
    */
    class RideController{
        private $rideModel;

        public function __construct() {
            $pdo = Database::getInstance();
            $this->rideModel = new RideModel($pdo);
        }

        public function getRides(){
            $rides = $this->rideModel->getAllRide(); 
            header('Content-Type: application/json'); 
            echo json_encode($rides); 
        }

        public function getRideByAvailableSeats(){
            $rides = $this->rideModel->getRideByAvailableSeats();
            header('Content-Type: application/json'); 
            echo json_encode($rides); 
        }

        public function getOneRide($id){
            $ride = $this->rideModel->getOneRide(); 
            header('Content-Type: application/json'); 
            echo json_encode($ride); 
        }

        public function addRide(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id_agency_departure = $_POST['id_agency_departure'];
                $id_agency_arrival = $_POST['id_agency_arrival'];

                if ($id_agency_departure === null || $id_agency_arrival === null) {
                    echo "Ville de départ ou d'arrivée inconnue";
                    return;
                }

                $data = [
                    'id_user' => $_SESSION['user']['id_user'],
                    'id_agency_departure' => $id_agency_departure,
                    'departure_date' => $_POST['departure_date'],
                    'departure_time' => $_POST['departure_time'],
                    'id_agency_arrival' => $id_agency_arrival,
                    'arrival_date' => $_POST['arrival_date'],
                    'arrival_time' => $_POST['arrival_time'],
                    'available_seat' => $_POST['available_seat']
                ];
                $succes = $this->rideModel->addRide($data);
                if ($succes) {
                    header("Location: /");
                    exit;
                } else {
                    echo "Error during adding ride";
                }               
            }    
        }

        public function editRide($id){
            $data = json_decode(file_get_contents("php://input"), true);

            if ($this->rideModel->editRide($id, $data)) {
                echo json_encode(['message' => 'Ride edited successfully']);
            } else {
                http_response_code(500);
                echo json_encode(['message' => 'Failed to edit ride']);
            }
        }

        public function deleteRide() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_ride'])) {
                $id = (int) $_POST['id_ride'];
                $success = $this->rideModel->deleteRideById($id);

                if ($success) {
                    header('Location: /');
                } else {
                    echo "Erreur lors de la suppression";
                }
                exit;
            }
        }
    }
?>