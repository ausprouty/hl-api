<?php
header('Content-Type: application/json');

// Check if formData is set
if (isset($_POST['formData'])) {
    $formData = $_POST['formData'];
    writeLogDebug("downloadMaterialsUpdateUser.php",$formData);
    $data = array();
    $sanitized_mail_lists = array();
    // Loop through formData and sanitize the inputs
    foreach ($formData as $field) {
        $name = $field['name'];
        $value = $field['value'];
        // Check if the field name matches the pattern for our mail list checkboxes
        if (preg_match('/^mail_lists\[[^\]]+\]$/', $name)) {
            // Sanitize the value
            $sanitized_value = filter_var($value, FILTER_SANITIZE_STRING);
            // Add the sanitized value to the array
            $sanitized_mail_lists[] = $sanitized_value;
        } else {
            switch ($name) {
                case 'email':
                    $data[$name] = filter_var($value, FILTER_SANITIZE_EMAIL);
                    break;
                default:
                    $data[$name] = filter_var($value, FILTER_SANITIZE_STRING);
                    break;
            }
        }
    }
    $data['selected_mail_lists'] = implode(',', $sanitized_mail_lists);
    writeLogDebug("downloadMaterialsUpdateUser-34",$data);
    // 
    if ($data['apiKey'] != WORDPRESS_HL_API_KEY) {
        echo json_encode(array('success' => false, 'message' => 'Invalid API key.'));
        exit;
    }
    // Generate the file URL
    $file_url = RESOURCE_DIR . $data['file'];

    // Respond with JSON
    echo json_encode(array('success' => true, 'file_url' => $file_url));
} else {
    echo json_encode(array('success' => false, 'message' => 'No form data received.'));
}
