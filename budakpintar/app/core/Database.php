<?php

class Database{
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh, $statement;
    
    public function __construct(){ //CONNECT
        $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try{
            $this->dbh = new PDO($dsn,$this->db_user,$this->db_pass,$option);
        } catch(PDOException $error) {
            die($error->getMessage());
        }
    }

    public function query($query){ //QUERY
        $this->statement = $this->dbh->prepare($query);
    }

    public function bind($param,$value,$type = null){ //SQL INJECTION HANDLER
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT; 
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                case is_string($value):
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }

    public function exec(){ //EXECUTE TO DB
        $this->statement->execute();
    }

    public function resultSet(){ //MULTI DATA
        $this->exec();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function single(){ //SINGLE DATA
        $this->exec();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(){ //ROWS AFFECTED
        return $this->statement->rowCount();
    }

}



?>