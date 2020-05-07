<?php


namespace App\ImportTJRatesAPP\core;


interface SaveTJRatesInterface
{
    public function __construct($connectionAPP);

    public function save($data);

    public function handler($request, $args);
}