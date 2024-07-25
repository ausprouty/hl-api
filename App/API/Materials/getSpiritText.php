<?php
use App\Controllers\Materials\SpiritController;
echo('getSpiritText.php');
echo($language);
return;
// Call the method to get the tracts
$data = $spiritController->returnText($language);
header('Content-Type: application/json');
echo json_encode($data);