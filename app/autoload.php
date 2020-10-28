<?php
spl_autoload_register('autoloader');

function autoloader($classname)
{
    $path = $_SERVER['DOCUMENT_ROOT']. '/lib/';
    $ext = '.class.php';
    $fullPath = $path . $classname . $ext;

    include_once $fullPath;
}

//Create Class Instance
$config= new Config();