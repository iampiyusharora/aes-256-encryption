<?php session_start(); ?>
<?php
    if(isset($_SESSION['valid'])) {            
        include("connection.php");                    
        $result = mysqli_query($mysqli, "SELECT * FROM login");
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
            <a href="index.html" class="logo"><b>Secure Data</b></a>
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
                  <h5 class="centered"><?php echo $_SESSION['name'] ?></h5>
                    
                  <li class="mt">
                      <a  class="active"  href="index.html">
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
                      <a href="decrypted-data.php" >
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
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Discover Our Panels</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		
					<! -- 1st ROW OF PANELS -->
					<div class="row">
						<!-- TWITTER PANEL -->
						
						
						
						
						
					</div><! --/END 1ST ROW OF PANELS -->
					
					<! -- 2ND ROW OF PANELS -->
					<div class="row">
						<! -- TODO PANEL -->
						
						
						<! -- PROFILE 01 PANEL -->
						<div class="col-lg-4 col-md-4 col-sm-4 mb">
              
              <div class="content-panel pn">
                <div id="profile-01">
                  
                </div>
               <a href="index.php" > <div class="profile-01 centered">
                  <p>Dashboard</p>
                </div></a>
              </div><! --/content-panel -->
            </div><! --/col-md-4 --><div class="col-lg-4 col-md-4 col-sm-4 mb">
              <div class="content-panel pn">
                <div id="profile-1">
                </div>
                <a href="add.html" > <div class="profile-1 centered">
                  <p>Add New Data</p>
                </div></a>
              </div><! --/content-panel -->
            </div><! --/col-md-4 --><div class="col-lg-4 col-md-4 col-sm-4 mb">
              <div class="content-panel pn">
                <div id="profile-2">
                </div>
                 <a href="decrypted-data.php" ><div class="profile-2 centered">
                  <p>View Submissions</p>
                </div></a>
              </div><! --/content-panel -->
            </div><! --/col-md-4 -->
					
						
				
					</div><!-- /END 6TH ROW OF PANELS -->

					
          		</div>
          	</div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="panels.html#" class="go-top">
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
    <script src="assets/js/jquery.sparkline.js"></script>

    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php    
    } else {
        header('Location: login.php');
    }
    ?>
