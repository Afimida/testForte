<?php

namespace App\ImportTJRatesAPP;

use App\ImportTJRatesAPP\core\ImportTJRatesInterface;

class ImportTJRatesFromAPIToDB implements ImportTJRatesInterface
{
    private $saveDB;
    protected $connectTJ;

    public function __construct($TJConnector, $DBConnector)
    {
        $this->connectTJ = $TJConnector;
        $this->saveDB = new SaveTJRatesFromAPIToDB($DBConnector);
    }

    public function importData()
    {
        $ratesList = $this->getRatesList();
        $this->saveDB->save($ratesList);
    }

    public function getRatesList()
    {
        $rates = $this->connectTJ->summaryRates();
        return $rates;
    }
}
