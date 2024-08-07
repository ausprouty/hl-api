<?php

$dir = __DIR__ ;
require_once __DIR__ .'/router.php';
require_once __DIR__.'/Includes/writeLog.php';
writeLog('routes-6', $dir);

if ( $dir == '/home/hereslife/api.hereslife.com'){
    require_once $dir .'/Configuration/.env.remote.php';
    $path = '/';
    $location = 'remote';
}
else{
    require_once $dir .'/Configuration/.env.local.php';
    $path = '/api_hereslife/public/App/';
    $location = 'local';
}
writeLog('routes-17', $path);
require_once  __DIR__.'/Configuration/my-autoload.inc.php';
writeLog('routes.php', $path . 'spirit/titles');

get( $path, '/Views/indexLocal.php');
get($path . 'test', 'API/Materials/getTractsToView.php');

get($path . 'spirit/titles', 'API/Materials/getSpiritTitles.php');
get($path . 'spirit/text/$language', 'API/Materials/getSpiritText.php');
get($path . 'tracts/view', 'API/Materials/getTractsToView.php');
post($path . 'materials/download', 'API/Materials/downloadMaterialsUpdateUser.php');

if ($location == 'local'){
    get($path . 'test/spirit/titles', 'Tests/canGetSpiritTitlesByLanguage.php');
    get($path . 'test/tracts/view', 'Tests/canGetTractsToView.php');
    get($path . 'test/tracts/monolingual', 'Tests/canGetTractsMonolingual.php');
    get($path . 'test/tracts/bilingual/english', 'Tests/canGetTractsBilingualEnglish.php');
    get($path . '/rcd/test', 'Tests/canAccessFromWordPress.php');
}


