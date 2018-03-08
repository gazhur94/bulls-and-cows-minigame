<?php

namespace minigame\components;

class number
{
    public function __construct()
    {
        $this->numb = self::generateNumber();
    }
    private static function generateNumber()
    {
        $numb = array();
        $num1= rand(0,9);
        do 
        {
            $num2 = rand(0,9);
        }
        while ($num2 == $num1);
        
       
        do 
        {
            $num3 = rand(0,9);
        }

        while ($num3 == $num1 || $num3 == $num2);

        do 
        {
            $num4 = rand(0,9);
        }
        
        while ($num4 == $num1 || $num4 == $num2 || $num4 == $num3);
        
        $numb[0] = $num1;
        $numb[1] = $num2;
        $numb[2] = $num3;
        $numb[3] = $num4;
        return $numb;
    }
    

}