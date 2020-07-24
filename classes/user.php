<?php
    Class User {
        private $pdo;
        public $errorMessage = "";

        public function connect($name, $host, $user, $password) {
            try {
                $this->pdo = new PDO("mysql:dbname=" . $name . ";host=" . $host, $user, $password);
            }
            catch (PDOException $exception) {
                $errorMessage = $exception->getMessage();
            }
        }

        public function register($name, $phone, $email, $password) {
            $sql = $this->pdo->prepare("SELECT id FROM user WHERE email = :e");
            $sql->bindValue(":e", $email);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return false;
            }
            else {
                $sql = $this->pdo->prepare("INSERT INTO user (name, phone, email, password) VALUES (:n, :cp, :e, :p)");
                $sql->bindValue(":n", $name);
                $sql->bindValue(":cp", $phone);
                $sql->bindValue(":e", $email);
                $sql->bindValue(":p", md5($password));
                $sql->execute();

                return true;
            }
        }

        public function login($email, $password) {
            $sql = $this->pdo->prepare("SELECT id FROM user WHERE email = :e AND password = :p");
            $sql->bindValue(":e", $email);
            $sql->bindValue(":p", md5($password));
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch($key);

                session_start();
                $_SESSION["id"] = $data["id"];

                return true;
            }
            else {
                return false;
            }
        }
    }
?>