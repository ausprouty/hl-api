<?php
use App\Controllers\Materials\SpiritController;
echo"you should see an object below with all the details alphabetially<hr>";
$spiritController = new SpiritController();
// Call the method to get the tracts
$data = $spiritController->getTractsToView();
print_r($tracts);