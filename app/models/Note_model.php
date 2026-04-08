<?php

class Note_model {
    private $table = 'notes';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllNote () {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY RAND(123)');
        return $this->db->setResult();
    }

    public function getNote($id) {
    $query = "SELECT notes.*, users.username, courses.course_name 
              FROM notes
              JOIN users ON notes.user_id = users.user_id
              JOIN courses ON notes.course_id = courses.course_id
              WHERE notes.id = :id";
              
        $this->db->query($query);
        $this->db->bind('id', $id); 
        return $this->db->single(); 
    }
}