<?php
    require_once '../models/user.php';

    class UserController{
        private User $model;

        public function __construct(City $model) {
            $this->model = $model;
        }

        public function getUsers(){
            $users = $this->model->getAllUser(); //appel du modèle
            header('Content-Type: application/json'); // HTTP response
            echo json_encode($users); //sending data to client
        }
    }
?>