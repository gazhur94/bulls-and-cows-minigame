<?php
namespace minigame\view;
class helpers
{
    public static function render ($template, $data =[])
    {
        
        $path = __DIR__ . '/' . $template . ".php";
       
        if (file_exists($path))
        {
            // die($path);
            extract($data);
            require($path);
        }
    }
}