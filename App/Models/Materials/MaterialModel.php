<?php
namespace App\Models\Materials;

use App\Services\DatabaseService;
use PDO;

class MaterialModel {

    private $databaseService;

    public function __construct() {
        $this->databaseService = new DatabaseService();
    }

    public function findByFileName($filename) {
        $query = "SELECT id, title, tips, foreign_title_1, foreign_title_2, lang1, lang2, format, audience, contact, filename, category, downloads, active, active_date, size, print_size, ordered
                  FROM hl_materials 
                  WHERE filename = :filename
                  LIMIT 1";
        $params = [':filename' => $filename];
        $results = $this->databaseService->executeQuery($query, $params);
        return $results->fetch(PDO::FETCH_ASSOC);
    }

    // Example getter methods for specific fields can be implemented as needed
}
