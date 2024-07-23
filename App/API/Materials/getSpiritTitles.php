<?php
use App\Controllers\Materials\SpiritController;
$spiritController = new SpiritController();
// Call the method to get the tracts
$data = $spiritController->getTitlesByLanguageName();
header('Content-Type: application/json');
echo json_encode($data);