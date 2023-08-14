<?php

class Kumpulansoal_model {
    private $table = 'kumpulan_soal';
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function tambahSoal($soal)
    {
        $ids_kumpulan_soal = [];
        foreach($soal as $s){
            $tipe_soal = $s['tipe_soal'];
            $opsi_benar = '';
            if($tipe_soal == 'multiple'){
                if (isset($s['jawaban_a'])){
                    $opsi_benar = $opsi_benar . 'a';
                }
                if (isset($s['jawaban_b'])){
                    $opsi_benar = $opsi_benar . 'b';
                }
                if (isset($s['jawaban_c'])){
                    $opsi_benar = $opsi_benar . 'c';
                }
                if (isset($s['jawaban_d'])){
                    $opsi_benar = $opsi_benar . 'd';
                }
            } else if ($tipe_soal == 'single'){
                
                $opsi_benar = $opsi_benar . $s['jawaban'];
            }

            $query = "INSERT INTO " . $this->table . " VALUES('',:pertanyaan,:tipe_soal,:opsi_a,:opsi_b,:opsi_c,:opsi_d,:opsi_benar)";
            $this->db->query($query);
            $this->db->bind('pertanyaan',$s['pertanyaan']);
            $this->db->bind('tipe_soal',$tipe_soal);
            $this->db->bind('opsi_a',$s['opsi_a']);
            $this->db->bind('opsi_b',$s['opsi_b']);
            $this->db->bind('opsi_c',$s['opsi_c']);
            $this->db->bind('opsi_d',$s['opsi_d']);
            $this->db->bind('opsi_benar',$opsi_benar);
            $this->db->exec();

            $this->db->query("SELECT MAX(id_kumpulan_soal) FROM " . $this->table);
            array_push($ids_kumpulan_soal,$this->db->single()['MAX(id_kumpulan_soal)']);
        }
        return $ids_kumpulan_soal;
    }
}

?>