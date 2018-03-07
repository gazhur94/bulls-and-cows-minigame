<?php

namespace minigame\controllers;

use minigame\view\helpers;
use minigame\models\game;
use minigame\components\number;
use minigame\components\checker;
use minigame\components\errors;
use minigame\components\turn;



class BotVSPlayer
{
   

    public function __construct()
    {   
        
        if (!isset($_COOKIE['turnId']))
        {
            setcookie('turnId',1);
            $number = new number;
            $_SESSION['number'] = $number;
        }
        else
        {

            if ((isset($_POST['num1'])) && (isset($_POST['num2'])) && (isset($_POST['num3'])) && (isset($_POST['num4'])))
            {
                //var_dump($_SESSION['number']);
                $errors = new errors;

                if (empty($errors->error))
                {
                    $turnId = $_COOKIE['turnId'];
                    ${"turn$turnId"} = new turn;
                    
                    $bulls = ${"turn$turnId"}->bulls;
                    $cows = ${"turn$turnId"}->cows;
                    
                    setcookie("turn$turnId",serialize(${"turn$turnId"}));
                    setcookie('turnId',$_COOKIE['turnId']+1);

                    helpers::render('index', ["bulls" => "$bulls", "cows" =>"$cows"]);
                    die();


                }
                else
                {
                    
                    
                    helpers::render('index',["error" => "$errors->error"]);
                    die();;
                }    
            }
        }
        if (isset($_POST['goToMain']))
        {
            header('Location: /');
            die();
        }
        helpers::render('index');

    }
    

}


