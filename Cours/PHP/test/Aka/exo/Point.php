<?php

namespace Aka\exo;

class Point {
    private $x;
    private $y;

    public function __construct($x = 0, $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function distancePoint(){
        return sqrt(pow($this->x, 2) + pow($this->y, 2));
    }

    public function __toString()
    {
        return "({" . $this->x . "}, {" .$this->y ."})";
    }
}
 
?>