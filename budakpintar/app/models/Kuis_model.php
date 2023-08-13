<?php

class Kuis_model {
    private $table = 'kuis';
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

    public function tambahKuis($nama_kuis,$nama_genre)
    {
        $db_genre = $this->getBerdasarkan('genre','nama_genre',$nama_genre);
        $id_genre = $db_genre['id_genre'];
        $id_pengguna = $_SESSION['id_pengguna'];


        $query = "INSERT INTO " . $this->table . " VALUES('',:pengguna_id_pengguna,:genre_id_genre)";
        $this->db->query($query);        
        $this->db->bind('pengguna_id_pengguna',$id_pengguna);
        $this->db->bind('genre_id_genre',$id_genre);
        $this->db->bind('nama_kuis',$nama_kuis);
        $this->db->exec();

        if ($this->db->rowCount()>0){
            $query = "SELECT * FROM " . $this->table . " WHERE nama_kuis=:nama_kuis AND pengguna_id_pengguna=:pengguna_id_pengguna";
            $this->db->query($query);
            $this->db->bind('nama_kuis',$nama_kuis);
            $this->db->bind('nama_kuis',$id_pengguna);
            $db_kuis = $this->db->single();
            return $db_kuis['id_kuis'];
        } else {
            return 0;
        }

        return ;
    }
}

?>