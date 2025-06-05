<?php

    use PHPUnit\Framework\TestCase;
    use App\Controllers\UserController;
    use App\Models\UserModel;
    

    class UserControllerTest extends TestCase {
        public function testGetUsers(){
            /** create fake model */
            $mockModel = $this->createMock(UserModel::class);
            $mockModel->method('getAllUser')->willReturn([
                [
                    'id_user' => 1, 
                    'firstname' => 'Martin', 
                    'lastname' => 'Alexandre', 
                    'phonenumber' => '0612345678', 
                    'email' => 'alexandre.martin@email.fr', 
                    'role' => "employee", 
                    'id_ride' => 1
                ],
                [
                    'id_user' => 2, 
                    'firstname' => 'Jon', 
                    'lastname' => 'Snow', 
                    'phonenumber' => '0612393678', 
                    'email' => 'snow.jon@email.fr', 
                    'role' => "employee", 
                    'id_ride' => 2
                ],
                [
                    'id_user' => 3, 
                    'firstname' => 'Robb', 
                    'lastname' => 'Stark', 
                    'phonenumber' => '0612381043', 
                    'email' => 'stark.robb@email.fr', 
                    'role' => "employee", 
                    'id_ride' => 3
                ]  
            ]);

            $controller = new UserController($mockModel);

            /** catch the exit */
            ob_start(); /** start to save echo */
            $controller->getUsers();
            $output = ob_get_clean(); /** pickup and clean the exit*/

            $expectedJson = json_encode([
                [
                    'id_user' => 1, 
                    'firstname' => 'Martin', 
                    'lastname' => 'Alexandre', 
                    'phonenumber' => '0612345678', 
                    'email' => 'alexandre.martin@email.fr', 
                    'role' => "employee", 
                    'id_ride' => 1
                ],
                [
                    'id_user' => 2, 
                    'firstname' => 'Jon', 
                    'lastname' => 'Snow', 
                    'phonenumber' => '0612393678', 
                    'email' => 'snow.jon@email.fr', 
                    'role' => "employee", 
                    'id_ride' => 2
                ],
                [
                    'id_user' => 3, 
                    'firstname' => 'Robb', 
                    'lastname' => 'Stark', 
                    'phonenumber' => '0612381043', 
                    'email' => 'stark.robb@email.fr', 
                    'role' => "employee", 
                    'id_ride' => 3
                ]                
            ]);
            $this->assertEquals($expectedJson, $output);
        }
    }
?>