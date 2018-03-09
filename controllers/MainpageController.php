<?php

namespace minigame\controllers;

use minigame\view\helpers;
use minigame\components\cookie;


class MainpageController
{
    public function actionIndex()
    {
        if (isset($_POST['StartBotVSPlayer']) ||  isset($_POST['send_numbers']) ||  isset($_POST['showAnswer']) )
        {
            if (isset($_POST['showAnswer']))
            {
               
                cookie::clear();
                (new BotVSPlayer);      
            }
            else
            {
                (new BotVSPlayer);    
            }
            
        }
        else if (isset($_POST['win']) || isset($_POST['loose']))
        {
            (new PlayerVSBot);
        }
        
        else if (isset($_POST['StartPlayerVSBot']) )
        {
            (new PlayerVSBot);      
            
        }
        else if (isset($_POST['goToMain']))
        {
            helpers::render('mainpage');
        }
        else if (isset($_COOKIE['turn1']) && $_COOKIE['turn1'] == '0')
        {
            
                (new BotVSPlayer); 
            
        }
        else if (isset($_POST['resetGame'])) 
        {
            
            cookie::clear();
            
            if (isset($_COOKIE))
            {
                setcookie('turn1',0);
                header('location: /');
            }   
            
            (new BotVSPlayer); 
        }
        else
        {
            helpers::render('mainpage');
        }
    }
}