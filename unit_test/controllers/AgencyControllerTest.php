<?php

    use PHPUnit\Framework\TestCase;
    use App\Controllers\AgencyController;
    use App\Models\AgencyModel;

    class AgencyControllerTest extends TestCase {
        public function testGetAgencies(){
            /** create fake model */
            $mockModel = $this->createMock(AgencyModel::class);
            $mockModel->method('getAllAgency')->willReturn([
                [
                    'id_agency' => 1, 'city' => "Paris"
                ],
                [
                    'id_agency' => 2, 'city' => "Lyon"
                ],
                [
                    'id_agency' => 3, 'city' => "Reims"
                ],
                [
                    'id_agency' => 4, 'city' => "Bordeaux"
                ],
                [
                    'id_agency' => 5, 'city' => "Lille"
                ],
            ]);

            $controller = new AgencyController($mockModel);

            /** catch the exit */
            ob_start(); /** start to save echo */
            $controller->getAgencies();
            $output = ob_get_clean(); /** pickup and clean the exit*/

            $expectedJson = json_encode([
                [
                    'id_agency' => 1, 'city' => "Paris"
                ],
                [
                    'id_agency' => 2, 'city' => "Lyon"
                ],
                [
                    'id_agency' => 3, 'city' => "Reims"
                ],
                [
                    'id_agency' => 4, 'city' => "Bordeaux"
                ],
                [
                    'id_agency' => 5, 'city' => "Lille"
                ],
            ]);
            $this->assertEquals($expectedJson, $output);
        }
    }
?>