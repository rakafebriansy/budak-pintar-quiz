<?php

class Kuis_model {
    private $table = 'kumpulan_soal';
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    private function getBerdasarkan($table,$kolom,$nilai)
    {
        $query = "SELECT * FROM " . $table . " WHERE " . $kolom . "=:" . $kolom;

        $this->db->query($query);
        $this->db->bind($kolom,$nilai);

        return $this->db->single();
    }

    public function tambahSoal($data)
    {
        
    }
}

?>