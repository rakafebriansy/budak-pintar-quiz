<?php

class Kuis_model
{
    private $table = 'kuis';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }


    public function getKuis($output,$order_by,$data_awal,$params = null)
    {
        $jumlah_data = 3;
        if (isset($params)){
            $query = "SELECT * FROM " . $this->table . " WHERE " . $params['kolom'] . " LIKE '%" . $params['nilai'] . "%' ORDER BY nama_kuis " . $order_by; //. " LIMIT " . $data_awal . "," . $jumlah_data;
        } else {
            $query = "SELECT * FROM " . $this->table . " ORDER BY nama_kuis " . $order_by;// . " LIMIT " . $data_awal . "," . $jumlah_data;
        }

        $this->db->query($query);
        if ($output == 'set'){
            return $this->db->resultSet();
        } else {
            return $this->db->single();
        }
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
