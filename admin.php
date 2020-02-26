
<?php

  // LOGIN PART / SESSION 
  session_start();
  if(  !isset($_SESSION['sAdminEmail']) ){
    header('Location: login.php');
    exit();
  }
  $sAdminEmail = $_SESSION['sEmail'];

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
<h1>Hello, ... </h1>
<p> In this page you can create a new flight, edit and delete flights</p>
<p>Below the form you can see the list of all avalibe flights</p>
</section>

<form onsubmit= "return validate()" id="admin-form" action="save-flight.php" method="POST">
  <div class="column">
    <input oninput = "validate()"  name="departure-city"  type="text" placeholder="departure-city">
    <input oninput = "validate()" name="arrival-city" type="text" placeholder="arrival-city">
    <input oninput = "validate()" name="price" type="text" placeholder="price">
    <input oninput = "validate()" name="currency" type="text" placeholder="currency">
    <input oninput = "validate()" name="company-name" type="text" placeholder="company-name">
    <input oninput = "validate()" name="company-shortcut" type="text" placeholder="company-shortcut">
    <input oninput = "validate()" name="departure-time" type="text" placeholder="departure-tim">
    <input oninput = "validate()" name="arrival-time" type="text" placeholder="arrival-time">
    <input oninput = "validate()" name="total-time" type="text" placeholder="total-time">
    <input oninput = "validate()" name="stops" type="number" placeholder="stops">
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
    <button class="btnSearch" type="submit">SAVE</button> 
</form>


<main class="trips-section">

    <div id="flights-admin">  
        
    </div>

  </main>

  <script src="admin.js"></script>

  <script>
    function validate(){
  

  // let oForm = (event.target.localName == 'input') ? event.target.parentElement : event.target
  if( event.type == 'submit' ){
    var oForm = event.target
    var aElements = oForm.querySelectorAll('[data-validate]')
  }else{
    var aElements = [event.target]
  }
  
  

  for(let i = 0; i < aElements.length; i++){
    aElements[i].classList.remove('invalid')
    let sValidateType = aElements[i].getAttribute('data-validate')
    switch( sValidateType ){
      case 'string':
        var sData = aElements[i].value
        var iMin = aElements[i].getAttribute('data-min')
        var iMax = aElements[i].getAttribute('data-max')
        if(sData.length < iMin || sData.length > iMax){
          aElements[i].classList.add('invalid')
        }
      break
      case 'integer':
        var sData = aElements[i].value
        if( /^\d+$/.test(sData) === false ){
          aElements[i].classList.add('invalid')
          break
        }
        var sData = parseInt(aElements[i].value) // 55ppp
        var iMin = parseInt(aElements[i].getAttribute('data-min'))
        var iMax = parseInt(aElements[i].getAttribute('data-max'))        
        if(sData < iMin || sData > iMax){
          aElements[i].classList.add('invalid')
        }        
      break
      case 'email':
        var sData = aElements[i].value
        var regEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        if( ! regEmail.test(sData) ){
          aElements[i].classList.add('invalid') 
        }
      break      
    }  
  }

  if( oForm  ){
    return (oForm.querySelectorAll('.invalid').length) ? false : true
  }

}
  </script>

</body>
</html>