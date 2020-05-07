<?php

namespace App\Saver;

use App\Logger\ErrorLogToFile;
use Exception;

class CSVSaver
{
    private static $instance = null;
    private $projectUploadsPath;

    private function __construct($projectPath)
    {
        $this->projectUploadsPath = $projectPath . '/uploads/';
    }

    public function writeToFile($array)
    {
        $date = date('Y-m-d-h-i-s');
        try {
            if ($fp = fopen($this->projectUploadsPath . "file-$date.csv", 'w')) {
                foreach ($array as $fields) {
                    $writeResult = fputcsv($fp, $fields);
                    if (!$writeResult)
                        throw new Exception('Write error.');
                }
                fclose($fp);
            } else {
                throw new Exception('File open failed.');
            }
        } catch (Exception $e) {
            ErrorLogToFile::writeInToLogs("CSVSaver: " . $e->getMessage());
        }

    }

    public static function getInstance($projectPath)
    {
        if (!self::$instance) {
            self::$instance = new CSVSaver($projectPath);
        }

        return self::$instance;
    }
}