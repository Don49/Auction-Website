<?php


require_once('Models/userDataSet.php');
session_start();

$view = new stdClass();
$view->pageTitle = 'user Information';


$userDataSet = new UserDataSet();
$view->userDataSet = $userDataSet->fetchAllUsers();



require_once('Views/userSv1.phtml');

