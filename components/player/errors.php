<?php

namespace minigame\components\player;

class errors
{
    public function __construct()
    {
        $this->error = self::checkEmpty();
        if (empty($this->error))
        {
            $this->error = self::checkDoublet();
        }
        return $this;

    }
    private static function checkDoublet()
    {
        $array[] = $_POST['num1'];
        $array[] = $_POST['num2'];
        $array[] = $_POST['num3'];
        $array[] = $_POST['num4'];

        $uniqueArray = array_unique($array);

        if($array != $uniqueArray)
        {
            $error = 'Цифри не можуть повторюватись';
            return $error;
   
        }
        else 
        {
            $error = '';
            return $error;
        }
    }
    private static function checkEmpty()
        
    {   
        if($_POST['num1']=='' || $_POST['num2']==''  || $_POST['num3']=='' || $_POST['num4']=='')
        {
            $error = 'Введіть всі поля';
            return $error;   
        }
        else 
        {
            $error = '';
            return $error;
        }
    }
}