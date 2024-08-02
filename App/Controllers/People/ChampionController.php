<?php

namespace App\Controllers\People;

use App\Models\People\ChampionModel;

class ChampionController {

    public function updateChampionFromForm($formdata) {
        $champion = new ChampionModel();
        $champion->updateChampionFromFormData($formdata);
        $cid = $champion->getCid();
        return $cid;
    }
    public function updateLastDownloadDate($userId) {
        $champion = new ChampionModel();
        $champion->updateLastDownloadDate($userId);
    }
}
