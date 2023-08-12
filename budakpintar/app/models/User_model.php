<?php

use PHPMailer\PHPMailer\PHPMailer;

class User_model {
    private $table = 'pengguna';
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    //PRIVATE
    private function getRandomString($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
    
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
    
        return $randomString;
    }
    private function getBerdasarkan($kolom,$nilai)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE " . $kolom . "=:" . $kolom;

        $this->db->query($query);
        $this->db->bind($kolom,$nilai);

        return $this->db->single();
    }
    private function cekBerdasarkan($kolom,$nilai)
    {
        $query = "SELECT " . $kolom . " FROM " . $this->table . " WHERE " . $kolom . "=:" . $kolom;

        $this->db->query($query);
        $this->db->bind($kolom,$nilai);
        $this->db->exec();

        return $this->db->rowCount();
    }
    private function autentikasiMasuk($data,$db_data)
    {
        $kata_sandi = stripslashes(htmlspecialchars($data['kata_sandi']));

        if (password_verify($kata_sandi,$db_data['kata_sandi'])){
            $_SESSION['id_pengguna'] = $db_data['id_pengguna'];
            $_SESSION['nama_pengguna'] = $db_data['nama_pengguna'];
            $_SESSION['alamat_email'] = $db_data['alamat_email'];
            $_SESSION['gambar'] = $db_data['gambar'];
            return 1;
        } else {
            return 0;
        }
    }
    private function pindahkanGambar($data,$old_data)
    {
        $nama_gambar = stripslashes(htmlspecialchars($data['name']));
        $ekstensi_gambar_valid = EKSTENSI_GAMBAR_VALID;
        $ekstensi_gambar = explode('.',$nama_gambar);
        $ekstensi_gambar = strtolower(end($ekstensi_gambar));

        //jika ekstensi gambar invalid
        if(!in_array($ekstensi_gambar,$ekstensi_gambar_valid)){
            return $old_data;
        }

        //jika ukuran > 5MB
        if($data['size'] > 5*MB){
            return $old_data;
            }
            
        $nama_baru = uniqid();
        $nama_baru.= '.';
        $nama_baru.= $ekstensi_gambar;
        move_uploaded_file($data['tmp_name'],'img/'.$nama_baru);
    
        return $nama_baru;
    }
    private function ubahLupaSandi($id)
    {
        //mengganti kata sandi dengan string random
        $kata_sandi_baru = $this->getRandomString(8);
        $query = "UPDATE " . $this->table . " SET kata_sandi=:kata_sandi WHERE id_pengguna=:id_pengguna";

        $this->db->query($query);
        $this->db->bind('kata_sandi',password_hash($kata_sandi_baru,PASSWORD_DEFAULT));
        $this->db->bind('id_pengguna',$id);
        $this->db->exec();
            
        return $kata_sandi_baru;
    }


    //PUBLIC
    public function masukAkun($data)
    {
        $nama_pengguna = strtolower(stripslashes(htmlspecialchars($data['nama_pengguna'])));
        $query = "SELECT * FROM " . $this->table . " WHERE nama_pengguna=:nama_pengguna";

        $this->db->query($query);
        $this->db->bind('nama_pengguna',$nama_pengguna);
        
        $db_data = $this->db->single();

        if(!$db_data){
            return -1;
        }

        return $this->autentikasiMasuk($data,$db_data);
    }
    public function daftarAkun($new_data)
    {
        $nama_pengguna = strtolower(stripslashes(htmlspecialchars($new_data['nama_pengguna'])));
        $db_data = $this->getBerdasarkan('nama_pengguna',$nama_pengguna);
        if ($db_data['nama_pengguna'] == strtolower($new_data['nama_pengguna'])){
            return -1;
        } else {
            $hashed_kata_sandi = password_hash(htmlspecialchars($new_data['kata_sandi']),PASSWORD_DEFAULT);
            $alamat_email = stripslashes(htmlspecialchars($new_data['alamat_email']));
            $query = "INSERT INTO " . $this->table . " VALUES('',:nama_pengguna,:kata_sandi,:alamat_email,'')";
            
            $this->db->query($query);        
            $this->db->bind('nama_pengguna',$nama_pengguna);
            $this->db->bind('kata_sandi',$hashed_kata_sandi);
            $this->db->bind('alamat_email',$alamat_email);
            $this->db->exec();
    
            return $this->db->rowCount();
        }
    }
    public function ubahInformasiAkun($new_data,$new_file)
    {
        //cek kosong
        if ($new_file['error'] == 0){
            $informasi_gambar = $this->pindahkanGambar($new_file,$new_data['gambar_default']);
        } else{
            $informasi_gambar = $new_data['gambar_default'];
        }

        //cek nama sama
        $db_data = $this->getBerdasarkan('nama_pengguna',strtolower($new_data['nama_pengguna']));
        if ($db_data !== false && $db_data['nama_pengguna'] != $_SESSION['nama_pengguna']){
                return -1;
            }

        //exec db
        $nama_pengguna =strtolower(stripslashes(htmlspecialchars($new_data['nama_pengguna'])));
        $alamat_email = stripslashes(htmlspecialchars($new_data['alamat_email']));
        $query = "UPDATE " . $this->table . " SET nama_pengguna=:nama_pengguna, alamat_email=:alamat_email, gambar=:gambar WHERE id_pengguna=:id_pengguna";
        
        $this->db->query($query);
        $this->db->bind('nama_pengguna',$nama_pengguna);
        $this->db->bind('alamat_email',$alamat_email);
        $this->db->bind('gambar',$informasi_gambar);
        $this->db->bind('id_pengguna',$_SESSION['id_pengguna']);
        $this->db->exec();
        $rowsAffected = $this->db->rowCount();

        //set session variable
        if ($rowsAffected > 0){
            $_SESSION['nama_pengguna'] = $new_data['nama_pengguna'];
            $_SESSION['alamat_email'] = $new_data['alamat_email'];
            if ($informasi_gambar != ''){
                $_SESSION['gambar'] = $informasi_gambar;
            }
        }

        return $rowsAffected;
    }    
    public function hapusAkun($id_pengguna)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_pengguna=:id_pengguna";

        $this->db->query($query);
        $this->db->bind('id_pengguna',$id_pengguna);
        $this->db->exec();

        return $this->db->rowCount();
    }

    public function ubahKataSandi($data)
    {
        $db_data = $this->getBerdasarkan('id_pengguna',$_SESSION['id_pengguna']);
        $kata_sandi_baru = password_hash($data['kata_sandi_baru'],PASSWORD_DEFAULT);

        if (password_verify($data['kata_sandi_lama'],$db_data['kata_sandi'])){
            if($data['kata_sandi_lama'] == $data['kata_sandi_baru']){
                return -1;
            }

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

    public function lupaKataSandi($data)
    {
        $db_data = $this->getBerdasarkan('nama_pengguna',strtolower($data['nama_pengguna']));

        if(!$db_data){
            return 0;
        } else {
            //prepare
            $kata_sandi_baru =  $this->ubahLupaSandi($db_data['id_pengguna']);
            $nama_penerima = strtoupper($db_data['nama_pengguna']);
            $email_penerima = $db_data['alamat_email'];
            $subjek = 'Informasi perubahan kata sandi Budak Pintar';
            $pesan = "Halo " . $nama_penerima . ", kamu telah melupakan kata sandi-mu dan kata sandi-mu telah kami perbarui menjadi "  . $kata_sandi_baru . ". Segera masuk dan ubah kata sandi anda untuk keamanan akun anda."
            . PHP_EOL . "Jangan lupa dengan kata sandi-mu!"
            . PHP_EOL . PHP_EOL . "Salam hangat, sobat Pintar.";

            //membuat instance
            $mail = new PHPMailer(true);

            //server settings
            // $mail->SMTPDebug = 2; //debugging
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; //web address
            $mail->SMTPAuth = true;
            $mail->Username = 'budakpintar5@gmail.com';
            $mail->Password = 'bvhbfwlzzqeyqytv';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587; //web port

            //set pengiriman
            $mail->setFrom('budakpintar5@gmail.com','Admin Budak Pintar');
            $mail->addAddress($email_penerima,'Bapak ' . $nama_penerima);
            $mail->isHTML(true);
            $mail->Subject = $subjek;
            $mail->Body = $pesan;

            //pengiriman
            $report =$mail->send();
            if($report){
                // echo '<script> window.replace.href="http://localhost/budakpintar/public/";</script>';
                return 1;
            } else {
                // echo '<script> window.replace.href="http://localhost/budakpintar/public/";</script>';
                return 0;
            }

        }
    }
}
?>