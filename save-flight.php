<?php

$departureCity = $_POST["departure-city"];
$arrivalCity = $_POST["arrival-city"];
$currency = $_POST["currency"];
$price = $_POST["price"];
$companyShortcut = $_POST["company-shortcut"];
$companyName = $_POST["company-name"];
$departureTime = $_POST["departure-time"];
$arrivalTime = $_POST["arrival-time"];
$totalTime = $_POST["total-time"];
$stops = $_POST["stops"];


$date = $_POST["date"];
$flightId = $_POST["flight-id"];
$from = $_POST["from"];
$to = $_POST["to"];
$waitingTime = $_POST["waiting-time"];
$flightTime = $_POST["flight-time"];

$sData = file_get_contents('data-flights.json');

$jData = json_decode($sData);

$jSchedule = new stdClass();
$jSchedule->date = $date;
$jSchedule->flightId = $flightId;
$jSchedule->from = $from;
$jSchedule->to = $to;
$jSchedule->waitingTime = $waitingTime;
$jSchedule->flightTime = $flightTime;


$jFlight = new stdClass();
$jFlight->id = bin2hex(random_bytes(16));
$jFlight->departureCity = $departureCity;
$jFlight->arrivalCity =$arrivalCity;
$jFlight->currency = $currency;
$jFlight->price = $price;
$jFlight->companyName = $companyName;
$jFlight->companyShortcut = $companyShortcut;
$jFlight->departureTime = $departureTime;
$jFlight->arrivalTime = $arrivalTime;
$jFlight->totalTime = $totalTime;
$jFlight->stops = $stops;
$jFlight->schedule = $jSchedule;

array_push($jData, $jFlight);
array_push($jFlight->schedule, $jSchedule);

// // Write back to the file
$sData = json_encode($jData, JSON_PRETTY_PRINT);
// // Save city to file
file_put_contents('data-flights.json', $sData);
// // Redirect
header('Location: admin.php');
exit();

