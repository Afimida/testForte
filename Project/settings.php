<?php

use App\DBConnector\Model\ModelCreator;
use App\DBConnector\DBConnector;
use App\ErrorViewer\ErrorViewer;
use App\TemplateAPP\TemplateCollector;
use App\TJConnector\TJConnector;
use App\ImportTJRatesAPP\ImportTJRatesFromAPIToDB;
use App\ImportTJRatesAPP\ImportTJRatesFromAPIToCSV;
use App\TemplateAPP\TemplateSettings;
use App\Saver\CSVSaver;

$loader = require __DIR__ . '/vendor/autoload.php';
$config = require __DIR__ . '/config.php';
$errors = ErrorViewer::getInstance();
$loader->addPsr4('App\\', __DIR__ . '/App');
$DBInstance = DBConnector::getInstance();
$DBConnection = $DBInstance->getConnection();
$TJInstance = TJConnector::getInstance();
$TJConnection = $TJInstance->getConnection();
$CSVSaver = CSVSaver::getInstance(PROJECT_PATH);
$importRatesToDB = new ImportTJRatesFromAPIToDB($TJConnection, $DBConnection);
$importRatesToCSV = new ImportTJRatesFromAPIToCSV($TJConnection, $CSVSaver);
$models = new ModelCreator();
$templateSettings = TemplateSettings::getInstance();
$templateSettings->setAssetsDir(ASSETS_DIR);
$templateSettings->setMediaDir(MEDIA_DIR);
$templateSettings->setTemplatesDir(TEMPLATES_DIR);
$templateApp = new TemplateCollector($templateSettings);