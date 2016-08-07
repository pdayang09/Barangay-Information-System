<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
  
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
	
	<!-- ?php session_start();
		  require('connection.php');? -->
	<?php 
		session_start();
		$appId  = $_SESSION['appId'];
		$add = $_SESSION['place'];
		$resid = $_SESSION['resId'];
		$contactno = $_SESSION['contactno'];
		$name = $_SESSION['name'];
		
		//All Documents
		$certi = "Certification";
		$busClear = "Business Clearance";
		$CTC = "Community Tax Certificate";
		$excav = "Excavation";
		$indig = "Certification of Indigency";
		$streetPer = "Street Permit";
		$TRU = "TRU Clearance";
	?>
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
            <a href="index.html" class="logo"><b>DOCUMENT SUBSYSTEM</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 4 pending tasks</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">DashGum Admin Panel</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Database Update</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Product Development</div>
                                        <div class="percent">80%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Payments Sent</div>
                                        <div class="percent">70%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Complete (Important)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Zac Snider</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hi mate, how is everything?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Divya Manian</span>
                                    <span class="time">40 mins.</span>
                                    </span>
                                    <span class="message">
                                     Hi, I need your help with this.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-danro.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Dan Rogers</span>
                                    <span class="time">2 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Love your new Dashboard.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-sherman.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Dj Sherman</span>
                                    <span class="time">4 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Please, answer asap.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
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
              	  <h5 class="centered">Mira Jhontana Reyes</h5>
              	  	
                  <li class="mt">
                      <a href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Maintenance</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">General</a></li>
                          <li><a  href="#">Buttons</a></li>
                          <li><a  href="#">Panels</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Transaction</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">Calendar</a></li>
                          <li><a href="#">Gallery</a></li>
                          <li><a href="#">Todo List</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-bar-chart-o"></i>
                          <span>Reports</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">Basic Table</a></li>
                          <li><a  href="#">Responsive Table</a></li>
                      </ul>
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

	<form method="post">
    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
			
                <div class="row">
                    <div class="col-lg-12">
					
							<div class = "bodybody">	
								<div class="panel-body">
		<form method = "POST">
		<legend ><font face = "cambria" size = 10 color = "grey"> Select Document</font></legend><br><br><br>
		
		<?php//Certification
		echo "<button type='submit' class='btn btn-info btn-lg btn-block' name='btnBrgyCertification'>
			<font face='cambria' size=5 color='white'><b>$certi</b></font>
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>";
			
				if(isset($_POST['btnBrgyCertification']))    
				{
					$_SESSION['document'] = $certi;
					$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
					echo "<script> window.location = 'DRformCertification.php';</script>";
				}
			?>
			<?php//Business Clearance
				echo "<button type='submit' class='btn btn-danger btn-lg btn-block' name='btnBusClearance'>
				<font face='cambria' size=5 color='white'><b>$busClear</b></font>	
				<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>";
			
				if(isset($_POST['btnBusClearance']))
				{
					$_SESSION['document'] = $busClear;
					$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
				echo "<script> window.location = 'DRformBusClrearanceNEW.php';</script>";
			} 
			?>
			<?php//CTC
				echo "<button type='submit' class='btn btn-success btn-lg btn-block' name='btnCTC'>
				<font face='cambria' size=5 color='white'><b>$CTC</b></font>	
				<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>";
			
				if(isset($_POST['btnCTC']))
				{
					$_SESSION['document'] = $CTC;
					$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
					echo "<script> window.location = 'DRformCTC.php';</script>";
				} 
			?>
			
			<?php //Excavation
				echo "<button type='submit' class='btn btn-warning btn-lg btn-block' name='btnExcavation'>
				<font face='cambria' size=5 color='white'><b>$excav</b></font>	
				<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>";
			
				if(isset($_POST['btnExcavation']))
				{
					$_SESSION['document'] = $excav;
					$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
					echo "<script> window.location = 'DRformExcav.php';</script>";
				} 
			?>
			
			<?php//Indigency
				echo "<button type='submit' class='btn btn-primary btn-lg btn-block'name='btnIndigency'>
				<font face='submit' size=5 color='white'><b>$indig</b></font>	
				<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>";
			
				if(isset($_POST['btnIndigency']))
				{
					$_SESSION['document'] = $indig;
					$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
					echo "<script> window.location = 'DRformIndigency.php';</script>";
				} 
			?>
			<?php//Street Permit
			echo "<button type='submit' class='btn btn-danger btn-lg btn-block'name='btnStreetPermit'>
			<font face='cambria' size=5 color='white'><b>$streetPer</b></font>	
			<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>";
			
			if(isset($_POST['btnStreetPermit']))
			{
				$_SESSION['document'] = $streetPer;
				$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
				echo "<script> window.location = 'DRformStreetPermit.php';</script>";
			} 
			?>
			<?php//Vehicle
				echo "<button type='submit' class='btn btn-info btn-lg btn-block' name='btnVehicle'>
				<font face='cambria' size=5 color='white'><b>$TRU </b></font>	
				<span class='glyphicon glyphicon-chevron-right pull-right'></span></button><br>";
			
				if(isset($_POST['btnVehicle']))
				{
					$_SESSION['document'] = $TRU;
					$_SESSION['resId'] = $resId;
					$_SESSION['appId'] = $appId;
					$_SESSION['name'] = $name;
					$_SESSION['contactno'] = $contactno;
					$_SESSION['place'] = $place;
					echo "<script> window.location = 'DRselectVehicle.php';</script>";
				} 
			?>
		</form>
			
			
								</div> <!-- panel-body -->
							</div> <!-- bodybody -->			
						</div> <!-- col-lg-12 -->
					</div> <!-- class=row -->
				</div> <!-- container-fluid -->
			</div> <!-- page-content-wrapper -->
		</div> <!-- wrapper -->
			</form>
		</section> <!--/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 - TEAM BARANGAY
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
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


  