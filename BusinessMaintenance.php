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
		<form method = POST>
			<legend ><font face = "cambria" size = 8 color = "grey"> Maintenance </font></legend>
				<h2>Business</h2><br>
			
				<!-- p align="right">
				<button  type="button" class="btn btn-info" name = "btnEdit1" id = "btnEdit1" onclick = "window.location.href='BusinessAdd.php'" ><i class="fa fa-plus"></i> Add New </button><br>
				</p -->
			
			<form method = POST>
				<center> 
				<div class="showback">
					<table  class="table table-striped table-bordered table-hover" id="tableView" border = '2' style = 'width:95%'>
						
						<thead>
							<tr>
								<th>Business ID</th>
								<th>Business Name</th>
						
								<th>Business Category</th>
								<th>Contact Person</th>
								<th>Contact Number</th>
								<th>Location</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Business ID</th>
								<th>Business Name</th>
						
								<th>Business Category</th>
								<th>Contact Person</th>
								<th>Contact Number</th>
								<th>Location</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</tfoot>
						
						<tbody>
							<?php
							require('connection.php');
							$sql = "select * from tblbusiness";
							$query = mysqli_query($con, $sql);
							if(mysqli_num_rows($query) > 0){
							$i = 1;
							while($row = mysqli_fetch_object($query)){?>
							
							
							
							<tr> 
								<td><?php echo $row->strBusinessID?></td>
								<td><?php echo $row->strBusinessName?></td>
								
								<td><?php 
										$id = $row->strBusinessID;
										$sql1 = "SELECT `strBusCateName`FROM tblbusinesscate as a INNER JOIN tblbusiness as b ON b.strBusinessCateID = a.strBusCatergory where strBusinessID ='$id' ";
										$query1 = mysqli_query($con, $sql1);
										
										if(mysqli_num_rows($query1) > 0){
										$i = 1;
										
										while($row1 = mysqli_fetch_array($query1)){
											echo $row1[0]."<br>";
										}}
									?>
								</td>
								<td><?php echo $row->strBusinessContactPerson?></td>
								<td><?php echo $row->strContactNum?></td>
								<td><?php echo $row->strBusinessLocation?></td>
								<td><?php 
										$id = $row->strBusinessID;
										$sql1 = "SELECT `strStatus`FROM tblbusinesscate as a INNER JOIN tblbusiness as b ON b.strBusinessCateID = a.strBusCatergory where strBusinessID ='$id' ";
										$query1 = mysqli_query($con, $sql1);
										
										if(mysqli_num_rows($query1) > 0){
										$i = 1;
										
										while($row1 = mysqli_fetch_array($query1)){
											echo $row1[0]."<br>";
										}}
									?> 
								</td>
								<td> 
									<div class="btn-group " role="group" aria-label="..." >	
										<div class="btn-group " role="group">
											<button  class="btn btn-primary btn-xs" type = submit name = "btnEdit" value = <?php echo $row->strBusinessID?>><i class="fa fa-pencil"></i></button>
											<button  class="btn btn-danger btn-xs" type = submit name = "btnDelete" onclick = "return confirm('Do you really want to continue?');" value = <?php echo $row->strBusinessID; ?> >disable</button>
										</div>
									</div>
								</td>

								<!-- ?php if($row->strStatus == 'active'){echo "<button type = submit name = 'disable' value = ".$row->strBusinessID.">Disable</button>";}
								
								else  if($row->strStatus == 'inactive'){echo "<button type = submit name = 'able' value = ".$row->strBusinessID.">Enable</button>";}					? --></td>
							</tr>
						<?php }}   ?>
						</tbody>
					</table>
							
							
							<?php
								if(isset($_POST['btnEdit'])){
								$search  = $_POST['btnEdit'];
								
								$query = mysqli_query ($con,"SELECT * FROM tblbusinesscate as a INNER JOIN tblbusiness as b ON b.strBusinessCateID = a.strBusCatergory where strBusinessID ='$search' " );
								//$query = mysqli_query($con,"Select * from tblbusiness where strBusinessID = '$search'");
								if(mysqli_num_rows($query)>0){
									$row = mysqli_fetch_object($query);
									$_SESSION['bid'] = 	$search;
									$_SESSION['bn'] = 	$row->strBusinessName;
									$_SESSION['bd'] = 	$row->strBusinessDesc;
									$_SESSION['bc'] = 	$row->strBusinessCateID;
									$_SESSION['bcp'] = 	$row->strBusinessContactPerson;
									$_SESSION['bcn'] = 	$row->strContactNum;
									$_SESSION['bl'] = 	$row->strBusinessLocation;
									$_SESSION['bst'] = 	$row->strStatus;
									
									echo "<script>
									window.location = 'BusinessEdit.php'; </script>";
							}}
								
								if(isset($_POST['disable'])){
								$search  = $_POST['disable'];
								mysqli_query($con,"Update tblbusiness set strStatus = 'inactive' where strBusinessID = '$search'");
								echo "<script>alert('Successfully Updated');
									window.location = 'BusinessMaintenance.php'; </script>";
							}
							
								if(isset($_POST['able'])){
								$search  = $_POST['able'];
								mysqli_query($con,"Update tblbusiness set strStatus = 'active' where strBusinessID = '$search'");
								echo "<script>alert('Successfully Updated');
									window.location = 'BusinessMaintenance.php'; </script>";
							}?>
				</center>
				</div>
				
		</form>        
		
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
