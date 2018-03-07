<?php

namespace minigame\controllers;

use minigame\view\helpers;
use minigame\components\cookie;


class MainpageController
{
    public function actionIndex()
    {
        if (isset($_POST['StartBotVSPlayer']) ||  isset($_POST['send_numbers']))
        {
            (new BotVSPlayer);      
            
        }
        else if (isset($_POST['resetGame'])) 
        {
            unset($_POST);
            cookie::clear();
            
           
            if (isset($_COOKIE))
            {
                var_dump('tut');
                new self;
            }   
            
            (new BotVSPlayer); 
        }
        else
        {
            helpers::render('mainpage');
        }
    }
}