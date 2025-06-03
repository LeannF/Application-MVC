<?php

    namespace App\Controllers;
    use App\Models\RideModel;

    /**
     * controller for the ride's table
     * 
     * functions to see, add, edit and delete from the table 
    */
    class RideController{
        private RideModel $model;

        public function __construct(RideModel $model) {
            $this->model = $model;
        }

        public function getRides(){
            $rides = $this->model->getAllRide(); 
            header('Content-Type: application/json'); 
            echo json_encode($rides); 
        }

        public function getRideByAvailableSeats(){
            $rides = $this->model->getRideByAvailableSeats();
            header('Content-Type: application/json'); 
            echo json_encode($rides); 
        }

        public function addRide(){
            $data = json_decode(file_get_contents("php://input"), true);

            if ($this->model->addRide($data)) {
                http_response_code(200);
                echo json_encode(['message' => 'Ride added successfully']);
            } else {
                http_response_code(500);
                echo json_encode(['message' => 'Failed to add ride']);
            }           
        }

        public function editRide(){
            $data = json_decode(file_get_contents("php://input"), true);

            if ($this->model->editRide($id, $data)) {
                echo json_encode(['message' => 'Ride edited successfully']);
            } else {
                http_response_code(500);
                echo json_encode(['message' => 'Failed to edit ride']);
            }
        }

        public function deleteRide($id){
            if ($this->model->deleteRide($id)) {
                http_response_code(200);
                echo json_encode(['message' => 'Ride deleted successfully']);
            } else {
                http_response_code(500);
                echo json_encode(['message' => 'Failed to delete ride']);
            }            
        }
    }
?>