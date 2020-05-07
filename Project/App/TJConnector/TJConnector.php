<?php

namespace App\TJConnector;

use TaxJar;

class TJConnector
{

    private static $instance = null;
    private $conn;
    private $key = '9e0cd62a22f451701f29c3bde214';

    private function __construct()
    {
        $this->conn = TaxJar\Client::withApiKey($this->key);
        $this->conn->setApiConfig('api_url', TaxJar\Client::SANDBOX_API_URL);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new TJConnector();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}