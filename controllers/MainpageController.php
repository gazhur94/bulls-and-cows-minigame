<?php

namespace minigame\controllers;

use minigame\view\helpers;




class MainpageController
{
    public function actionIndex()
    {   
        
        helpers::render('index');
    }
}


