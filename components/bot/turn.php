<?php

namespace minigame\components\bot;

class turn
{
    public function __construct()
    {
        
        if (isset($_SESSION['turnpId']))
        {
            $this->turnId = $_SESSION['turnpId'];
        }
        else
        {
            $this->turnId = 1;
        }
        $number = self::generate();

        $this->num1 = $number[0];
        $this->num2 = $number[1];
        $this->num3 = $number[2];
        $this->num4 = $number[3];
        
        return $this;              
    }

    private static function generate()
    {
        if ($_SESSION['turnpId'] == 1)
        {
            $number[0] = 1;
            $number[1] = 2;
            $number[2] = 3;
            $number[3] = 4;

        }
        else if ($_SESSION['turnpId'] == 2)
        {
            $number[0] = 4;
            $number[1] = 5;
            $number[2] = 6;
            $number[3] = 7;

        }
        else if ($_SESSION['turnpId'] == 3)
        {
            $number[0] = 3;
            $number[1] = 4;
            $number[2] = 8;
            $number[3] = 0;

        }
        else if ($_SESSION['turnpId'] == 4)
        {
            $number[0] = 6;
            $number[1] = 0;
            $number[2] = 4;
            $number[3] = 3;
        }
        else if ($_SESSION['turnpId'] == 5)
        {
            $counter = 0;
            for ($i=1;$i<$_SESSION['turnpId']-1;$i++)
            {
                $BC = unserialize($_COOKIE["bc$i"]);

                $bulls = $BC->bulls;
                $cows = $BC->cows;
                $postBulls = $_POST['bulls'];
                $postCows = $_POST['cows'];

                if ($BC->bulls == '')
                {
                    $bulls = 0;
                }
                if ($BC->cows == '')
                {
                    $cows = 0;
                }
                
                $counter = $counter + $cows;
                $counter = $counter + $bulls;
                
            }
            
            if ($_POST['bulls'] == '')
            {
                $postBulls = 0;
            }
            if ($_POST['cows'] == '')
            {
                $postCows = 0;
            }
            $counter = $counter + $postBulls;
            $counter = $counter + $postCows;
            





            $number[0] = 6;
            $number[1] = 0;
            $number[2] = 4;
            $number[3] = 3;
        }
        else
        {
            $number[0] = $_SESSION['turnpId'];
            $number[1] = $_SESSION['turnpId'];
            $number[2] = $_SESSION['turnpId'];
            $number[3] = $_SESSION['turnpId'];
        }



        return $number;
    }

}