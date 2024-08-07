<?php

use App\Services\UserMaterialService;
$userMaterialService = new UserMaterialService();
header('Content-Type: application/json');
echo $userMaterialService->handleUserMaterialDownload();
