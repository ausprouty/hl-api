<?php

$dir = __DIR__ ;
require_once __DIR__ .'/router.php';
require_once __DIR__.'/App/Includes/writeLog.php';

if ( $dir == '/home/hereslife/api.hereslife.com'){
    require_once $dir .'/App/Configuration/.env.remote.php';
}
else{
    require_once $dir .'/App/Configuration/.env.local.php';
}
require_once  __DIR__.'/App/Configuration/my-autoload.inc.php';
get('/hl-api/' . 'local', '/App/Views/indexLocal.php');
get('/hl-api/' . 'test/spirit/titles', 'App/Tests/canGetSpiritTitlesByLanguage.php');
get('/hl-api/' . 'test/tracts/view', 'App/Tests/canGetTractsToView.php');
get('/hl-api/' . 'test/tracts/monolingual', 'App/Tests/canGetTractsMonolingual.php');
get('/hl-api/' . 'test/tracts/bilingual/english', 'App/Tests/canGetTractsBilingualEnglish.php');
get('/rcd/test', 'App/Tests/canAccessFromWordPress.php');
get('/rcd/spirit/titles', 'App/API/Materials/getSpiritTitles.php');
get('/rcd/tracts/view', 'App/API/Materials/getTractsToView.php');

