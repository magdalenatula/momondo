<?php

  // User wants to update the data
  if(isset($_POST['flight-id']) &&  
    isset($_POST['departure-city']) &&
    isset($_POST['arrival-city']) &&  
    isset($_POST['currency']) &&
    isset($_POST['company-name']) &&  
    isset($_POST['company-shortcut']) &&
    isset($_POST['departure-time']) &&  
    isset($_POST['arrival-time']) &&
    isset($_POST['total-time']) &&
    isset($_POST['stops'])){

        
        // Open file
    $sData = file_get_contents('data-flights.json');
    // Convert text file to JSON
    $jData = json_decode($sData);
    // Loop and find a match
    // echo var_dump($jData);
        
    foreach($jData as $x=>$flight){

    echo $_POST['total-time'];
    echo $flight->totalTime;

    if ( $_POST['flight-id'] == $flight->id){
        $flight->departureCity = $_POST['departure-city'];
        $flight->arrivalCity = $_POST['arrival-city'];
        $flight->currency = $_POST['currency'];
        $flight->companyName = $_POST['company-name'];
        $flight->companyShortcut = $_POST['company-shortcut'];
        $flight->departureTime = $_POST['departure-time'];
        $flight->arrivalTime = $_POST['arrival-time'];
        $flight->totalTime = $_POST['total-time'];
        $flight->stops = $_POST['stops'];
    break;
    }
}

// $sData = json_encode($jData, JSON_PRETTY_PRINT);
// file_put_contents('data-flights.json', $sData);
// // Redirect user to cities.php
// header('Location: admin.php');
// exit();

}



  if(  isset($_GET['id'])   ){
    $flightId = $_GET['id'];
    // Open file
    $sData = file_get_contents('data-flights.json');
    // Convert text to JSON
    $jData = json_decode($sData);

    // echo var_dump($sData);

    
    $bFlightFound = false;
    foreach($jData as $x=>$flight){
    if ( $flightId == $flight->id){
    
        ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="app.css">
<title>MOMONDO</title>
<link rel="stylesheet" href="app.css">
</head>
<body>

<nav>
  <a  href="index.php" id="logo"><img src="img/momondo-logo.png" alt=""></a>
  <a class="active" href="index.php">flights</a>
  <a href="">hotel</a>
  <a href="">car</a>
  <a href="">trips</a>
  <a href="">discover</a>
  <a href="mytrips.php">my trips</a>
  <a href="logout.php">logout</a>
</nav>


<section class="header-section">
<h1>Edit flight nr <?=$flight->id ?> </h1>
</section>

<section>
<!-- <main class="trips-section">
<div id='flight-route'>

  <div class='row'>
  <div><input type='checkbox'></div>
    <div><img class='airline-icon' src='icons/<?=$flight->companyShortcut?>.png'></div>
    <div> <?=$flight->departureTime?> - <?=$flight->arrivalTime?> <p><?=$flight->companyShortcut?></p></div>
    <div><?=$flight->stops?>  stops<p>Amsterdam</p></div>
    <div><?=$flight->totalTime?><p><?=$flight->departureCity?> - <?=$flight->arrivalCity?></p></div>
  </div>
  <div class='row'>
  <div><input type='checkbox'></div>
    <div><img class='airline-icon' src='icons/<?=$flight->companyShortcut?>.png'></div>
    <div> <?=$flight->departureTime?> - <?=$flight->arrivalTime?> <p><?=$flight->companyShortcut?></p></div>
    <div><?=$flight->stops?>  stops<p>Amsterdam</p></div>
    <div><?=$flight->totalTime?><p><?=$flight->departureCity?> - <?=$flight->arrivalCity?></p></div>
  </div>

  </div>

</main> -->

</section>




<form id="admin-form" action="update-flight.php" method="POST">
  <div class="column">

    <input name="flight-id" type="hidden" value="<?= $flightId ?>">
    <input name="departure-city" type="text" value="<?= $flight->departureCity ?>" placeholder="departure-city">
    <input name="arrival-city" type="text" value="<?= $flight->arrivalCity ?>" placeholder="arrival-city">
    <input name="currency" type="text" value="<?= $flight->currency ?>" placeholder="currency">
    <input name="company-name" type="text" value="<?= $flight->companyName ?>" placeholder="company-name">
    <input name="company-shortcut" type="text" value="<?= $flight->companyShortcut ?>" placeholder="company-shortcut">
    <input name="departure-time" type="text" value="<?= $flight->departureTime?>" placeholder="departure-tim">
    <input name="arrival-time" type="text" value="<?= $flight->arrivalTime?>" placeholder="arrival-time">
    <input name="total-time" type="text" value="<?= $flight->totalTime ?>" placeholder="total-time">
    <input name="stops" type="number" value="<?= $flight->stops ?>" placeholder="stops">
    </div>
    
    <div class="column">

    <input name="date" type="text" placeholder="date"> 
    <input name="flight-id" type="text" placeholder="flight-id">
    <input name="from" type="text" placeholder="from"> 
    <input name="to" type="text" placeholder="to"> 
    <input name="waiting-time" type="text" placeholder="waiting-time"> 
    <input name="flight-time" type="text" placeholder="flight-time">
    <input name="flight-time" type="text" placeholder="flight-time"> 
    </div>

    <button class="btnSearch" type="submit">UPDATE</button> 

</form>

</body>
</html>
<?php
          $bFlightFound = true;
      break;
    
    }
    }
    if($bFlightFound == false){
        header('Location: admin.php');
      }

  }

  ?>