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

        public function getUsersById(){
            header('Content-Type: application/json');

            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

            if ($id <= 0) {
                http_response_code(400);
                echo json_encode(['error' => 'ID utilisateur invalide']);
                exit;
            }

            $user = $this->userModel->getUserById($id);
            if ($user) {
                echo json_encode($user);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Utilisateur non trouvé']);
            }
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