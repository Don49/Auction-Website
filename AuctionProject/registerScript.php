<?php

$view = new stdClass();
require_once('Models/userDataSet.php');

$view->pageTitle = 'Register page';
session_start();
if(isset($_POST['submit']))
{
    $userDataSet = new UserDataSet();
    $userDataSet->addNewUser($_POST['name'],$_POST['email'],$_POST['password']);

}

require_once('Views/registerScript.phtml');