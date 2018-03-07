<?php

namespace minigame\controllers;

use minigame\view\helpers;


class MainpageController
{
    public function actionIndex()
    {
        if (isset($_POST['StartPlayerVSBot']) || isset($_POST['newGame']) || isset($_POST['send_numbers']))
        {
            
            (new BotVSPlayer);
           
            die();
        }
        else
        {
            helpers::render('mainpage');
        }
    }
}