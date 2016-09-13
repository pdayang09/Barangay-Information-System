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
    
    <title>Barangay Information System</title>

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
        require_once("refHolidays.php");?>
          
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
            <a href="index.html" class="logo"><b>Barangay Information System</b></a>
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
      <?php require("sidebar.php");?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">

<?php 

    $name = "BARANGAY";
    $contactno = "BARANGAY";

    require("connection.php");
    $query = mysqli_query($con, "SELECT COUNT(*) from tblreservationrequest");

    while($row = mysqli_fetch_row($query)){
       $count = $row[0];
    }

    //Other
        $resId = $count+1;
        $resPurpose = "Barangay Event";
        $num = "";

    //Gets Today's Date
        $today = date("Y-m-d"); 

?>
 <!-- Page Content -->
 <div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

        <legend ><font face = "cambria" size = 8 color = "grey"> Add Special Events</font></legend>

<FORM method="POST"> 

	<div class="alert alert-warning">
       <strong>Disable Date</strong> You are about to disable or set a date. Such dates are non-negotiable.
    </div>

    <div class="form-grop">
    	<div class="col-sm-6">
    		<div class="showback">

            <p><font face="cambria" size=4 color="grey"> Today is <?php echo $today;?> </font></p>

        	<p><font face="cambria" size=4 color="grey"> Select Dates </font></p>
        	<input type="text" id="datetimepicker" class="form-control input-group-lg reg_name, some_class" value="<?php if(isset($_POST['addDate'])){echo $_POST['addDate'];}else{}?>" name = "addDate"/><br>

            <p><font face="cambria" size=4 color="grey"> ID </font></p>
            <input class="form-control input-group-lg reg_name" type="text" name="resId" title="input name of client" value="<?php if(isset($_POST['resId'])){echo $_POST['resId'];}else{ echo $resId;}?>"> 

            <p><font face="cambria" size=4 color="grey"> Purpose </font></p>
            <input class="form-control input-group-lg reg_name" type="text" name="resPurpose" title="input name of client" value="<?php if(isset($_POST['resPurpose'])){echo $_POST['resPurpose'];}else{ echo $resPurpose;}?>"> <br><br>
            <p><font face="cambria" size=3 color="grey"> Repeat Every </font></p>
            <div class="col-sm-14">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-normal" id = "searcht" name = "btnEvery" value = "weeks" >WEEK</button>
            </div>
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-normal" id = "searcht" name = "btnEvery" value = "months" >MONTH</button>
            </div>
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-normal" id = "searcht" name = "btnEvery" value = "years" >YEAR</button>
            </div>
            </div>
            </div><br>

        	<p><font face="cambria" size=3 color="grey"> Disable Date Next </font></p>
            <div class="col-sm-14">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-normal" id = "searcht" name = "btnWeek" value = 1 >MON</button>
            </div>
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-normal" id = "searcht" name = "btnWeek" value = 2 >TUE</button>
            </div>
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-normal" id = "searcht" name = "btnWeek" value = 3 >WED</button>
            </div>
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-normal" id = "searcht" name = "btnWeek" value = 4 >THUR</button>
            </div>
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-normal" id = "searcht" name = "btnWeek" value = 5 >FRI</button>
            </div>
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-normal" id = "searcht" name = "btnWeek" value = 6 >SAT</button>
            </div>
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-normal" id = "searcht" name = "btnWeek" value = 0 >SUN</button>
            </div>
            </div>
            </div><br><br>

            <center>
            <div class="col-sm-8">
            <div class="btn-group btn-group" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-warning" id = "searcht" name = "btnAdd" value = "1" >DISABLE DATE</button>
                </div>
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-success" id = "searcht" name = "btnAddEvent" value = "2" >ADD EVENT</button>
                </div>
            </div>
            </div></center><br><br><br>

        	</div>
        </div>
    </div>
  

        <?php 
            require_once("refHolidays.php");
      		$arrDisabledDates[] = array(); 
            $arrTemp[] = array();
            //$arrDisabledDates = [''];   
            //$arrTemp = [''];

            $arrTemp = $_SESSION['arrTemp'];         
            $arrDisabledDates = $_SESSION['arrDisabledDates'] ;

            if(isset($_POST['btnAdd'])){
                $datetemp = $_POST['addDate'];

                $datetemp = str_replace('/','-', $datetemp);
                $datetemp = str_replace('/','.', $datetemp);
                $datetemp = date('d.m.Y', strtotime($datetemp));

                array_push($arrDisabledDates, $datetemp);  
                $arrDisabledDates = array_merge($arrDisabledDates, $arrTemp);
                    
                $arrTemp = [''];
                $_SESSION['arrTemp']= $arrTemp;    

               //print_r($arrDisabledDates);   
               //print_r($dayofweek);

                echo"<script> alert('You have successfully disabled date/s')</script>";
              }else if(isset($_POST['btnWeek'])){
                $nWeek = $_POST['btnWeek'];
                $datetemp = $_POST['addDate'];

                $datetemp = str_replace('/','-', $datetemp);
                $datetemp = str_replace('/','.', $datetemp);
                $dayofweek = date('w', strtotime($datetemp));
                
                $temp = (6 - $dayofweek + 1);
                $temp = $temp + $nWeek;  

                $datetemp = date('d.m.Y', strtotime($datetemp."+$temp days"));              
                array_push($arrTemp, $datetemp); 

                print_r($datetemp);
                print_r($temp);

                echo'
                <div>
                    <p><font face="cambria" size=3 color="grey"> You Selected </font></p>
                </div>';

                foreach ($arrTemp as $a) {

                    if(!empty($a)){
                        echo" $a <br>";;
                    }
                    
                }
              }else if(isset($_POST['btnEvery'])){
                $nEvery = $_POST['btnEvery'];
                $datetemp = $_POST['addDate'];

                $datetemp = str_replace('/','-', $datetemp);
                $datetemp = str_replace('/','.', $datetemp);

                if($nEvery =="weeks"){ // There are 52 weeks in a year
                    $count = 52;
                }else if($nEvery =="months"){ // There are 12 months in a year
                    $count = 12;
                }else if($nEvery =="years"){ // Setting date for the next 6 years only
                    $count = 6;
                }

                $intCtr =1;
                while($intCtr<=$count){

                        $datetemp = date('d.m.Y', strtotime($datetemp."+1 $nEvery"));
                        array_push($arrTemp, $datetemp);

                        $intCtr++; 
                    }
                                

               echo'
                <div>
                    <p><font face="cambria" size=3 color="grey"> You Selected </font></p>
                </div>';

                foreach ($arrTemp as $a) {

                    if(!empty($a)){
                        echo" $a <br>";;
                    }
                    
                }
              }else if(isset($_POST['btnAddEvent'])){
                $arrEvent[] = array();
                $arrEvent = [''];

                $resId = $_POST['resId'];
                $resPurpose = $_POST['resPurpose'];
                $datetemp = $_POST['addDate'];
                $resFrom = $datetemp;

                array_push($arrEvent, $datetemp);  
                $arrEvent = array_merge($arrEvent, $arrTemp);
                
                include("saveReservation2.php");

                $arrTemp = [''];
                $_SESSION['arrTemp']= $arrTemp;  

              }

             $_SESSION['arrDisabledDates'] = $arrDisabledDates; 
             $_SESSION['arrTemp'] = $arrTemp;

            ?> 

  	<div id="viewDDate" class="form-grop">
    	<div class="col-sm-6">
    		<div class="showback">

        	<table class="table table-hover" style="height: 40%; overflow: scroll; "'>
				<thead><tr>
					<th>Date</th>					
					<th> </th>
					<th> Action </th>
				</tr></thead>
				<tbody>
			<?php
				foreach ($arrDisabledDates as $a) {

					if(!empty($a)){
						echo"<tr><td> $a </td>";
						echo"<td> </td>";
						echo"<td> <i type='button' class='glyphicon glyphicon-remove'></i></td></tr>";
					}
					
				}
			?>	
				</tbody>
			</table>
        	</div>
        </div>
    </div> 

                </div><!-- /#col-lg-12 -->
            </div><!-- /#row -->
        </div><!-- /#container-fluid -->
    </div><!-- /#page-content-wrapper -->
