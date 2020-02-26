<?php

$flightId = $_GET['id'];

// echo $flightId;
$sData = file_get_contents('data-flights.json');
$jData = json_decode($sData);


foreach($jData as $x=>$flight){

if ( $flightId == $flight->id){

  array_splice($jData, $x, 1);
  break;

}
}

$sData = json_encode($jData, JSON_PRETTY_PRINT);


file_put_contents('data-flights.json', $sData);

header('Location: admin.php');
exit();