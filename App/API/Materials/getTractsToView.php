<?php

use App\Controllers\Materials\TractController;
$tractController = new TractController();
// Call the method to get the tracts
$data = $tractController->getTractsToView();
header('Content-Type: application/json');
echo json_encode($data);