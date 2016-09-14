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
			<h2>Document Purpose</h2> 
	
</div><br><!-- div class='requirementMain'-->	


<form method = POST>
					
<!-- DIV FOR FORM -->
	<div class="col-sm-9 col-md-6 col-lg-6">
  	<div class = 'showback'>	
					
	<br>
	
	<p><font face = "cambria" size = 5 color = "grey"> Purpose </font></p>   
	<center>
		<input id ="strDocPurpose1" name = "strDocPurpose"  class="form-control input-group-lg reg_name" type="text" >	
	</center>
	
	<p><font face = "cambria" size = 5 color = "grey"> Price</font></p>   
	<center>	
		<input id="strDocPurposePrice"  name="strDocPurposePrice" class="form-control input-group-lg reg_name" type= number step = any title="Enter Document name" value = '0'min = 0 required>
		
	</center><br>
	
	<center>
	<br>
		<input type="submit" class="btn btn-outline btn-success" name = "btnAdd" id = "btnAdd"  value = "Add"  > 
			 <input type="submit" class="btn btn-outline btn-success" name = "btnCancel" id = "btnCancel"  value = "Cancel" >
				
		<br><br>
			  <?php
						if (isset($_POST['btnAdd'])){
						 $strDocN = $_POST['strDocPurpose'];
						 $strPrice = (double)$_POST['strDocPurposePrice'];
						 if($strPrice == NULL){
							 $strPrice = 0;
						 }	
						 if($strDocN == NULL ){
							 echo "<script>alert('Please Complete the form');</script>";
						 }
						 else{
							 require('connection.php');
							  	mysqli_query($con,"Set @a = 2;");
							 mysqli_query($con,"INSERT INTO `tbldocumentpurpose`( `strPurposeName`, `dblPrice`) VALUES ('$strDocN','$strPrice');");
							 echo "<script>alert('Success');</script>";
							 //window.location = 'DocumentMaintenance.php'</script>";
					 }}
					?>
				
    </center>
	</form>
	</div>
</div>   <!--DIVISION FOR TODA MAINTENANCE-->

	<!--DIVISION FOR TABLE -->
<form method = POST>	
	<div class="col-sm-3 col-md-6 col-lg-6">
	<div class = "showback">
					 <table   class="table table-striped table-bordered table-hover"  border = '2' style = 'width:95%'>
					<thead>
						<tr>
							<th><i class="fa fa-bullhorn"></i> ID</th>
							<th><i class="fa fa-cog"></i> Purpose</th>
							<th><i class="fa fa-bookmark"></i> Price</th>
							<th><i class="fa fa-edit"></i> Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th><i class="fa fa-bullhorn"></i> ID</th>
							<th><i class="fa fa-cog"></i> Purpose</th>
							<th><i class="fa fa-bookmark"></i> Price</th>
							<th><i class="fa fa-edit"></i> Action</th>
						</tr>
					</tfoot>
					
					<tbody>
					
					<?php
					require('connection.php');
					$sql = "select * from tbldocumentpurpose ";
					$query = mysqli_query($con, $sql);
						if(mysqli_num_rows($query) > 0){
							$i = 1;
						while($row = mysqli_fetch_object($query)){?>
					
					<tr> 
					<td><?php echo $row->intDocPurposeID?></td>
					<td><?php echo $row->strPurposeName?></td>
					<td><?php echo $row->dblPrice?></td>
					<td><button class ="btn btn-primary btn-xs" type = submit name = "del" value =<?php echo $row->intDocPurposeID?>> <i class="fa fa-pencil"></i></button></td>
				
				<?php }}
				if(isset($_POST['del'])){
								$search = $_POST['del'];
								$query= mysqli_query($con,"Select * from tbldocumentpurpose where intDocPurposeID = '$search'");
								if(mysqli_num_rows($query)>0)
									$row = mysqli_fetch_object($query);
									$_SESSION['id'] = $row->intDocPurposeID;
									$_SESSION['name'] = $row->strPurposeName;
									$_SESSION['price'] = $row->dblPrice;
									//echo "<script>alert('". $row->strDocName."');</script>";
									echo "<script> window.location= 'documentPurposeEdit.php';</script>";
							}
							?></tbody>
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

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
