<?php

require_once('Models/userDataSet.php');
session_start();

$view = new stdClass();
$view->pageTitle = 'user Information';


$userDataSet = new UserDataSet();

// redirects when user is not logged in
if(!isset($_SESSION['loginEmail']))
{
    header("Location:loginScript.php");
}
else
    {
        $view->userDataSet = $userDataSet->fetchDataByEmail($_SESSION["loginEmail"]);
    }

//Allows user to add item
if(isset($_POST['addItem']))
{
    header("Location:addNewItem.php");
}

require_once('Views/myAccount.phtml');

