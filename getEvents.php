<?php
// get the events in that month
$months =array(
    "01" => 31,
    "02" => 28,
    "03" => 31,
    "04" => 30,
    "05" => 31,
    "06" => 30,
    "07" => 31,
    "08" => 31,
    "09" => 30,
    "10" => 31,
    "11" => 30,
    "12" => 31
);
$currentMonth = $currentDate = "";
$selectedDate = $_POST["eventDate"];
static $link;

try {
    $stmt = $link->prepare("select eventText from events where eventDate LIKE ':eventDate';");
    $stmt->bindParam(':eventDate', $selectedDate);
    $stmt->execute();
    $result = $stmt->fetchColumn();
    // spit out the result to UI
    if (!$result->length > 0) {
        // No event for that day
        echo "<span class=\"no-events\">No events today</span>";
    } else {
        // iterate over the events and echo them
        for ($i=0; $i < $result->length; $i++) {
            echo "<span class=\"dot\"></span>";
            echo "<span class=\"event\">$i</span>";
        }
    }
} catch (PDOException $th) {
    echo "An error has occured: " . $th->getMessage() . "in " . $th->getFile() . "on line " . $th->getLine() . "\nFailed to fetch events";
}