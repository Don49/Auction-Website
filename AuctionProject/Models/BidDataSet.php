<?php

require_once ('Models/Database.php');
require_once ('Models/BidData.php');

class BidDataSet {
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAllBids() {
        $sqlQuery = 'SELECT * FROM bids';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new userData($row);
        }
        return $dataSet;
    }


    public function fetchAllBidsByID($id) {
        $passedInID = "'" . $id . "'";
        $sqlQuery = 'SELECT * FROM bids WHERE userID=' . $passedInID;

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new BidData($row);
        }

        return $dataSet;
    }


    public function addNewBid($lot ,$email , $bidAmount)
    {
        $passLot= '"' . $lot . '"';
        $passEmail = '"' . $email . '"';
        $passInAmount = '"' . $bidAmount . '"';

            $sqlQuery = "INSERT INTO `sye437`.`bids` (`lot`, `userID`, `bidPrice`) VALUES ($passLot, $passEmail, $passInAmount)";

            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement

            $statement->execute(); // execute the PDO statement


        }

}