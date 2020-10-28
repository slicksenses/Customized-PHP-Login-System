<?php

class Database{
private $database="mysql:host=localhost;dbname=login_system";
private $user='root';
private $password='admin1234';
public $pdo;

    public function __construct()
    {
        try{
            $pdo= new PDO($this->database,$this->user,$this->password);
            $this->pdo=$pdo;
        }catch(PDOException $e)
        {
            print('Error: '. $e->getMessage());
            die(); //The process will stop when there's is an error
        }
    }


}