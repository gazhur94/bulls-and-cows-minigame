<?php

namespace minigame\controllers;

use minigame\view\helpers;
use minigame\models\game;
use minigame\components\number;
use minigame\components\checker;



class GameController
{
    public function actionIndex()
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
                $errors = array();
                if($_POST['num1'] == $_POST['num2'] || $_POST['num1'] == $_POST['num3'] || $_POST['num1'] == $_POST['num4'] || $_POST['num2'] == $_POST['num3'] || $_POST['num2'] == $_POST['num4'] || $_POST['num3'] == $_POST['num4'])
                {
                    $errors = 'Цифри не можуть повторюватись';
                }
                if($_POST['num1']=='' || $_POST['num2']==''  || $_POST['num3']=='' || $_POST['num4']=='')
                {
                    $errors = 'Введіть всі поля';
                }

                if (empty($errors))
                {
                    $turnId = $_COOKIE['turnId'];
                    ${"turn$turnId"} = new game;
                
                    ${"turn$turnId"}->turnId = $_COOKIE['turnId'];
                    ${"turn$turnId"}->turn['num1'] = $_POST['num1'];
                    ${"turn$turnId"}->turn['num2'] = $_POST['num2'];
                    ${"turn$turnId"}->turn['num3'] = $_POST['num3'];
                    ${"turn$turnId"}->turn['num4'] = $_POST['num4'];
                    ${"turn$turnId"}->turn['cows']  = $cows = checker::cows($_POST['num1'],$_POST['num2'],$_POST['num3'],$_POST['num4']);
                    ${"turn$turnId"}->turn['bulls'] = $bulls = checker::bulls($_POST['num1'],$_POST['num2'],$_POST['num3'],$_POST['num4']);
                    
                    setcookie("turn$turnId",serialize(${"turn$turnId"}));
                    
                    setcookie('turnId',$_COOKIE['turnId']+1);
                    helpers::render('index', ["bulls" => "$bulls", "cows" =>"$cows"]);
                    die();


                }
                else
                {
                    
                    
                    helpers::render('index',["error" => "$errors"]);
                    die();;
                }    
            }
        }

        helpers::render('index');
    }
}


