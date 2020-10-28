<?php
include_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'app/autoload.php';
$db= new Database();

$loginStatus=false;

$username= @$_POST['username']; //To prevent sql injection
$password= @$_POST['password'];


$query='select * from users where (username = :user)';
$data= [':user'=>$username];

try{
    $response=$db->pdo->prepare($query);
    $response->execute($data);
}catch (PDOException $e){
    echo 'Query failed';
    die();
}

$row= $response->fetch(PDO::FETCH_ASSOC);
if(is_array($row)){
    if(password_verify($password,$row['password'])){
        $loginStatus=true; //valid
        isLogin($loginStatus,$username);

    }else{
        $loginStatus=false; //invalid
        isLogin($loginStatus,$username);

    }
}else{
    session_start();
    $session=new Session();
    $session->createMessage('Your credentials does not exists! Please register','warning');
    header('location:'. $config->base_url('login'));
}
function isLogin($status,$username){
    session_start();
    $session=new Session();
    $config= new Config();
    if($status==false){
        if(isset($_POST['username'])){
            $session->createMessage('Invalid user credentials. Please login with the correct username and password','error');
        }
        header('location:'. $config->base_url('login'));
    }else{
        $session->setSession($username);
        header('location:'. $config->base_url('dashboard'));
        exit();

    }
}


