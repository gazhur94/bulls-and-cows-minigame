<?php

namespace minigame\controllers;

use minigame\view\helpers;
use minigame\models\game;
use minigame\components\number;
use minigame\components\checker;
use minigame\components\errors;
use minigame\components\turn;
use minigame\components\cookie;



class BotVSPlayer
{
   

    public function __construct()
    {   
        

        if (!isset($_COOKIE['turnId']))
        {
            setcookie('turnId',1,time()+(3600*24*365));
             
            $_SESSION['number'] = new number;
        }

        else
        {

            if (isset($_POST['send_numbers']))
            {
                //var_dump($_SESSION['number']);
                $errors = new errors;

                if (empty($errors->error))
                {
                    $turnId = $_COOKIE['turnId'];
                    ${"turn$turnId"} = new turn;
                    
                    $bulls = ${"turn$turnId"}->bulls;
                    $cows = ${"turn$turnId"}->cows;
                    
                    setcookie("turn$turnId",serialize(${"turn$turnId"}),time()+(3600*24*365));
                    setcookie('turnId',$_COOKIE['turnId']+1,time()+(3600*24*365));

                    return helpers::render('index', ["bulls" => "$bulls", "cows" =>"$cows"]);
                    


                }
                else
                {
                    
                    
                    return helpers::render('index',["error" => "$errors->error"]);
                    
                }    
            }
        }
      
        return helpers::render('index');

    }
    

}


