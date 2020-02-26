console.log("aaa");

// Function to Search From Cities: 
var fromCityResults = document.querySelector(".fromCityResults");
var txtSearch = document.querySelector(".txtFromCitySearch");

async function getFromCities() {
    if (txtSearch.value.length == 0) {
        fromCityResults.style.display = 'none'
        return
    }
    var sSearchFor = txtSearch.value;
    var url = 'api-city-search.php?cityName=' + sSearchFor;
    var connection = await fetch(url);
    var sData = await connection.json();
    console.log(sData);
    var jData = JSON.parse(JSON.stringify(sData));
    var sDivCities = ''
    for (var i = 0; i < jData.cities.length; i++) {
        sDivCities += `<div onclick="selectFromCity(this)">${jData.cities[i].name}</div>`
    }
    fromCityResults.innerHTML = sDivCities
    fromCityResults.style.display = 'block'
}
function selectFromCity(objectDOM) {
    var sCityName = objectDOM.innerHTML
    txtSearch.value = sCityName
    fromCityResults.style.display = "none"
}

var toCityResults = document.querySelector(".toCityResults");
var txtToCitySearch = document.querySelector(".txtToCitySearch");

// Function to Search From Cities: 
async function getToCities() {
    if (txtToCitySearch.value.length == 0) {
        toCityResults.style.display = 'none'
        return
    }
    var sSearchFor = txtToCitySearch.value;
    var url = 'api-city-search.php?cityName=' + sSearchFor;
    var connection = await fetch(url);
    var sData = await connection.json();
    console.log(sData);
    var jData = JSON.parse(JSON.stringify(sData));
    var sDivCities = ''
    for (var i = 0; i < jData.cities.length; i++) {
        sDivCities += `<div onclick="selectToCity(this)">${jData.cities[i].name}</div>`
    }
    toCityResults.innerHTML = sDivCities
    toCityResults.style.display = 'block'
}
function selectToCity(objectDOM) {
    var sCityName = objectDOM.innerHTML
    txtToCitySearch.value = sCityName
    toCityResults.style.display = "none"
}


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
        <a href='buy-flight.php?id={{id}}'><button>
    BUY</button>
  </a>
      </div>

     

    </div> 
    <div class="stop-box">{{STOPS}}</div>
    `

    var flights = document.querySelector("#flights");

    for (var i = 0; i < jData.length; i++) {
        var jFlight = jData[i];


        var sArrivalTime = new Date(0)
        sArrivalTime.setUTCSeconds(jFlight.arrivalTime);
        sArrivalTime = sArrivalTime.toLocaleString('da-DK');

        var sDepartureTime = new Date(0)
        sDepartureTime.setUTCSeconds(jFlight.departureTime);
        sDepartureTime = sDepartureTime.toLocaleString('da-DK');


        var sFlightBluePrintCopy = sFlightBluePrint;
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{price}}', jFlight.price)
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{companyShortcut}}', jFlight.companyShortcut)
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{companyIcon}}', jFlight.companyShortcut)
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{totalTime}}', jFlight.totalTime)
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{stops}}', jFlight.stops)
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{departureTime}}', sDepartureTime)
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{arrivalTime}}', sArrivalTime)
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{departureCity}}', jFlight.departureCity);
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{arrivalCity}}', jFlight.arrivalCity);
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{id}}', jFlight.id);
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{currency}}', jFlight.currency)

        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{priceBack}}', jFlight.price)
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{companyShortcutBack}}', jFlight.companyShortcut)
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{companyIconBack}}', jFlight.companyShortcut)
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{totalTimeBack}}', jFlight.totalTime)
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{stopsBack}}', jFlight.stops)
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{departureTimeBack}}', sDepartureTime)
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{arrivalTimeBack}}', sArrivalTime)
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{departureCityBack}}', jFlight.departureCity);
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{arrivalCityBack}}', jFlight.arrivalCity);
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{idBack}}', jFlight.id);


        var sStops = '';
        for (var j = 0; j < jFlight.schedule.length; j++) {

            var sFlightDate = new Date(0)
            sFlightDate.setUTCSeconds(jFlight.schedule[j].date);
            sFlightDate = sFlightDate.toLocaleString('da-DK');

            console.log(jFlight.schedule[j]);

            //     var sFromDate = new Date(0)
            //     sFromDate.setUTCSeconds(aOrderedSchedule[i].date);
            //     sFromDate = sFromDate.toLocaleString('da-DK');
            sStops += `
            <div class="one-stop-box">
            <div>
            <p>Flight ID: ${jFlight.schedule[j].flightId}</p>
              <p> ${sFlightDate}</p>
              <p> ${jFlight.schedule[j].from} - ${jFlight.schedule[j].to} </p>
              
            </div>
             
              <div>
              <p>Waiting Time: ${jFlight.schedule[j].waitingTime}</p>
              <p>Flight Time: ${jFlight.schedule[j].flightTime}</p>
              </div>

              </div>
               `


            //     sStops = sStops.replace('{{id}}', jFlight.schedule[j].id);
            //     sStops = sStops.replace('{{from}}', jFlight.schedule[j].from);
            //     sStops = sStops.replace('{{to}}', jFlight.schedule[j].to);
            //     sStops = sStops.replace('{{waitingTime}}', jFlight.schedule[j].waitingTime);
            //     sStops = sStops.replace('{{flightTime}}', jFlight.schedule[j].flightTime)

        }
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{STOPS}}', sStops)


        flights.innerHTML += sFlightBluePrintCopy
    }

})();


function showStops() {
    var stops = document.querySelector(".stop-box");
    if (stops.style.display === "grid") {
        stops.style.display = "none";
    } else {
        stops.style.display = "grid";
    }
}
