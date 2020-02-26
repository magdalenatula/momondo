<?php 

$sData = file_get_contents("data-user-trips.json");
$jData = json_decode($sData);

// echo var_dump($jData);

$userLastName = $_POST['txtUserLastName'];
$tripId = $_POST['txtTripId'];

// echo $tripId;
$tripBluePrint = '';

if( isset($userLastName) && 
isset($tripId)
){
    foreach ($jData as $x=>$flight ){
        if ( $tripId == $flight->id){
        echo var_dump($jData[$x]->price);
         $tripPrice = $jData[$x]->price;
         
         $tripDepartureCity = $jData[$x]->departureCity;
         $tripArrivalCity = $jData[$x]->arrivalCity;
         $tripCurrency = $jData[$x]->currency;  
         $tripPrice = $jData[$x]->price;  
         $tripCompanyName = $jData[$x]->companyName;  
         $tripCompanyShortcut = $jData[$x]->companyShortcut;  
         $tripDepartureTime = $jData[$x]->departureTime;  
         $tripArrivalTime= $jData[$x]->arrivalTime;  
         $tripTotalTime = $jData[$x]->totalTime;  
         $tripStops = $jData[$x]->stops;  
         $tripSchedule = $jData[$x]->schedule;


         $tripBluePrint = "
         <div id='flight-route'>

         <div class='row'>

         <div><img class='airline-icon' src='AF.png'></div>
         <div>  $tripDepartureTime - $tripArrivalTime <p></p></div>
         <div>$tripStops stop<p>Amsterdam</p></div>
         <div>10h. 20min.<p>CPH-MIA</p></div>

        </div>

        <div class='row'>

        <div><img class='airline-icon' src='AF.png'></div>
        <div>  $tripDepartureTime - $tripArrivalTime <p></p></div>
        <div>$tripStops stop<p>Amsterdam</p></div>
        <div>10h. 20min.<p>CPH-MIA</p></div>

       </div>

        </div>
         ";
        

        break;
          
          }
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <a href="login.php">login</a>
  </nav>

 <section class="header-section">
    <h1>Find your booked trip </h1>
    <p>Use your last name and trip id you got via SMS and Email</p>
 
</section>
    <form id='search-trips' action="mytrips.php" method="POST">
    <input name="txtUserLastName" type="text" placeholder="Last Name">
    <input name="txtTripId" type="text" placeholder="Trip Id">
    <button class="btnSearch">Find</button>
    </form>
   

<main class="trips-section">
 
  <?= $tripBluePrint  ?>
  

</main>

<script>
// async function findTrip() {
//   // var jResponse = await fetch('data-user-trips.json');
//   // var jData = await jResponse.json();

//   console.log("working")


// }



</script>


</body>
</html>