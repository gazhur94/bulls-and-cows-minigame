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

    }
}