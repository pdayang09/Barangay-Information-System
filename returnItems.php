 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
		
		
	<?php 
	
	//Initialize variables
	
	//Gets Today's Date
	$today = date("Y-m-d"); // displays date today
	
	//Personal Details
	$resId ="";
	$name ="";
	$contactno ="";	
	
	//Reservation Details
	//$resPurpose ="";
	$resDate = "";
	$resFrom = "";
	$resTo = "";
	$quantity = array();
	$returnedTemp =0;
	$unreturnedTemp =0;
	
	$returned =0;
	$unreturned =0;
?>

<div id="wrapper">
<!--?php include('Nav.php')?>
<!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
					<div class = "bodybody">	
						<div class="panel-body">
		
		<legend ><font face = "cambria" size = 10 color = "grey"> Return Items </font></legend>
		
		<!-- Search Section-->
		<div class="form-group">
			<div class="col-sm-3">
				<input id="searchr" name="search" class="form-control input-group-lg reg_name" type="text"  title="generated brgyId" value= "" placeholder="Search Last name">					
			</div>				
			<div class="col-sm-2">
				<button class="btn btn-info btn-round btn-s  " id = "searchst" name = "btnSearch" value = 1 onclick = "search(this.value)"><i class = "glyphicon glyphicon-search "></i></button>
			</div> <!-- 4 returnItems -->			
		</div><br><br><br><br>	

