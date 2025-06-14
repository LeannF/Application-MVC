<?php
    namespace App\Controllers;

    use App\Models\UserModel;
    use App\Models\RideModel;
    use App\Models\AgencyModel;
    use App\Config\Database;
    use App\helper\Flash;

    class HomeController{
        public function index(){           
            $pdo = Database::getInstance();
            $aModel = new AgencyModel($pdo);
            $agencies = $aModel->getAllAgency();

            $uModel = new UserModel($pdo);
            $users = $uModel->getAllUser();
            $role = $_SESSION['user']['role'] ?? 'guest';

            $rModel = new RideModel($pdo);
            $rides = $rModel->getRidesByAvailableSeats();
            $adminRide = $rModel->getAllRide();     

            if (!isset($rides)) {
                $rides = [];
            }

            $id = $_GET['id'] ?? null;
            if ($id) {
                $oneRide = $rModel->getOneRide((int)$id);
            }
            $ridesWithUsers = [];

            /** switch the view foreach role */
            switch ($role) {
                case 'admin':
                    $view = __DIR__ . '/../view/pages/admin.php';
                break;

                case 'employee':

                    /** get users' id foreach ride */
                    foreach ($rides as $ride) {    
                        $userRide = $uModel->getUserById($ride['id_user']);
                        $ridesWithUsers[] = [ /** stock each ride with its user in an array*/
                            'ride' => $ride,
                            'user' => $userRide
                        ];
                    }
                    $view = __DIR__ . '/../view//pages/employee.php';
                break;

                default :
                    $view = __DIR__ . '/../view//pages/guest.php';
                break;
            }
            require_once __DIR__ . '/../view/layout.php';
        }
    }
?>