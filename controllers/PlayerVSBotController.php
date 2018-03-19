<?php

namespace minigame\controllers;

use minigame\view\helpers;

use minigame\components\bot\turn;
use minigame\components\bot\bullsAndCows;
use minigame\components\bot\errors;


class PlayerVSBotController
{
    public function actionIndex()
    {  
        if (!isset($_COOKIE['turnpId']))
        {
             setcookie('turnpId',1,time()+(3600*24*365));
             $_SESSION['turnpId'] = 1;
             $turnpId = 1;
             ${"turnp$turnpId"} = new turn;
            
             setcookie("turnp$turnpId",serialize(${"turnp$turnpId"}),time()+(3600*24*365));
        
             //var_dump('if');
         
             return helpers::render('playerVSBot',["num1" => "$turnp1->num1","num2" => "$turnp1->num2","num3" => "$turnp1->num3","num4" => "$turnp1->num4"]);        
        }
        else if (isset($_POST['sendCowsBulls']))
        {
            $errors = new errors;
            $turnpId = $_SESSION['turnpId'];
            ${"turn$turnpId"} = new turn;
            setcookie("turn$turnpId",serialize(${"turn$turnpId"}),time()+(3600*24*365));
            
            $turnpIdbc = $turnpId-1;
            ${"bc$turnpIdbc"} = new bullsAndCows;
            
            $cows = ${"bc$turnpIdbc"}->cows;
            $bulls = ${"bc$turnpIdbc"}->bulls;

        
            $num1 = ${"turn$turnpId"}->num1;
            $num2 = ${"turn$turnpId"}->num2;
            $num3 = ${"turn$turnpId"}->num3;
            $num4 = ${"turn$turnpId"}->num4;    
            
            $bulls = $_POST['bulls'];
            $cows = $_POST['cows']; 
            if ($_POST['bulls'] == '')
            {
                $bulls = 0;
            }
            if ($_POST['cows'] == '')
            {
                $cows = 0;
            }
            if (empty($errors->error))
            {
                setcookie("bc$turnpIdbc",serialize(${"bc$turnpIdbc"}),time()+(3600*24*365));
                return helpers::render('playerVSBot',["num1" => "$num1","num2" => "$num2","num3" => "$num3","num4" => "$num4","cows" => "$cows", "bulls" => "$bulls"]); 
            }
            else
            {
               
                return helpers::render('playerVSBot',["error" => "$errors->error"]);   
            }
            
        }
        else if (isset($_COOKIE['turnpId']))
        {
            $turnpId = $_SESSION['turnpId'];
            ${"turn$turnpId"} = new turn;
            
            //var_dump('elseif2');
            $_SESSION['turnpId'] = $_SESSION['turnpId']+1;
            setcookie('turnpId',$_COOKIE['turnpId']+1,time()+(3600*24*365));
     
            $num1 = ${"turn$turnpId"}->num1;
            $num2 = ${"turn$turnpId"}->num2;
            $num3 = ${"turn$turnpId"}->num3;
            $num4 = ${"turn$turnpId"}->num4;
            
            return helpers::render('playerVSBot',["num1" => "$num1","num2" => "$num2","num3" => "$num3","num4" => "$num4"]); 

        }
       

       
    }
}  
