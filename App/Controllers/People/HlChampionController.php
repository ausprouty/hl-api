<?php

namespace App\Controllers\People;

use App\Models\People\HlChampionModel;

class HlChampionController {

    public function updateChampionFromForm($formdata) {
        $champion = new HlChampionModel();
        $champion->updateChampionFromFormData($formdata);
        $cid = $champion->getCid();
        return $cid;
    }
    public function updateLastDownloadDate($userId) {
        $champion = new HlChampionModel();
        $champion->updateLastDownloadDate($userId);
    }
}