<form method="POST">
	<center>
		<div class="panel panel-default"><!-- Default panel contents -->	
			<table class="table table-hover" style="height: 40%; overflow: scroll; ">
				<thead><tr>
					<th>Reservation ID</th>
					<th>Purpose</th>
					<th>Status</th>
					<th>Return</th>
				</tr></thead>
			
			<tbody>
			<?php
				$statement = 'SELECT r.`strReservationID`, r.`strRSPurpose`, r.`datRSReserved`, SUM(rt.`intReturned`), SUM(rt.`intUnreturned`) FROM `tblreservationrequest` r INNER JOIN tblreturnequip rt ON rt.strReservationID = r.strReservationID WHERE r.`strRSapprovalStatus`="Paid" OR r.`strRSapprovalStatus` = "Half Paid" GROUP BY r.`strReservationID`';


			$query = mysqli_query($con,$statement);
			while($row = mysqli_fetch_array($query)){?>
			
				<tr><td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[0]; ?></td>
				<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[1];?></td>
				<?php
					if($row[4]==0){
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode' >Complete</td>";
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode' ></td>";
						
					}else if($row[4]>0){
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'>Incomplete</td>";
						echo"<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><button class='btn btn-success btn-xs' type ='submit' name = 'return' value = $row[0]>RETURN</button></td>
				";
					}
				?></tr><?php
				
			}?>
			
			</tbody>
			</table>
		</div></center><br><br> <!-- Table-responsive -->              
	
		<?php 
			if(isset($_POST['return'])){
				$return = $_POST['return'];
				$_SESSION['return'] = $return;
				
					//Reservation Details
					$query = mysqli_query($con,"SELECT r.`strReservationID`, r.`strRSPurpose`, r.`datRSReserved`, re.`strREEquipCode`, re.`dtmREFrom`, re.`dtmRETo`, re.`intREQuantity`, rt.`intReturned`, rt.`intUnreturned` FROM `tblreservationrequest` r INNER JOIN tblreserveequip re ON re.`strReservationID` = r.`strReservationID` INNER JOIN tblreturnequip rt ON rt.strReservationID = re.strReservationID WHERE rt.`strReservationID` = $return");
					
					while($row = mysqli_fetch_array($query)){

						$resId = $row[0];
						$resPurpose = $row[1];
						$resFrom = $row[4];
						$resTo = $row[5];
					}?>
					
			<font face = "cambria" size = 6 color = "grey"> Reservation Details </font>
				<br>
				<font face = "cambria" size = 4 color  = "grey"> <?php echo"Date: $today";?></font>
				<br>
				<font face = "cambria" size = 4 color = "grey"> <?php echo"Reservation Id: $resId";?></font>
				<br>
				<font face = "cambria" size = 4 color = "grey"> <?php echo"Purpose: $resPurpose";?></font>
				<br>
				<font face = "cambria" size = 4 color = "grey"> <?php echo"From: $resFrom";?></font>
				<br><br>
				<!--<font face = "cambria" size = 5 color = "grey"> <?php echo"To: $resTo";?></font>
				<br> 

			<!-- Equipment Reservation Details -->
		<center>

		<div class="panel panel-default" >	
			<table class="table table-hover" style="height: 40%; overflow: scroll;"><!-- Table -->
				<thead><tr>
					<th>Equipment</th>
					<th>Quantity</th>
					<th>Received</th>
					<th>Return</th>
					</tr></thead>
			
				<tbody>
				<?php
				$query = mysqli_query($con,"SELECT `strRTEquipCode`, `intReturned` + `intUnreturned`, `intReturned`, `intUnreturned` FROM tblreturnequip WHERE `strReservationID` = $return;");
				
				while($row = mysqli_fetch_array($query)){
							
					?>
					<tr><td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[0]; ?></td>
						<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)' ><?php echo $row[1]; ?></td>
						<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'><?php echo $row[2]; ?></td>		
						<td onmouseover='highlightCells(this.parentNode)' onmouseout='unhighlightCells(this.parentNode)'>
		
						<input type='number' min = '0' name = quantity[] value = '0' max = '<?php echo $row[3]; ?>'</td>
							</tr>							
					<?php				
						}?>			
				</tbody>
			</table>					
						<input type="submit" class="btn btn-outline btn-success" name = "btnReturn" value="Update Return">					
	</div></center>		
	</form> 				
		
		<?php		
			}	
			if(isset($_POST['btnReturn'])){
				$return = $_SESSION['return']; 
						
			if(isset($_POST['quantity'])){
				$quantity = $_POST['quantity']; //gets return input	

			}
						
			//Gets Quantity of unreturned equipment first
			$query = mysqli_query($con,"SELECT * from tblreturnequip where `strreservationid` = $return;");
														
			$intCtr = 0;
			while($row = mysqli_fetch_array($query)){
								
				$returnedTemp = $row[4];   //gets original quantity of returned items
				$unreturnedTemp = $row[5]; //gets original quantity of unreturned items				
															
				$returned = $returnedTemp + $quantity[$intCtr]; //updates quantity of returned items
				$unreturned = $unreturnedTemp - $quantity[$intCtr]; //updates quantity of unreturned items								
								
				mysqli_query($con,"UPDATE `tblreturnequip` SET `intreturned`='$returned' WHERE `intreturned`= $returnedTemp and `intunreturned`= $unreturnedTemp AND `strreservationid` = $return");
				mysqli_query($con,"UPDATE `tblreturnequip` SET `intunreturned`='$unreturned' WHERE `intreturned`= $returned and `intunreturned`= $unreturnedTemp AND `strreservationid` = $return"); //Update statement
								
				$intCtr++;
			}
							
			unset($quantity);
			$unreturnedTemp = "";
			$returnedTemp = "";
			$returned = "";
			$unreturned = "";
							
			echo"<script> alert('You Successfully Updated Return Items')</script>";
			echo "<script> window.location = 'returnitems.php'; </script>";
						}
		?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

		
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<script>
      //custom select box
function search(val){
	var a = document.getElementById('searchr').value;

	$.ajax({
		type: "POST",
		url: "gettable1.php",
		data: 'sid=' + a +'&bid='+val,
		success: function(data){
			//alert(data);
			$("#tablestreet").html(data);
		}		
	});
}
      $(function(){
          $('select.styled').customSelect();
      });

  </script>
  
 	<script>
      //custom select box
function select(val){
	var a = document.getElementById('searchr').value;

	$.ajax({
		type: "POST",
		url: "getReturn.php",
		data: 'sid=' + a +'&bid='+val,
		success: function(data){
			//alert(data);
			$("#tablestreet").html(data);
		}		
	});
}
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

<?php require("footer.php"); ?>