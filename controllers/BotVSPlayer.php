<?php

namespace minigame\controllers;

use minigame\view\helpers;
use minigame\models\game;
use minigame\components\player\number;
use minigame\components\player\checker;
use minigame\components\player\errors;
use minigame\components\player\turn;
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

                    return helpers::render('botVSPlayer', ["bulls" => "$bulls", "cows" =>"$cows"]);
                    


                }
                else
                {
                    
                    
                    return helpers::render('botVSPlayer',["error" => "$errors->error"]);
                    
                }    
            }
        }
      
        return helpers::render('botVSPlayer');

    }
    

}


