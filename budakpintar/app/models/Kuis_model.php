<?php

class Kuis_model
{
    private $table = 'kuis';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
 
    public function getBanyakKuis($params){
        $query = "SELECT * FROM " . $this->table . " WHERE " . $params['kolom'] . " LIKE '%" . $params['nilai'] . "%'";
        $this->db->query($query);
        $this->db->exec();
        return $this->db->rowCount();
    }

    public function getKuisSet($params,$urut_berdasarkan,$data_awal = 0)
    {
        $jumlah_data = 3;
        $query = "SELECT * FROM " . $this->table . " WHERE " . $params['kolom'] . " LIKE '%" . $params['nilai'] . "%' ORDER BY nama_kuis " . $urut_berdasarkan . " LIMIT " . $data_awal . "," . $jumlah_data;

        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getKuisSingle($condition,$params = null)
    {
        if($condition == 'like'){
            $query = "SELECT * FROM " . $this->table . " WHERE " . $params['kolom'] . " LIKE '%" . $params['nilai'] . "%'";
        } else {
            $query = "SELECT * FROM " . $this->table . " WHERE " . $params['kolom'] . "=" . $params['nilai'];
        }
        $this->db->query($query);
        return $this->db->single();
    }

    public function tambahKuis($nama_kuis, $deskripsi_kuis, $id_genre)
    {
        $query = "INSERT INTO " . $this->table . " VALUES('',:genre_id_genre,:nama_kuis,:deskripsi_kuis)";
        $this->db->query($query);
        $this->db->bind('genre_id_genre', $id_genre);
        $this->db->bind('nama_kuis', trim(strtolower(stripslashes(htmlspecialchars($nama_kuis)))));
        $this->db->bind('deskripsi_kuis', trim(strtolower(stripslashes(htmlspecialchars($deskripsi_kuis)))));
        $this->db->exec();

        $this->db->query("SELECT MAX(id_kuis) FROM " . $this->table);
        return $this->db->single()['MAX(id_kuis)'];
    }
    public function penilaianKuis($kumpulan_jawaban, $kumpulan_soal)
    {
        $total_benar = 0;
        $jumlah_soal = sizeof($kumpulan_soal);
        foreach($kumpulan_jawaban as $key=>$jawaban) {
            $kunci_jawaban = $kumpulan_soal[$key]['opsi_benar'];
            switch (gettype($jawaban)) {
                case 'string':
                    if ($jawaban == $kunci_jawaban) {
                        $total_benar += 1;
                    }
                    break;
                case 'array':
                    $string = '';
                    foreach ($jawaban as $key => $status) {
                        $string = $string . $key;
                    }
                    if ($string == $kunci_jawaban) {
                        $total_benar += 1;
                    }
            }
        }
        $total_skor = round($total_benar / $jumlah_soal * 100);
        return $total_skor;
    }
}
