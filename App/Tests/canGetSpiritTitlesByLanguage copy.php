<?php
use App\Controllers\Materials\TractController;
echo"you should see an object below with all the details alphabetially<hr>";
$tractController = new TractController();
// Call the method to get the tracts
$tracts = $tractController->getTractsToView();
print_r($tracts);