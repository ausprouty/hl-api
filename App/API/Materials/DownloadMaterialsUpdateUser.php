<?php
use App\Controllers\Data\PostInputController;

header('Content-Type: application/json');

$postInputController = new PostInputController();
writeLogDebug('downloadMaterialsUpdater-8', $_POST);
$response = $postInputController->handlePost();
if ($response['success']) {
    $data = $response['data'];
    writeLogDebug('downloadMaterialsUpdateUser-10', $data);
    $file_url = RESOURCE_DIR . $data['file'];
    echo json_encode($file_url);
}
    // Respond with JSON
   
