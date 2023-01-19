<?php



require_once('Models/itemDataSet.php');
session_start();

$view = new stdClass();
$view->pageTitle = 'Item';

// if the user hasnt selected a item to view then it redirects to the item page
if(!isset($_SESSION['rowID']))
// RowID is the ID of the item in the database
{
    header("Location:itemISv1.php");
}
else
    {
        $itemDataSet = new ItemDataSet();

        $view->itemDataSet = $itemDataSet->viewSingleItem($_SESSION["rowID"]);

        if (isset($_POST['submit']))
        {
            require_once('Models/UserDataSet.php');
            $userAmount = $_POST['userBidAmount'];
            //Allows only logged in users to bid
            if (isset($_SESSION['loginEmail']))
            {
                $UserDataSet = new UserDataSet();
                $userID = $UserDataSet->fetchIDEmail($_SESSION['loginEmail']);

                //Checks to make sure bid is a number
                if (is_numeric($userAmount))
                {

                    require_once('Models/BidDataSet.php');
                    $bidDataSet = new BidDataSet();

                    $bidDataSet->addNewBid($_SESSION['rowID'], $userID, $userAmount);
 

                }
                else
                    {
                        echo "not a number";
                    }
            }
            else
            {
                echo "Need to be logged in to bid";
            }

        }
    }



require_once('Views/viewItem.phtml');

