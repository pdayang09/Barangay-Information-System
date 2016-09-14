 <?php session_start();?>
<!DOCTYPE html>
     <?php require('header.php');?>
    <?php require('sidebar.php');?>
	
<link href="dataTables/dataTables.bootstrap.css" rel="stylesheet" />
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
<legend ><font face = "cambria" size = 8 color = "grey"> Maintenance </font></legend>
		<h2>Position</h2>
						
						<p align="right">
						<button  class="btn btn-info" onclick="window.location.href='PositionAdd.php'"><i class="fa fa-plus"></i> Add New</button>
						</p>


								<form method = POST><br>
								<div class= 'showback' id = 'tblview'>
                            
                              
								<table   class="table table-striped table-bordered table-hover"   border = '2' id="dataTable">
								<thead>
								<tr>
									<th><i class="fa fa-bullhorn"></i> Position Name</th>
									<th><i class="fa fa-bookmark"></i> View</th>
									<th><i class="fa fa-bookmark"></i> Number</th>
									<th><i class="fa fa-edit"></i> Action</th>
								</tr>
								</thead>
								<tfoot>
								<tr>
									<th><i class="fa fa-bullhorn"></i> Position Name</th>
									<th><i class="fa fa-bookmark"></i> View</th>
									<th><i class="fa fa-bookmark"></i> Number</th>
									<th><i class="fa fa-edit"></i> Action</th>
								</tr>
								</tfoot>
								
								
							<tbody>	
							<?php
								require('connection.php');
								$sql = "SELECT * FROM `tblbrgyposition` ";
								$query = mysqli_query($con, $sql);
				
								if(mysqli_num_rows($query) > 0){
								$i = 1;
								
								while($row = mysqli_fetch_object($query)){
									?>
								<tr>
									<td><?php echo $row->strPositionName?></td>
									<td><?php echo $row->strView?></td>
									<td><?php echo $row->intNumber?></td>
									<td>
									<div class="btn-group " role="group" aria-label="..." >	
										<div class="btn-group " role="group">	
											<button  class="btn btn-primary btn-xs" type = submit name = "btnEdit" value = <?php echo $row->intPositionId; ?> ><i class="fa fa-pencil"></i></button>	
											
										</div>
									</div>
									</td>
								</tr>
								
								<?php  }}
							
							?>
							</tbody>
								</table>
							
								
                       </form>
                       
                    </div>
			<?php 		if(isset($_POST['btnEdit'])){
								$search = $_POST['btnEdit'];
								$query= mysqli_query($con,"Select * from tblbrgyposition where intPositionId = '$search'");
								if(mysqli_num_rows($query)>0)
									$row = mysqli_fetch_object($query);
									$_SESSION['id'] = $row->intPositionId;
									$_SESSION['name'] = $row->strPositionName;
									$_SESSION['number'] = $row->intNumber;
									$_SESSION['view'] = $row->strView;
									//echo "<script>alert('". $row->intPositionId."');</script>";
									echo "<script> window.location= 'PositionEdit.php';</script>";
							}
							
							if(isset($_POST['btnDelete'])){
								$a = $_POST['btnDelete'];
								mysqli_query($con,"Update tbldocument set strStatus = 'Disabled' where intDocCode = '$a'");
								echo "<script>window.location ='DocumentMaintenance.php';</script>";
								}
						if(isset($_POST['btnEnable'])){
							$a = $_POST['btnEnable'];
							mysqli_query($con,"Update tblDocument set strStatus = 'Enabled' where intDocCode = '$a'");
							echo "<script>window.location ='DocumentMaintenance.php';</script>";
									}
			?>
				
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
function showdis(){
		var val = 0;
		if(document.getElementById('showdisabled').checked){
			val = 1;
		}
		else{
			val = 2;
		}
		//alert(val);
		$.ajax({
		type: "POST",
		url: "DisabledtableDoc.php",
		data: 'sid=' + val,
		success: function(data){
			//alert(data);
			$("#tblview").html(data);
		}
		
	});
	}
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
