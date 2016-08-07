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
<legend ><font face = "cambria" size = 8 color = "grey"> Resident Module </font></legend>
<br>
<div class="input-append">
       <div class="form-group">				
           <div class="col-sm-3">

        <input class="form-control input-group-lg reg_name" name="search" id="search" placeholder = "Input Last Name"/></div><button class="btn btn-info" name = "s1">Search</button>
</div></div><br></form >
<div class="btn-group " role="group" aria-label="..." >	
					<div class="btn-group" role="group">
					<button  class="btn btn-info" onclick = "window.location.href='AddHhold.php'">Create New Household</button>
					
					</div>	
					<div class="btn-group" role="group"> 
					<button  class="btn btn-warning" onclick = "window.location.href='ReturnHousehold.php'">Return Household</button><br>
			
					</div>	
		
					</div>
					<br>

<?php if(isset($_POST['s1'])){
$_SESSION['s'] = $_POST['search'];
	echo "<script>window.location = 'Hholdview2.php'; </script>";}?>
	<br>
	<form method = POST><center>
	<div class = "showback">
<table  class="table table-striped table-bordered table-hover" border = '2' style = 'width:95%'>
<tr>
<th>Household Name</th>
<th>Address</th>
<th>Residence Status</th>
<th>Action</th>
</tr>
<?php
$a = $_SESSION['s'];
					require('connection.php');
				$sql = "SELECT HouseholdLname, concat(BuildingNo,' ',Street,', Purok ',Purok) as 'Address',Residence , Householdno FROM `tblhousehold` where !(Status = 'Disabled') && HouseholdLname = '$a' ";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
			
					while($row = mysqli_fetch_object($query)){?>
					<tr> <td><?php echo $row->HouseholdLname?></td>
					<td><?php echo $row->Address?></td>
				<td><?php echo $row->Residence?></td>
					<td><div class="btn-group " role="group" aria-label="..." >	
					<div class="btn-group" role="group"> 
					<button class="btn btn-primary btn-circle view" type = submit value = <?php echo $row->Householdno?> name = 'Edit' >View</button>
					
					</div>	
					<div class="btn-group" role="group"> 
					 <button  class="btn btn-success" type = submit value = <?php echo $row->Householdno?> onClick="return confirm(
  'Do you really want to perform this action?');" name = 'Move' >Move Out</button>
			
					</div>	
					<div class="btn-group" role="group">
				
					 <button class="btn btn-success" type = submit value = <?php echo $row->Householdno?> name = 'transfer' >Transfer</button></td>
					</div>	
					</div>
			
					</tr>
				<?php }}
				if(isset($_POST['Edit'])){
					$_SESSION['Hno'] = $_POST['Edit'];
					echo "<script>window.location = 'HholdPersonal.php'</script>";
				}
				
				if(isset($_POST['Move'])){
					$A = $_POST['Move'];
					require('connection.php');
					mysqli_query($con,"UPDATE `tblhousehold` SET `Status` = 'Disabled' WHERE Householdno = '$A' ");
					echo "<script>window.location = 'Hholdview.php'</script>";
				}
				
						if(isset($_POST['transfer'])){
					$_SESSION['transfer'] = $_POST['transfer'];
					require('connection.php');
					echo "<script>window.location = 'TransferHhold.php'</script>";
				}		
				?>

</table>
</form>
                 </center>      
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
