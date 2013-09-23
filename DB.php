<?php

/**
 * Connexion to dataBase
 *
 * @author ionut
 */
class DB
{

    private static $instance;
    private $db;

    private function __construct()
    {
        include('config.php');
        $this->db = new \PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'], $config['db']['username'], $config['db']['password']);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function prepare($query)
    {
        return $this->db->prepare($query);
    }

    public function query($query)
    {
        return $this->db->query($query);
    }

}
