<?php

namespace App\Controllers\Emails;

use App\Models\Emails\EmailModel;

class EmailController {

    private $emailModel;

    public function __construct() {
        $this->emailModel = new EmailModel();
    }

    public function getEmailBySeriesAndSequence($series, $sequence) {
        $emailRecord = $this->emailModel->findOneInSeries($series, $sequence);

        if ($emailRecord) {
            return $emailRecord;
        } else {
            // Return a blank record with series set
            return [
                'id' => null,
                'subject' => '',
                'body' => '',
                'plain_text_only' => false,
                'headers' => '',
                'template' => '',
                'series' => $series,
                'sequence' => $sequence,
                'params' => ''
            ];
        }
    }
}
