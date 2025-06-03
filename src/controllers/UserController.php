<?php

    namespace App\Controllers;
    use App\Models\UserModel;

    class UserController{
        private UserModel $model;

        public function __construct(UserModel $model) {
            $this->model = $model;
        }

        public function getUsers(){
            $users = $this->model->getAllUser(); //appel du modèle
            header('Content-Type: application/json'); // HTTP response
            echo json_encode($users); //sending data to client
        }
    }
?>