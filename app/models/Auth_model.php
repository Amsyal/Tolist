<?php

class Auth_model {
    private $table = 'users';
    private $db;
    
    public function __construct() {
        $this->db = new Database;
        
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * FROM " . $this->table . " WHERE username = :username" ;

        $this->db->query($sql);
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function loginAction() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $pass = $_POST['password'];

            $user = $this->getUserByUsername($username);

            if($user) {
                if($pass == $user['password']) {
                    return $user;
                }
            }
        }
        return false;
    }

    public function regisAction() {
        if( $_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $pass = $_POST['password'];
            $confirm_pass = $_POST['confirm_password'];

            $user = $this->getUserByUsername($username);

            if( $pass == $confirm_pass && !$user ) {
                $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

                $this->db->query($sql);
                $this->db->bind('username', $username);
                $this->db->bind('password', $pass);
                $this->db->execute();

                header('Location: ' . BASEURL . 'Auth/login');
            } else {
                echo "<script>
                        alert('Registrasi Gagal, silakan coba lagi.');
                      </script>";
                      
                header('Location: ' . BASEURL . 'Auth/regis');
                
            }
        }
    }
}