<?php

$txtCityFrom = $_POST['txtCityFrom'];
$txtCityTo = $_POST['txtCityTo'];
$txtDateFrom = $_POST['txtDateFrom'];
$txtDateTo = $_POST['txtDateTo'];

$sData = file_get_contents("data-flights.json");
$jData = json_decode($sData);

$flightBluePrint = '';



if(  isset($txtDateFrom) && isset($txtDateTo) && isset($txtCityFrom) && isset($txtCityTo)  ){

  $eDateFrom = strtotime($txtDateFrom);
  $eDateTo = strtotime($txtDateTo);
  // echo $eDateFrom;

  foreach ($jData as $x=>$flight ){
    // echo var_dump($jData[$x]->departureTime);
        if (   $flight->departureTime >= $eDateFrom && $flight->departureTime <= $eDateTo &&  $flight->departureCity == $txtCityFrom && $flight->arrivalCity == $txtCityTo ){
        echo $jData[$x]->departureTime;

        $departureTime = date("Y-M-d H:i", substr($jData[$x]->departureTime, 0, 10)); 
        $arrivalTime =  date("Y-M-d H:i", substr($jData[$x]->arrivalTime, 0, 10)); 
       
        $departureCity = $jData[$x]->departureCity;
        $arrivalCity = $jData[$x]->arrivalCity;
        $currency = $jData[$x]->currency;
        $stops = $jData[$x]->stops;
        $price = $jData[$x]->price;
        $totalTime = $jData[$x]->totalTime;
        $companyShortcut = $jData[$x]->companyShortcut;
        $id = $jData[$x]->id;

    
        $flightBluePrint .= 
        "
        <div onclick='showStops()' id='flight'>
  
        <div id='flight-route'>
  
        <div class='row'>
        <div><input type='checkbox'></div>
          <div><img class='airline-icon' src='icons/$companyShortcut.png'></div>
          <div> $departureTime - <p>$arrivalTime</p> <p>$companyShortcut</p></div>
          <div>$stops stops<p>Amsterdam</p></div>
          <div>$totalTime<p>$departureCity - $arrivalCity</p></div>
        </div>
        <div class='row'>
        <div><input type='checkbox'></div>
          <div><img class='airline-icon' src='icons/$companyShortcut.png'></div>
          <div> $departureTime - <p>$arrivalTime</p> <p>$companyShortcut</p></div>
          <div>$stops stops<p>Amsterdam</p></div>
          <div>$totalTime<p>$departureCity - $arrivalCity</p></div>
        </div>
     
        </div>
  
        <div id='flight-buy'>
          <div>
          $price  $currency
          </div>
          <a href='buy-flight.php?id=$id'><button>
        BUY</button>
        </a>
        </div>
  
       
  
      </div> ";


     }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="app.css">
  <title>MOMONDO</title>
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

  <section>

    <form action="index.php" id='search' method="POST">
    <div id="boxFromCity">
      <input name="txtCityFrom" type="text" placeholder="from city" oninput=getFromCities() class="txtFromCitySearch"></input>
      <div class="fromCityResults"></div>
    </div>

    <button> &lt;- -&gt;</button>

    <div id="boxToCity">
      <input name="txtCityTo" type="text" placeholder="to city" oninput=getToCities() class="txtToCitySearch"></input>
      <div class="toCityResults"></div>
    </div>
    <input type="date" name="txtDateFrom" placeholder="from date"></input>
    <input type="date" name="txtDateTo" placeholder="to date"></input>
    <button class='btnSearch'>Search</button>
  </form>



  </section>
  <section id="temporal">
    <img src="img/temporal.png">
  </section>
  <div id="searched-flights">
      <?= $flightBluePrint ?>
  </div>


  <main class="main-index">
    <div id="options">OPTIONS</div>

    <div id="results">

      <div id="price-options">

        <div id="cheapest">
          Cheapest
          <p>
            <span class="price">
              <?= $iCheapestPrice ?>
            </span>
            <span class="time">19h. 37min.</span>
          </p>
        </div>
        <div id="best" class="active">
          Best
          <p>
            <span class="price">4.956 kr</span>
            <span class="time">19h. 37min.</span>
          </p>
        </div>
        <div id="fastest">
          Fastest
          <p>
            <span class="price">4.956 kr</span>
            <span class="time">19h. 37min.</span>
          </p>
        </div>

        <div>
          Custom
          <p>compare and choose</p>
        </div>

      </div>


      <div id="flights">  
      </div>

  

    </div>

  </main>

  <script src="app.js">
  </script>



</body>
</html>