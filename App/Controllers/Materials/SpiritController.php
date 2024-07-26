<?php
namespace App\Controllers\Materials;

use App\Services\DatabaseService;
use PDO;
use Exception;

class SpiritController {

    private $databaseService;

    public function __construct() {
        $this->databaseService = new DatabaseService();
    }
    public function getTitlesByLanguageName() {

        $query = "SELECT languageName
                  FROM hl_spirit 
                  ORDER BY languageName";
        $results = $this->databaseService->executeQuery($query);
        $data =  $results->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getByLanguageName($languageName) {
        $query = "SELECT *
                  FROM hl_spirit 
                  WHERE languageName = :languageName";
        $params = array(
            ':languageName' => $languageName
        );
        $results = $this->databaseService->executeQuery($query, $params);
        $data =  $results->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    static function returnText($language) {
        $lc_language = strtolower($language);
        $fileName = RESOURCE_DIR . 'spirit/' . $lc_language . '/default.htm';
        // Check if the file exists
        if (file_exists($fileName)) {
            // Get the file contents
            $text = file_get_contents($fileName);
            return $text;
        } else {
            // Handle the error - file does not exist
            return $fileName .'  is not available.';
        }
    }
}
