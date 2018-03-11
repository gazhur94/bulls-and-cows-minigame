<?php

namespace minigame\controllers;

use minigame\view\helpers;


class PlayerVSBot
{
    public function __construct()
    {  
        // if (!isset($_COOKIE['turnId']))
        // {
        //     setcookie('turnId',1,time()+(3600*24*365));
             
        //     $_SESSION['guess'] = new number;
        // }

        // if (isset($_POST['sendCowsBulls']))
        // {
        //     $bulls = $_POST['bulls'];
        //     $cows = $_POST['cows'];


        //     $guess = array();

           



        // }
        helpers::render('playerVSBot');
    }
}
   
