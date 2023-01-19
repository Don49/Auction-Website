<?php

$view = new stdClass();
require_once('Models/Login.php');
$view->pageTitle = 'Loginpage';
session_start();

if(isset($_POST['submit']))
{
    $login = new Login($_POST['email'], $_POST['password']);

    $result = $login->checkLogin();


    $view->result = $result;

}

require_once('Views/loginScript.phtml');