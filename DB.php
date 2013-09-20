<?php

include('config.php');

/**
 * Connexion to dataBase
 *
 * @author ionut
 */
class DB
{
    private static $instance;
    
    private function __construct()
    {
        $db = new \PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'], $config['db']['username'], $config['db']['password']);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
}

//Intantiate the class
$database = DB::getInstance();
