<?php
use App\Controllers\Materials\SpiritController;

// Call the method to get the tracts
$data = spiritController::returnText($language);
// Content type of the response
header('Content-Type: application/json');
echo json_encode($data);
