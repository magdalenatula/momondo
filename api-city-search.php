<?php
http_response_code(200);
header('Content-Type: application/json');
$sSearchFor = $_GET['cityName'];
$sData = file_get_contents('data-cities.json');
$jData = json_decode($sData);
$jResponse = new stdClass(); // {}
$jResponse->cities = [];
foreach($jData->cities as $jCity){
  // echo "<div>$jCity->name</div>";
  if( stripos($jCity->name, $sSearchFor) !== false ){
    // array_push($jResponse->cities, $jCity);
    $jResponse->cities[] = $jCity; // same as array_push
  }
}
echo json_encode($jResponse);


