<?php

class Upload extends Controller {
    public function index() {
        $data['page'] = 'upload';
        $data['courses'] = $this->model('Upload_model')->getCourses();

        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('templates/sidebar');
        $this->view('upload/index', $data);
        $this->view('templates/footer');

    }

    public function prosesUpload() {
        $this->model('Upload_model')->uploadAction();
    }
}