<?php


session_start();

$view = new stdClass();
$view->pageTitle = 'user Information';

// IF user is not logged in the redirects to login in page
if(!isset($_SESSION['loginEmail']))
{
    header("Location:loginScript.php");
}


if (isset($_SESSION['loginEmail']))
            {
                require_once('Models/UserDataSet.php');
                $UserDataSet = new UserDataSet();
                $userID = $UserDataSet->fetchIDEmail($_SESSION['loginEmail']);

                require_once('Models/BidDataSet.php');
                 $bidDataSet = new BidDataSet();

                $view->bidDataSet = $bidDataSet->fetchAllBidsByID($userID);

    }

if (isset($_POST['view']))
{
    $rowID = $_POST["view"];
    $_SESSION['rowID'] = $rowID ;
    header("Location: viewItem.php");
}


require_once('Views/viewBids.phtml');

