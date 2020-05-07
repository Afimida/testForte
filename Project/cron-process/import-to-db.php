<?php
require __DIR__ . '/../settings.php';

$models->createTables($DBConnection);
$importRatesToDB->importData();