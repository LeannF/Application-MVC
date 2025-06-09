<?php

    use App\Config\Database;
    use PHPUnit\Framework\TestCase;
    use App\Models\AgencyModel;

    class AgencyModelTest extends TestCase {
        private $agencyModel;
        private $db;

        protected function setUp(): void {
            parent::setUp();
            $this->db = Database::getInstance();
            
            $this->agencyModel = new AgencyModel($this->db);
            $stmt = $this->db->prepare("DELETE FROM agency WHERE id_agency > 12");
            $stmt->execute();
        }

        public function testAddAgency() {   
            $data = ['city' => "Po"];
            $result = $this->agencyModel->addAgency($data);
            $this->assertTrue($result);
        }

        public function testEditAgency() {
            $data = [
                'id_agency' => 20, 
                'city' => "Po"
            ];
            $this->agencyModel->addAgency($data);

            $id = $this->db->lastInsertId();

            $newData = [
                'id_agency' => $id, 
                'city' => "Pau"
            ];
            $result = $this->agencyModel->editAgency((int)$id, $newData);
            $this->assertTrue($result);
        }

        public function testDeleteAgency() {
            $data = [
                'id_agency' => 20,
                'city' => "Pau"
            ];
            $this->agencyModel->addAgency($data);

            $id = $this->db->lastInsertId();

            $result = $this->agencyModel->deleteAgency((int)$id);
            $this->assertTrue($result);
        }
    }
?>