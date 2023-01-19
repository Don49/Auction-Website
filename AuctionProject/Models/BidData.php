<?php


class BidData
{
    protected $_bidID, $_lot, $_userID, $_bidPrice;

    public function __construct($dbRow)
    {

        $this->_bidID = $dbRow['bidID'];
        $this->_lot = $dbRow['lot'];
        $this->_userID = $dbRow['userID'];
        $this->_bidPrice = $dbRow['bidPrice'];
    }

    public function getBidID()
    {
        return $this->_bidID;
    }


    public function getLot()
    {
        return $this->_lot;
    }

    public function getUserID()
    {
        return $this->_userID;
    }


    public function getBidPrice()
    {
        return $this->_bidPrice;
    }



}