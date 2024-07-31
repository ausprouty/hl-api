<?php
namespace App\Controllers\Materials;

use App\Services\DatabaseService;
use PDO;
use Exception;

class MaterialController {

    private $databaseService;

    public function __construct() {
        $this->databaseService = new DatabaseService();
    }
    public function getIdByFileName($filename) {
        $query = "SELECT id
                  FROM hl_materials 
                  WHERE filename = :filename
                  LIMIT 1"; 
        $params = array(            
            ':filename' => $filename
        );
        $results = $this->databaseService->executeQuery($query, $params);
        $data =  $results->fetch(PDO::FETCH_ASSOC);
        writeLog('material controller', $data);
        return $data;
    }
    
   
}
