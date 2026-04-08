<?php

class Upload_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCourses() {
        $sql = "SELECT * FROM courses";
        $this->db->query($sql);
        return $this->db->setResult();
    }

    public function tambahDataNote($data, $file_path) {
        $queryCourse = "SELECT course_id FROM courses WHERE course_name = :course_name";
        $this->db->query($queryCourse);
        $this->db->bind('course_name', $data['course_name']);
        $course = $this->db->single();

        // cek course jika ada ambil id coursenya jika belum insert course baru lalu ambil id nya
        if ($course) {
            $course_id = $course['course_id'];
        } else {
            $this->db->query("INSERT INTO courses (course_name) VALUES (:name)");
            $this->db->bind('name', $data['course_name']);
            $this->db->execute();
            $course_id = $this->db->lastInsertId();
        }

        $query = "INSERT INTO notes (user_id, course_id, title, description, file_path, tags) 
                VALUES (:user_id, :course_id, :title, :description, :file_path, :tags)";
        
        $tmpUserId = '1'; //user id sementara nanti ganti

        $this->db->query($query);
        $this->db->bind('user_id', $tmpUserId); // sementara nanti ganti pake $_SESSION['user_id]
        $this->db->bind('course_id', $course_id);
        $this->db->bind('title', htmlspecialchars($data['title']));
        $this->db->bind('description', htmlspecialchars($data['description']));
        $this->db->bind('file_path', $file_path);
        $this->db->bind('tags', htmlspecialchars($data['tag']));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function uploadAction() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $file = $_FILES['file_catatan'];

            $ekstensiValid = ['pdf', 'jpg', 'png', 'jpeg'];
            $ekstensiFile = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if( !in_array($ekstensiFile, $ekstensiValid)) {
                echo "<script>alert('Format file tidak didukung!'); window.history.back();</script>";
                return false;
            }

            $maksFileSize = 10 * 1024 * 1024; //10MB
            if ( $file['size'] > $maksFileSize) {
                echo "<script>alert('Ukuran terlalu besar!'); window.history.back();</script>";
                return false;
            }

            $newFileName = uniqid() . '.' . $ekstensiFile;
            $destination = 'img/' . $newFileName; //nama file yang akan disimpan pada kolom filepath tabel notes

            if( move_uploaded_file($file['tmp_name'], $destination)) {
                if( $this->tambahDataNote($_POST, $destination) > 0) {
                    header('Location: ' . BASEURL . 'Home');
                    exit;
                }
            }
        }
    }
}