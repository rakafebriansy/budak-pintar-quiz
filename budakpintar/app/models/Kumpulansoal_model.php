<?php

class Kumpulansoal_model
{
    private $table = 'kumpulan_soal';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    private function tambahGambar($data,$i)
    {
        $nama_gambar = stripslashes(htmlspecialchars($data['name'][$i]));
        $ekstensi_gambar_valid = EKSTENSI_GAMBAR_VALID;
        $ekstensi_gambar = explode('.',$nama_gambar);
        $ekstensi_gambar = strtolower(end($ekstensi_gambar));

        //jika ekstensi gambar invalid
        if(!in_array($ekstensi_gambar,$ekstensi_gambar_valid)){
            return 0;
        }

        //jika ukuran > 5MB
        if($data['size'][$i] > 5*MB){
            return 0;
            }
            
        $nama_baru = uniqid();
        $nama_baru.= '.';
        $nama_baru.= $ekstensi_gambar;
        move_uploaded_file($data['tmp_name'][$i],'img/soal/'.$nama_baru);
    
        return $nama_baru;
    }

    public function getKumpulanSoalBy($kolom, $kumpulan_nilai)
    {
        $kumpulan_soal = [];
        foreach ($kumpulan_nilai as $nilai) {
            $query = "SELECT * FROM " . $this->table . " WHERE " . $kolom . "=:" . $kolom;
            $this->db->query($query);
            $this->db->bind($kolom, $nilai['kumpulan_soal_id_kumpulan_soal']);
            array_push($kumpulan_soal, $this->db->single());
        }
        return $kumpulan_soal;
    }
    public function tambahSoal($soal,$gambar)
    {
        $ids_kumpulan_soal = [];
        foreach ($soal as $i=>$s) {
            $tipe_soal = $s['tipe_soal'];
            $opsi_benar = '';
            if ($tipe_soal == 'multiple') {
                if (isset($s['jawaban_a'])) {
                    $opsi_benar = $opsi_benar . 'a';
                }
                if (isset($s['jawaban_b'])) {
                    $opsi_benar = $opsi_benar . 'b';
                }
                if (isset($s['jawaban_c'])) {
                    $opsi_benar = $opsi_benar . 'c';
                }
                if (isset($s['jawaban_d'])) {
                    $opsi_benar = $opsi_benar . 'd';
                }
            } else if ($tipe_soal == 'single') {

                $opsi_benar = $opsi_benar . $s['jawaban'];
            }

            if($gambar['size'][$i]>0){
                $nama_gambar = $this->tambahGambar($gambar,$i);
            } else{
                $nama_gambar = '';
            }

            $query = "INSERT INTO " . $this->table . " VALUES('',:pertanyaan,:tipe_soal,:gambar_pendukung,:opsi_a,:opsi_b,:opsi_c,:opsi_d,:opsi_benar)";
            $this->db->query($query);
            $this->db->bind('pertanyaan', trim(strtolower(stripslashes(htmlspecialchars($s['pertanyaan'])))));
            $this->db->bind('tipe_soal', $tipe_soal);
            $this->db->bind('gambar_pendukung', $nama_gambar);
            $this->db->bind('opsi_a', trim(strtolower(stripslashes(htmlspecialchars($s['opsi_a'])))));
            $this->db->bind('opsi_b', trim(strtolower(stripslashes(htmlspecialchars($s['opsi_b'])))));
            $this->db->bind('opsi_c', trim(strtolower(stripslashes(htmlspecialchars($s['opsi_c'])))));
            $this->db->bind('opsi_d', trim(strtolower(stripslashes(htmlspecialchars($s['opsi_d'])))));
            $this->db->bind('opsi_benar', $opsi_benar);
            $this->db->exec();

            $this->db->query("SELECT MAX(id_kumpulan_soal) FROM " . $this->table);
            array_push($ids_kumpulan_soal, $this->db->single()['MAX(id_kumpulan_soal)']);
        }
        return $ids_kumpulan_soal;
    }
}
