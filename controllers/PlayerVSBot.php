<?php

namespace minigame\controllers;

use minigame\view\helpers;

use minigame\components\bot\turn;


class PlayerVSBot
{
    public function __construct()
    {  
        if (!isset($_COOKIE['turnId']))
        {
             setcookie('turnId',1,time()+(3600*24*365));
             $_SESSION['turnId'] = 1;
             
             $turnId = 1;
             ${"turn$turnId"} = new turn;
             setcookie("turn$turnId",serialize(${"turn$turnId"}),time()+(3600*24*365));
        
 
         
             helpers::render('playerVSBot',["num1" => "$turn1->num1","num2" => "$turn1->num2","num3" => "$turn1->num3","num4" => "$turn1->num4"]);        
        }
        else if (isset($_COOKIE['turnId']) && $_COOKIE['turnId'] == $_SESSION['turnId']-1)
        {
            $turnId = $_SESSION['turnid'];
            ${"turn$turnId"} = new turn;
            setcookie("turn$turnId",serialize(${"turn$turnId"}),time()+(3600*24*365));

            $_SESSION['turnid'] = $_SESSION['turnid']+1;
            setcookie('turnId',$_COOKIE['turnId']+1,time()+(3600*24*365));
            helpers::render('playerVSBot',["num1" => "$turn1->num1","num2" => "$turn1->num2","num3" => "$turn1->num3","num4" => "$turn1->num4"]); 
        }


        else        
        {   
            $turnId = $_COOKIE['turnId'];
            ${"turn$turnId"} = new turn;
            
        
            
            setcookie("turn$turnId",serialize(${"turn$turnId"}),time()+(3600*24*365));
            setcookie('turnId',$_COOKIE['turnId']+1,time()+(3600*24*365));

        
            helpers::render('playerVSBot');
        }
    }
}  
