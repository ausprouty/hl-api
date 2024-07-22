<?php
Namespace App\Services;
use App\Models\Data\DatabaseConnectionModel;

class DatabaseService {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DatabaseConnectionModel();
    }

    public function executeQuery($query, $params = []) {
        try {
            $statement = $this->dbConnection->prepare($query);
            foreach ($params as $param => $value) {
                $statement->bindValue($param, $value);
            }
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
            return null;
        }
    }
}
