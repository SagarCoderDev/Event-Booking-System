<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <button id="pay-button">Pay with Razorpay</button>
<form action="payment_success.php" method="POST">
  <?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password,"ems");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


  $name = $_GET['eventname'];

  $sql = "SELECT EventPrice from tblevents where EventName = '$name'";

  $price = null;
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $events = $result->fetch_assoc();
    $price = $events['EventPrice'];
    $price = $price * 100;
  }

echo "<script>
  var phpPrice = " . json_encode($price) . "; // Important: Use json_encode!
  console.log(phpPrice); // Verify in the browser's console
</script>";   
  

  ?>
<script>


  
  var options = {
    "key": "rzp_test_uPAGMN2LhDgxh8",
    "amount":<?php echo json_encode($price); ?>, 
    "currency": "INR",
    "name": "EMS",
    "description": "Test Transaction",
    "image": "https://your-logo-url.com", // Optional
    "order_id": "", // Dynamically generate order_id on the server-side
    "handler": function (response){
      alert("Payment Successful. Payment ID: " + response.razorpay_payment_id);
      window.location.href = "http://localhost/ems/my-bookings.php"
      // You can send the response.razorpay_payment_id to your server for verification
    },
    "prefill": {
      "name": "MindWave Studio",
      "email": "sagaringole1263@gmail.com",
      "contact": "8208609135"
    },
    "notes": {
      "address": "Razorpay Corporate Office"
    },
    "theme": {
      "color": "#DAA520"
    }
  };

  var rzp1 = new Razorpay(options);

  document.getElementById('pay-button').onclick = function(e){
    e.preventDefault();
    rzp1.open();
  }
</script>
</form>
<style>
  #pay-button{
    display: none;
  }
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $('#pay-button').click();
  });
</script>
</body>
</html>