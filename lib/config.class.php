<?php
class Config{

    private  $baseURL='http://localhost:8000/';
    private $currentPage;
    public function base_path()
    {
        return $_SERVER['DOCUMENT_ROOT'];
    }

    public function views($file)
    {
        $file=str_replace('.','/',$file);
        $this->currentPage=$file;
        $ext= '.view.php';
        include_once $this->base_path(). DIRECTORY_SEPARATOR .'views'. DIRECTORY_SEPARATOR . $file . $ext;
    }

    public function public_path()
    {
        return $this->base_path() . DIRECTORY_SEPARATOR .'public';

    }



    public function asset($file=null)
    {
        if($file==null){
            return $this->base_url() . DIRECTORY_SEPARATOR .'public/';
        } else {
            return $this->base_url() .DIRECTORY_SEPARATOR . 'public'. DIRECTORY_SEPARATOR . $file;
        }
    }

    public function base_url($page=null)
    {
        $ext ='.php';
        if($page!=null){
            return $this->baseURL.$page .$ext;
        }else{
            return  $this->baseURL;
        }
    }

    public function page()
    {
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);

        return str_replace('.php','',$uri_segments[1]);
    }


    public function session_timeout($time=1800)
    {

        return $time; //Timeout on 1800 seconds = 30mins as default session timeout
    }

}

