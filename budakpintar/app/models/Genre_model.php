<?php

class Genre_model {
    private $table = 'genre';
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getGenreAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function getGenreBy($kolom,$nilai)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE " . $kolom . "=:" . $kolom;

        $this->db->query($query);
        $this->db->bind($kolom,$nilai);

        return $this->db->single();
    }
}

?>