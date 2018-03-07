<?php

namespace minigame\components;

class turn
{
    public function __construct()
    {


        $this->turnId = $_COOKIE['turnId'];
        $this->num1 = $_POST['num1'];
        $this->num2 = $_POST['num2'];
        $this->num3 = $_POST['num3'];
        $this->num4 = $_POST['num4'];
        $this->cows  = checker::cows($_POST['num1'],$_POST['num2'],$_POST['num3'],$_POST['num4']);
        $this->bulls = checker::bulls($_POST['num1'],$_POST['num2'],$_POST['num3'],$_POST['num4']);
        return $this;
                    
    }

}