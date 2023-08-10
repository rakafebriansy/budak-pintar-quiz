<?php

class User_model {
    private $table = 'pengguna';
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }

    public function masukAkun($data){
        $query = "SELECT * FROM " . $this->table . " WHERE nama_pengguna=:nama_pengguna";
        $this->db->query($query);
        $this->db->bind('nama_pengguna',$data['nama_pengguna']);
        $db_data = $this->db->single();
        return $this->autentikasi($data,$db_data);
    }
    private function autentikasi($data,$db_data){
        if (strtolower(htmlspecialchars($data['nama_pengguna'])) == $db_data['nama_pengguna']){
            if (password_verify(htmlspecialchars($data['kata_sandi']),$db_data['kata_sandi'])){
                $_SESSION['id_pengguna'] = $db_data['id_pengguna'];
                $_SESSION['nama_pengguna'] = $db_data['nama_pengguna'];
                $_SESSION['kata_sandi'] = $db_data['kata_sandi'];
                $_SESSION['alamat_email'] = $db_data['alamat_email'];
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function daftarAkun($data){
        $asumsiNama = $this->cekNamaPengguna(htmlspecialchars($data['nama_pengguna']));
        if ($asumsiNama['nama_pengguna'] == $data['nama_pengguna']){
            return 0;
        } else {
            $query = "INSERT INTO " . $this->table . " VALUES('',:nama_pengguna,:kata_sandi,:alamat_email)";
            $this->db->query($query);

            $hashed_sandi = password_hash(htmlspecialchars($data['kata_sandi']),PASSWORD_DEFAULT);
        
            $this->db->bind('nama_pengguna',strtolower(htmlspecialchars($data['nama_pengguna'])));
            $this->db->bind('kata_sandi',$hashed_sandi);
            $this->db->bind('alamat_email',htmlspecialchars($data['alamat_email']));
            
            $this->db->exec();
    
            return $this->db->rowCount();
        }
    }
    private function cekNamaPengguna($nama_pengguna){
        $query = "SELECT nama_pengguna FROM " .$this->table . " WHERE nama_pengguna=:nama_pengguna";
        $this->db->query($query);
        $this->db->bind('nama_pengguna',$nama_pengguna);
        return $this->db->single();
    }

    public function ubahInformasiAkun($new_data){
        $query = "UPDATE " . $this->table . " SET nama_pengguna=:nama_pengguna, alamat_email=:alamat_email WHERE id_pengguna=:id_pengguna";
        $this->db->query($query);
        $this->db->bind('nama_pengguna',htmlspecialchars($new_data['nama_pengguna']));
        $this->db->bind('alamat_email',htmlspecialchars($new_data['alamat_email']));
        $this->db->bind('id_pengguna',$_SESSION['id_pengguna']);

        $this->db->exec();
        $rowsAffected = $this->db->rowCount();
        if ($rowsAffected > 0){
            $_SESSION['nama_pengguna'] = $new_data['nama_pengguna'];
            $_SESSION['alamat_email'] = $new_data['alamat_email'];
        }
        return $rowsAffected;
    }
    
    public function hapusAkun($id_pengguna){
        $query = "DELETE FROM " . $this->table . " WHERE id_pengguna=:id_pengguna";
        $this->db->query($query);
        $this->db->bind('id_pengguna',htmlspecialchars($id_pengguna));

        $this->db->exec();
        return $this->db->rowCount();
    }
}

?>