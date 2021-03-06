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

    <div id="wrapper">
    <!--?php include('Nav.php')?>

    <!-- Retrieve Personal Data -->
    <?php 
        require_once("refHolidays.php");

        //Personal Details
        $residency = $_SESSION['residency'];
        $clientID = $_SESSION['clientID'];
        $name = $_SESSION['name'];
        $contactno = $_SESSION['contactno'];
        $place = $_SESSION['place'];

        $_POST['name'] = $name;
        $_POST['contactno'] = $contactno;        
        
        //Facility
        $fromtemp = "";
        $totemp = "";        
        $resFacility = "";        
        $resfrom = "";
        $resto = "";
        $_SESSION['resfrom'] = "";
        $_SESSION['resto'] = "";

        //DisabledDates
        $arrDisabledDates[] = array();
        $arrDisabledDates = $_SESSION['arrDisabledDates'];
        
        require("connection.php");
        $query = mysqli_query($con, "SELECT COUNT(*) from tblreservationrequest");

        while($row = mysqli_fetch_row($query)){

            $count = $row[0];
        }

        //Gets Today's Date
        $today = date("Y-m-d"); // displays date today
        $_POST['today'] = $today;

        //Other
        $count = $count+1;
        $_SESSION['preRes']="res-";
        $preRes = $_SESSION['preRes'];

        $resId = $preRes.$count;
        $resPrpose = "";
        $num = "";

        $_SESSION['available']="2";
    ?>    

    <!-- Page Content -->
       <div id="page-content-wrapper">
           <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                  <FORM method="POST">
                    
                <legend ><font face = "cambria" size = 8 color = "grey">Reservation Request</font></legend><br><br>

                <button type='button' class='showback col-xs-4' name='btnFacility' onclick='showForm(1)' >
                <font face='cambria' size=4 color='black'><b> Select Facility </b></font><span></span></button>               

                <button type='button' class='showback col-xs-4' name='btnEquipment' onclick='showForm(2)'>
                <font face='cambria' size=4 color='black'><b> Select Items </b></font><span></span></button>

                <button type='button' class='showback col-xs-4' name='btnFaciEquip' onclick='showForm(3)'>
                <font face='cambria' size=4 color='black'><b> Proceed </b></font><span></span></button>

                <div id="AvailabilityCheck" class = "col-sm-5">    
                    <div class="form-group">
                        <div class = "showback">

                        <font face = "cambria" size = 5 color = "grey"> Check Availability </font><br><br>

                        <p><font face="cambria" size=4 color="grey"> From </font></p>
                        <input name = "From" type="text" id="datetimepicker" class="form-control input-group-lg reg_name, some_class" value="<?php if(isset($_POST['From'])){echo $_POST['From'];}else{}?>" >                 
                        <p><font face="cambria" size=4 color="grey"> To </font></p>
                        <input name = "To" type="text" id="datetimepicker003" class="form-control input-group-lg reg_name, some_class" value="<?php if(isset($_POST['To'])){echo $_POST['To'];}else{}?>" > <br><br>

                       <center><button class="btn btn-outline btn-success" type="button" onclick="Check(1)" value=""> Check </button></center>

                       <p id="showCheck"></p> 

            <div id="viewCheck" class="panel panel-panel">
                <ul id="sortable" class="task-list">
                    <li class="list-primary">
                        <div class="task-title">    
                        
            <?php                       
                require("connection.php");
                $query = mysqli_query($con,"SELECT f.`strFaciNo`, f.`strFaciName`, TIME(r.`dtmREFrom`), TIME(r.`dtmRETo`) FROM tblreservefaci r INNER JOIN tblfacility f ON f.`strFaciNo` = r.`strREFaciCode` WHERE (r.`strREFaciCode`='$resFacility') AND (r.`dtmREFrom` BETWEEN '$resfrom' AND '$resto' OR r.`dtmRETo` BETWEEN '$resfrom' AND '$resto')");

                if(mysqli_num_rows($query) > 0){
                
                $i = 1;
                 while($row = mysqli_fetch_row($query)){

                    $facino = $row[0];
                    $facitemp = $row[1];
                    $facifrom = $row[2];
                    $facito = $row[3];                    
                  }
                }else{
                    
                }

            ?>          </div>
                    </li>
                </ul>
            </div>

                        </div>                      
                    </div>
                </div> 

                <div id="facilityForm" class = "col-sm-7">    
                    <div class="form-group">
                        <div class = "showback">                                                
                        <font face = "cambria" size = 5 color = "grey"> Facility </font><br><br>    
                                       
                        <!-- gets list of facility from tblfacility -->
                        <?php include("facilityFormM.php"); ?><br><br><br>
                                            
                        </div>                      
                    </div>
                </div>

                <div id="equipmentForm" class="col-sm-7">    
                    <!-- shows available items-->
                </div> 

                <div id="proceed" class = "col-sm-7">    
                    <div class="form-group">
                        <div class = "showback"> 
                       
                        <font face = "cambria" size = 5 color = "grey"> Reservation Details </font><br><br>                                              
                        <font face = "cambria" size = 4 color = "grey"> Date </font><?php echo $today; ?><br>

                        <font face = "cambria" size = 4 color = "grey"> Name </font><?php echo $name; ?><br>

                        <font face = "cambria" size = 4 color = "grey"> Contact </font><?php echo $contactno; ?><br><br>

                        <p><font face="cambria" size=4 color="grey"> Reservation ID </font></p>
                       <input class="form-control input-group-lg reg_name" type="text" name="resId" title="input name of client" value="<?php if(isset($_POST['resId'])){echo $_POST['resId'];}else{ echo $resId;}?>">

                        <p><font face="cambria" size=4 color="grey"> Purpose </font></p>
                        <input class="form-control input-group-lg reg_name" type="text" name="resPurpose" title="input name of client" value="<?php if(isset($_POST['resPurpose'])){echo $_POST['resPurpose'];}else{}?>">

                        <p><font face="cambria" size=4 color="grey"> No. of People </font></p>
                        <input class="form-control input-group-lg reg_name" type="number" name="num" title="input name of client" value="<?php if(isset($_POST['num'])){echo $_POST['num'];}else{}?>"><br><br>

                       <center><button id="sRequest" class="btn btn-outline btn-success" onclick='finReserve(this.value)' value='<?php echo $_SESSION['available'];?>'> Submit Request </button></center>  

                        </div>                      
                    </div>
                </div> 

