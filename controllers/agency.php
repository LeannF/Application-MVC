<?php
    require_once '../models/agency.php';

    class AgencyController{
        private $model;

        public function __construct(AgencyModel $model) {
            $this->model = $model;
        }

        public function getAgencies(){
            $agencies = $this->model->getAllAgency(); //appel du modèle
            header('Content-Type: application/json'); // HTTP response
            echo json_encode($agencies); //sending data to client
        }

        public function addAgency(){
            $data = json_decode(file_get_contents("php://input"), true);

            if ($this->model->addAgency($data)) {
                http_response_code(200);
                echo json_encode(['message' => 'Agency added successfully']);
            } else {
                http_response_code(500);
                echo json_encode(['message' => 'Failed to add Agency']);
            }           
        }

        public function editAgency(){
            $data = json_decode(file_get_contents("php://input"), true);

            if ($this->model->editAgency($id, $data)) {
                echo json_encode(['message' => 'Agency edited successfully']);
            } else {
                http_response_code(500);
                echo json_encode(['message' => 'Failed to edit Agency']);
            }
        }

        public function deleteAgency($id){
            if ($this->model->deleteAgency($id)) {
                http_response_code(200);
                echo json_encode(['message' => 'Agency deleted successfully']);
            } else {
                http_response_code(500);
                echo json_encode(['message' => 'Failed to delete Agency']);
            }            
        }
    }
?>