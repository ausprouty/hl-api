<?php

use App\Services\UserMaterialService;

header('Content-Type: application/json');

$userMaterialService = new UserMaterialService();
echo $userMaterialService->handleUserMaterialDownload();
