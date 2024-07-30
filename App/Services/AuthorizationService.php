<?php

namespace App\Services;

class AuthorizationService
{
    public function checkApiKey($apiKey)
    {
        return $apiKey === WORDPRESS_HL_API_KEY;
    }
}
