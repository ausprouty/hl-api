<?php

$dir = __DIR__ ;
require_once __DIR__ .'/router.php';
require_once __DIR__.'/App/Includes/writeLog.php';


if ( $dir == '/home/hereslife/api.hereslife.com'){
    require_once $dir .'/App/Configuration/.env.remote.php';
    $path = '/';
    $location = 'remote';
}
else{
    require_once $dir .'/App/Configuration/.env.local.php';
    $path = '/api_hereslife/backend/';
    $location = 'local';
}

error_log("LOG_MODE: " . LOG_MODE);
error_log("ROOT_LOG: " . ROOT_LOG);
error_log("URL: " . $_SERVER['REQUEST_URI']);
writeLog('routes.php', $path . 'spirit/titles');
require_once  __DIR__.'/App/Configuration/my-autoload.inc.php';


get( $path, '/App/Views/indexLocal.php');
get($path . 'test', 'App/API/Materials/getTractsToView.php');

get($path . 'spirit/titles', 'App/API/Materials/getSpiritTitles.php');
get($path . 'spirit/text/$language', 'App/API/Materials/getSpiritText.php');
get($path . 'tracts/view', 'App/API/Materials/getTractsToView.php');
get ($path . 'email/series/$series/$sequence', 'App/API/Emails/SeriesEmailText.php' );
post ($path . 'email/series/$series/$sequence', 'App/API/Emails/SeriesEmailTextUpdate.php' );
post($path . 'materials/download', 'App/API/Materials/DownloadMaterialsUpdateUser.php');

if ($location == 'local'){
    get($path . 'test/spirit/titles', 'App/Tests/canGetSpiritTitlesByLanguage.php');
    get($path . 'test/tracts/view', 'App/Tests/canGetTractsToView.php');
    get($path . 'test/tracts/monolingual', 'App/Tests/canGetTractsMonolingual.php');
    get($path . 'test/tracts/bilingual/english', 'App/Tests/canGetTractsBilingualEnglish.php');
    get($path . '/rcd/test', 'App/Tests/canAccessFromWordPress.php');
}


