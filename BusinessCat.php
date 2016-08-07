 <?php session_start();?>
<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->  <!-- Modal Start-->
				<div id="myModala" class="modal fade" role="dialog" >
  <div class="modal-dialog" style = "width:900px ">
  <div class = "modal-content" style = "width:900px padding-left:20px">
<!-- Modal content-->
					
		<div class='modal-body'>			
		<legend ><font face = "cambria" size = 8 color = "grey"> Add Business Category </font><font  size = 5 color = "Red"> * </font></legend>
<form method = POST>
<div class = 'modal-body'>						

		
	
  	
	<p><font face = "cambria" size = 5 color = "grey"> Business Category Name </font><font  size = 5 color = "Red"> * </font></p>
	<div class = "form-group">
		   <div class="col-md-5">
		   
	<input id="PDESC1" name="PDESC1" class="form-control input-group-lg reg_name" type="text" name="facName" title="Enter Facility name" >	
           </div>
	</div><br><br><br>
	

	<p><font face = "cambria" size = 5 color = "grey"> Amount </font><font  size = 5 color = "Red"> * </font></p>
	<div class = "form-group">
		   <div class="col-md-5">
		   
	<input id="PDESC1" name="Amount" class="form-control input-group-lg reg_name" type=number min = 0 name="facName" title="Enter Facility name" >	
           </div>
	</div><br><br><br>
	

  	<center> <input type="submit" class="btn btn-outline btn-success" name = "btnAdd" id = "btnAdd"  value = "Save"  > 
			 <input type="submit" class="btn btn-outline btn-success" name = "btnCancel" id = "btnCancel"  value = "Cancel" >
			 
		<br><br>
			 <?php
			 if (isset($_POST['btnAdd'])){
				 $strPD = $_POST['PDESC1'];
				  $strtype = $_POST['Amount'];
				
				 if($strPD == NULL ||$strtype == NULL ){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					 require('connection.php');
					 mysqli_query($con,"INSERT INTO `tblBusinessCate`( `strBusCateName`, `dblAmount`) VALUES ('$strPD','$strtype');");
					 echo "<script>alert('Success');</script>";
			 }}
				 ?>
    </center>
	</form>
</div><br><br>
</div><br><br>
</div>
</div></div> 
      <section id="main-content">
          <section class="wrapper site-min-height">		<form method = POST>
<legend ><font face = "cambria" size = 8 color = "grey"> Business Maintenance </font></legend>
                     
                               <form method = POST>
	 <input type="button" class="btn btn-info" name = "btnEdit1" id = "btnEdit1" value = "Add Category" data-toggle="modal" data-target="#myModala">
                           
                               
<center>
<br><div class = "showback">
					 <table   class="table table-striped table-bordered table-hover"  border = '2' style = 'width:95%'>
					<thead>
					<tr>
					<th>Business Type</th>
					<th>Amount</th>
					<th>Delete</th>
					</tr>
					</thead>
					<tbody>
					<?php
					require('connection.php');
				$sql = "select * from tblBusinessCate ";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
					$i = 1;
					while($row = mysqli_fetch_object($query)){?>
					<tr> <td><?php echo $row->strBusCateName?></td>
					<td><?php echo $row->dblAmount?></td>
					<td><button class ="btn btn-success btn-sm" type = submit name = "del" value =<?php echo $row->strBusCatergory?>>DELETE</button></td>
				<?php }}
				if(isset($_POST['del'])){
					$a = $_POST['del'];
					mysqli_query($con,"Delete From tblBusinessCate where `strBusCatergory` = '$a'");
					echo "<script>alert('Successful!');
					window.location ='EquipmentCat.php';</script>";
				}				?></tbody>
				</table>
				
</center>
</form>
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

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
