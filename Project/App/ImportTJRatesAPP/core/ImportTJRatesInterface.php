<?php


namespace App\ImportTJRatesAPP\core;


interface ImportTJRatesInterface
{
    public function __construct($connectionTJ, $connectionAPP);

    public function importData();

    public function getRatesList();
}