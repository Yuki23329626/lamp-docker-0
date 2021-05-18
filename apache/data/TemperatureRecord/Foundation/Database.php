<?php


class Database
{
    public $conn;
    private $db_name = "temperature_record";
    private $host = "mariadb";
    //private $host = "localhost";
    private $username = "root";
    //private $username = "hsng";
    private $password = "a19544596MIN";
    //private $password = "hsng@root";

    public function getConnection(){
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->username,$this->password);
            $this->conn->exec("set names utf8");
        }
        catch (PDOException $exception){
            echo "Connection error: ".$exception->getMessage();
            error_log($exception->getMessage());
        }

        return $this->conn;
    }
}