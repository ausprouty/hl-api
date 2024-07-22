<?php

namespace App\Models\Materials;

class hlMaterialModel {
    private $id;
    private $title;
    private $tips;
    private $foreign_title_1;
    private $foreign_title_2;
    private $lang1;
    private $lang2;
    private $format;
    private $audience;
    private $contact;
    private $filename;
    private $category;
    private $downloads;
    private $active;
    private $active_date;
    private $size;
    private $print_size;
    private $ordered;

    public function __construct($id, $title = '', $tips = null, $foreign_title_1 = null, $foreign_title_2 = null, $lang1, $lang2, $format, $audience, $contact, $filename = '', $category = null, $downloads = null, $active = '', $active_date = null, $size = null, $print_size = null, $ordered = null) {
        $this->id = $id;
        $this->title = $title;
        $this->tips = $tips;
        $this->foreign_title_1 = $foreign_title_1;
        $this->foreign_title_2 = $foreign_title_2;
        $this->lang1 = $lang1;
        $this->lang2 = $lang2;
        $this->format = $format;
        $this->audience = $audience;
        $this->contact = $contact;
        $this->filename = $filename;
        $this->category = $category;
        $this->downloads = $downloads;
        $this->active = $active;
        $this->active_date = $active_date;
        $this->size = $size;
        $this->print_size = $print_size;
        $this->ordered = $ordered;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getTips() { return $this->tips; }
    public function getForeignTitle1() { return $this->foreign_title_1; }
    public function getForeignTitle2() { return $this->foreign_title_2; }
    public function getLang1() { return $this->lang1; }
    public function getLang2() { return $this->lang2; }
    public function getFormat() { return $this->format; }
    public function getAudience() { return $this->audience; }
    public function getContact() { return $this->contact; }
    public function getFilename() { return $this->filename; }
    public function getCategory() { return $this->category; }
    public function getDownloads() { return $this->downloads; }
    public function getActive() { return $this->active; }
    public function getActiveDate() { return $this->active_date; }
    public function getSize() { return $this->size; }
    public function getPrintSize() { return $this->print_size; }
    public function getOrdered() { return $this->ordered; }
}

?>
