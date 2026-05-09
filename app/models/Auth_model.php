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

            if($user && password_verify($pass, $user['password'])) {
                    return $user;
            }
        }
        return false;
    }

    public function regisAction() {
        if( $_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $confirm_pass = $_POST['confirm_password'];

            $user = $this->getUserByUsername($username);
            $pesan = '';

            if( empty($username) || empty($email) || empty($pass)) {
                $pesan = "Semua kolom wajib diisi!";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $pesan = "Format email tidak sah";
            } elseif ( strlen($pass) < 8 ) {
                $pesan = "Password minimal 8 karakter";
            } else {
                if( !($pass == $confirm_pass && !$user) ) {
                    $pesan = "Username atau Email sudah digunakan";
                } else {
                    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";

                    $this->db->query($sql);
                    $this->db->bind('username', $username);
                    $this->db->bind('email', $email);
                    $this->db->bind('password', $hashed_pass);
                    $this->db->execute();

                    header('Location: ' . BASEURL . '/Auth/login');
                }
            }
        }
    }
}