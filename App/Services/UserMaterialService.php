<?php
namespace App\Services;

use App\Controllers\Data\PostInputController;
use App\Controllers\Materials\MaterialController;
use App\Controllers\People\ChampionController;
use App\Controllers\Materials\DownloadController;
use InvalidArgumentException;

class UserMaterialService {
    
    protected $postInputController;
    protected $materialController;
    protected $championController;
    protected $downloadController;

    public function __construct() {
        $this->postInputController = new PostInputController();
        $this->materialController = new MaterialController();
        $this->championController = new ChampionController();
        $this->downloadController = new DownloadController();   
    }

    public function handleUserMaterialDownload() {
        // Check authorization and sanitize data
        $input = $this->postInputController->handlePost();
        if (!$input['success']) {
            return $this->returnError($input['message']);
        }
        $data = $input['data'];
        writeLog('UserMaterialService-31', $data);
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
       // Validate required parameters
        if (empty($userId) || empty($materialID) || empty($data['file'])) {
            throw new InvalidArgumentException('Champion ID, file name, and file ID are required.');
        }
        $mailingLists= $this->splitMailingLists($data['selected_mail_lists']);
        writeLog('UserMaterialService-50', $mailingLists);
        $tips = null;
        if ($mailingLists['tips']){
            $tips = time();
        }
        // Construct parameters
        $rawData = [
            'champion_id' => $userId,
            'file_name' => $data['file'],
            'file_id' => $materialID,
            'requested_tips' => $tips ?? null,
        ];
        $download = $this->downloadController->createDownload($rawData);
       
       
        // Return the file URL
        $file_url = RESOURCE_DIR . $data['file'];

        return json_encode(['success' => true, 'file_url' => $file_url]);
    }
    public function splitMailingLists($selectedMailLists) {
        // Split the string by the comma delimiter
        $mailingListsArray = explode(',', $selectedMailLists);

        // Convert the array to an associative array with the value set to true
        $mailingListsAssoc = array_fill_keys($mailingListsArray, true);

        return $mailingListsAssoc;
    }

    protected function returnError($message) {
        return json_encode([
            'success' => false,
            'message' => $message
        ]);
    }
}
