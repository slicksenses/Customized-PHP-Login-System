<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'app/autoload.php';
$session= new Session();
$config= new Config();
$session->createMessage('You are logged out from the system at '. date('F d,Y h:iA'),'success');
$session->destroySession();
header('location:'. $config->base_url('login'));
