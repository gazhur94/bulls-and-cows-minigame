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
             setcookie('turnpId',1,time()+(3600));
             $_SESSION['turnpId'] = 1;
             $turnpId = 1;
             ${"turnp$turnpId"} = new turn;
             setcookie("turnp$turnpId",serialize(${"turnp$turnpId"}),time()+(3600));
             //self::setCookie();
             var_dump('!isset');
             $_SESSION['turnpId'] = $_SESSION['turnpId'] +1;
             setcookie('turnpId',$_COOKIE['turnpId']+1,time()+(3600));
             return header('location: /playerVSbot');   
       
        } 
        else 
        {
            if (isset($_POST['sendCowsBulls']))
            {
                var_dump('send');
                $errors = new errors;
                $turnpId = $_SESSION['turnpId'];
                ${"turnp$turnpId"} = new turn;
                setcookie("turnp$turnpId",serialize(${"turnp$turnpId"}),time()+(3600));
                
                $turnpIdbc = $turnpId-1;
                ${"bc$turnpIdbc"} = new bullsAndCows;
                setcookie("bc$turnpIdbc",serialize(${"bc$turnpIdbc"}),time()+(3600));
                // var_dump($_COOKIE);
                // die();
                
                $cows = ${"bc$turnpIdbc"}->cows;
                $bulls = ${"bc$turnpIdbc"}->bulls;
    
            
                $num1 = ${"turnp$turnpId"}->num1;
                $num2 = ${"turnp$turnpId"}->num2;
                $num3 = ${"turnp$turnpId"}->num3;
                $num4 = ${"turnp$turnpId"}->num4;    
                
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
                var_dump($errors);

                if (empty($errors->error))
                {
                    // var_dump('tut');
                    // die;
                    $_SESSION['turnpId'] = $_SESSION['turnpId'] +1;
                    setcookie('turnpId',$_COOKIE['turnpId']+1,time()+(3600));
                    header('location: /setcookie'); 
                }
                else
                {
                    var_dump('error');
                    return helpers::render('playerVSBot',["error" => "$errors->error"]);   
                }

            }
            else
            {
                var_dump('else');
                return helpers::render('playerVSBot');
            }
        }
    }
        public static function actionSetCookie()
        {
            return header('location: /playerVSbot');
        }


    
    //     if (!isset($_COOKIE['turnpId']))
    //     {
    //          setcookie('turnpId',1,time()+(3600));
    //          $_SESSION['turnpId'] = 1;
    //          $turnpId = 1;
    //          ${"turnp$turnpId"} = new turn;
            
    //          setcookie("turnp$turnpId",serialize(${"turnp$turnpId"}),time()+(3600));
        
    //          //var_dump('if');
         
    //          return helpers::render('playerVSBot',["num1" => "$turnp1->num1","num2" => "$turnp1->num2","num3" => "$turnp1->num3","num4" => "$turnp1->num4"]);        
    //     }
    //     else if (isset($_POST['sendCowsBulls']))
    //     {
    //         $errors = new errors;
    //         $turnpId = $_SESSION['turnpId'];
    //         ${"turn$turnpId"} = new turn;
    //         setcookie("turn$turnpId",serialize(${"turn$turnpId"}),time()+(3600));
            
    //         $turnpIdbc = $turnpId-1;
    //         ${"bc$turnpIdbc"} = new bullsAndCows;
            
    //         $cows = ${"bc$turnpIdbc"}->cows;
    //         $bulls = ${"bc$turnpIdbc"}->bulls;

        
    //         $num1 = ${"turn$turnpId"}->num1;
    //         $num2 = ${"turn$turnpId"}->num2;
    //         $num3 = ${"turn$turnpId"}->num3;
    //         $num4 = ${"turn$turnpId"}->num4;    
            
    //         $bulls = $_POST['bulls'];
    //         $cows = $_POST['cows']; 
    //         if ($_POST['bulls'] == '')
    //         {
    //             $bulls = 0;
    //         }
    //         if ($_POST['cows'] == '')
    //         {
    //             $cows = 0;
    //         }
    //         if (empty($errors->error))
    //         {
    //             setcookie("bc$turnpIdbc",serialize(${"bc$turnpIdbc"}),time()+(3600));
    //             return helpers::render('playerVSBot',["num1" => "$num1","num2" => "$num2","num3" => "$num3","num4" => "$num4","cows" => "$cows", "bulls" => "$bulls"]); 
    //         }
    //         else
    //         {
               
    //             return helpers::render('playerVSBot',["error" => "$errors->error"]);   
    //         }
            
    //     }
    //     else if (isset($_COOKIE['turnpId']))
    //     {
    //         $turnpId = $_SESSION['turnpId'];
    //         ${"turn$turnpId"} = new turn;
            
    //         //var_dump('elseif2');
    //         $_SESSION['turnpId'] = $_SESSION['turnpId']+1;
    //         setcookie('turnpId',$_COOKIE['turnpId']+1,time()+(3600));
     
    //         $num1 = ${"turn$turnpId"}->num1;
    //         $num2 = ${"turn$turnpId"}->num2;
    //         $num3 = ${"turn$turnpId"}->num3;
    //         $num4 = ${"turn$turnpId"}->num4;
            
    //         return helpers::render('playerVSBot',["num1" => "$num1","num2" => "$num2","num3" => "$num3","num4" => "$num4"]); 

    //     }
       

       
    
}  
// <?php 
												
// 												$currentTurn = unserialize($_COOKIE["turnp$turnpId"]); 
// 												$t=$_SESSION['turnpId'];
// 										
										
// 											 for ($j=1;$j<=4;$j++): 
// 												<div class="time days">
// 													<div class="value"><?php echo $_COOKIE["turnp$t"]->num{$j}	
// 												
// 											< endfor; 