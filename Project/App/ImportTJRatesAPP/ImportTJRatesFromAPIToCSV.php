<?php


namespace App\ImportTJRatesAPP;


use App\ImportTJRatesAPP\core\ImportTJRatesInterface;

class ImportTJRatesFromAPIToCSV implements ImportTJRatesInterface
{
    private $saveCSV;
    protected $connectTJ;

    public function __construct($TJConnector, $CSVSaver)
    {
        $this->connectTJ = $TJConnector;
        $this->saveCSV = new SaveTJRatesFromAPIToCSV($CSVSaver);
    }

    public function importData()
    {
        $ratesList = $this->getRatesList();
        $this->saveCSV->save($ratesList);
    }

    public function getRatesList()
    {
        $rates = $this->connectTJ->summaryRates();
        return $rates;
    }
}