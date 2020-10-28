<?php
class Middleware extends Session {
    private $auth;
    public function guard()
    {
        include_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'app/autoload.php';
        $config=new Config();
        $this->auth=$this->getSession();
        if($this->auth==null){
                echo "<script type='text/javascript'>window.top.location='". $config->base_url('login') ."';</script>"; exit;
            }else{
                $_SESSION['message'] = NULL;
        }

        //Session Timout
        $time = $_SERVER['REQUEST_TIME'];
        $timeout_duration = $config->session_timeout();
        if (isset($_SESSION['LAST_ACTIVITY']) &&
            ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
            session_unset();
            session_destroy();
        }
        $_SESSION['LAST_ACTIVITY'] = $time;
    }
}