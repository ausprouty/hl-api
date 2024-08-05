<?php
use App\Controllers\Emails\EmailController;

header('Content-Type: application/json');

// Input validation
$series = filter_input(INPUT_GET, 'series', FILTER_SANITIZE_STRING);
$sequence = filter_input(INPUT_GET, 'sequence', FILTER_VALIDATE_INT);

if ($series === false || $sequence === false) {
    $response = [
        'success' => false,
        'message' => 'Invalid input',
    ];
    exit;
}

$emailController = new EmailController();
$data = $emailController->getEmailBySeriesAndSequence($series, $sequence);

// JSON encoding and output
$response = [
    'success' => true,
    'data' => $data,
];

echo json_encode($response);
