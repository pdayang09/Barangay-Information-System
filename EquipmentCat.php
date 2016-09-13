 <?php session_start();?>
<!DOCTYPE html>
    <?php require('header.php');?>
    <?php require('sidebar.php');?>
	
<link href="datTables/dataTables.bootstrap.css" rel="stylesheet" />
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->  
      <section id="main-content">
          <section class="wrapper site-min-height">		<form method = POST>
<legend ><font face = "cambria" size = 8 color = "grey"> Maintenance </font></legend>
			<h2>Facility/Equipment Category </h2>
                     
   <form method = POST>
	 <p align="right">
	 <button type="button" class="btn btn-info" name = "btnEdit1" id = "btnEdit1"  onclick = "window.location = 'EquipmentCateAdd.php'" ><i class="fa fa-plus"></i> Add New</button>
	 <p>                                                 
<center>
<br><div class = "showback">
					<table   class="table table-striped table-bordered table-hover"  border = '2' style = 'width:95%' id="dataTable">
						<thead>
							<tr>
								<th># Category ID</th>
								<th><i class="fa fa-bullhorn"></i> Category Name</th>
								<th><i class="fa fa-bookmark"></i> Category Type</th>
								<th><i class="fa fa-edit"></i> Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th># Category ID</th>
								<th><i class="fa fa-bullhorn"></i> Category Name</th>
								<th><i class="fa fa-bookmark"></i> Category Type</th>
								<th><i class="fa fa-edit"></i> Action</th>
							</tr>
						</tfoot>
					
					<tbody>
					<?php
					require('connection.php');
				$sql = "select * from tblCategory ";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
					$i = 1;
					while($row = mysqli_fetch_object($query)){?>
					<tr> <td><?php echo $row->strCategoryCode?></td>
					<td><?php echo $row->strCategoryDesc?></td>
					<td><?php echo $row->strCategoryType?></td>
					<td>
									<div class="btn-group " role="group">	
									<button  class="btn btn-primary btn-xs" type = submit name = "btnEdit" value = <?php echo $row->strCategoryCode; ?> ><i class="fa fa-pencil"></i></button>
									</div>
									
									
									
									
									</td>
				<?php }}
				if(isset($_POST['btnEdit'])){
					$_SESSION['a'] = $_POST['btnEdit'];
					echo "<script>
					window.location ='EquipmentCateEdit.php';</script>";
				}		
				if(isset($_POST['del'])){
					$a = $_POST['del'];
					mysqli_query($con,"Delete From tblCategory where strCategoryCode = '$a'");
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
	
	<!--DATA TABLES-->
	<script src="dataTables/jquery.dataTables.js"></script>
    
	<script src="dataTables/dataTables.bootstrap.js"></script>	

	<script>
	  
		$(document).ready(function() {
		  
		$('#dataTable').dataTable();		  
	  
		});

	</script>


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
