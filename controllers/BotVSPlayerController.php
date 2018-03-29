<?php

namespace minigame\controllers;

use minigame\view\helpers;
use minigame\models\game;
use minigame\components\player\number;
use minigame\components\player\checker;
use minigame\components\player\errors;
use minigame\components\player\turn;
use minigame\components\cookie;



class BotVSPlayerController
{
    public function actionIndex()
    {   
        if (!isset($_COOKIE['turnId']))
        {
            setcookie('turnId',1,time()+(3600));
            $_SESSION['number'] = new number;
            return $this->show();
        }
        else
        {
            if (isset($_POST['resetGame']))
            {
                return header('location: /resetGame1');
            }
            else if (isset($_POST['send_numbers']))
            {
                $errors = new errors;
                if (empty($errors->error))
                { 
                    return $this->get();
                }
                else
                {
                    return helpers::render('botVSPlayer',["error" => "$errors->error"]);
                }
            }
            else
            {
                return $this->show(); 
            }
        }
    }

    public function actionReset()
    {
        cookie::clear();
        return header('location: /botVSplayer'); 
    }

    public function get()
    {
        $turnId = $_COOKIE['turnId'];
        ${"turnb$turnId"} = new turn;
                
        setcookie("turnb$turnId",serialize(${"turnb$turnId"}),time()+(3600));
        setcookie('turnId',$_COOKIE['turnId']+1,time()+(3600));

        return header('location: /botVSplayer');
    }

    private function show()
    {
        {
            return helpers::render('botVSPlayer');
        }
       
    }


}


