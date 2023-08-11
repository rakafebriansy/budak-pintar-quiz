<?php

class User_model {
    private $table = 'pengguna';
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    //PRIVATE
    private function cekBerdasarkan($kolom,$nilai){
        $query = "SELECT * FROM " . $this->table . " WHERE " . $kolom . "=:" . $kolom;
        $this->db->query($query);
        $this->db->bind($kolom,$nilai);
        return $this->db->single();
    }
    private function autentikasi($data,$db_data){
        if (strtolower(htmlspecialchars($data['nama_pengguna'])) == $db_data['nama_pengguna']){
            if (password_verify(htmlspecialchars($data['kata_sandi']),$db_data['kata_sandi'])){
                $_SESSION['id_pengguna'] = $db_data['id_pengguna'];
                $_SESSION['nama_pengguna'] = $db_data['nama_pengguna'];
                $_SESSION['alamat_email'] = $db_data['alamat_email'];
                $_SESSION['gambar'] = $db_data['gambar'];
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    private function pindahkanGambar($data,$old_data){
        $ekstensi_gambar_valid = EKSTENSI_GAMBAR_VALID;

        $ekstensi_gambar = explode('.',htmlspecialchars($data['nama_gambar']));
        $ekstensi_gambar = strtolower(end($ekstensi_gambar));
        if(!in_array($ekstensi_gambar,$ekstensi_gambar_valid)){
            return $old_data;
        }
        if($data['ukuran_gambar'] > 5*MB){
            return $old_data;
            }
        $nama_baru = uniqid();
        $nama_baru.= '.';
        $nama_baru.= $ekstensi_gambar;
        move_uploaded_file($data['temporary'],'img/'.$nama_baru);
    
        return $nama_baru;
    }


    //PUBLIC
    public function masukAkun($data){
        $query = "SELECT * FROM " . $this->table . " WHERE nama_pengguna=:nama_pengguna";
        $this->db->query($query);
        $this->db->bind('nama_pengguna',$data['nama_pengguna']);
        $db_data = $this->db->single();
        return $this->autentikasi($data,$db_data);
    }


    public function daftarAkun($new_data){
        $db_data = $this->cekBerdasarkan('nama_pengguna',htmlspecialchars($new_data['nama_pengguna']));
        if ($db_data['nama_pengguna'] == $new_data['nama_pengguna']){
            return 0;
        } else {
            $query = "INSERT INTO " . $this->table . " VALUES('',:nama_pengguna,:kata_sandi,:alamat_email,'')";
            $this->db->query($query);

            $hashed_sandi = password_hash(htmlspecialchars($new_data['kata_sandi']),PASSWORD_DEFAULT);
        
            $this->db->bind('nama_pengguna',strtolower(htmlspecialchars($new_data['nama_pengguna'])));
            $this->db->bind('kata_sandi',$hashed_sandi);
            $this->db->bind('alamat_email',htmlspecialchars($new_data['alamat_email']));
            
            $this->db->exec();
    
            return $this->db->rowCount();
        }
    }
    public function ubahInformasiAkun($new_data,$new_file){
        //cek kosong
        if ($new_file['kode_eror'] == 0){
            $informasi_gambar = $this->pindahkanGambar($new_file,$new_data['gambar_default']);
        } else{
            $informasi_gambar = $new_data['gambar_default'];
        }

        //cek nama sama
        $db_data = $this->cekBerdasarkan('nama_pengguna',$new_data['nama_pengguna']);
        if ($db_data !== false && $db_data['nama_pengguna'] != $_SESSION['nama_pengguna']){
                return 0;
            }

        //exec db
        $query = "UPDATE " . $this->table . " SET nama_pengguna=:nama_pengguna, alamat_email=:alamat_email, gambar=:gambar WHERE id_pengguna=:id_pengguna";
        $this->db->query($query);
        $this->db->bind('nama_pengguna',htmlspecialchars($new_data['nama_pengguna']));
        $this->db->bind('alamat_email',htmlspecialchars($new_data['alamat_email']));
        $this->db->bind('gambar',$informasi_gambar);
        $this->db->bind('id_pengguna',$_SESSION['id_pengguna']);

        $this->db->exec();
        $rowsAffected = $this->db->rowCount();

        //set session var
        if ($rowsAffected > 0){
            $_SESSION['nama_pengguna'] = $new_data['nama_pengguna'];
            $_SESSION['alamat_email'] = $new_data['alamat_email'];
            if ($informasi_gambar != ''){
                $_SESSION['gambar'] = $informasi_gambar;
            }
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

    public function ubahKataSandi($data){
        $db_data = $this->cekBerdasarkan('id_pengguna',$_SESSION['id_pengguna']);
        $kata_sandi_baru = password_hash($data['kata_sandi_baru'],PASSWORD_DEFAULT);
        if (password_verify($data['kata_sandi_lama'],$db_data['kata_sandi'])){
            $query = "UPDATE " . $this->table . " SET kata_sandi=:kata_sandi WHERE id_pengguna=:id_pengguna";
            $this->db->query($query);
            $this->db->bind('kata_sandi',$kata_sandi_baru);
            $this->db->bind('id_pengguna',$_SESSION['id_pengguna']);
    
            $this->db->exec();
            return $this->db->rowCount();
        } else {
            return 0;
        }
    }
}

?>