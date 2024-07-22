<?php
Namespace App\Controllers\Materials;
use App\Services\DatabaseService;


class TractController {
    private $databaseService;

    public function __construct() {
        $this->databaseService = new DatabaseService();
    }
    public function getTractsToView() {
        $query = "SELECT * FROM hl_materials
            WHERE active LIKE :active 
            AND category LIKE :category
            AND format LIKE :format
            AND lang2 LIKE :lang2
            ORDER BY lang1 ASC";
         $params = [
            ':active' => 'YES', 
            ':category' => 'Tracts', 
            ':format' => 'VIEW', 
            ':lang2' => 'English']; 
        return $this->databaseService->executeQuery($query);
    }
    public function getTractsMonolingual() {
        $query = "SELECT distict(title, foreign_title_1) FROM hl_materials
            WHERE active LIKE :active 
            AND filename LIKE :filename
            ORDER BY title ASC";
         $params = [':active' => 'YES', 
            ':active' => 'YES', 
            ':filename' => 'tracts-monolingual%', 
            ':lang2' => 'English']; 
        return $this->databaseService->executeQuery($query);
    }
    public function getTractsBilingual() {
        $query = "SELECT distict(title, foreign_title_1) FROM hl_materials
            WHERE active LIKE :active 
            AND filename LIKE :filename
            ORDER BY title ASC";
         $params = [':active' => 'YES', 
            ':active' => 'YES', 
            ':filename' => 'tracts-bilingual%', 
            ':lang2' => 'English']; 
        return $this->databaseService->executeQuery($query);
    }
    
    

    // Add more query methods as needed
}

