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
}
