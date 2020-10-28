<?php

class Session extends Database {

    private $_token;

    public function setSession($username){

        $_SESSION['USER_SESSION']=$username;

        $this->_token=md5($this->auth()->username.$this->auth()->created_at);
        $_SESSION['SYSTEM_SESSION']=$this->_token;

    }

    public function auth()
    {
        $query='select * from users where (username = :user)';
        $data= [':user'=>$_SESSION['USER_SESSION']];
        $response=$this->pdo->prepare($query);
        $response->execute($data);
        $row= $response->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function getSession()
    {
        if(isset($_SESSION['SYSTEM_SESSION'])){
           return $_SESSION['SYSTEM_SESSION'];
        }
        return null;

    }



    public function destroySession()
    {
        session_destroy();
    }

    public function createMessage($message,$type)
    {
        $_SESSION['message']=$message;
        $_SESSION['type']=$type;
    }



}