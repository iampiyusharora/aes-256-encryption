<?php session_start(); ?>
<?php

class cipher
{
    private $securekey;
    private $iv_size;

    function __construct($textkey)
    {
        $this->iv_size = mcrypt_get_iv_size(
            MCRYPT_RIJNDAEL_128,
            MCRYPT_MODE_CBC
        );
        $this->securekey = hash(
            'sha256',
            $textkey,
            TRUE
        );
    }

    function encrypt($input)
    {
        $iv = mcrypt_create_iv($this->iv_size);
        return base64_encode(
            $iv . mcrypt_encrypt(
                MCRYPT_RIJNDAEL_128,
                $this->securekey,
                $input,
                MCRYPT_MODE_CBC,
                $iv
            )
        );
    }

    function decrypt($input)
    {
        $input = base64_decode($input);
        $iv = substr(
            $input,
            0,
            $this->iv_size
        );
        $cipher = substr(
            $input,
            $this->iv_size
        );
        return trim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_128,
                $this->securekey,
                $cipher,
                MCRYPT_MODE_CBC,
                $iv
            )
        );
    }
}

?> 
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
<?php
//including the database connection file
$cipher = new cipher('d0a7e7997b6d5fcd55f4b5c32611b87cd923e88837b63bf2941ef819dc8ca282');
 
include_once("connection.php");
 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Your Submissions | Secure Data</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
        
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

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>Secure Data</b></a>
            <!--logo end-->
           
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">Piyush Arora</h5>
                    
                  <li class="mt">
                      <a href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  
                  <li class="mt">
                      <a href="add.html" >
                          <i class="fa fa-tasks"></i>
                          <span>Add new data</span>
                      </a>
                     
                  </li>
                  <li class="mt">
                      <a class="active" href="decrypted-data.php" >
                          <i class="fa fa-book"></i>
                          <span>View Submissions</span>
                      </a>
                     
                  </li>
                  <li class="mt">
                      <a href="about.php" >
                          <i class="fa fa-tasks"></i>
                          <span>About</span>
                      </a>
                     
                  </li>
                 

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Your submissions</h3>
				<div class="row">
				
	                  <div class="col-md-12">
	                  	  <div class="content-panel">
	                  	  	  
		                      <table class="table">
		                          <thead>
		                          <tr>
		                              <th>JOB ID</th>
		                              <th>OP NUM</th>
		                          </tr>
		                          </thead>
		                          <tbody>
		                          <?php
    while($res = mysqli_fetch_array($result)) {   
      $decrypted_jobid = $res['encrypted_jobid'];
      $decrypted_var1 = $cipher->decrypt($decrypted_jobid);
      $decrypted_opnum = $res['encrypted_opnum'];
      $decrypted_var2 = $cipher->decrypt($decrypted_opnum);
        echo "<tr>";
        echo "<td>".$decrypted_var1."</td>";
        echo "<td>".$decrypted_var1."</td>";
        echo "<td><a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
		                          </tbody>
		                      </table>
	                  	  </div><! --/content-panel -->
	                  </div><!-- /col-md-12 -->
                  
				</div><!-- row -->
<br>
         <a href="encrypted-data.php"><button class="btn btn-primary" style="float:right" href="encrypted-data.php">Encrypt Data</button></a>

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 - Secure Data by Piyush Arora
              <a href="basic_table.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
