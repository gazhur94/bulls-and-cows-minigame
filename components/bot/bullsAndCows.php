<?php

namespace minigame\components\bot;

class bullsAndCows 
{
    public function __construct()
    {
        $this->turnpId = $_SESSION['turnpId']-1;
        $this->cows = $_POST['cows'];
        $this->bulls = $_POST['bulls'];
        
        return $this;
    }
}