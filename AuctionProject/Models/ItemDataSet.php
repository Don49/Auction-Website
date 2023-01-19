<?php

require_once ('Models/Database.php');
require_once ('Models/itemData.php');

class ItemDataSet {
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAllItems() {
        $sqlQuery = 'SELECT * FROM items';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new itemData($row);
        }
        return $dataSet;
    }

    public function viewSingleItem($id)
    {
        $passInID = '"' . $id . '"';
        $sqlQuery = 'SELECT * FROM items WHERE LOTID = ' . $passInID;

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement


        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new itemData($row);
        }
        return $dataSet;

    }

    public function fetchSearchItems($searchString)
    {
       $passedInSearch = "'%" . $searchString . "%'";
        $sqlQuery = "SELECT * FROM items WHERE itemTitle LIKE $passedInSearch OR itemDescription LIKE $passedInSearch OR postingUser LIKE $passedInSearch;";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement


        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new itemData($row);
        }
        return $dataSet;

    }

    public function addNewItem($aID,$itemName,$itemDes)
    {
        $passInID = '"' . $aID . '"';
        $passInName = '"' . $itemName . '"';
        $passInDes = '"' . $itemDes . '"';

        $user= '"' . $_SESSION['loginEmail'] . '"';
        // already validated

        $sqlQuery = "INSERT INTO `sye437`.`items` (`AuctionId`, `postingUser` , `itemTitle`, `itemDescription`) VALUES ($passInID, $user ,$passInName, $passInDes)";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

    }

}