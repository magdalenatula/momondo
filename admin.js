(async function getFlights() {
  var jResponse = await fetch('api-get-flights.php');
  var jData = await jResponse.json();

  var sFlightBluePrint = `
  <div onclick="showStops()" id='flight'>
  
  <div id='flight-route'>

  <div class='row'>
  <div><input type='checkbox'></div>
    <div><img class='airline-icon' src='icons/{{companyIcon}}.png'></div>
    <div> {{departureTime}} - {{arrivalTime}} <p>{{companyShortcut}}</p></div>
    <div>{{stops}} stops<p>Amsterdam</p></div>
    <div>{{totalTime}}<p>{{departureCity}}-{{arrivalCity}}</p></div>
  </div>
  <div class='row'>
  <div><input type='checkbox'></div>
    <div><img class='airline-icon' src='icons/{{companyIconBack}}.png'></div>
    <div> {{departureTimeBack}} - {{arrivalTimeBack}} <p>{{companyShortcutBack}}</p></div>
    <div>{{stopsBack}} stops<p>Amsterdam</p></div>
    <div>{{totalTimeBack}}<p>{{departureCityBack}}-{{arrivalCityBack}}</p></div>
  </div>

  </div>

  <div id='flight-buy'>
    <div>
    {{price}} {{currency}}
    </div>
    <a href='delete-flight.php?id={{id}}'><button>Delete</button></a>
    <a href='update-flight.php?id={{idBack}}'><button>Update</button></a>
  </div>

  </div> 
  <div class="stop-box">{{STOPS}}</div>
    `

  var flights = document.querySelector("#flights-admin");


  for (var i = 0; i < jData.length; i++) {
    var jFlight = jData[i];

    var sFlightBluePrintCopy = sFlightBluePrint;
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{price}}', jFlight.price);
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{currency}}', jFlight.currency)
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{companyShortcut}}', jFlight.companyShortcut)
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{totalTime}}', jFlight.totalTime)
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{stops}}', jFlight.stops)
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{departureTime}}', jFlight.departureTime)
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{arrivalTime}}', jFlight.arrivalTime)
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{departureCity}}', jFlight.departureCity);
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{arrivalCity}}', jFlight.arrivalCity);
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{id}}', jFlight.id);

    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{priceBack}}', jFlight.price);
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{currencyBack}}', jFlight.currency)
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{companyShortcutBack}}', jFlight.companyShortcut)
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{totalTimeBack}}', jFlight.totalTime)
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{stopsBack}}', jFlight.stops)
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{departureTimeBack}}', jFlight.departureTime)
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{arrivalTimeBack}}', jFlight.arrivalTime)
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{departureCityBack}}', jFlight.departureCity);
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{arrivalCityBack}}', jFlight.arrivalCity);
    sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{idBack}}', jFlight.id);



    for (var j = 0; j < jFlight.schedule.length; j++) {


    }

    flights.innerHTML += sFlightBluePrintCopy;
  }

})();