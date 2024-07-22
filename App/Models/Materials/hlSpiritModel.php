<?php

namespace App\Models\Materials;

class HlSpiritModel {
    private $id;
    private $name;
    private $webpage;
    private $images;
    private $hlId;
    private $valid;
    private $promo;

    public function __construct($id, $name, $webpage, $images, $hlId, $valid = null, $validMessage = null, $convertThis = null, $promo = null) {
        $this->id = $id;
        $this->name = $name;
        $this->webpage = $webpage;
        $this->images = $images;
        $this->hlId = $hlId;
        $this->valid = $valid;
        $this->promo = $promo;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getWebpage() {
        return $this->webpage;
    }

    public function getImages() {
        return $this->images;
    }

    public function getHlId() {
        return $this->hlId;
    }

    public function getValid() {
        return $this->valid;
    }
    public function getPromo() {
        return $this->promo;
    }
}

?>
