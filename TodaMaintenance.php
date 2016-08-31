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

	<h2> TODA </h2>
	
</div><br><!-- div class='requirementMain'-->	


<form method = POST>
					
<!-- DIV FOR FORM -->
	<div class="col-sm-9 col-md-6 col-lg-6">
  	<div class = 'showback'>	
					
	
	
	<p><font face = "cambria" size = 5 color = "grey"> Toda Name </font></p>   
	<center>
		<input id ="strTodaName" name = "TodaNameMaintenance"  class="form-control input-group-lg reg_name" type="text" >	
	</center>
	<p><font face = "cambria" size = 5 color = "grey"> Toda Description</font></p>   
	<center>	
		<input id ="strTodaDC" name = "TodaDescMaintenance"  class="form-control input-group-lg reg_name" type="text" >	
	</center><br>
	
	<center>
	<br>
		<input type="submit" class="btn btn-outline btn-success" name = "btnAdd" id = "btnAdd"  value = "Add"  > 
			 <input type="submit" class="btn btn-outline btn-success" name = "btnCancel" id = "btnCancel"  value = "Cancel" >
				
		<br><br>
			  <?php
			 if (isset($_POST['btnAdd'])){
				 $strTodaNM = $_POST['TodaNameMaintenance'];
				 $strTodaDescription = $_POST['TodaDescMaintenance'];
				 
				 if($strTodaNM == NULL){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					 require('connection.php');
					 mysqli_query($con,"INSERT INTO `tbltoda`(`strTODAName`,`strTODADesc`) VALUES ('$strTodaNM','$strTodaDescription');");
					 echo "INSERT INTO `tbltoda`(`strTODAName`,`strTODADesc`) VALUES ('$strTodaNM','$strTodaDescription');";
					 echo "<script>alert('Success');</script>";
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
					<th>ID</th>
					<th>Toda Name</th>
					<th>Toda Description</th>
					<th>Action</th>
					</tr>
					</thead>
					<tbody>
					
					<?php
					require('connection.php');
					$sql = "select * from tblToda ";
					$query = mysqli_query($con, $sql);
						if(mysqli_num_rows($query) > 0){
							$i = 1;
						while($row = mysqli_fetch_object($query)){?>
					
					<tr> 
					<td><?php echo $row->intTODAID?></td>
					<td><?php echo $row->strTODAName?></td>
					<td><?php echo $row->strTODADesc?></td>
					<td><button class ="btn btn-success btn-sm" type = submit name = "del" value =<?php echo $row->intTODAID?>>DELETE</button></td>
				
				<?php }}
				if(isset($_POST['del'])){
					$a = $_POST['del'];
					mysqli_query($con,"Delete From tblToda where `intTODAID` = '$a'");
					echo "<script>alert('Successful!');
					window.location ='TodaNameMaintenance.php';</script>";
				}				?></tbody>
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
