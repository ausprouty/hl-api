<?php
namespace App\Controllers\Materials;

use App\Services\DatabaseService;
use PDO;
use Exception;

class SpiritController {
    public static function getTitlesByLanguageName() {
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
    public static function getByLanguageName($languageName) {
        $dbConnection = new DatabaseConnectionModel();
        $query = "SELECT *
                  FROM hl_spirit 
                  WHERE languageName = :languageName";
        $params = array(
            ':languageName' => $languageName
        );
        try {
            $statement = $dbConnection->executeQuery($query, $params);
            $data = $statement->fetchAll(PDO::FETCH_OBJ); // Fetch all results as array
            return $data;
        } catch (Exception $e) {
            // Log the error or handle it appropriately
            error_log("Error: " . $e->getMessage());
            return null;
        }
    }
}
