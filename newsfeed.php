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
					<li><a href="#"><span class="glyphicon glyphicon-dashboard"></span> Newsfeed</a></li>
					<li><a data-toggle="modal" href='#modal-id'><span class="glyphicon glyphicon-pencil"></span> Post</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Message</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Account<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#"><span class="glyphicon glyphicon-lock"></span> Settings</a></li>
						<li><a href="logout.php"><span class="glyphicon glyphicon-envelope"></span> Log out</a></li>
					</ul>
				</li>
			</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Post an article</h4>
				</div>
				<div class="modal-body">
					<input type="email" name="" id="postTitle" class="form-control" placeholder="Title of your" value="" required="required" title=""><br>
					<textarea name="" id="postContent" placeholder="Content" class="form-control" rows="10" required="required"></textarea>
					<input type="file" id="postPhoto" name="img">
					<a type="file" name="img"><span class="glyphicon glyphicon-camera"></span></a>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" id="btnPost">Post</button>
				</div>
			</div>
		</div>
	</div>
	<div class="row about" id="postsContainerDiv">
            <!--<div class="panel panel-info">
                <div class="panel-body">
                	<div class="col-lg-3">
                   	 	<img class="img-responsive" src="images/save-ico.png" alt="">
                    </div>
                    <div class="col-lg-9">
                   		<div class="caption-full">
		                    <h4 class="pull-right"><span></span></h4>
		                    <h4 class="section-lead">Author: <a href="#">I am the author</a></h4>
		                    <h4 class="section-lead">Title: <a href="#">This is the title</a></h4>

		                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    		
                    		<div class="pull-left">
	                    		<p>
		                    		<span class="badge">15</span> Likes <span class="badge">5</span> Comments
		                    	</p>
		                    </div>
		                    <div class="pull-right">
		                    	<p>
		                    		<span class="glyphicon glyphicon-star"></span>
		                            <span class="glyphicon glyphicon-star"></span>
		                            <span class="glyphicon glyphicon-star"></span>
		                            <span class="glyphicon glyphicon-star"></span>
		                            <span class="glyphicon glyphicon-star-empty"></span>
		                            4.0 stars &nbsp;3 reviews
	                            </p>
                    		</div>
                    	</div>
             		</div>                  
                </div>
			</div>
			<div class="panel panel-info">
                <div class="panel-body">
                	<div class="col-lg-3">
                   	 	<img class="img-responsive" src="images/save-ico.png" alt="">
                    </div>
                    <div class="col-lg-9">
                   		<div class="caption-full">
		                    <h4 class="pull-right"><span></span></h4>
		                    <h4 class="section-lead">Author: <a href="#">I am the author</a></h4>
		                    <h4 class="section-lead">Title: <a href="#">This is the title</a></h4>

		                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    		
                    		<div class="pull-left">
	                    		<p>
		                    		<span class="badge">15</span> Likes <span class="badge">5</span> Comments
		                    	</p>
		                    </div>
		                    <div class="pull-right">
		                    	<p>
		                    		<span class="glyphicon glyphicon-star"></span>
		                            <span class="glyphicon glyphicon-star"></span>
		                            <span class="glyphicon glyphicon-star"></span>
		                            <span class="glyphicon glyphicon-star"></span>
		                            <span class="glyphicon glyphicon-star-empty"></span>
		                            4.0 stars &nbsp;3 reviews
	                            </p>
                    		</div>
                    	</div>
             		</div>                  
                </div>
			</div>-->

	</div>


		<footer>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p>Copyright &copy; EcoBit 2016</p>
				</div>
			</div>
		</footer> 
  	  <!-- jQuery -->
      <script src="js/jquery.js"></script>
    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="js/functionality.js" type="text/javascript"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>

  </body>
</html>
