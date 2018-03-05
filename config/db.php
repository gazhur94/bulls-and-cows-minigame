<?php
namespace minigame\config;

use minigame\classes\sql;
use PDO;

class db
{
    public static function getConnection()
    {
        try
        {
            $pdo = new PDO('mysql:host=localhost; dbname=minigame;charset=utf8', 'admin', '12345');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        }
        catch (PDOException $e)
        {
                echo $e->getMessage();
        }
    }
}
