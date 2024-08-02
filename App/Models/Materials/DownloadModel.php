<?php

namespace App\Models\Materials;

use App\Services\DatabaseService;

class DownloadModel {

    private $databaseService;
    public $id;
    public $champion_id;
    public $file_name;
    public $download_date;
    public $requested_tips;
    public $sent_tips;
    public $file_id;
    public $elapsed_months;
    public $tip;
    public $tip_detail;

    public function __construct($params = []) {
        $this->databaseService = new DatabaseService();

        $this->id = $params['id'] ?? null;
        $this->champion_id = $params['champion_id'] ?? null;
        $this->file_name = $params['file_name'] ?? null;
        $this->download_date = $params['download_date'] ?? time(); // Default to current timestamp
        $this->requested_tips = $params['requested_tips'] ?? null;
        $this->sent_tips = $params['sent_tips'] ?? null;
        $this->file_id = $params['file_id'] ?? 0;
        $this->elapsed_months = $params['elapsed_months'] ?? 0;
        $this->tip = $params['tip'] ?? null;
        $this->tip_detail = $params['tip_detail'] ?? null;
    }

    // Method to save the download to the database
    public function save() {
        // Your database saving logic here
    }


    public function insert() {
        $query = "INSERT INTO hl_downloads 
                  (champion_id, file_name, download_date, requested_tips, sent_tips, file_id, elapsed_months, tip, tip_detail)
                  VALUES 
                  (:champion_id, :file_name, :download_date, :requested_tips, :sent_tips, :file_id, :elapsed_months, :tip, :tip_detail)";
        
        $params = array(
            ':champion_id' => $this->champion_id,
            ':file_name' => $this->file_name,
            ':download_date' => $this->download_date,
            ':requested_tips' => $this->requested_tips,
            ':sent_tips' => $this->sent_tips,
            ':file_id' => $this->file_id,
            ':elapsed_months' => $this->elapsed_months,
            ':tip' => $this->tip,
            ':tip_detail' => $this->tip_detail
        );
        writeLog('download insert query', $params);
         // Execute the query
         $this->databaseService->executeQuery($query, $params);
    }
    // Getters
    public function getId() { return $this->id; }
    public function getChampionId() { return $this->champion_id; }
    public function getFileName() { return $this->file_name; }
    public function getDownloadDate() { return $this->download_date; }
    public function getRequestedTips() { return $this->requested_tips; }
    public function getSentTips() { return $this->sent_tips; }
    public function getFileId() { return $this->file_id; }
    public function getElapsedMonths() { return $this->elapsed_months; }
    public function getTip() { return $this->tip; }
    public function getTipDetail() { return $this->tip_detail; }
}

?>
