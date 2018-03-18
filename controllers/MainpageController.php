<?php

namespace minigame\controllers;

use minigame\view\helpers;



class MainpageController
{
    public function actionIndex()
    {
        if (isset($_POST['StartBotVSPlayer']))
        {
            return header('location: /botVSplayer');   
        }
        else if (isset($_POST['StartPlayerVSBot']))
        {
            return header('location: /playerVSbot');   
        }
        else
        {
            return helpers::render('mainpage');
        }

        // if (isset($_POST['StartBotVSPlayer']) ||  isset($_POST['send_numbers']) ||  isset($_POST['showAnswer']) )
        // {
        //     if (isset($_POST['showAnswer']))
        //     {
               
        //         cookie::clear();
        //         (new BotVSPlayer);      
        //     }
        //     else
        //     {
        //         (new BotVSPlayer);    
        //     }
            
        // }
        // else if (isset($_POST['win']) || isset($_POST['loose']))
        // {
        //     //var_dump('winlose');
        //     (new PlayerVSBot);
        // }
        
        // else if (isset($_POST['StartPlayerVSBot']))
        // {
        //     //var_dump('start');
        //     cookie::clear();
        //     (new PlayerVSBot);      
            
        // }
        // else if (isset($_POST['sendCowsBulls']))
        // {
        //     //var_dump('send');
        //     (new PlayerVSBot);  
        // }
        // else if (isset($_POST['goToMain']))
        // {
        //     cookie::clear();
        //     helpers::render('mainpage');
        // }
        // else if (isset($_COOKIE['turn1']) && $_COOKIE['turn1'] == '0')
        // {
            
        //         (new BotVSPlayer); 
            
        // }
        // else if (isset($_POST['resetGame'])) 
        // {
            
        //     cookie::clear();
            
        //     if (isset($_COOKIE))
        //     {
        //         setcookie('turn1',0);
        //         header('location: /');
        //     }   
            
        //     (new BotVSPlayer); 
        // }
        // else if (isset($_COOKIE['turn1']) && $_COOKIE['turn1'] == '1')
        // {
           
        //         (new PlayerVSBot); 
            
        // }
        // else if (isset($_POST['resetGame2'])) 
        // {
            
        //     cookie::clear();
            
        //     if (isset($_COOKIE))
        //     {
        //         setcookie('turn1',1);
        //         header('location: /');
        //     }   
            
            
        // }

        // else
        // {
        //     cookie::clear();
        //     helpers::render('mainpage');
        // }
    }
}