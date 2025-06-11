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
                $city = $_POST['city'] ?? null;

                if (!$city) {
                    echo "Aucune ville reçue";
                    return;
                }

                $success = $this->agencyModel->addAgency($city);
                if ($success) {
                    header("Location: /");
                    exit;
                } else {
                    echo "Error during adding agency";
                }               
            }     
        }

        public function editAgency($id){
            $data = json_decode(file_get_contents("php://input"), true);
             
            if ($this->agencyModel->editAgency($id, $data)) {
                echo json_encode(['message' => 'Agency edited successfully']);
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