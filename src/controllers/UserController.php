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
            $users = $this->userModel->getAllUser(); 
            header('Content-Type: application/json'); // HTTP response
            echo json_encode($users); //sending data to client
        }

        public function login() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';
                $user = $this->userModel->getUserByEmail($email);

                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['user'] = [
                        'id_user' => $user['id_user'],
                        'firstname' => $user['firstname'],
                        'lastname' => $user['lastname'],
                        'email' => $user['email'],
                        'role' => $user['role'],
                        'id_ride'  => $user['id_ride']
                    ];
                    header('Location: /');  /** Redirect to home page */
                    exit;
                } else {
                    // Gérer l’erreur (par exemple stocker un message dans $_SESSION ou autre)
                    $_SESSION['error'] = "Email ou mot de passe incorrect";
                    header('Location: /');  
                    exit;
                }
            }
        }

        public function logout(){
            $_SESSION = [];
            session_destroy();
            header('Location: /');
            exit;
        }
    }
?>