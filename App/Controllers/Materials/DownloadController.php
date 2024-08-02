<?php
namespace App\Controllers\Materials;

use App\Models\Materials\DownloadModel;
use DateTime;

class DownloadController {
    private $model;

    public function __construct() {
        $this->model = new DownloadModel();
    }

    // Create a new download entry
    public function createDownload($rawData) {
        $download = new DownloadModel($rawData);
        $download->download_date = time(); // Set the download date to the current date and time
        $download->elapsed_months = $this->getElapsedMonthsSinceCentury(); // Calculate the elapsed months since the year 2000
        $download->insert(); // Save the model instance to the database
        return $download;
    }
    function getElapsedMonthsSinceCentury() {
        // Set the starting date to January 1, 2000
        $startDate = new DateTime('2000-01-01');
        
        // Get the current date and time
        $currentDate = new DateTime();
        
        // Calculate the difference between the two dates
        $interval = $startDate->diff($currentDate);
        
        // Calculate the total number of months
        $elapsedMonths = ($interval->y * 12) + $interval->m;
        
        return $elapsedMonths;
    }

    // Additional methods for interacting with the download model can be added here

    // Example: Method to retrieve a download by its ID
    public function getDownloadById($id) {
        // Code to retrieve the download record from the database using the $id
        // and return a DownloadModel instance
    }
}
