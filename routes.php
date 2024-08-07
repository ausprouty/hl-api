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
    $path = '/hl-api/';
    $location = 'local';
}

require_once  __DIR__.'/App/Configuration/my-autoload.inc.php';
writeLog('routes.php', $path . 'spirit/titles');

get( $path, '/App/Views/indexLocal.php');
get($path . 'test', 'App/API/Materials/getTractsToView.php');

get($path . 'spirit/titles', 'App/API/Materials/getSpiritTitles.php');
get($path . 'spirit/text/$language', 'App/API/Materials/getSpiritText.php');
get($path . 'tracts/view', 'App/API/Materials/getTractsToView.php');
get ($path . 'email/series/$series/$series_sequence', 'App/API/Emails/SeriesEmailText.php' );
post ($path . 'email/series/$series/$series_sequence', 'App/API/Emails/SeriesEmailTextUpdate.php' );
post($path . 'materials/download', 'App/API/Materials/DownloadMaterialsUpdateUser.php');

if ($location == 'local'){
    get($path . 'test/spirit/titles', 'App/Tests/canGetSpiritTitlesByLanguage.php');
    get($path . 'test/tracts/view', 'App/Tests/canGetTractsToView.php');
    get($path . 'test/tracts/monolingual', 'App/Tests/canGetTractsMonolingual.php');
    get($path . 'test/tracts/bilingual/english', 'App/Tests/canGetTractsBilingualEnglish.php');
    get($path . '/rcd/test', 'App/Tests/canAccessFromWordPress.php');
}


