<?php
use App\Controllers\Emails\EmailController;

header('Content-Type: application/json');

// anyone can access this database to receive the emails in question

writeLogDebug("SeriesEmailText" , "series: $series, sequence: $sequence");
$emailController = new EmailController();
$data = $emailController->getEmailBySeriesAndSequence($series, $sequence);

// JSON encoding and output
$response = [
    'success' => true,
    'data' => $data,
];

echo json_encode($response);
