<?php

    namespace App\Controllers;
    use App\Config\Database;
    use App\Models\AgencyModel;

    /**
     * controller for the agency's table
     * 
     * functions to see, add, edit and delete from the table 
    */
    class AgencyController{
        private AgencyModel $model;

        public function __construct(AgencyModel $model) {
            $pdo = Database::getInstance();
            $this->model = new AgencyModel($pdo);
        }

        public function getAgencies(){

            /** call the model */
            $agencies = $this->model->getAllAgency(); 

            /** HTTP response */
            header('Content-Type: application/json'); 

            /** sendind data to the client */
            echo json_encode($agencies);
        }

        public function addAgency(){

            /** stock data send by the client in HTPP resquest*/
            $data = json_decode(file_get_contents("php://input"), true);

            if ($this->model->addAgency($data)) {
                http_response_code(200);
                echo json_encode(['message' => 'Agency added successfully']);
            } else {
                http_response_code(500);
                echo json_encode(['message' => 'Failed to add Agency']);
            }           
        }

        public function editAgency($id){
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