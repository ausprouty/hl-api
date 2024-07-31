<?php
use App\Controllers\Data\PostInputController;

header('Content-Type: application/json');

$postInputController = new PostInputController();
$input = $postInputController->handlePost();
if ($input['success']) {
    $data = $input['data'];
    $file_url = RESOURCE_DIR . $data['file'];
    echo json_encode(array('success' => true, 'file_url' => $file_url));
}
else{
    echo json_encode(array(
        'success' => false, 
        'message'=> $input['message']));
}
    // Respond with JSON
   
