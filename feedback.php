
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['feedback']))
{
  // Getting Post values
  $name=$_POST['name'];
  $email=$_POST['email'];   
  $message=$_POST['message']; 

  // query for data insertion
  $sql="INSERT INTO tblfeedback(name,email,message) VALUES(:name,:email,:message)";
  //preparing the query
  $query = $dbh->prepare($sql);
  //Binding the values
  $query->bindParam(':name',$name,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':message',$message,PDO::PARAM_STR);
  //Execute the query
  $query->execute();
  //Check that the insertion really worked
  $lastInsertId = $dbh->lastInsertId();
  if($lastInsertId)
  {
    echo "<script>alert('Success : Feedback submitted successfully. Thank you!');</script>";
    echo "<script>window.location.href='feedback.php'</script>";	
  }
  else 
  {
    echo "<script>alert('Error : Something went wrong. Please try again');</script>";	
  }
}
//Process for Sign
if(isset($_POST['signin']))
{
//Getting Post Values
$uname=$_POST['username'];
$password=md5($_POST['password']);
// Quer for signing matching username and password with db details
$sql ="SELECT Userid,IsActive FROM tblusers WHERE UserName=:uname and UserPassword=:password";
//preparing the query
$query= $dbh -> prepare($sql);
//Binding the values
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
//Execute the query
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
 foreach ($results as $result) {
    $status=$result->IsActive;
    $_SESSION['usrid']=$result->Userid;
  } 
if($status==0)
{
echo "<script>alert('Your account is Inactive. Please contact admin');</script>";
} else{
echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
} }
else{
  echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
  <script src="https://cdn.tailwindcss.com"></script>

        <title>Event Booking System | user signin </title>
	       		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- animate css -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="css/owl.carousel.css">
		<!-- icofont css -->
        <link rel="stylesheet" href="css/icofont.css">
		<!-- Nivo css -->
        <link rel="stylesheet" href="css/nivo-slider.css">
		<!-- animaton text css -->
        <link rel="stylesheet" href="css/animate-text.css">
		<!-- Metrial iconic fonts css -->
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
		<!-- style css -->
		<link rel="stylesheet" href="style.css">
		<!-- responsive css -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- color css -->
		<link href="css/color/skin-default.css" rel="stylesheet">
        
		<!-- modernizr css -->
<script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>


<!-- body start -->

<body>
<!--body-wraper-are-start-->
         <div class="wrapper single-blog">
         
           <!--slider header area are start-->
           <div id="home" class="header-slider-area">
                <!--header start-->
                   <?php include_once('includes/header.php');?>
                <!-- header End-->
            </div>
           <!--slider header area are end-->
            
            <!--  breadcumb-area start-->
            <div class="breadcumb-area bg-overlay">
                <div class="container">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Feedback</li>
                    </ol>
                </div>
            </div> 
            <!--  breadcumb-area end--> 


<form method="post" name="feedback">
    <div class="bg-gradient-to-b from-blue-50 to-white min-h-screen flex flex-col items-center justify-center p-6">
  <!-- Header -->
  <div class="text-center mb-10">
    <h1 class="text-4xl font-bold text-blue-600">💬 Feedback & Support</h1>
    <p class="text-gray-600 mt-2">We’d love to hear from you! Share your feedback or reach out for support.</p>
  </div>

  <!-- Container -->
  <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl p-8 md:p-10 flex flex-col md:flex-row gap-10">

    <!-- Feedback Form -->
    <div class="flex-1">
      <h2 class="text-2xl font-semibold text-gray-700 mb-4">📝 Send Feedback</h2>
      <form class="space-y-5">
        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">Full Name</label>
          <input type="text" placeholder="Enter your name" name="name" required
            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">Email Address</label>
          <input type="email" placeholder="example@email.com" name="email" required
            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-600 mb-1">Message</label>
          <textarea rows="4" placeholder="Write your feedback or issue..." name="message" required
            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>

        <button class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition-all shadow-md hover:shadow-lg" name="feedback">
          Submit Feedback
        </button>
      </form>
    </div>

    <!-- Support Info -->
    <div class="flex-1 bg-gradient-to-br from-blue-600 to-blue-800 text-white rounded-2xl p-8 shadow-lg">
      <h2 class="text-2xl font-semibold mb-4">📞 Contact Support</h2>
      <p class="text-blue-100 mb-6">Having trouble with booking or payment? Our support team is ready to help you!</p>

      <div class="space-y-4">
        <div class="flex items-center gap-3">
          <span class="text-2xl">📧</span>
          <p>sagaringole1263@gmail.com</p>
        </div>
        <div class="flex items-center gap-3">
          <span class="text-2xl">📱</span>
          <p>+91 8208609135</p>
        </div>
        <div class="flex items-center gap-3">
          <span class="text-2xl">🌐</span>
          <p>www.ebs-portal.com</p>
        </div>
      </div>

      <div class="mt-8">
        <h3 class="text-lg font-semibold">🕒 Working Hours</h3>
        <p class="text-blue-100">Mon - Sat: 9:00 AM – 7:00 PM</p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="mt-10 text-center text-gray-500 text-sm">
    © 2025 Event Booking System — All rights reserved.
  </footer>
 </div>
</form>
</body>

           