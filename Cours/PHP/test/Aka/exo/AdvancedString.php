<?php

namespace Aka\exo;

class AdvancedString {
    private $internalString;

    public function __construct($internalString = 'I love POO')
    {
        $this->internalString = $internalString;
    }

    public function bold(){
        echo "<b>" . $this->internalString . "</b>";
    }
    public function italic(){
        echo "<i>" . $this->internalString . "</i>";
    }
    public function underline(){
        echo "<u>" . $this->internalString . "</u>";
    }
    public function upperCase(){
        echo strtoupper($this->internalString);
    }
}

?>