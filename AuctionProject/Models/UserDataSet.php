<?php

require_once ('Models/Database.php');
require_once ('Models/userData.php');

class UserDataSet {
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAllUsers() {
        $sqlQuery = 'SELECT * FROM users';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new userData($row);
        }
        return $dataSet;
    }


    public function fetchDataByEmail($email)
    {
        $passInEmail = '"' . $email . '"';
        $sqlQuery = 'SELECT * FROM users WHERE email= ' . $passInEmail;

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new userData($row);
        }
        return $dataSet;
    }

    public function fetchIDEmail($email)
    {

        $passInEmail = '"' . $email . '"';
        $sqlQuery = 'SELECT userID FROM users WHERE email=' . $passInEmail;

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $returnedID = $statement->fetch();
        if($returnedID == false || empty($returnedID))
        {
            echo 'Does not exist in database';
            return null;
        }
        else {
            // -> is an array and we want the first index
            return $returnedID[0];
        }

    }


    public function fetchEmail($email)
    {

        $passInEmail = '"' . $email . '"';
        $sqlQuery = 'SELECT email,userID FROM users WHERE email=' . $passInEmail;


        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $returnedEmail = $statement->fetch();
        if($returnedEmail == false)
        {
            echo 'Email error';
            return null;
        }
        else
        {
            echo 'All good';
            return  $returnedEmail[0];
        }


    }


    public function fetchPassword($password)
    {
        // formatting for query
        $passInPassword = '"' . $password . '"';
        $sqlQuery = 'SELECT passWord FROM users WHERE passWord=' . $passInPassword;

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $returnedPassword = $statement->fetch();

        if ($returnedPassword == false || empty($returnedPassword)) {
            echo 'Password error';

        } else {
            echo 'All good';
        }

        return $returnedPassword[0];
    }

    public function fetchIDPassword($password)
    {
        $passInPassword = '"' . $password . '"';
        $sqlQuery = 'SELECT userID FROM users WHERE passWord=' . $passInPassword;
        //$sqlQuery = 'SELECT passWord FROM users';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $returnedPassword = $statement->fetch();
        if($returnedPassword == false || empty($returnedPassword))
        {
            echo 'Password error';
            return null;
        }
        else
            {
            echo 'All good';
                return  $returnedPassword[0];
            }

    }

    //Checks if the the email and passwords go together or not
    public function verifyID($email,$password)
    {
        $emailID = $this->fetchIDEmail($email);
        $passwordID = $this->fetchIDPassword($password);
        $result = null;
        if(!empty($emailID)) {
            if (!empty($passwordID)) {
                if ($emailID == $passwordID) {
                    echo 'Account verified';
                    $result = true;
                }
                else {
                    echo 'Email and password mismatch';
                    $result = false;
                }
            }
            else{echo 'error password does not exist';}
        }
        else{echo 'error email does not exist';}

        return $result;
    }


    public function addNewUser($realName,$email , $password)
    {
        $passRealName = '"' . $realName . '"';
        $passEmail = '"' . $email . '"';
        $passInPassword = '"' . $password . '"';
       $checkIfExist = $this->fetchEmail($email);
       if (!$checkIfExist)
       {
           $sqlQuery = "INSERT INTO `sye437`.`users` (`realName`, `email`, `passWord`) VALUES ($passRealName, $passEmail, $passInPassword)";

           $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
           $statement->execute(); // execute the PDO statement
            $_SESSION['loginEmail'] = $email;
       }
       else
       {
           echo "Error User aready exists";
       }

    }



}