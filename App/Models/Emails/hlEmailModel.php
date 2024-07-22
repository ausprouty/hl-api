<?php

namespace App\Models\Emails;

class hlEmailModel {
    private $id;
    private $subject;
    private $body;
    private $plain_text_only;
    private $headers;
    private $template;
    private $series;
    private $sequence;
    private $params;

    public function __construct($id, $subject, $body, $plain_text_only, $headers, $template, $series, $sequence, $params) {
        $this->id = $id;
        $this->subject = $subject;
        $this->body = $body;
        $this->plain_text_only = $plain_text_only;
        $this->headers = $headers;
        $this->template = $template;
        $this->series = $series;
        $this->sequence = $sequence;
        $this->params = $params;
    }

    public function getId() {
        return $this->id;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function getBody() {
        return $this->body;
    }

    public function getPlainTextOnly() {
        return $this->plain_text_only;
    }

    public function getHeaders() {
        return $this->headers;
    }

    public function getTemplate() {
        return $this->template;
    }

    public function getSeries() {
        return $this->series;
    }

    public function getSequence() {
        return $this->sequence;
    }

    public function getParams() {
        return $this->params;
    }
}
?>
