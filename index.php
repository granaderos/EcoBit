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

	<header>
		<div class="container">
			<div class="header">
			  <h1>Become an Eco-Warrior</h1>
			</div>
		</div>
	</header>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<img class="img-responsive img-war" src="images/warrior.gif"/>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<form action="" method="POST" role="form">
					<legend>SIGN UP</legend>				
					<div class="form-group">
						<input type="text" class="form-control" id="email" placeholder="Email" required><br>
						<input type="text" class="form-control" id="firstname" placeholder="Firstname" required><br>
						<input type="text" class="form-control" id="lastname" placeholder="Lastname" required><br>
						<input type="text" class="form-control" id="password" placeholder="Password" required><br>
						<input type="text" class="form-control" id="confirmPassword" placeholder="Confirm Password" required><br>
						<div class="radio">
							<label>
								<input type="radio" name="" value="" checked="checked">
								I agree with the Terms and Services
							</label>
						</div>
					</div>			
					<button type="submit" id="btnRegister" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>

		<div class="row about">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<img class="img-responsive img-ico" src="images/save-ico.png" alt="logo">
                    <h1 class="page-header" align="center">Save Earth</h1>
                    <p class="lead section-lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<img class="img-responsive img-ico" src="images/share-ico.png" alt="logo">
                    <h1 class="page-header" align="center">Share Ideas</h1>
                    <p class="lead section-lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<img class="img-responsive img-ico" src="images/connect-ico.png" alt="logo">
                    <h1 class="page-header" align="center">Connect</h1>
                    <p class="lead section-lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			</div>
		</div>
		<div id="carousel-id" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-id" data-slide-to="0" class=""></li>
				<li data-target="#carousel-id" data-slide-to="1" class=""></li>
				<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item">
					<img src="images/save-ico.png">
					<div class="container">
						<div class="carousel-caption">
							<h1>jagjdald</h1>
							<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
						</div>
					</div>
				</div>
				<div class="item">
					<img src="images/share-ico.png">
					<div class="container">
						<div class="carousel-caption">
							<h1>lajslgd</h1>
							<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
						</div>
					</div>
				</div>
				<div class="item active">
					<img src="images/connect-ico.png">
					<div class="container">
						<div class="carousel-caption">
							<h1>kajsgdkasj</h1>
							<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
		<footer>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p>Copyright &copy; EcoBit 2016</p>
				</div>
			</div>
		</footer> 
		<div class="modal fade" id="modal-id">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Login to EcoBit</h4>
					</div>
					<div class="modal-body">
                        <form onsubmit="return false;">
                            <input type="email" name="" id="emailEntered" class="form-control" placeholder="username" value="" required="required" title=""><br>
                            <input type="password" name="" id="passwordEntered" class="form-control" placeholder="password" required="required" title="">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Remember me &nbsp;
                                </label>
                                <a href="#">Forgot your password?</a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="btnLogin">Log In</button>
                            </div>
                        </form>
                    </div>
				</div>
			</div>
		</div>
	</div>  


  	  <!-- jQuery -->
      <script src="js/jquery.js"></script>
        <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="js/functionality.js" type="text/javascript"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>

  </body>
</html>
