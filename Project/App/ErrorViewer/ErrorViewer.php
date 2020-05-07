<?php

namespace App\ErrorViewer;


class ErrorViewer
{

    private static $instance = null;

    private function __construct()
    {
        error_reporting(0);
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
        error_reporting(E_ALL & ~E_NOTICE);
        error_reporting(E_ALL);
        error_reporting(-1);
        ini_set('error_reporting', E_ALL);
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new ErrorViewer();
        }

        return self::$instance;
    }
}