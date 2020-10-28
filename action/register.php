<?php
include_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'app/autoload.php';
$db= new Database();


$loginStatus=false;

//Put some error trapping here
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
$session= new Session();
if(!empty($row)){
    session_start();
    $session->createMessage('Username were already exists! Please try again!','error');
    header('location:'.$config->base_url('register'));
}else{
$hash_password=password_hash($password,PASSWORD_BCRYPT);

    try{
       $db->pdo->beginTransaction();
        $sql = "INSERT INTO users (username, password) VALUES (?,?)";
        $stmt= $db->pdo->prepare($sql);
        $stmt->execute([$username, $hash_password]);
       $db->pdo->commit();
       session_start();
        $session->createMessage('User has been successfully registered','success');
        header('location:'.$config->base_url('login'));
    }catch (PDOException $e){
        echo 'Query failed';
        $db->pdo->rollback();
        die();
    }
}




