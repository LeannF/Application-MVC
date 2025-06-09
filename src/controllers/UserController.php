<?php

    namespace App\Controllers;

    use App\Models\UserModel;
    use App\Config\Database;

    class UserController{
        private $userModel;

        public function __construct() {
            $pdo = Database::getInstance();
            $this->userModel = new UserModel($pdo);
        }

        public function getUsers(){
            $users = $this->userModel->getAllUser(); //appel du modèle
            header('Content-Type: application/json'); // HTTP response
            echo json_encode($users); //sending data to client
        }

        public function login(){
           if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';

                $user = $this->userModel->getUserByEmail($email);

                if ($user && password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user'] = [
                        'id' => $user['id_user'],
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];
                    header('Location: /');
                    switch ($user['role']) {
                        case 'admin':
                            require_once __DIR__ . '/../view/admin.php';
                            break;
                        case 'employee':
                            require_once __DIR__ . '/../view/employee.php';
                        break;
                        case 'guest':
                            require_once __DIR__ . '/../view/home.php';
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                    exit;
                } else {
                    $error = "Email ou mot de passe incorrect";
                    require_once __DIR__ . '/../view/home.php';
                }

            } else {
                require_once __DIR__ . '/../view/home.php';
            }          
        }

        public function logout(){
            session_start();
            $_SESSION = [];
            session_destroy();
            header('Location: /');
            exit;
        }
    }
?>