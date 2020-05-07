<?php


namespace App\Logger;


class ErrorLogToFile
{
    const LOG_FILE_NAME = 'errors.log';
    const LOG_FILE_FOLDER = '/var/www/Logs/';

    static function writeInToLogs($errorMessage)
    {
        error_log($errorMessage . PHP_EOL, 3, self::LOG_FILE_FOLDER . self::LOG_FILE_NAME);
    }
}