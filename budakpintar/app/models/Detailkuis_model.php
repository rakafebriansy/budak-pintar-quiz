<?php

class Detailkuis_model {
    private $table = 'detail_kuis';
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function tambahDetailKuis($id_kuis,$ids_kumpulan_soal)
    {
        foreach($ids_kumpulan_soal as $id){
            $query = "INSERT INTO " . $this->table . " VALUES(:kumpulan_soal_id_kumpulan_soal,:kuis_id_kuis)";  
            $this->db->query($query);        
            $this->db->bind('kumpulan_soal_id_kumpulan_soal',$id);
            $this->db->bind('kuis_id_kuis',$id_kuis);
            $this->db->exec();
            
            if ($this->db->rowCount()<0){
                return 0;
            }
        }
        return 1;
    }
    public function getDetailkuisBy($kolom,$nilai)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE " . $kolom . "=:" . $kolom;
        $this->db->query($query);
        $this->db->bind($kolom,$nilai);
        return $this->db->resultSet();
    }
}

?>