<?php

namespace minigame\components\bot;

class errors
{
    public function __construct()
    {
        $this->error = self::checkValid();
        
        return $this;

    }
    private static function checkValid()
    {
        if (isset($_POST['bulls']) && isset($_POST['cows']))
        {
            if(($_POST['bulls'] + $_POST['cows']) > 4)
            {
                {
                    $error = 'Сума биків і корів не може бути більше 4';
                    return $error;
        
                }
            }
            else 
            {
                $error = '';
                return $error;
            }
            
        }
    }
    
}