<?php

namespace App\Controllers\Data;

use App\Models\Data\PostInputModel;
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
        //check for form data
        if (!isset($_POST['formData'])) {
            handleNoFormData(); 
        }
        // Sanitize the form data
        $postInput = new PostInputModel($_POST['formData']);
        //check authorization
        if (!$this->authService->checkApiKey($postInput->getByKey('apiKey'))) {
            $handleInvalidApiKey();
        }
         // Create the response array
        $sanitizedData = $postInput->getSanitizedFormData();
        $response = [
            'success' => true,
            'message' => 'valid API key',
            'data' => $sanitizedData
        ];
        // Return the response array
        return $response;
    }
    // Your controller method for handling invalid API key
    public function handleInvalidApiKey() {
        // Create the response array
        $response = [
            'success' => false,
            'message' => 'Invalid API key.'
        ];

        // Return the response array
        return $response;
    }
    // Your controller method for handling a lack of form data
    public function handleNoFormData() {
        // Create the response array
        $response = [
            'success' => false,
            'message' => 'No Form Data Provided.'
        ];

        // Return the response array
        return $response;
    }
}