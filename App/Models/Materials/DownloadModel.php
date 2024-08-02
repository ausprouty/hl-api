<?php

namespace App\Models\Materials;

class DownloadModel {
    private $id;
    private $champion_id;
    private $file_name;
    private $download_date;
    private $requested_tips;
    private $sent_tips;
    private $file_id;
    private $elapsed_months;
    private $tip;
    private $tip_detail;

    public function __construct($id, $champion_id = null, $file_name = null, $download_date = null, $requested_tips = null, $sent_tips = null, $file_id = 0, $elapsed_months = 0, $tip = null, $tip_detail = null) {
        $this->id = $id;
        $this->champion_id = $champion_id;
        $this->file_name = $file_name;
        $this->download_date = $download_date;
        $this->requested_tips = $requested_tips;
        $this->sent_tips = $sent_tips;
        $this->file_id = $file_id;
        $this->elapsed_months = $elapsed_months;
        $this->tip = $tip;
        $this->tip_detail = $tip_detail;
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
