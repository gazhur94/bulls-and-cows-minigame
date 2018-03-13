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
             //var_dump(${"turn$turnId"}->num1);
             setcookie("turn$turnId",serialize(${"turn$turnId"}),time()+(3600*24*365));
        
             //var_dump('if');
         
             helpers::render('playerVSBot',["num1" => "$turn1->num1","num2" => "$turn1->num2","num3" => "$turn1->num3","num4" => "$turn1->num4"]);        
        }
        else if (isset($_POST['sendCowsBulls']))
        {
            $turnId = $_SESSION['turnId'];
            ${"turn$turnId"} = new turn;
            setcookie("turn$turnId",serialize(${"turn$turnId"}),time()+(3600*24*365));
            
            //var_dump('elseif1');
            $num1 = ${"turn$turnId"}->num1;
            $num2 = ${"turn$turnId"}->num2;
            $num3 = ${"turn$turnId"}->num3;
            $num4 = ${"turn$turnId"}->num4;    
            $bulls = $_POST['bulls'];
            $cows = $_POST['cows']; 
            helpers::render('playerVSBot',["num1" => "$num1","num2" => "$num2","num3" => "$num3","num4" => "$num4","cows" => "$cows", "bulls" => "$bulls"]); 
            helpers::render('playerVSBot',["num1" => "$num1","num2" => "$num2","num3" => "$num3","num4" => "$num4"]); 
        }
        else if (isset($_COOKIE['turnId']))
        {
            $turnId = $_SESSION['turnId'];
            ${"turn$turnId"} = new turn;
            
            //var_dump('elseif2');
            $_SESSION['turnId'] = $_SESSION['turnId']+1;
            setcookie('turnId',$_COOKIE['turnId']+1,time()+(3600*24*365));
            //var_dump(${"turn$turnId"});
            $num1 = ${"turn$turnId"}->num1;
            $num2 = ${"turn$turnId"}->num2;
            $num3 = ${"turn$turnId"}->num3;
            $num4 = ${"turn$turnId"}->num4;
            helpers::render('playerVSBot',["num1" => "$num1","num2" => "$num2","num3" => "$num3","num4" => "$num4"]); 

        }
       

       
    }
}  
