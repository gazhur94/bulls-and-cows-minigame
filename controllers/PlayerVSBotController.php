<?php

namespace minigame\controllers;

use minigame\view\helpers;

use minigame\components\bot\turn;
use minigame\components\bot\bullsAndCows;
use minigame\components\bot\errors;
use minigame\components\cookie;


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
            //  var_dump('!isset');
             $_SESSION['turnpId'] = $_SESSION['turnpId'] +1;
             setcookie('turnpId',$_COOKIE['turnpId']+1,time()+(3600));
             return header('location: /playerVSbot');   
       
        } 
        else 
        {
            if (isset($_POST['resetGame2']))
            {
                return header('location: /resetGame2');
            }
            else if (isset($_POST['sendCowsBulls']))
            {
                // var_dump('send');
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
                //var_dump($errors);

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
                   // var_dump('error');
                    return helpers::render('playerVSBot',["error" => "$errors->error"]);   
                }

            }
            else
            {
               // var_dump('else');
                return helpers::render('playerVSBot');
            }
        }
    }
        public function actionSetCookie()
        {
            return header('location: /playerVSbot');
        }
        public function actionReset()
    {
        cookie::clear();
        return header('location: /playerVSbot'); 
    }

}  
