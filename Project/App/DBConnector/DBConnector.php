<?php

namespace App\DBConnector;

use PDO;
use App\DBConnector\Model\ModelCreator;

class DBConnector
{
    private static $instance = null;
    private $conn;
    private $host = 'mysql';
    private $user = 'release';
    private $pass = 'root13#aspass';
    private $name = 'release-1.0';

    private function __construct()
    {
        $this->conn = new PDO("mysql:host={$this->host}; dbname={$this->name}", $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DBConnector();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}