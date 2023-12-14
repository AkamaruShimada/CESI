<?php

namespace Aka\entities;

class Character {
    private $name;
    private $health;

    public function __construct($name = "JohnDoe", $health = 1)
    {
        $this->name = $name;
        $this->health = $health;
    }

    public function Kill() {
        $this->health = 0;
        echo $this->name . " You Died";
    }
}
?>