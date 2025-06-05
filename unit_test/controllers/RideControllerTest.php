<?php

    use PHPUnit\Framework\TestCase;
    use App\Controllers\RideController;
    use App\Models\RideModel;

    class RideControllerTest extends TestCase {
        public function testGetRides(){
            /** create fake model */
            $mockModel = $this->createMock(RideModel::class);
            $mockModel->method('getAllRide')->willReturn([
                [
                    'id_ride' => 1, 
                    'id_agency_departure' => 1, 
                    'id_agency_arrival' => 2, 
                    'departure_time' => '2025-06-04', 
                    'arrival_time' => '2025-06-04', 
                    'available_seat' => 2, 
                    'contact' => '0722334455'
                ],
                [
                    'id_ride' => 2, 
                    'id_agency_departure' => 3, 
                    'id_agency_arrival' => 4, 
                    'departure_time' => '2025-06-04', 
                    'arrival_time' => '2025-06-04', 
                    'available_seat' => 4, 
                    'contact' => '0688665544'
                ]
            ]);

            $controller = new RideController($mockModel);

            /** catch the exit */
            ob_start(); /** start to save echo */
            $controller->getRides();
            $output = ob_get_clean(); /** pickup and clean the exit*/

            $expectedJson = json_encode([
                [
                    'id_ride' => 1, 
                    'id_agency_departure' => 1, 
                    'id_agency_arrival' => 2, 
                    'departure_time' => '2025-06-04', 
                    'arrival_time' => '2025-06-04', 
                    'available_seat' => 2, 
                    'contact' => '0722334455'
                ],
                [
                    'id_ride' => 2, 
                    'id_agency_departure' => 3, 
                    'id_agency_arrival' => 4, 
                    'departure_time' => '2025-06-04', 
                    'arrival_time' => '2025-06-04', 
                    'available_seat' => 4, 
                    'contact' => '0688665544'
                ]
            ]);
            $this->assertEquals($expectedJson, $output);
        }
    }
?>