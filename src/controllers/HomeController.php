<?php
    namespace App\Controllers;

    use App\Models\UserModel;
    use App\Models\RideModel;
    use App\Models\AgencyModel;
    use App\Config\Database;

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

            switch ($role) {
                case 'admin':
                    $view = __DIR__ . '/../view/pages/admin.php';
                break;
                case 'employee':
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