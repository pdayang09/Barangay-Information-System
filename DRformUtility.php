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
	
	<?php session_start();
		  require('connection.php');
		  //Retrieval of Personal Data (Session Mode)
		  $add = $_SESSION['place'];
		  $resId = $_SESSION['resId'];
		  $appId = $_SESSION['appId'];
		  $place = $_SESSION['place'];
		  //$doc = $_SESSION['document'];//Type of document
		  $name = $_SESSION['name'];
		  
		  //Determines if the document has an amount to be paid
		  $docPayment = 1;
		  //Purpose of DocRequest
		  $docPurpose = "Utility Application";
		  
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
		
		<?php //Initialize variables
	
			//Gets Today's Date
			$today = date("F j, Y, g:i a"); // displays date today
			
			// form variables declaration
				$DRdocreqID = $DRpurpose = $DRdocCode = $DRapplicantID = $DRapprovedBy = $DRdatereq = "";
				$plateNo = $reqType = $operatorName = $ownerName = $vehicleMode = $motorNo = $chassisNo = $vehicleNo = $vehicleStat = "";

		?>

	<form method="post"/>
    <div id="wrapper">
    <!--?php include('Nav.php')?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
			
                <div class="row">
                    <div class="col-lg-12">
					
							<div class = "bodybody">	
								<div class="panel-body">
		
		<legend ><font face = "cambria" size = 10 color = "grey"> Utility </font></legend><br>
		<!-- p><font face = "cambria" size =5 color = "red">* required fields</font -->
		
		<!-- Street Permit form section -->
		<!--div class="panel-group" -->
			<div class="panel panel-primary">
				<div class="panel-heading"><font face="cambria" size=5 color="white"><center><b>DOCUMENT REQUEST DETAILS</b></center></font></div>
					<div class="panel-body">
						<form method="POST">
						<div class = "form-group">
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Document Request ID </font></p>			
								<input id="DRdocreqID" class="form-control input-group-lg reg_name" type="text" name="DRdocreqID" title="system-generated">
							</div>
							<div class="col-sm-4">
							<p><font face="cambria" size=5 color="grey"> Document Purpose </font></p>			
							<!-- input id="DRpurpose" class="form-control input-group-lg reg_name" type="text" name="DRpurpose" title="system-generated" -->
							<select class="form-control" id="DRpurpose" name="DRpurpose">
								<?php
							echo "<select class='form-control' id='DRpurpose' name='DRpurpose'>
								<option>$docPurpose
							</select>";
							?>
								
							</div>
							<div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Date Requested </font></p>			
								<input id="DRdatereq" class="form-control input-group-lg reg_name" type="text" name="DRdtereq" title="system-generated" disabled>
							</div>
							<!-- div class="col-sm-4">
								<p><font face="cambria" size=5 color="grey"> Document Applicant ID </font></p>			
								<input id="DRapplicantID" class="form-control input-group-lg reg_name" type="text" name="DRapplicantID" title="system-generated">
							</div>
							<div class="col-sm-3">
								<p><font face="cambria" size=5 color="grey"> Date Requested </font></p>			
								<input id="DRdatereq" class="form-control input-group-lg reg_name" type="text" name="DRdtereq" title="system-generated">
							</div>
							<div class="col-sm-5">
								<p><font face="cambria" size=5 color="grey"> Approved By </font></p>			
								<input id="DRapprovedBy" class="form-control input-group-lg reg_name" type="text" name="DRapprovedBy" title="system-generated">
							</div -->
						</div>
						</form>
					</div>
				</div>
			</div>
				
			<div class="panel panel-primary">
				<div class="panel-heading"><font face="cambria" size=5 color="white"><center><b>REQUIREMENTS</b></center></font></div>
					<div class="panel-body">
						<form method="POST">
						<div class = "form-group">
							<div class="checkbox">
								<label><input type="checkbox" value="">
								<font face="cambria" size=5 color="black">OR/CR (LTO Official Receipt)</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="">
							  <font face="cambria" size=5 color="black">Deed of Sale (if not the register owner)</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="">
							  <font face="cambria" size=5 color="black">Photocopy of Operator and Driver's License</label>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
			<br>			
			<div class="panel panel-primary">
				<div class="panel-heading"><font face="cambria" size=5 color="white"><center><b>VEHICLE DETAILS</b></center></font></div>
					<div class="panel-body">
						<form method="POST">
						<div class="col-sm-12">
							<p><font face="cambria" size=5 color="grey"> Request Type </font></p>			
							<input id="reqType" class="form-control input-group-lg reg_name" type="text" name="reqType" title="system-generated">
						</div>
						<div class="col-sm-6">
							<p><font face="cambria" size=5 color="grey"> Operator Name </font></p>			
							<input id="operatorName" class="form-control input-group-lg reg_name" type="text" name="operatorName" title="system-generated">
						</div>
						<div class="col-sm-6">
							<p><font face="cambria" size=5 color="grey"> Owner Name </font></p>
							<input id="ownerName" class="form-control input-group-lg reg_name" type="text" name="ownerName" title="system-generated">
						</div>
						<div class="col-sm-4">
							<p><font face="cambria" size=5 color="grey"> Plate No. </font></p>			
							<input id="plateNo" class="form-control input-group-lg reg_name" type="text" name="plateNo" title="system-generated">
						</div>
						<div class="col-sm-4">
							<p><font face="cambria" size=5 color="grey"> Vehicle Mode </font></p>			
							<input id="vehicleMode" class="form-control input-group-lg reg_name" type="text" name="vehicleMode" title="system-generated">
						</div>
						<div class="col-sm-4">
							<p><font face="cambria" size=5 color="grey"> Motor No. </font></p>			
							<input id="motorNo" class="form-control input-group-lg reg_name" type="text" name="motorNo" title="system-generated">
						</div>
						<div class="col-sm-4">
							<p><font face="cambria" size=5 color="grey"> Chassis No. </font></p>			
							<input id="chassisNo" class="form-control input-group-lg reg_name" type="text" name="chassisNo" title="system-generated">
						</div>
						<div class="col-sm-4">
							<p><font face="cambria" size=5 color="grey"> Vehicle No. </font></p>			
							<input id="vehicleNo" class="form-control input-group-lg reg_name" type="text" name="vehicleNo" title="system-generated">
						</div>
						<div class="col-sm-4">
							<p><font face="cambria" size=5 color="grey"> Vehicle Status </font></p>			
							<input id="vehicleStat" class="form-control input-group-lg reg_name" type="text" name="vehicleStat" title="system-generated">
						<br>
						</div>
						
							<input type="button" class="btn btn-success btn-lg btn-block" name = "btnSubmit" id = "btnSubmitU" value = "Submit">
						</div>
						</form>
					</div>
				</div>
			<div>
			<br>
		
		<?php require('connection.php');
			if(isset($_POST['btnSubmit']))
			{
				$saveTRUSQL = "";
			}

		?>
				
								</div> <!-- panel-body -->
							</div> <!-- bodybody -->			
						</div> <!-- col-lg-12 -->
					</div> <!-- class=row -->
				</div> <!-- container-fluid -->
			</div> <!-- page-content-wrapper -->
		</div> <!-- wrapper -->
			
		</section><! --/wrapper -->
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


  