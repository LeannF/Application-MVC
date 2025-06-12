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
        private $agencyModel;

        public function __construct() {
            $pdo = Database::getInstance();
            $this->agencyModel = new AgencyModel($pdo);
        }

        public function getAgencies(){

            /** call the model */
            $agencies = $this->agencyModel->getAllAgency(); 

            /** HTTP response */
            header('Content-Type: application/json'); 

            /** sendind data to the client */
            echo json_encode($agencies);
        }

        public function addAgency(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = ['city' => $_POST['city']];

                if (!$data) {
                    echo "Aucune ville reçue";
                    return;
                }

                $success = $this->agencyModel->addAgency($data);
                if ($success) {
                    header("Location: /");
                    exit;
                } else {
                    echo "Error during adding agency";
                }               
            }     
        }

        public function editAgency(){
            $id = $_POST['id_agency'] ?? null;
            $city = $_POST['city'] ?? null;

            if (!$id) {
                http_response_code(400);
                echo json_encode(['message' => 'Missing agency ID']);
                return;
            }

            $data = ['city' => $city];

             
            if ($this->agencyModel->editAgency($id, $data)) {
                header('Location: /');
            } else {
                http_response_code(500);
                echo json_encode(['message' => 'Failed to edit Agency']);
            }
        }

        public function deleteAgency(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_agency'])) {
                $id = (int) $_POST['id_agency'];
                $success = $this->agencyModel->deleteAgency($id);

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