<FORM method="POST">

    <div id="viewCheckEquip" class="col-sm-3">
        <div class="showback">
            <div class="panel-heading">
                <div class="pull-left"><h4> Reserved Equipment </h4></div><br>
            </div>
    
            <div class="task-content">
                <ul id="sortable" class="task-list">
                    <li class="list-primary">
                        <div class="task-title">        
            <?php                       
                require("connection.php");
                $query = mysqli_query($con, "SELECT f.`strEquipName`, TIME(r.`dtmREFrom`), TIME(r.`dtmRETo`), r.`intREQuantity` FROM tblreserveequip r INNER JOIN tblequipment f ON f.`strEquipName` = r.`strREEquipCode` WHERE r.`dtmREFrom` BETWEEN '$resfrom' AND '$resto' OR r.`dtmRETo` BETWEEN '$resfrom' AND '$resto' ORDER BY r.`dtmREFrom`");

                while($row = mysqli_fetch_row($query)){
                    $facitemp = $row[0];
                    $facifrom = $row[1];
                    $facito = $row[2];
                    $equipquan = $row[3];
                    
                    echo"<h5><span class='task-title-sp'> $facitemp</span><span class='label label-warning'> $facifrom - $facito </span><span class='label label-info'> $equipquan</span></h5>";
                }

                
            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>  
    </div>
    </div><br><br><br><br>

                 
</FORM>

         
                </div><!-- /#col-lg-12 -->
            </div><!-- /#row -->
        </div><!-- /#container-fluid -->
    </div><!-- /#page-content-wrapper -->

