<?php

namespace minigame\components\bot;

class bullsAndCows extends turn
{
    public function __construct()
    {
        $this->turnId = $_SESSION['turnId']-1;
        $this->cows = $_POST['cows'];
        $this->bulls = $_POST['bulls'];
        
        return $this;
    }
}