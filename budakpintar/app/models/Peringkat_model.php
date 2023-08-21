<?php

class Peringkat_model extends Controller {
    private $table = 'peringkat';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    private function cekPenggunaKuis($id_kuis)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE pengguna_id_pengguna=" . $_SESSION['id_pengguna'] . " AND kuis_id_kuis=" . $id_kuis;
        $this->db->query($query);
        $this->db->exec();
        return $this->db->rowCount();
    }

    public function tambahSkor($id_kuis,$total_skor)
    {
        if($this->cekPenggunaKuis($id_kuis)>0){
            $query = "UPDATE " . $this->table . " SET pengguna_id_pengguna=" . $_SESSION['id_pengguna'] .",kuis_id_kuis=" . $id_kuis . ",total_skor=" . $total_skor;
            $this->db->query($query);
            $this->db->exec();
            return $this->db->rowCount();
        } else {
            $query = "INSERT INTO "  . $this->table . " VALUES(" . $_SESSION['id_pengguna'] . "," . $id_kuis . "," . $total_skor . ")";
            $this->db->query($query);
            $this->db->exec();
            return $this->db->rowCount();
        }
    }
}

?>