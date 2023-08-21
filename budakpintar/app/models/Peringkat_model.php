<?php

class Peringkat_model extends Controller
{
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

    public function getSkor($id_kuis)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE kuis_id_kuis=" . $id_kuis;
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function tambahSkor($id_kuis, $total_skor)
    {
        $db_peringkat = $this->cekPenggunaKuis($id_kuis);
        if ($db_peringkat > 0) {
            if ($db_peringkat['total_skor'] < $total_skor) {
                $query = "UPDATE " . $this->table . " SET total_skor=" . $total_skor . " WHERE pengguna_id_pengguna=" . $_SESSION['id_pengguna'] . " AND kuis_id_kuis=" . $id_kuis;
                $this->db->query($query);
                $this->db->exec();
                return $this->db->rowCount();
            } else {
                return 1;
            }
        } else {
            $query = "INSERT INTO "  . $this->table . " VALUES(" . $_SESSION['id_pengguna'] . "," . $id_kuis . "," . $total_skor . ")";
            $this->db->query($query);
            $this->db->exec();
            return $this->db->rowCount();
        }
    }
}
