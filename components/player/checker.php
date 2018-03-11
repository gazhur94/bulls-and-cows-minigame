<?php

namespace minigame\components\player;

class checker
{
    public static function cows($num1,$num2,$num3,$num4)
    {
        $counter = 0;
        
        if ($num1 == $_SESSION['number']->numb[1] || $num1 == $_SESSION['number']->numb[2] || $num1 == $_SESSION['number']->numb[3])
        {
            $counter = $counter + 1;
        }

        if ($num2 == $_SESSION['number']->numb[0] || $num2 == $_SESSION['number']->numb[2] || $num2 == $_SESSION['number']->numb[3])
        {
            $counter = $counter + 1;
        }

        if ($num3 == $_SESSION['number']->numb[0] || $num3 == $_SESSION['number']->numb[1] || $num3 == $_SESSION['number']->numb[3])
        {
            $counter = $counter + 1;
        }

        if ($num4 == $_SESSION['number']->numb[0] || $num4 == $_SESSION['number']->numb[1] || $num4 == $_SESSION['number']->numb[2])
        {
            $counter = $counter + 1;
        }
        return $counter;
    }

    public static function bulls($num1,$num2,$num3,$num4)
    {
        $counter = 0;
        
        if ($num1 == $_SESSION['number']->numb[0])
        {
            $counter = $counter + 1;
        }

        if ($num2 == $_SESSION['number']->numb[1])
        {
            $counter = $counter + 1;
        }

        if ($num3 == $_SESSION['number']->numb[2])
        {
            $counter = $counter + 1;
        }

        if ($num4 == $_SESSION['number']->numb[3])
        {
            $counter = $counter + 1;
        }

        
        return $counter;
    }

    

}