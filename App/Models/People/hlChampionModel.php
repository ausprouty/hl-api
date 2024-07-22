<?php

namespace App\Models\People;

class hlChampionModel {
    private $cid;
    private $first_name;
    private $surname;
    private $title;
    private $organization;
    private $address;
    private $suburb;
    private $state;
    private $postcode;
    private $country;
    private $phone;
    private $sms;
    private $email;
    private $gender;
    private $double_opt_in_date;
    private $first_email_date;
    private $last_open_date;
    private $consider_dropping_date;
    private $first_download_date;
    private $last_download_date;
    private $last_email_date;

    public function __construct($cid, $first_name = null, $surname = null, $title = null, $organization = null, $address = null, $suburb = null, $state = null, $postcode = '', $country = null, $phone = null, $sms = null, $email = null, $gender = null, $double_opt_in_date = null, $first_email_date = null, $last_open_date = null, $consider_dropping_date = null, $first_download_date = null, $last_download_date = null, $last_email_date = null) {
        $this->cid = $cid;
        $this->first_name = $first_name;
        $this->surname = $surname;
        $this->title = $title;
        $this->organization = $organization;
        $this->address = $address;
        $this->suburb = $suburb;
        $this->state = $state;
        $this->postcode = $postcode;
        $this->country = $country;
        $this->phone = $phone;
        $this->sms = $sms;
        $this->email = $email;
        $this->gender = $gender;
        $this->double_opt_in_date = $double_opt_in_date;
        $this->first_email_date = $first_email_date;
        $this->last_open_date = $last_open_date;
        $this->consider_dropping_date = $consider_dropping_date;
        $this->first_download_date = $first_download_date;
        $this->last_download_date = $last_download_date;
        $this->last_email_date = $last_email_date;
    }

    // Getters
    public function getCid() { return $this->cid; }
    public function getFirstName() { return $this->first_name; }
    public function getSurname() { return $this->surname; }
    public function getTitle() { return $this->title; }
    public function getOrganization() { return $this->organization; }
    public function getAddress() { return $this->address; }
    public function getSuburb() { return $this->suburb; }
    public function getState() { return $this->state; }
    public function getPostcode() { return $this->postcode; }
    public function getCountry() { return $this->country; }
    public function getPhone() { return $this->phone; }
    public function getSms() { return $this->sms; }
    public function getEmail() { return $this->email; }
    public function getGender() { return $this->gender; }
    public function getDoubleOptInDate() { return $this->double_opt_in_date; }
    public function getFirstEmailDate() { return $this->first_email_date; }
    public function getLastOpenDate() { return $this->last_open_date; }
    public function getConsiderDroppingDate() { return $this->consider_dropping_date; }
    public function getFirstDownloadDate() { return $this->first_download_date; }
    public function getLastDownloadDate() { return $this->last_download_date; }
    public function getLastEmailDate() { return $this->last_email_date; }
}

?>
