<?php

namespace App\Models\Emails;

class hlEmailQueModel {
    private $id;
    private $delay_until;
    private $email_from;
    private $email_to;
    private $email_id;
    private $champion_id;
    private $subject;
    private $body;
    private $plain_text_only;
    private $headers;
    private $plain_text_body;
    private $template;
    private $params;

    public function __construct($id, $delay_until = 0, $email_from = '', $email_to = '', $email_id = null, $champion_id = null, $subject = '', $body = '', $plain_text_only = 0, $headers = '', $plain_text_body = '', $template = null, $params = null) {
        $this->id = $id;
        $this->delay_until = $delay_until;
        $this->email_from = $email_from;
        $this->email_to = $email_to;
        $this->email_id = $email_id;
        $this->champion_id = $champion_id;
        $this->subject = $subject;
        $this->body = $body;
        $this->plain_text_only = $plain_text_only;
        $this->headers = $headers;
        $this->plain_text_body = $plain_text_body;
        $this->template = $template;
        $this->params = $params;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getDelayUntil() { return $this->delay_until; }
    public function getEmailFrom() { return $this->email_from; }
    public function getEmailTo() { return $this->email_to; }
    public function getEmailId() { return $this->email_id; }
    public function getChampionId() { return $this->champion_id; }
    public function getSubject() { return $this->subject; }
    public function getBody() { return $this->body; }
    public function getPlainTextOnly() { return $this->plain_text_only; }
    public function getHeaders() { return $this->headers; }
    public function getPlainTextBody() { return $this->plain_text_body; }
    public function getTemplate() { return $this->template; }
    public function getParams() { return $this->params; }
}

?>