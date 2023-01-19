<?php

$view = new stdClass();
require_once('Models/ItemDataSet.php');

$view->pageTitle = 'new Item page';
session_start();
if(isset($_POST['submit']))
{

    if(ctype_digit ($_POST['auctionID']))
    {
        //if auctionID dosent exist it creates new one
        $itemDataSet = new ItemDataSet();

        $itemDataSet->addNewItem($_POST['auctionID'], $_POST['name'], $_POST['description']);

    }
    else
        echo "not an appropriate auction";
}

require_once('Views/addItem.phtml');