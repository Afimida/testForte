<?php
require __DIR__ . '/settings.php';
$models->createTables($DBConnection);
$importRatesToDB->importData();
// не хотел тратить время на роутер тупо запилил через гет.
if (isset($_GET['page']) && $_GET['page'] == 'generic')
    echo $templateApp->collectPageContent('footer.php', 'header.php', 'generic.php');
elseif (isset($_GET['page']) && $_GET['page'] == 'elements')
    echo $templateApp->collectPageContent('footer.php', 'header.php', 'elements.php');
else
    echo $templateApp->collectPageContent('footer.php', 'header.php', 'home-page.php');
