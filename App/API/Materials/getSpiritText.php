<?php
use App\Controllers\Materials\SpiritController;

// Allow from any origin
header('Access-Control-Allow-Origin: *');

// Allow specific HTTP methods
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

// Allow specific HTTP headers
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Respond to preflight requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

// Content type of the response
header('Content-Type: application/json');
// Call the method to get the tracts
$data = spiritController::returnText($language);

echo json_encode($data);
