<?php
    session_start();

    if(isset($_SESSION["userId"])) {
        header("Location: newsfeed.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EcoBit</title>

    <link rel="shortcut icon" href="images/favicon.ico" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--Bootstrap Core CSS-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--Custom CSS-->
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <!-- <link href="css/half-slider.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/index.css">
  </head>

  <body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">EcoBit</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar-ex1-collapse">
				<ul class="nav nav-pa navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="articles.php">Articles</a></li>
				</ul>
				<ul class="nav navbar-nav  navbar-right">
					<li class="log"><a data-toggle="modal" href='#modal-id'>LOG IN</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

    <div class="row about" id="postsContainerDiv"></div>


  	  <!-- jQuery -->
      <script src="js/jquery.js"></script>
        <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="js/functionality.js" type="text/javascript"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>

  </body>
</html>
