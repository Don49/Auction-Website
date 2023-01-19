<?php


class Login
{

    var $email='' , $password=''   ;



    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function checkLogin()
    {
        require_once('Models/UserDataSet.php');


        $user= new UserDataSet;

        // Validation
        $checkInDatabase = $user->verifyID($this->email,$this->password);

        if ($checkInDatabase == true)

            {
                $_SESSION['loginEmail'] = $this->email;
                $result = 'worked'; // just for feedback
            }
        else
            {
            $result = 'Error : Incorrect details ';
            }

        return $result;


    }



}