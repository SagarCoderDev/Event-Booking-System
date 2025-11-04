
<?php
session_start();
error_reporting(0);
include('includes/config.php');
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
  

        <title>Event Booking System | user signin </title>
  <script src="https://cdn.tailwindcss.com"></script>
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

        
		<!-- modernizr css -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
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
                        <li class="active">Blog</li>
                    </ol>
                </div>
            </div>
<!-- Blog card section start -->
<div class="bg-gray-100 py-10">
<section class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">--Latest Blogs & Updates--</h2>

    <!-- Blog Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <!-- Blog Card 1 -->
      <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500 overflow-hidden group cursor-pointer">
        <div class="overflow-hidden">
          <img src="https://images.unsplash.com/photo-1531058020387-3be344556be6?auto=format&fit=crop&w=1200&q=60"
               alt="Event Tech" 
               class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-700">
        </div>
        <div class="p-6">
          <p class="text-sm text-gray-500 mb-2">October 2026 • Event Insights</p>
          <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-indigo-600 transition-colors duration-300">
            How Technology is Transforming Event Experiences
          </h3>
          <p class="text-gray-600 leading-relaxed text-sm">
            Discover how AI and digital innovation are creating smarter, more personalized event experiences for audiences.
          </p>
        </div>
      </div>

      <!-- Blog Card 2 -->
      <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500 overflow-hidden group cursor-pointer">
        <div class="overflow-hidden">
          <img src="https://images.unsplash.com/photo-1529333166437-7750a6dd5a70?auto=format&fit=crop&w=1200&q=60"
               alt="Business Event"
               class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-700">
        </div>
        <div class="p-6">
          <p class="text-sm text-gray-500 mb-2">October 2026 • Business</p>
          <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-indigo-600 transition-colors duration-300">
            The Rise of Hybrid Events in the Modern Era
          </h3>
          <p class="text-gray-600 leading-relaxed text-sm">
            Hybrid events combine the best of in-person and online formats, making engagement easier and more inclusive.
          </p>
        </div>
      </div>

      <!-- Blog Card 3 -->
      <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500 overflow-hidden group cursor-pointer">
        <div class="overflow-hidden">
          <img src="https://images.unsplash.com/photo-1522199710521-72d69614c702?auto=format&fit=crop&w=1200&q=60"
               alt="Team Work"
               class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-700">
        </div>
        <div class="p-6">
          <p class="text-sm text-gray-500 mb-2">September 2026 • Inspiration</p>
          <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-indigo-600 transition-colors duration-300">
            Creating Memorable Experiences That Inspire
          </h3>
          <p class="text-gray-600 leading-relaxed text-sm">
            Learn how creativity, storytelling, and smart planning help organizers craft unforgettable event moments.
          </p>
        </div>
      </div>
     <!-- Blog Card 4 -->
      <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500 overflow-hidden group cursor-pointer">
        <div class="overflow-hidden">
          <img src="https://images.unsplash.com/photo-1524253482453-3fed8d2fe12b?auto=format&fit=crop&w=1200&q=60"
               alt="Music Festival"
               class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-700">
        </div>
        <div class="p-6">
          <p class="text-sm text-gray-500 mb-2">August 2026 • Entertainment</p>
          <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-indigo-600 transition-colors duration-300">
            Behind the Scenes of Music Festivals
          </h3>
          <p class="text-gray-600 leading-relaxed text-sm">
            Explore how large-scale music events are organized, from lighting setups to managing thousands of fans.
          </p>
        </div>
      </div>

      <!-- Blog Card 5 -->
      <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500 overflow-hidden group cursor-pointer">
        <div class="overflow-hidden">
          <img src="https://images.unsplash.com/photo-1551836022-4c4c79ecde51?auto=format&fit=crop&w=1200&q=60"
               alt="Corporate Event"
               class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-700">
        </div>
        <div class="p-6">
          <p class="text-sm text-gray-500 mb-2">August 2026 • Corporate</p>
          <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-indigo-600 transition-colors duration-300">
            Mastering Corporate Event Management
          </h3>
          <p class="text-gray-600 leading-relaxed text-sm">
            Corporate events require strategy and planning — here’s how top organizers create professional experiences.
          </p>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- Blog card section end -->




 <?php include_once('includes/footer.php');?>
            <!--footer area are start-->
         </div>   
        <!--body-wraper-are-end-->
		
		<!--==== all js here====-->
		<!-- jquery latest version -->
        <script src="js/vendor/jquery-3.1.1.min.js"></script>
		<!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
		<!-- owl.carousel js -->
        <script src="js/owl.carousel.min.js"></script>
		<!-- meanmenu js -->
        <script src="js/jquery.meanmenu.js"></script>
		<!-- Nivo js -->
        <script src="js/nivo-slider/jquery.nivo.slider.pack.js"></script>
        <script src="js/nivo-slider/nivo-active.js"></script>
		<!-- wow js -->
        <script src="js/wow.min.js"></script>
        <!-- Youtube Background JS -->
        <script src="js/jquery.mb.YTPlayer.min.js"></script>
		<!-- datepicker js -->
        <script src="js/bootstrap-datepicker.js"></script>
		<!-- waypoint js -->
        <script src="js/waypoints.min.js"></script>
		<!-- onepage nav js -->
        <script src="js/jquery.nav.js"></script>
        <!-- animate text JS -->
        <script src="js/animate-text.js"></script>
		<!-- plugins js -->
        <script src="js/plugins.js"></script>
        <!-- main js -->
        <script src="js/main.js"></script>
    </body>
</html>