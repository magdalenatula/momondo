<?php 
$flightId = $_GET['id'];


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

    <h1>BUY FLIGHT</h1>

    </section>

    <form id="formBuyTrip" method="POST">
        
    <input name="txtFirstName" type="text" placeholder="First Name">
    <input name="txtLastName" type="text" placeholder="Last Name">
    <input name="txtPhoneNumber" type="text" placeholder="Phone Number">
    <input name="txtEmail" type="text" placeholder="Email">
 
   <button class="btnSearch"><a href="add-new-trip.php?id=<?=$flightId?>" onclick="buy()">BUY</a></button> 
    
    </form>

    <script>
        async function buy(){
        var oForm = document.querySelector('#formBuyTrip')
        var jConnection = await fetch('api-buy.php',{
            "method":"POST",
            "body" : new FormData(oForm)
        })
        var sData = await jConnection.text()
        console.log("working"); 

        }


        
    </script>
    

</body>
</html>