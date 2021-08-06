<?php 
session_start();
extract($_REQUEST);
include('../Admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <title>Industrial Visiting Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="dashboard.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
  </style>
  </head>
  <body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">VISIT-X</a>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dashboard.php?option=packages">Tour Packages</a></li>
            <li><a href="dashboard.php?option=booking_details">Booking Details</a></li>
            <li><a href="dashboard.php?option=user_details">User Details</a></li>
            <li><a href="dashboard.php?option=feedback">Feedback</a></li>
            <li><a href="dashboard.php?option=admin_profile">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

<?php 
@$opt=$_GET['option'];

	if($opt=="places")
  {
  include('places.php'); 
  }
  else if($opt=="add_place")
  {
  include('add_place.php'); 
  }
  else if($opt=="delete_place")
  {
  include('delete_place.php'); 
  }
  else if($opt=="update_place")
  {
    include('update_place.php');
  }
	else if($opt=="add_subject")
	{
	include('add_subject.php');	
	}
   else if($opt=="subjects")
  {
  include('subjects.php'); 
  }
  else if($opt=="delete_subject")
  {
  include('delete_subject.php'); 
  }
  else if($opt=="update_subject")
  {
    include('update_subject.php');
  }
	else if($opt=="add_package")
	{
	include('add_package.php');	
	}
   else if($opt=="packages")
  {
  include('packages.php'); 
  }
  else if($opt=="delete_package")
  {
  include('delete_package.php'); 
  }
  else if($opt=="update_subject")
  {
    include('update_subject.php');
  }
	else if($opt=="booking_details")
	{
	include('booking_details.php');	
	}
	
	else if($opt=="user_details")
	{
	include('user_details.php');	
	}
	else if($opt=="feedback")
	{
	include('feedback.php');	
	}
?>
          
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
