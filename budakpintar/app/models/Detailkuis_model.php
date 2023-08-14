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
            $query = "INSERT INTO " . $this->table . " VALUES(:kuis_id_kuis,:kumpulan_soal_id_kumpulan_soal)";  
            $this->db->query($query);        
            $this->db->bind('kuis_id_kuis',$id_kuis);
            $this->db->bind('kumpulan_soal_id_kumpulan_soal',$id);
            $this->db->exec();
            
            if ($this->db->rowCount()<0){
                return 0;
            }
        }
        return 1;
    }
}

?>