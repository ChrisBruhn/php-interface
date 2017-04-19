<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 12-04-2017
 * Time: 20:47
 */

interface Shape {
    public function getArea();
}

class Square implements Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea(){
        return $this->width * $this->height;
    }
}

class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getArea(){

        return 3.14 * $this->radius * $this->radius;
    }
}

class Triangle implements Shape {
    private $h;
    private $g;

    use logger;

    public function __construct($h,$g) {
        $this->h = $h;
        $this->g = $g;
    }

    function getArea(){
        return 0.5*$this->h*$this->g;
    }
}

trait logger{
    function logmessage ($message, $level='debug'){
        //write to a log
    }
}

function calculateArea(Shape $shape) {
    echo "the area of shape, is: ";
    return $shape->getArea();
}



$square = new Square(5, 5);
$circle = new Circle(7);
$triangle = new Triangle(7,10);

echo calculateArea($square), "<br/>";
var_dump($square);
echo calculateArea($circle), "<br/>";
var_dump($circle);
echo calculateArea($triangle);
var_dump($triangle);
?>