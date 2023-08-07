<?php

class Database{ //PHP Data Objects
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh, $stmt; //database handler, statement(db + query)
    
    public function __construct(){
        $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name; //Data Source Name

        $option = [ //Optimasi koneksi database
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try{
            $this->dbh = new PDO($dsn,$this->db_user,$this->db_pass,$option); //Mengakses database
        } catch(PDOException $error) { //Mengambil pesan error
            die($error->getMessage()); //Menampilkan pesan
        }
    }

    public function query($query){
        $this->stmt = $this->dbh->prepare($query); //Menyiapkan query
    }

    public function bind($param,$value,$type = null){
        if(is_null($type)){ //Mengecek nilai sebuah variabel null atau tidak
            switch(true){
                case is_int($value): //Mengecek nilai sebuah variabel integer atau tidak
                    $type = PDO::PARAM_INT; //Set tipe data query ke int
                    break;
                case is_bool($value): //Mengecek nilai sebuah variabel boolean atau tidak
                    $type = PDO::PARAM_BOOL; //Set tipe data query ke boolean
                    break;
                case is_null($value): //Mengecek nilai sebuah variabel NULL atau tidak
                    $type = PDO::PARAM_NULL; //Set tipe data query ke NULL
                    break;
                case is_string($value): //Mengecek nilai sebuah variabel string atau tidak
                    $type = PDO::PARAM_STR; //Set tipe data query ke string
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type); //Method untuk melakukan bind terhadap query menghindari SQL injection
    }

    public function exec(){
        $this->stmt->execute();
    }

    public function resultSet(){ //Banyak data
        $this->exec();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); //Mengubah hasil query menjadi array associative
    }
    
    public function single(){ //Satu data
        $this->exec();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(){
        return $this->stmt->rowCount(); //Menghasilkan angka 1 untuk indikator query dijalankan
    }

}



?>