<?php

namespace minigame\components;

class cookie
{
    public static function clear()
    {
        if (isset($_COOKIE)) 
        {
            foreach($_COOKIE as $name => $value) 
            {
                
                    {
                        setcookie($name, '', 1); 
                        setcookie($name, '', 1, '/');
                    }
                
            }
        }   
    }


}