<?php
use App\Controllers\Data\PostInputController;
use App\Controllers\Materials\MaterialController;
use App\Controllers\People\ChampionController;

// check authorization and sanitize data
$postInputController = new PostInputController();
$input = $postInputController->handlePost();
if (!$input['success']) {
    returnError($input['message']);
    die;
}
$data = $input['data'];
writeLog('downloadMaterialsUpdateUser-16', $data);
// see if this material exists in the database
$materialController = new MaterialController();
$materialID = $materialController->getIdByFileName($data['file']);
if (!$materialID) {
    returnError('File not found');
    die;
}
// create or update user
$championController = new ChampionController();
$userId = $championController->updateChampionFromForm($data);
writeLog('downloadMaterialsUpdateUser-26', $userId);
// return the file url
$file_url = RESOURCE_DIR . $data['file'];
header('Content-Type: application/json');
echo json_encode(array('success' => true, 'file_url' => $file_url));


function returnError($message){   
    writeLog('downloadMaterialsUpdateUser-25', $message); 
    header('Content-Type: application/json');         
    echo json_encode(array(
        'success' => false, 
        'message'=> $message));
}  
