 <?php session_start();?>
<!DOCTYPE html>
    <!-- ?php require('header.php');?>
    <!?php require('sidebar.php');?>
	
	
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
		
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
	<link href="dataTables/dataTables.bootstrap.css" rel="stylesheet" />
		
		<?php 
	
	//Initialize variables
	
	//Gets Today's Date
	$today = date("F j, Y, g:i a"); // displays date today
	
		$appId = "";
		$fname = "";
		$mname = "";
		$lname = "";
		$nameext = "";
		$contactno = "";
		$street = "";
		$brgy = "";
		$city = "";

		require("connection.php");
        $query = mysqli_query($con, "SELECT COUNT(*) from tblapplicant");

        while($row = mysqli_fetch_row($query)){

            $count = $row[0];
        }
        $count = $count + 1;

        //Initialize pre defined Applicant ID - partial smart counter
        $_SESSION['preApp']="app-";
        $preApp = $_SESSION['preApp'];

        $appId = $preApp.$count;
?>

 <div id="wrapper">
 <!--?php include('Nav.php')?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
			<div class="row">
                <div class="col-lg-12">
					<div class = "bodybody">	
						<div class="panel-body"><br><br>
		
		<font face = "cambria" size = 6 color = "grey"> Barangay Galas Facility & Equipment Reservation </font><br><br><br>

        <font face = "cambria" size = 5 color = "grey"> Reservation Steps </font><br>
        <div class="col-sm-6"><br>
        	<i class='glyphicon glyphicon-plus'></i><font face = "cambria" size = 4 color = "grey"> IF Resident: Search and verify your name : IF Non Resident: Sign Up </font><br>
        		<i class='glyphicon glyphicon-plus'></i><font face = "cambria" size = 4 color = "grey"> Select Facility or Equipment </font><br>
        		<i class='glyphicon glyphicon-plus'></i><font face = "cambria" size = 4 color = "grey"> Check available dates for reservation </font><br>
       			<i class='glyphicon glyphicon-plus'></i><font face = "cambria" size = 4 color = "grey"> Submit reservation request </font><br>
        		<i class='glyphicon glyphicon-plus'></i><font face = "cambria" size = 4 color = "grey"> Bring valid ID upon rendering payment to the barangay</font>
        </div>

        <div id="ValidityBody" class = "col-sm-6">    
            <div class="form-group">
                <div class = "showback">

            <i class='glyphicon glyphicon-user'></i><font face = "Segoe ui" size = 5 color = "grey"> You are a </font><br>
            <div class="form-group"><br>
                <button type='button' class='showback col-xs-6' name='btnResident' onclick='showForm(2)' >
        		<font face='cambria' size=3 color='black'><b> Resident  </b></font></button>               

        		<button type='button' class='showback col-xs-6' name='btnNonResident' onclick='showForm(1)'>
        		<font face='cambria' size=3 color='black'><b> Non Resident </b></font></button><br>
        	</div><br><br><br><br><br>

                </div>
            </div>
        </div>

		<div id="Done" class="form-grop">
    		<div class="col-sm-12">

    			<i class='glyphicon glyphicon-triangle-ok-circle'></i><div class="alert alert-success" role="alert"><p><font face="cambria" size=3 color="black"> Well Done .. You may proceed to the reservation </font></p></div><br>
    			<div clas="form-group">
    			<button type='button' class='showback col-xs-6' name='btnResident' onclick='' ><font face='cambria' size=5 color='grey'><b> Proceed </b></font></button>
        		</div> 

    		</div>
    	</div>

    	<div id="Search" class="form-grop">
    		<div class="col-sm-12">
    			<div class="showback">

    			<p><font face="cambria" size=6 color="grey"> Search </font></p><br>

    			<div class="col-lg-6">
    				<div class="input-group">
      				<span class="input-group-btn">
        				<button name="btnResult" class="btn btn-default" type="button" onclick="sResult()"><i class='glyphicon glyphicon-search'></i></button>
      				</span>      
      				<input name="sResult" type="text" class="form-control" placeholder="Enter Last name">
    				</div><!-- /input-group -->
 				</div> <br><br><br>

    			</div>
    		</div>
    	</div>
<form method="POST">
    	<div id="showResult">
				
 		</div>


