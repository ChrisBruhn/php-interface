<?php

/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 14-04-2017
 * Time: 11:02
 */

include_once("php-database.php");
class newsletteruser
{
public $firstname;
public $lastname;
public $email;


    function __construct($firstname,$lastname,$email){
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->email = $email;

        }

    public function SaveToDatabase(){
        $table = "myguests";
        $insertstring = "first_name, last_name, email";
        $values = "'".$this->firstname."','".$this->lastname."','".$this->email."'";
        if (insertdatainmydatabase($table, $insertstring, $values ))
            return true;
        else
            return false;
    }

    public function IfExist(){


    }
}