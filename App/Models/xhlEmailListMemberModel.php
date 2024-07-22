<?php

class hlEmailListMemberModel {
    private $id;
    private $list_id;
    private $champion_id;
    private $subscribed;
    private $unsubscribed;

    public function __construct($id, $list_id, $champion_id, $subscribed, $unsubscribed = null) {
        $this->id = $id;
        $this->list_id = $list_id;
        $this->champion_id = $champion_id;
        $this->subscribed = $subscribed;
        $this->unsubscribed = $unsubscribed;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getListId() { return $this->list_id; }
    public function getChampionId() { return $this->champion_id; }
    public function getSubscribed() { return $this->subscribed; }
    public function getUnsubscribed() { return $this->unsubscribed; }
}

?>
