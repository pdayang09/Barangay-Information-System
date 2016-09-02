 <?php session_start();?>
<!DOCTYPE html>
  <?php require('header.php');?>
  <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">		<form method = POST>
			<legend ><font face = "cambria" size = 8 color = "grey"> Maintenance </font></legend>
					<h2>Facility</h2>

				<p align="right">
				<button type="button" class="btn btn-info" name = "btnEdit1" id = "btnEdit1"  onclick = "window.location = 'FacilityAdd.php'" ><i class="fa fa-plus"></i> Add New</button>
				</p>
	
				<input type= checkbox id = "showdisabled" onclick ="showdis()"> Show Broken/Under Maintenance Facility
                         <br><br>    
							 
								
				
                               <form method = POST>
							   <div class = "showback" id = "tblview">

							   
<center> 
						<table  class="table table-striped table-bordered table-hover" border = '3' style = 'width:95%'>
							<thead>
								<tr>
									
									<th><i class="fa fa-question-circle"></i> Name</th>
									<th><i class="fa fa-bullhorn"></i> Category</th>
									<th><i class="fa fa-bookmark"></i> Day Charge</th>
									<th><i class="fa fa-bookmark"></i> Night Charge</th>
									<th><i class="fa fa-bookmark"></i> Non Resident Charge</th>
									<th><i class="fa fa-cog"></i> Status</th>
									<th><i class="fa fa-edit"></i> Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									
									<th><i class="fa fa-question-circle"></i> Name</th>
									<th><i class="fa fa-bullhorn"></i> Category</th>
									<th><i class="fa fa-bookmark"></i> Day Charge</th>
									<th><i class="fa fa-bookmark"></i> Night Charge</th>
									<th><i class="fa fa-bookmark"></i> Non Resident Charge</th>
									<th><i class="fa fa-cog"></i> Status</th>
									<th><i class="fa fa-edit"></i> Action</th>
								</tr>
							</tfoot>
							
						<tbody>
			 
					<?php
							require('connection.php');
							$sql = "select * from tblfacility where strFaciStatus = 'Good Condition'";
							$query = mysqli_query($con, $sql);
				
							if(mysqli_num_rows($query) > 0){
								$i = 1;
					
							while($row = mysqli_fetch_object($query)){?>
								<tr>
									<td><?php echo $row->strFaciName?> </td>
									<td><?php
								
							$query2 = mysqli_query($con,"Select * from tblcategory where strCategoryCode = '".$row->strFaciCategory."'");
					
							if(mysqli_num_rows($query2) > 0){
								$row2 = mysqli_fetch_object($query2);
								echo $row2->strCategoryDesc;
					}?>
					
									</td>
										<td><?php echo $row->dblFaciDayCharge?></td>
										<td><?php echo $row->dblFaciNightCharge?></td>
										<td><?php echo $row->dblFaciNResidentCharge?></td>
										<td><?php echo $row->strFaciStatus?></td>
										
										<td><button type = submit  class="btn btn-primary btn-xs" name = 'btnedit' value = <?php echo $row->strFaciNo ?> ><i class="fa fa-pencil"></i></button></td>
											
									</tr>		 
								</form>  
					<?php 		}
							}
				
							if(isset($_POST['btnedit'])){ //Sets Faciltiy Details in Edit Mode
								$search = $_POST['btnedit'];
								$query = mysqli_query($con,"Select * from tblfacility where strFaciNo = '$search'");
					
							if(mysqli_num_rows($query)>0){
								$row = mysqli_fetch_object($query);
								$_SESSION['fcode'] = $row->strFaciName;
								$_SESSION['facilityCode'] = $row->strFaciNo;
								$_SESSION['stat'] = $row->strFaciStatus;
								$_SESSION['dayprice'] = $row->dblFaciDayCharge;
								$_SESSION['nightprice'] = $row->dblFaciNightCharge;
								$_SESSION['residentprice'] = $row->dblFaciNResidentCharge;
								$_SESSION['image'] = $row->imageUpload;
								$a = $row->strFaciCategory;
					
								$query2 = mysqli_query($con,"Select * from tblcategory where strcategorycode = '$a'");
								$row2 = mysqli_fetch_object($query2);
								$_SESSION['type'] = $row2->strCategoryType;
						
								echo "<script> window.location = 'FacilityEdit.php';</script>";
							}
							}?></tbody>
						</table></center>    
                       
                    </div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      
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
function showdis(){
		var val = 0;
		if(document.getElementById('showdisabled').checked){
			val = 1;
		}
		else{
			val = 2;
		}
		//alert(val);
		$.ajax({
		type: "POST",
		url: "DisabledtableFacility.php",
		data: 'sid=' + val,
		success: function(data){
			//alert(data);
			$("#tblview").html(data);
		}
		
	});
	}
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