<?php
	if(isset($_POST['btnTransfer'])){
        $search = $_POST['btnTransfer'];

        $statement = "SELECT a.`intMemberNo` AS 'ID', CONCAT(a.`strLastName`, ', ', a.`strFirstName`, ' ', a.`strMiddleName`, ' ', a.`strNameExtension`) AS 'Name', a.`strContactNo`, CONCAT(s.`strStreetName`, ', ', s.`strPurok`) AS 'Place' FROM tblhousemember a INNER JOIN tblhousehold h ON h.`intHouseholdNo` = a.`intForeignHouseholdNo` INNER JOIN tblstreet s ON s.`intStreetId` = h.`intForeignStreetId` WHERE a.`intMemberNo`='$search'";

        $query = mysqli_query($con,$statement);
                
    while($row = mysqli_fetch_array($query)){
        $clientID = $row[0];
        $name = $row[1];
        $contactno = $row[2];   
        $place = $row[3];
        $residency = 1;
        
        $_SESSION['clientID'] = $clientID;
        $_SESSION['name'] = $name;
        $_SESSION['contactno'] = $contactno;
        $_SESSION['place'] = $place;        
        $_SESSION['residency'] = $residency;
    }
		echo "<script> window.location = 'ol_reservation.php';</script>";						
}?>

        <div id="SignUp" class="form-grop">
    		<div class="col-sm-6">
    			<div class="showback">

    			<p><font face="cambria" size=6 color="grey"> Sign Up</font></p><br>
					
					<p><font face="cambria" size=5 color="grey"> Firstname </font><i class='glyphicon glyphicon-ok'></i></p>					
					<input id="fname" class="form-control input-group-lg reg_name" type="text" name="fname"  value=" <?php echo"$fname"?>" required>
							
					<p><font face="cambria" size=5 color="grey"> Lastname </font><i class='glyphicon glyphicon-ok'></i></p>	
					<input id="lname" class="form-control input-group-lg reg_name" type="text" name="lname"  value=" <?php echo"$lname"?>" required>
							
					<p><font face="cambria" size=5 color="grey"> Middlename </font></p>	<input id="mname" class="form-control input-group-lg reg_name" type="text" name="mname"  value=" <?php echo"$mname"?>">
						
					<p><font face="cambria" size=5 color="grey"> Name Extension </font></p><input id="nameext" class="form-control input-group-lg reg_name" type="text" name="nameext"  value=" <?php echo"$nameext"?>">
							
					<p><font face="cambria" size=5 color="grey"> Contact Number </font><i class='glyphicon glyphicon-ok'></i></p><input id="contactno" class="form-control input-group-lg reg_name" type="text" name="contactno"  value=" <?php echo"$contactno"?>" maxlength=11 required>

				</div>
			</div>
		</div>

		<div id="SignUp1" class="form-grop">
    		<div class="col-sm-6">
    			<div class="showback">

					<p><font face="cambria" size=5 color="grey"> Address </font><i class='glyphicon glyphicon-ok'></i></p><input id="street" class="form-control input-group-lg reg_name" type="text" name="street"  value=" <?php echo"$street"?>" required>

					<p><font face="cambria" size=5 color="grey"> Street </font><i class='glyphicon glyphicon-ok'></i></p><input id="street" class="form-control input-group-lg reg_name" type="text" name="street"  value=" <?php echo"$street"?>" required>
							
					<p><font face="cambria" size=5 color="grey"> Barangay </font><i class='glyphicon glyphicon-ok'></i></p>	<input id="brgy" class="form-control input-group-lg reg_name" type="text" name="brgy"  value=" <?php echo"$brgy"?>" required>
							
					<p><font face="cambria" size=5 color="grey"> City </font><i class='glyphicon glyphicon-ok'></i></p><input id="city" class="form-control input-group-lg reg_name" type="text" name="city"  value=" <?php echo"$city"?>" required><br><br>
							
					<center>
						<input type="submit" class="btn btn-outline btn-success" name="btnSubmit" value="Sign Up"/>
						<input type="button" class="btn btn-outline btn-success" name="btnCancel" value="Cancel"/>
					</center>

    			</div>
    		</div>
    	</div>

</FORM>
<?php
			if(isset($_POST['btnSubmit'])){
						
				$fname = $_POST['fname'];
				$mname = $_POST['mname'];
				$lname = $_POST['lname'];
				$nameext = $_POST['nameext'];
				$contactno = $_POST['contactno'];
				$street = $_POST['street'];
				$brgy = $_POST['brgy'];
				$city = $_POST['city'];
                $residency = 2;
					
				require("connection.php");
					
					mysqli_query($con, "INSERT INTO `tblapplicant`(`strApplicantID`, `strResidentID`, `strApplicantFName`, `strApplicantMName`, `strApplicantLName`, `strNameExtension`, `strApplicantAddress_street`, `strApplicantAddress_brgy`, `strApplicantAddress_city`, `strApplicantContactNo`) VALUES ('$appId', '', '$fname', '$mname', '$lname', '$nameext', '$street', '$brgy', '$city', '$contactno' );");
						
                    $_SESSION['clientID'] = $appId;
                    $_SESSION['name'] = $lname.", ".$fname." ".$mname." ".$nameext;
                    $_SESSION['contactno'] = $contactno;
                    $_SESSION['place'] = $street." ".$brgy." ".$city;        
                    $_SESSION['residency'] = $residency;    
                    
					echo"<script> alert('You have successfully registered an applicant'); </script>";
                    echo "<script> window.location = 'ol_reservation.php';</script>";

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

<style type="text/css">
    #Done {display: none}
    #Search {display: none;}
    #SignUp {display: none}
    #SignUp1 {display: none}
    #ValidityBody {display:block}
</style>

 <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
	

<script type="text/javascript">
    function showForm(flag) {

    	document.getElementById('SignUp').style.display = flag === 1 ? 'block': 'none';
    	document.getElementById('SignUp1').style.display = flag === 1 ? 'block': 'none';
    	document.getElementById('Search').style.display = flag === 2 ? 'block': 'none';
    	document.getElementById('Done').style.display = flag === 3 ? 'block': 'none';
    }
</script>

<script>
	function sResult() {

		var search = document.getElementsByName("sResult")[0].value;

		alert(search);
		$.ajax({
        	type: "POST",
        	url: "sResult.php",
        	data: 'fid='+search,
        	success: function(data){

        	alert(data);
           	$("#showResult").html(data);              
        	}   
    	});
	}
</script>

<?php require("connection.php"); ?>