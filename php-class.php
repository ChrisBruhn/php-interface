<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 12-04-2017
 * Time: 12:06
 */


// init the object of class
$mybeer = new beer(50);
// print to hole object to screen
$mybeer->printObject();
// init the object of extended class
$mybeer->addhangover(100);
// print to hole object to screen
$mybeer->printObject();




class alcoholicdrinks{
    private $hangover;
    function __construct($howbad)
    {
        $this->hangover = $howbad;
        echo "The hangover has been set to $this->hangover";
    }
    function __get($parameter){
        return $this->$parameter;
    }
    function __set($parm, $value){
        $this->parameter = $value;
    }
    function printObject (){
        var_dump ($this);
    }

}

class beer extends alcoholicdrinks{
    private $tates;

    function addhangover($worse){
        $this->tates = $worse;
    }
}

