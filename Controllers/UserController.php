<?php
    require './Models/User.php';
    session_start();

    class UserController {
        public int $id;
        public string $name;
        public string $email;
        public string $password;
        private object $userModel;

        public function __construct() {
            $this->userModel = new User();
        }

        public function login() {
            $email = $this->email;
            $password = $this->password;
            $userByEmail = $this->userModel->findByEmail($email);
            $passwordVerify = $this->verifyPassword($password,$userByEmail->password);
            $userFound = $this->userModel->findUser($email,$password);

            if(isset($userFound) && $passwordVerify) {
                $_SESSION['auth'] = true;
                $_SESSION['user_id'] = $userByEmail->id;
                header('Location: app.php');
            } else {
                $_SESSION['auth'] = false;
                header('Location: index.php?invalid_fields');
            }
        }

        public function register() {
            $email = $this->email;
            $password = $this->password;
            $name = $this->name;
            $passwordHash = password_hash($password,PASSWORD_DEFAULT);
            $userCreated = $this->userModel->insertUser($email,$passwordHash,$name);

            if($userCreated) {
                header('Location: index.php');
            } else {
                header('Location: signup.php?error');
            }
        }

        public function verifyPassword($password,$hash) {
            if(password_verify($password,$hash)) {
                return true;
            } else {
                return false;
            }
        }

        public function logout() {
            unset($_SESSION['auth']);
            header('Location: index.php');
        }


    }