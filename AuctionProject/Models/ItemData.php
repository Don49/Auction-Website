<?php

class ItemData {

    protected $_auctionId, $_LOTID, $_postingUser, $_itemTitle, $_itemDescription, $_itemImageName;

    public function __construct($dbRow) {
        $this->_auctionId = $dbRow['AuctionID'];

        $this->_LOTID = $dbRow['LOTID'];
        //if ($dbRow['international']) $this->_international = 'yes'; else $this->_international = 'no';
        $this->_postingUser = $dbRow['postingUser'];
        $this->_itemTitle = $dbRow['itemTitle'];
        $this->_itemDescription = $dbRow['itemDescription'];
        $this->_itemImageName = $dbRow['itemImageName'];
    }

    public function getAuctionID() {
        return $this->_auctionId;
    }


    public function getLOTID() {
        return $this->_LOTID;
    }

    public function getItemDescription() {
        return $this->_itemDescription;
    }

    public function getPostingUser() {
        return $this->_postingUser;
    }

    public function getItemTitle() {
        return $this->_itemTitle;
    }

    public function getItemImageName() {
        return $this->_itemImageName;
    }



}