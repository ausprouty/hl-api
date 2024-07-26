<?php
header('Content-Type: application/json');

// Retrieve and sanitize form data
$name = isset($_POST['name']) ? filter_var($_POST['name'], FILTER_SANITIZE_STRING) : '';
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
$country = isset($_POST['country']) ? filter_var($_POST['country'], FILTER_SANITIZE_STRING) : '';
$state = isset($_POST['state']) ? filter_var($_POST['state'], FILTER_SANITIZE_STRING) : '';
$checkbox1 = isset($_POST['checkbox1']) ? 1 : 0;
$checkbox2 = isset($_POST['checkbox2']) ? 1 : 0;
$checkbox3 = isset($_POST['checkbox3']) ? 1 : 0;
$comments = isset($_POST['comments']) ? filter_var($_POST['comments'], FILTER_SANITIZE_STRING) : '';
$file = isset($_POST['file']) ? filter_var($_POST['file'], FILTER_SANITIZE_STRING) : '';

// Log or process the form data as needed
// ...
$file = 'myfriends/LetsCelebrate.pdf';
// Generate the file URL
$file_url = RESOURCE_DIR  . $file;
writeLogDebug('Resource', $file_url);


// Respond with JSON
echo json_encode(array('success' => true, 'file_url' => $file_url));
