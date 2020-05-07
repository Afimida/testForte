<?php

namespace App\ImportTJRatesAPP;

use App\ImportTJRatesAPP\core\SaveTJRatesInterface;

class SaveTJRatesFromAPIToCSV implements SaveTJRatesInterface
{
    protected $csvSaver;

    public function __construct($CSVSaver)
    {
        $this->csvSaver = $CSVSaver;
    }

    public function save($ratesList)
    {
        // TODO: Implement save() method.
        $tableName = 'Countries with rates';
        $finalArray = $this->handler($ratesList, $tableName);
        $this->csvSaver->writeToFile($finalArray);
    }

    public function handler($arrayObject, $tableName)
    {
        // TODO: Implement hendler() method.
        $array = $arrayObject;
        $today = date('Y-m-d');
        foreach ($array as $key => $item) {
            $result[$key] = [
                'country' => $item->country,
                'state' => $item->region_code,
                'mininmum_rate' => $item->minimum_rate->rate,
                'average_rate' => $item->average_rate->rate,
                'date' => $today
            ];
        }
        return $result;
    }
}