<script>
function showDDate(){

    var a = document.getElementsByName("addDate")[0].value;
    var arr = <?php echo json_encode($arrDisabledDates); ?>;

    //document.getElementById("showCheck").innerHTML = a + b + c;
    //alert(val);

     $.ajax({
        type: "POST",
        url: "vDDate.php",
        data: 'dDate='+a+'&arrDisabledDates='+arr,
        success: function(data){
        alert(data);
        $("#viewDDate").html(data);
        }       
    });    
 
}
      $(function(){
          $('select.styled').customSelect();
      });  

</script>

<script src="./jquery.js"></script>
<script src="build/jquery.datetimepicker.full.js"></script>
<script>/*
window.onerror = function(errorMsg) {
    $('#console').html($('#console').html()+'<br>'+errorMsg)
}*/

$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
    $("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
    $.datetimepicker.setLocale($(e.currentTarget).val());
});

$("#datetimepicker_format_locale").on("change", function(e){
    $.datetimepicker.setLocale($(e.currentTarget).val());
});

var datearray = <?php echo json_encode($arrDisabledDates); ?>;

$('#datetimepicker').datetimepicker({
dayOfWeekStart : 0,
lang:'en',
formatDate: 'dd.mm.Y',
//dateToDisable: ['09.05.2016'],
disabledDates: datearray,
startDate:  0,
defaultDate: new Date(),
defaultTime: '08:00',
minDate: new Date(),
datepicker:true,
    allowTimes:['4:30','5:00','5:30','6:00','6:30','7:00','7:30','8:00','8:30','9:00','9:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00'],
    step:5
});

