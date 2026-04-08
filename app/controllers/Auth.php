<?php

class Auth extends Controller{
    public function login() {
        $data['judul_halaman'] = 'Login';

        $this->view('templates/header', $data);
        $this->view('auth/login');
        $this->view('templates/footer');
    }

    public function regis() {

    }
}