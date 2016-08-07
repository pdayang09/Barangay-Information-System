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
<legend ><font face = "cambria" size = 8 color = "grey"> Facility Maintenance </font></legend>

<div class="input-append">
     <input name="search" id="search" placeholder = "Input Facility Name"/>
    <button class="btn btn-info" name = "s1">Search</button></form>
</div><br>
<?php if(isset($_POST['s1'])){
$_SESSION['s'] = $_POST['search'];
	echo "<script>window.location = 'FacilityMaintenance2.php'; </script>";}?>
	 <button  class="btn btn-info" onclick = "window.location.href='FacilityAdd.php'">Add New Facility</button><br>
                     <br>
                               <form method = POST><div class = "showback">
<center> 		<br><br>
						<table  class="table table-striped table-bordered table-hover" border = '3' style = 'width:95%'>
					<thead>
							<tr>
								
								<th>Name</th>
								<th>Category</th>
								<th>Price</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
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
								
							$query2 = mysqli_query($con,"Select * from tblcategory where strcategorycode = '".$row->strFaciCategoryCode."'");
					
							if(mysqli_num_rows($query2) > 0){
								$row2 = mysqli_fetch_object($query2);
								echo $row2->strCategoryType;
					}?>
					
									</td>
									<td><?php echo $row->dblFaciFixedChargePerHour?></td>
									<td><?php echo $row->strFaciStatus?></td>
									<td><button type = submit  class="btn btn-success" name = 'btnedit' value = <?php echo $row->strFaciControlNo ?> > EDIT </button></td>
								</tr>		 </form>  
					<?php 		}
							}
				
							if(isset($_POST['btnedit'])){ //Sets Faciltiy Details in Edit Mode
								$search = $_POST['btnedit'];
								$query = mysqli_query($con,"Select * from tblfacility where strFaciControlNo = '$search'");
					
							if(mysqli_num_rows($query)>0){
								$row = mysqli_fetch_object($query);
								$_SESSION['fcode'] = $row->strFaciName;
								$_SESSION['stat'] = $row->strFaciStatus;
								$_SESSION['price'] = $row->dblFaciFixedChargePerHour;
								$a = $row->strFaciCategoryCode;
					
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

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