$('.some_class').datetimepicker({   
    formatTime:'H:i',
    formatDate:'d.m.Y'
});

$('#default_datetimepicker').datetimepicker({
    formatTime:'H:i',
    formatDate:'d.m.Y',
    //defaultDate:'8.12.1986', // it's my birthday
    defaultDate:'+03.01.1970', // it's my birthday
    defaultTime:'10:00',
    timepickerScrollbar:false
});

$('#datetimepicker10').datetimepicker({
    step:5,
    inline:true
});
$('#datetimepicker_mask').datetimepicker({
    mask:'9999/19/39 29:59'
});

$('#datetimepicker1').datetimepicker({
    datepicker:false,
    format:'H:i',
    step:5
});
$('#datetimepicker2').datetimepicker({
    //yearOffset:222,
    lang:'ch',
    datepicker:true,
    format:'d/m/Y',
    formatDate:'Y/m/d',
    minDate:'-1969/12/26', // yesterday is minimum date
    maxDate:'+1970/12/01' // and tommorow is maximum date calendar
    
});
$('#datetimepicker3').datetimepicker({
    inline:true
});
$('#datetimepicker4').datetimepicker();
$('#open').click(function(){
    $('#datetimepicker4').datetimepicker('show');
});
$('#close').click(function(){
    $('#datetimepicker4').datetimepicker('hide');
});
$('#reset').click(function(){
    $('#datetimepicker4').datetimepicker('reset');
});
$('#datetimepicker5').datetimepicker({
    datepicker:true,
    allowTimes:['4:30','5:00','5:30','6:00','6:30','7:00','7:30','8:00','8:30','9:00','9:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00'],
    step:5
});
$('#datetimepicker6').datetimepicker();
$('#destroy').click(function(){
    if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
        $('#datetimepicker6').datetimepicker('destroy');
        this.value = 'create';
    }else{
        $('#datetimepicker6').datetimepicker();
        this.value = 'destroy';
    }
});
var logic = function( currentDateTime ){
    if (currentDateTime && currentDateTime.getDay() == 6){
        this.setOptions({
            minTime:'11:00'
        });
    }else
        this.setOptions({
            minTime:'8:00'
        });
};
$('#datetimepicker7').datetimepicker({
    onChangeDateTime:logic,
    onShow:logic
});
$('#datetimepicker8').datetimepicker({
    onGenerate:function( ct ){
        $(this).find('.xdsoft_date')
            .toggleClass('xdsoft_disabled');
    },
    minDate:'-1970/01/2',
    maxDate:'+1970/01/2',
    timepicker:false
});
$('#datetimepicker9').datetimepicker({
    onGenerate:function( ct ){
        $(this).find('.xdsoft_date.xdsoft_weekend')
            .addClass('xdsoft_disabled');
    },
    weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
    timepicker:false
});
var dateToDisable = new Date();
    dateToDisable.setDate(dateToDisable.getDate() + 2);
$('#datetimepicker11').datetimepicker({
    beforeShowDay: function(date) {
        if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
            return [false, ""]
        }

        return [true, ""];
    }
});
$('#datetimepicker12').datetimepicker({
    beforeShowDay: function(date) {
        if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
            return [true, "custom-date-style"];
        }

        return [true, ""];
    }
});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})


</script>
        
        
        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php require("footer.php"); ?>