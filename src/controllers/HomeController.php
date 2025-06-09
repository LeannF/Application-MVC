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
            $userType = $_SESSION['user']['role'] ?? 'guest';
          
            $rModel = new RideModel($pdo);
            $rides = $rModel->getRidesWithAgencyName();

            $id = $_GET['id'] ?? null;
            if ($id) {
                $oneRide = $rModel->getOneRide((int)$id);
            }
            $role = $_SESSION['role'] ?? 'guest';
            
            if ($role === 'admin') {
                require_once __DIR__ . '/../view/admin.php';
            } 
        }
    }
?>