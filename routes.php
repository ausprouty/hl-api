<?php

$dir = __DIR__ ;
require_once __DIR__ .'/router.php';
require_once __DIR__.'/App/Includes/writeLog.php';
require_once $dir .'/App/Configuration/.env.local.php';
require_once  __DIR__.'/App/Configuration/my-autoload.inc.php';
get('/hl-api/' . 'local', '/App/Views/indexLocal.php');
get('/hl-api/' . 'test/spirit/titles', 'App/Tests/canGetSpiritTitlesByLanguage.php');
get('/hl-api/' . 'test/tracts/view', 'App/Tests/canGetTractsToView.php');
get('/hl-api/' . 'test/tracts/monolingual', 'App/Tests/canGetTractsMonolingual.php');

