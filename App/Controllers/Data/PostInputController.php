<?php

namespace App\Controllers\Data;

use App\Models\Data\PostInput;
use App\Services\AuthorizationService;

class PostInputController
{
    protected $authService;

    public function __construct()
    {
        $this->authService = new AuthorizationService();
    }

    public function handlePost()
    {
        if (!isset($_POST['formData'])) {
            echo json_encode(['success' => false, 'message' => 'No form data provided.']);
            exit;
        }

        $postInput = new PostInput($_POST['formData']);
        writeLogDebug("downloadMaterialsUpdateUser.php", $postInput->data);

        if (!$this->authService->checkApiKey($postInput->get('apiKey'))) {
            echo json_encode(['success' => false, 'message' => 'Invalid API key.']);
            exit;
        }

        // Further processing...
        $response = $this->processData($postInput->data);
        echo json_encode($response);
    }

    private function processData($data)
    {
        // Process the sanitized data
        writeLogDebug("downloadMaterialsUpdateUser-34", $data);

        // Your data processing logic...

        return ['success' => true, 'message' => 'Data processed successfully.'];
    }
}
