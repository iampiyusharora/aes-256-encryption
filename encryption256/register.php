<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
	  	 <?php
    include("connection.php");
 
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
 
        if($user == "" || $pass == "" || $name == "" || $email == "") {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='register.php'>Go back</a>";
        } else {
            mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
            or die("Could not execute the insert query.");
            
            header('Location: login.php');
        }
    } else {
?>
		      <form class="form-login" name="form1" method="post" action="">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		            <input type="text" name="name" class="form-control" placeholder="Full Name" autofocus>
		            <br>
                    <input type="text" name="email" class="form-control" placeholder="Email" autofocus>
                    <br>
                    <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
                    <br>
		            <input type="password" name="password" class="form-control" placeholder="Password">
		            <br>
		            <button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> CREATE ACCOUNT</button>
		            <hr>
		            
		           
		            <div class="registration">
		                Already have an account?<br/>
		                <a class="" href="login.php">
		                    Login
		                </a>
		            </div>
		
		        </div>
		
		          <!-- Modal -->
		          
		          <!-- modal -->
		
		      </form>	
              <?php
    }
    ?>  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
