<?php


namespace App\DBConnector\Model;

use App\DBConnector\Model\ModelList;
use App\Logger\ErrorLogToFile;
use PDOException;

class ModelCreator
{
    protected $sql = [];

    public function __construct()
    {
        $this->sqlQueries();
    }

    public function createTables($DBConnect)
    {
        foreach ($this->sql as $key => $sql) {
            $query = $DBConnect->prepare($sql);
            $query->execute();
            if ($query->errorCode() != 0) {
                $errors = $query->errorInfo();
                $tableNumber = $key + 1;
                ErrorLogToFile::writeInToLogs("Model creator: create table $tableNumber error -" . $errors[2]);
            }
        }
    }

    private function sqlQueries()
    {
        $sql = [
            "CREATE TABLE `countries` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
              `country` text,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;",
            "CREATE TABLE `states` (
            `country_id` int(11),
              `id` int(11) AUTO_INCREMENT,
              `state` text,
              KEY `country_id` (`country_id`),
              KEY `id` (`id`),
              FOREIGN KEY (`country_id`) REFERENCES `countries`(`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;",
            "CREATE TABLE `rates` (
              `country_id` int(11),
              `state_id` int(11),
              `id` int(11) AUTO_INCREMENT,
              `minimum_rate` float,
              `average_rate` float,
              `date_add` date,
              KEY `country_id` (`country_id`),
              KEY `state_id` (`state_id`),
              KEY `id` (`id`),
              FOREIGN KEY (`country_id`) REFERENCES `countries`(`id`),
              FOREIGN KEY (`state_id`) REFERENCES `states`(`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
        ];
        $this->sql = $sql;
    }
}