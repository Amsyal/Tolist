<?php

class Home extends Controller {

    public function index() {
        $data['notes'] = $this->model('Note_model')->getAllNote();
        $data['page'] = "Home";

        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('templates/sidebar');
        $this->view('home/index', $data);
        $this->view('templates/footer');

    }

    public function detailNote($id) {
        $data['note'] = $this->model('Note_model')->getNote($id);
        $data['page'] = 'detail';

        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('templates/sidebar');
        $this->view('home/detail', $data);
        $this->view('templates/footer');
    }
}