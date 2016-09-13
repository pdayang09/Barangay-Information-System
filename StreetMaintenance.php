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
          <section class="wrapper site-min-height">		
			<legend ><font face = "cambria" size = 8 color = "grey">Maintenance </font></legend>
				<h2>Street</h2>
	<p align="right">			
	<button  class="btn btn-info" onclick = "window.location.href='AddStreet.php'"><i class="fa fa-plus"></i>  Add New</button> 
	</p>
	
<center><br>		          
			<form method = POST>                		
				<div class = "showback" id = "tblview">
					<table class="table table-striped table-bordered table-hover"  border = '3' style = 'width:95%' id="dataTable"><!-- Table -->
						<thead>
							<tr>
								<th># Street ID </th>
								<th><i class="fa fa-bullhorn"></i> Street Name </th>
								<th><i class="fa fa-bookmark"></i> Purok Name </th>
								<th><i class="fa fa-edit"></i> Action </th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th># Street ID </th>
								<th><i class="fa fa-bullhorn"></i> Street Name </th>
								<th><i class="fa fa-bookmark"></i> Purok Name </th>
								<th><i class="fa fa-edit"></i> Action </th>
							</tr>
						</tfoot>
						
						<tbody>
							<?php
							require('connection.php');
								$sql = "select intStreetId , strStreetName, strPurok from tblStreet order by intStreetId asc";
								$query = mysqli_query($con, $sql);
						
								if(mysqli_num_rows($query) > 0){
									$i = 1;
							
									while($row = mysqli_fetch_object($query)){?>
										<tr> <td><?php echo $row->intStreetId?></td>
											<td><?php echo $row->strStreetName?>				</td>
											<td><?php echo $row->strPurok?></td>
											<td>
							
											<div class="btn-group " role="group">	
											<button  class="btn btn-primary btn-xs" type = submit name = "btnEdit" value = <?php echo $row->intStreetId; ?> ><i class="fa fa-pencil"></i></button>
											</div>

											</td>
										</tr>
							<?php }} ?>
						</tbody>
					</table>
			</div><br><br>
				<?php
					if(isset($_POST['btnEdit'])){
						$_SESSION['street'] = $_POST['btnEdit'];		

							echo "<script> window.location = 'EditStreet.php';</script>";						
					}
					?>
					
                    </form>             
                  </center>
		</section> <!--/wrapper -->
      </section> <!-- /MAIN CONTENT -->

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
