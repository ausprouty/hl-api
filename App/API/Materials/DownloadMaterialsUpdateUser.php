<?php
use App\Controllers\Data\PostInputController;
use App\Controllers\Materials\MaterialController;

header('Content-Type: application/json');

// check authorization and sanitize data
$postInputController = new PostInputController();
$input = $postInputController->handlePost();
if (!$input['success']) {
    returnError($input['message']);
    die;
}
$data = $input['data'];
// see if this material exists in the database
$materialController = new MaterialController();
$materialID = $materialController->getIdByFileName($data['file']);
if (!$materialID) {
    returnError('File not found');
    die;
}
$file_url = RESOURCE_DIR . $data['file'];
writeLog('downloadMaterialsUpdateUser-21', $file_url);
echo json_encode(array('success' => true, 'file_url' => $file_url));


function returnError($message){   
    writeLog('downloadMaterialsUpdateUser-25', $message);          
    echo json_encode(array(
        'success' => false, 
        'message'=> $message));
}  
