<?php

namespace App\Controllers\Materials;

use App\Services\DatabaseService;
use PDO;
use Exception;

class MaterialQueryController{
    public static function getTractsToViewQuery() {
        $dbConnection = new DatabaseConnectionModel();
        $query = "SELECT languageName
                  FROM hl_spirit 
                  ORDER BY languageName";
        try {
            $statement = $dbConnection->executeQuery($query);
            $data = $statement->fetchAll(PDO::FETCH_ASSOC); // Fetch all results as array
            return $data;
        } catch (Exception $e) {
            // Log the error or handle it appropriately
            error_log("Error: " . $e->getMessage());
            return null;
        }
    }
