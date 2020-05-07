<?php

namespace App\ImportTJRatesAPP;

use App\ImportTJRatesAPP\core\SaveTJRatesInterface;
use App\Logger\ErrorLogToFile;
use PDOException;

class SaveTJRatesFromAPIToDB implements SaveTJRatesInterface
{
    protected $connectDB;

    public function __construct($DBConnector)
    {
        $this->connectDB = $DBConnector;
    }

    public function save($ratesList)
    {
        // TODO: Implement save() method.
        foreach ($ratesList as $value) {
            $sql = "INSERT INTO countries (country) SELECT * FROM (SELECT '$value->country') AS tmp WHERE NOT EXISTS (SELECT country FROM countries WHERE country = '$value->country') LIMIT 1;";
            $this->handler($sql, 'countries');
        }
        foreach ($ratesList as $state) {
            if (isset($state->region_code) && !empty($state->region_code)) {
                $sqlStates = "INSERT INTO states (country_id, state)
                              SELECT (SELECT id FROM countries WHERE country='$state->country' LIMIT 1), '$state->region_code'
                              FROM dual 
                              WHERE NOT EXISTS
                                    ( SELECT *
                                      FROM states
                                      WHERE country_id = (SELECT id FROM countries WHERE country='$state->country' LIMIT 1)
                                        AND state = '$state->region_code'
                                    ) ;";
                $this->handler($sqlStates, 'states');
            }
        }
        foreach ($ratesList as $rateItem) {
            $today = date("Ymd");
            $min = $rateItem->minimum_rate->rate;
            $avg = $rateItem->average_rate->rate;
            $sqlRates = "INSERT INTO rates (country_id, state_id, minimum_rate, average_rate, date_add) VALUES ((SELECT id FROM countries WHERE country = '$rateItem->country'), (SELECT id FROM states WHERE state = '$rateItem->region_code'), '$min', '$avg', '$today')";
            $this->handler($sqlRates, 'rates');
        }
    }

    public function handler($request, $name)
    {
        // TODO: Implement hendler() method.
        try {
            $queryRates = $this->connectDB->prepare($request);
            $queryRates->execute();
            if ($queryRates->errorCode() != 0) {
                $errors = $queryRates->errorInfo();
                ErrorLogToFile::writeInToLogs("SaveTJRatesFromAPIToDB: insert $name error -" . $errors[2]);
            }
        } catch (PDOException $e) {
            ErrorLogToFile::writeInToLogs("SaveTJRatesFromAPIToDB:PDOException insert $name error -" . $e->getMessage());
        }
    }
}