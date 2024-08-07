<?php
use App\Controllers\Emails\EmailController;



// anyone can access this database to receive the emails in question

writeLogDebug("SeriesEmailText" , "series: $series, sequence: $sequence");
$emailController = new EmailController();
$data = $emailController->getEmailBySeriesAndSequence($series, $sequence);

// JSON encoding and output
$response = [
    'success' => true,
    'data' => $data,
];
header('Content-Type: application/json');
echo json_encode($response);
