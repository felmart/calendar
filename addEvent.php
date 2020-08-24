<?php
require_once "config.php";
require_once "functions.php";

// initialize variables
$eventText = $eventDate = $eventError = $eventDateError = "";
// Insert event into calendar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["eventText"])) {
        $eventText = sanitizeInput($_POST["eventText"]);
    } else {
        $eventError = "Enter the activity";
    }
    if(!empty($_POST["eventDate"])) {
        $eventDate = sanitizeInput($_POST["eventDate"]);
    } else {
        $eventDateError = "Choose a date for your event";
        echo "<span class=\"event-date-error\">$eventDateError</span>";
    }

    // database connection
    static $link;
    try {
        $stmt = $link->prepare("INSERT INTO `events` (`eventText`, `eventDate`) VALUES (:username, :eventText, :eventDate);");
        $stmt->bindParam(':eventText', $eventText);
        $stmt->bindParam(':eventDate', $eventDate);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "An error occured " . $e->getMessage();
    } finally {
        $link = null;
    }
}