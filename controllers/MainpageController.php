<?php

namespace authorization\controllers;

use authorization\view\helpers;




class MainpageController
{
    public function actionIndex()
    {   
        
        helpers::render('index');
    }
}


