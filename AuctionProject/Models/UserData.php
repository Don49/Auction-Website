<?php

class UserData {

    protected $_userID, $_realName, $_email, $_passWord;

    public function __construct($dbRow) {
        $this->_userID = $dbRow['userID'];
        $this->_realName = $dbRow['realName'];
        $this->_email = $dbRow['email'];
        //if ($dbRow['international']) $this->_international = 'yes'; else $this->_international = 'no';
        $this->_passWord = $dbRow['passWord'];


    }

    public function getUserID() {
        return $this->_userID;
    }

    public function getRealName() {
        return $this->_realName;
    }

    public function getEmail() {
        return $this->_email;
    }

    //Should not use
    public function getPassWord() {
        return $this->_passWord;
    }






}