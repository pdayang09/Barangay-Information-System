 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
	<!--main content start-->  
	<!--MAIN CONTENT-->
      <section id="main-content">
         <section class="wrapper site-min-height">		
		  <form method = POST>
			<!-- 0legend ><font face = "cambria" size = 8 color = "grey"> Business Maintenance </font></legend -->
                     
<form method = POST>
	 <!-- input type="button" class="btn btn-info" name = "btnAdd" id = "btnAdd" value = "Add Requirement" data-toggle="modal" data-target="#myModala"> <!--MODAL BUTTON -->          

<div class='requirementMain'>			
		<legend ><font face = "cambria" size = 8 color = "grey"> Maintenance </font></legend>
			<h2>Signage</h2> 
	
</div><br><!-- div class='requirementMain'-->	


<form method = POST>
					
<!-- DIV FOR FORM -->
	<div class="col-sm-9 col-md-6 col-lg-6" id= "EditSignAge">
  	<div class = 'showback'>	
					
	<br>
	
	<p><font face = "cambria" size = 5 color = "grey"> Signage Type </font></p>   
	<center>
		<input id ="strTodaName" name = "SignageMain"  class="form-control input-group-lg reg_name" type="text" readonly>	
	</center>
	<p><font face = "cambria" size = 5 color = "grey"> Price</font></p>   
	<center>	
		<input id="Price"  name="Price" class="form-control input-group-lg reg_name" type= number step = any title="Enter Document name" value = '0'min = 0 >
	</center><br>
	
	<center>
	<br>
	

		<input type="submit" class="btn btn-outline btn-success" name = "btnAdd" id = "btnAdd"  value = "Save"  > 
			
		<br><br>
			  <?php
				if(isset($_POST['btnAdd'])){
					 $strPrice = (double)$_POST['Price'];
					 $ID = $_POST['btnAdd'];
					if($strPrice == NULL ){
						$strPrice = 0;
					}
					else{
						require('connection.php');
						  	mysqli_query($con,"Set @a = 2;");
						$g = mysqli_query($con,"UPDATE `tblbusinesssignage` SET `strSignagePrice`='$strPrice' WHERE ID = '$ID'");
						
						
						echo "<script>alert('Success');
						window.location = 'SignageMaintenance.php';</script>";
						}
						
					}				
				
				 ?>
				
    </center>
	</form>
	</div>
</div>   <!--DIVISION FOR TODA MAINTENANCE-->

	<!--DIVISION FOR TABLE -->
	
	<div class="col-sm-3 col-md-6 col-lg-6">
	<div class = "showback">
					 <table   class="table table-striped table-bordered table-hover"  border = '2' style = 'width:95%'>
					<thead>
						<tr>
							<th><i class="fa fa-bullhorn"></i> ID</th>
							<th><i class="fa fa-cog"></i> Signage Type</th>
							<th><i class="fa fa-bookmark"></i> Price</th>
							<th><i class="fa fa-edit"></i> Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th><i class="fa fa-bullhorn"></i> ID</th>
							<th><i class="fa fa-cog"></i> Signage Type</th>
							<th><i class="fa fa-bookmark"></i> Price</th>
							<th><i class="fa fa-edit"></i> Action</th>
						</tr>
					</tfoot>
					
					<tbody>
					
					<?php
					require('connection.php');
					$sql = "SELECT * FROM `tblbusinesssignage`";
					$query = mysqli_query($con, $sql);
						if(mysqli_num_rows($query) > 0){
							$i = 1;
						while($row = mysqli_fetch_object($query)){?>
					
					<tr> 
					<td><?php echo $row->ID?></td>
					<td><?php echo $row->strSignageType?></td>
					<td><?php echo $row->strSignagePrice?></td>
					<td><button class ="btn btn-primary btn-xs" value ='<?php echo $row->ID?>' onclick = "Appoint(this.value)"> <i class="fa fa-pencil"></i></button></td>
				
				<?php }} ?>
				<!-- if(isset($_POST['del'])){
					$a = $_POST['del'];
					mysqli_query($con,"Delete From tblToda where `intTODAID` = '$a'");
					echo "<script>alert('Successful!');
					window.location ='TodaMaintenance.php';</script>";
				}				? --></tbody>
				</table></div>

   </div>
   </form>
	<!--END OF TABLE DIVISON-->


		
		</section> <!--/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->
      
  </section> <!--<section class="wrapper site-min-height">-->

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
		function Appoint(value){
	//	alert(value);
			$.ajax({
		type: "POST",
		url: "EditSignAge.php",
		data: 'sid=' + value,
		success: function(data){
		//	alert(data);
			$("#EditSignAge").html(data);
		}
		
	});
	}
	  
	  
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
