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
<legend ><font face = "cambria" size = 8 color = "grey"> Business Maintenance </font></legend>
<br>
<div class="input-append">
       &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;    <input name="search" id="search" placeholder = "Input Business Name"/>
    <button class="btn btn-info" name = "s1">Search</button></form>
</div><br><br>
<?php if(isset($_POST['s1'])){
$_SESSION['s'] = $_POST['search'];
	echo "<script>window.location = 'BusinessMaintenance2.php'; </script>";}?>
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <button  class="btn btn-info" onclick = "window.location.href='BusinessAdd.php'">Add New Business</button><br>
                            <div class="table-responsive">
                               <form method = POST>
<center> 		<br><br>
						<table  border = '3' style = 'width:95%'>
					<tr>
					
					<th>Business ID</th>
					<th>Business Name</th>
					<th>Business Description</th>
					<th>Business Category</th>
					<th>Contact Person</th>
					<th>Contact Number</th>
					<th>Location</th>
					<th>Status</th>
					<th>Edit</th>
					<th>Enable/Disable</th>
					</tr>
					<?php
					require('connection.php');
				$sql = "select * from tblbusiness";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
					$i = 1;
					while($row = mysqli_fetch_object($query)){?>
					<tr> <td><?php echo $row->strBusinessID?></td>
					<td><?php echo $row->strBusinessName?></td>
					<td><?php echo $row->strBusinessDescription?></td>
					<td><?php echo $row->strCategory?></td>
					<td><?php echo $row->strContactPerson?></td>
					<td><?php echo $row->strContactNo?></td>
					<td><?php echo $row->strLocation?></td>
					<td><?php echo $row->strStatus?></td>
					<td> <button type = submit name = "btnEdit1" value = <?php echo $row->strBusinessID?>>EDIT</button></td>
					<td> <?php if($row->strStatus == 'active'){echo "<button type = submit name = 'disable' value = ".$row->strBusinessID.">Disable</button>";}
								else  if($row->strStatus == 'inactive'){echo "<button type = submit name = 'able' value = ".$row->strBusinessID.">Enable</button>";}					?></td>
					</tr>
					
				<?php }} ?></tbody>
					</table>
					<br><br>
					
					<?php
					if(isset($_POST['btnEdit1'])){
						$search  = $_POST['btnEdit1'];
						$query = mysqli_query($con,"Select * from tblbusiness where strBusinessID = '$search'");
						if(mysqli_num_rows($query)>0){
							$row = mysqli_fetch_object($query);
							$_SESSION['bid'] = 	$search;
							$_SESSION['bn'] = 	$row->strBusinessName;
							$_SESSION['bd'] = 	$row->strBusinessDescription;
							$_SESSION['bc'] = 	$row->strCategory;
							$_SESSION['bcp'] = 	$row->strContactPerson;
							$_SESSION['bcn'] = 	$row->strContactNo;
							$_SESSION['bl'] = 	$row->strLocation;
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
