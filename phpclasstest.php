<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 12-04-2017
 * Time: 12:06
 */

// init the object of class with value 5
$c = new class_name(5);
// print to hole object to screen
$c->printObject();
// demonstration of set function
$c->__set('test',100);
// print to hole object to screen
$c->printObject();

// demostration of __get function
echo "Return by __get function ".$c->__get('parameter')."<br>";

// init the object of class
$mybeer = new beer(50);
// print to hole object to screen
$mybeer->printObject();
// init the object of extended class
$mybeer->addhangover(100);
// print to hole object to screen
$mybeer->printObject();



echo "<br>";


class class_name
{
    public $parameter;

    function __construct($parm){
        $this->parameter = $parm;
        echo "it has been set with the value $this->parameter ";

    }

    function __destruct(){}

    function __get($parameter){
        return $this->parameter;
    }
    function __set($parm, $value){
        $this->parameter = $value;
    }
    function printObject (){
        var_dump ($this);
    }

}

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