<script type="text/javascript">
    function showForm(flag) {
        var a = document.getElementsByName("From")[0].value;
        var b = document.getElementsByName("To")[0].value;


        document.getElementById('facilityForm').style.display = flag === 1 ? 'block': 'none'; 

        if(flag==2){

            if(a!="" && b!="" && a < b){

                document.getElementById('equipmentForm').style.display = flag === 2 ? 'block' : 'none';
                Check(2);
            }else{
                alert('Pls indicate your preferred time!');
            }
        }else{

            document.getElementById('equipmentForm').style.display = flag === 2 ? 'none' : 'none';
        }

        if(flag==3){

            if(a!="" && b!="" && a < b){

                Check(3);  
            }else{

                alert('Pls indicate your preferred time!');
                document.getElementById('proceed').style.display = flag === 2 ? 'none' : 'none';
            }
                
        }else{

            document.getElementById('proceed').style.display = flag === 3 ? 'none' : 'none';
        }      
        
         

    }
</script>
        
<style type="text/css">
    #facilityForm {display: block}
    #equipmentForm {display: block;}
    #proceed {display: none}
    #viewCheck {display:block}
    #viewCheckEquip {display:none}
    #availabilityCheck {display: block}
</style>

<script>
function Check(val){

    var a = document.getElementsByName("From")[0].value;
    var b = document.getElementsByName("To")[0].value;
    var c = $('input[name=resFacility]:checked').val();

    var equipment = [];
        $.each($("input[name='equipment']:checked"), function(){            
                equipment.push($(this).val());
            });//alert("My Equipments are: " + equipment.join(" "));

        equipment.join(equipment)

    var quantity = [];
        $.each($("input[name='quantity']"), function(){            
                quantity.push($(this).val());
            });//alert("My quantity are: " + quantity.join(" "));

        quantity.join(quantity)

    if(c=="" && val==1){
        alert("Select Facility");

    }else if(val==2){
        
     $.ajax({
        type: "POST",
        url: "vCheck.php",
        data: 'fid='+a+'&tid='+b+'&val='+val,
        success: function(data){
            
           $("#equipmentForm").html(data);              
        }   
    });    
    }else{
        $.ajax({
        type: "POST",
        url: "vCheck.php",
        data: 'fid='+a+'&tid='+b+'&rid='+c+'&val='+val+'&equipment='+equipment,
        success: function(data){

           $("#viewCheck").html(data);              
        }   
    });
    }   
}
      $(function(){
          $('select.styled').customSelect();
      });  

</script>

<script>
function finReserve(val){
    var a = document.getElementsByName("From")[0].value;
    var b = document.getElementsByName("To")[0].value;
    var c = $('input[name=resFacility]:checked').val();

    var resId = document.getElementsByName("resId")[0].value;
    var resPurpose = document.getElementsByName("resPurpose")[0].value;
    var num = document.getElementsByName("num")[0].value;    

    var equipment = [];
        $.each($("input[name='equipment']:checked"), function(){            
                equipment.push($(this).val());
            });//alert("My Equipments are: " + equipment.join(" "));

        equipment.join(equipment)

    var quantity = [];
        $.each($("input[name='quantity']"), function(){            
                quantity.push($(this).val());
            });//alert("My quantity are: " + quantity.join(" "));

        quantity.join(quantity)        

    if(a!="" && b!="" && resPurpose!=""){

        $.ajax({
        type: "POST",
        url: "finReservation.php",
        data: 'fid='+a+'&tid='+b+'&rid='+c+'&did='+resId+'&resPurpose='+resPurpose+'&num='+num+'&equipment='+equipment+'&quantity='+quantity,

            success: function(data){

                window.location = 'ReservationPayment1.php';
            }       
        });
    }else{

        alert("Pls fill out the required fields!");
    }   
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

var datearray2 = <?php echo json_encode($arrDisabledDates); ?>;
$('#datetimepicker003').datetimepicker({
dayOfWeekStart : 0,
lang:'en',
formatDate: 'dd.mm.Y',
//dateToDisable: ['09.05.2016'],
disabledDates: datearray2,
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