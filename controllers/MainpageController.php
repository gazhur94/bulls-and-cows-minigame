<?php

namespace minigame\controllers;

use minigame\view\helpers;



class MainpageController
{
    public function actionIndex()
    {   
        return helpers::render('mainpage');
    }
}