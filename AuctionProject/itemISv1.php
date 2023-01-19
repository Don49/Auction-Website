<?php



require_once('Models/itemDataSet.php');
session_start();

$view = new stdClass();
$view->pageTitle = 'Item Information';


$itemDataSet = new ItemDataSet();
$view->itemDataSet = $itemDataSet->fetchAllItems();

// Allows user to search items
if(isset($_POST['searchSubmit']))
{
    $toSearch = $_POST['searchBar'];
    $view->itemDataSet = $itemDataSet->fetchSearchItems($toSearch);
}


if(isset($_POST['view']))
{

    $rowID = $_POST["view"];
    $_SESSION['rowID'] = $rowID ;
    header("Location: viewItem.php");


}


require_once('Views/itemsISv1.phtml');
;
