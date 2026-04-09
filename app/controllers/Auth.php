<?php

class Auth extends Controller{

    public function login() {
        $data['page'] = 'Login';


        $this->view('templates/header', $data);
        $this->view('auth/login');
        $this->view('templates/footer');
    }

    public function prosesLogin() {
        $user = $this->model('Auth_model')->loginAction();

        if( $user ) {
            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['is_logged_in'] = true;
            $_SESSION['seed'] = rand(1, 100);

            session_write_close();

            header('Location: ' . BASEURL . 'Home/index');
            exit;
        } else {
            header('Location: ' . BASEURL . 'Auth/login');
            exit;
        }
    }

    public function regis() {
        $data['page'] = 'Regis';

        $this->view('templates/header', $data);
        $this->view('auth/regis');
        $this->view('templates/footer');
    }

    public function prosesRegis() {
        $this->model('Auth_model')->regisAction();
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: ' . BASEURL . 'Auth/login');
        exit;
    }

}