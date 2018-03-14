<?php

namespace minigame\controllers;

use minigame\view\helpers;

use minigame\components\bot\turn;
use minigame\components\bot\bullsAndCows;
use minigame\components\bot\errors;


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
        
             //var_dump('if');
         
             return helpers::render('playerVSBot',["num1" => "$turn1->num1","num2" => "$turn1->num2","num3" => "$turn1->num3","num4" => "$turn1->num4"]);        
        }
        else if (isset($_POST['sendCowsBulls']))
        {
            $errors = new errors;
            $turnId = $_SESSION['turnId'];
            ${"turn$turnId"} = new turn;
            setcookie("turn$turnId",serialize(${"turn$turnId"}),time()+(3600*24*365));
            
            $turnIdbc = $turnId-1;
            ${"bc$turnIdbc"} = new bullsAndCows;
            
            $cows = ${"bc$turnIdbc"}->cows;
            $bulls = ${"bc$turnIdbc"}->bulls;

        
            $num1 = ${"turn$turnId"}->num1;
            $num2 = ${"turn$turnId"}->num2;
            $num3 = ${"turn$turnId"}->num3;
            $num4 = ${"turn$turnId"}->num4;    
            
            $bulls = $_POST['bulls'];
            $cows = $_POST['cows']; 
            
            if (empty($errors->error))
            {
                setcookie("bc$turnIdbc",serialize(${"bc$turnIdbc"}),time()+(3600*24*365));
                return helpers::render('playerVSBot',["num1" => "$num1","num2" => "$num2","num3" => "$num3","num4" => "$num4","cows" => "$cows", "bulls" => "$bulls"]); 
            }
            else
            {
               
                return helpers::render('playerVSBot',["error" => "$errors->error"]);   
            }
            
        }
        else if (isset($_COOKIE['turnId']))
        {
            $turnId = $_SESSION['turnId'];
            ${"turn$turnId"} = new turn;
            
            //var_dump('elseif2');
            $_SESSION['turnId'] = $_SESSION['turnId']+1;
            setcookie('turnId',$_COOKIE['turnId']+1,time()+(3600*24*365));
     
            $num1 = ${"turn$turnId"}->num1;
            $num2 = ${"turn$turnId"}->num2;
            $num3 = ${"turn$turnId"}->num3;
            $num4 = ${"turn$turnId"}->num4;
            
            return helpers::render('playerVSBot',["num1" => "$num1","num2" => "$num2","num3" => "$num3","num4" => "$num4"]); 

        }
       

       
    }
}  
