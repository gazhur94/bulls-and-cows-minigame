<?php

namespace minigame\components\bot;

class turn
{
    public function __construct()
    {

        if (isset($_COOKIE['turnId']))
        {
            $this->turnId = $_COOKIE['turnId'];
        }
        else
        {
            $this->turnId = 1;
        }
        //var_dump('turn');
        $this->num1 = $_SESSION['turnId'];
        $this->num2 = $_SESSION['turnId'];
        $this->num3 = $_SESSION['turnId'];
        $this->num4 = $_SESSION['turnId'];
        
        if (isset($_POST['sendCowsBulls']))
        {
            $this->cows = $_POST['cows'];
            $this->bulls = $_POST['bulls'];
        }
        // $this->cows  = checker::cows($_POST['num1'],$_POST['num2'],$_POST['num3'],$_POST['num4']);
        // $this->bulls = checker::bulls($_POST['num1'],$_POST['num2'],$_POST['num3'],$_POST['num4']);
        return $this;
                    
    }

}