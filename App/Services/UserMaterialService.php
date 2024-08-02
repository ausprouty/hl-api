<?php
namespace App\Services;

use App\Controllers\Data\PostInputController;
use App\Controllers\Materials\MaterialController;
use App\Controllers\People\ChampionController;

class UserMaterialService {
    
    protected $postInputController;
    protected $materialController;
    protected $championController;

    public function __construct() {
        $this->postInputController = new PostInputController();
        $this->materialController = new MaterialController();
        $this->championController = new ChampionController();
    }

    public function handleUserMaterialDownload() {
        // Check authorization and sanitize data
        $input = $this->postInputController->handlePost();
        if (!$input['success']) {
            return $this->returnError($input['message']);
        }
        $data = $input['data'];
        // See if this material exists in the database
        $materialID = $this->materialController->getIdByFileName($data['file']);
        if (!$materialID) {
            return $this->returnError('File not found');
        }
        // increment count for this material
        $this->materialController->getAndIncrementDownloads($materialID); 
    
        // Create or update user contact details
        $userId = $this->championController->updateChampionFromForm($data);
        // update the user's last download date
        $this->championController->updateLastDownloadDate($userId);
       // Return the file URL
        $file_url = RESOURCE_DIR . $data['file'];

        return json_encode(['success' => true, 'file_url' => $file_url]);
    }

    protected function returnError($message) {
        return json_encode([
            'success' => false,
            'message' => $message
        ]);
    }
}
