<?php

class Kuis_model {
    private $table = 'kuis';
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getKuisAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $this->db->query($query);   
        return $this->db->resultSet();
    }

    public function tambahKuis($nama_kuis,$deskripsi_kuis,$id_genre)
    {
        $id_pengguna = $_SESSION['id_pengguna'];
        
        $query = "INSERT INTO " . $this->table . " VALUES('',:pengguna_id_pengguna,:genre_id_genre,:nama_kuis,:deskripsi_kuis)";  
        $this->db->query($query);   
        $this->db->bind('pengguna_id_pengguna',$id_pengguna);
        $this->db->bind('genre_id_genre',$id_genre);
        $this->db->bind('nama_kuis',$nama_kuis);
        $this->db->bind('deskripsi_kuis',$deskripsi_kuis);
        $this->db->exec();
        
        $this->db->query("SELECT MAX(id_kuis) FROM " . $this->table);
        return $this->db->single()['MAX(id_kuis)'];
    }
}

?>