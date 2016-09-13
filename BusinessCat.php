 <?php session_start();?>

 <!DOCTYPE html>

 <?php require('header.php');?>
 <?php require('sidebar.php');?>
 
 <link href="datTables/dataTables.bootstrap.css" rel="stylesheet" />

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      
<!--main content start-->  
<body>				 
<section id="main-content">
	<section class="wrapper site-min-height">		
		<form method = POST>
			<legend ><font face = "cambria" size = 8 color = "grey"> Maintenance </font></legend>
				<h2>Business Category</h2>
               
				<p align="right">
				<button type="button" class="btn btn-info" name = "btnEdit1" id = "btnEdit1"  onclick = "window.location = 'AddBusinessCategory.php'" ><i class="fa fa-plus"></i> Add New</button>
				</p>
				
				<input align="left" type= checkbox id = "showdisabled" onclick ="showdis()"> Show Disabled Items
                     
	<form method = POST>							   
	<center>
	<br>
	<div class = "showback" id = "tblview" >
		<table   class="table table-striped table-bordered table-hover" id="dataTable" border = '2' style = 'width:95%'>
			<thead>
				<tr>
					<th><i class="fa fa-bullhorn"></i> Business Type</th>
					<th><i class="fa fa-bookmark"></i> Amount</th>
					<th><i class="fa fa-edit"></i> Action</th>
				</tr>
			</thead>
			
			<tfoot>
				<tr>
					<th><i class="fa fa-bullhorn"></i> Business Type</th>
					<th><i class="fa fa-bookmark"> Amount</th>
					<th><i class="fa fa-edit"></i> Action</th>
				</tr>
			</tfoot>
						
			<tbody>
				<?php
					require('connection.php');
					$sql = "select * from tblBusinessCate where strStatus = 'Enabled'";
					$query = mysqli_query($con, $sql);
					if(mysqli_num_rows($query) > 0){
						$i = 1;
						while($row = mysqli_fetch_object($query)){?>
						<tr> 
							<td><?php echo $row->strBusCateName?></td>
							<td><?php echo $row->dblAmount?></td>
							<td>
								<div class="btn-group " role="group" aria-label="..." >	
									<div class="btn-group " role="group">	
										<button  class="btn btn-primary btn-xs" type = submit name = "btnEdit" value = <?php echo $row->strBusCatergory; ?> ><i class="fa fa-pencil"></i></button>
									
										<button  class="btn btn-danger btn-xs" type = submit name = "btnDelete" onclick = "return confirm('Do you really want to continue?');" value = <?php echo $row->strBusCatergory; ?> >disable</button>
									</div>
								</div>
							</td>
						</tr>	
					<?php }}
				?>		
			</tbody>
		</table>
	</div>
	</center>
</form>

      <!-- **********************************************************************************************************************************************************
      PHP
      *********************************************************************************************************************************************************** -->
<?php	if(isset($_POST['btnEdit'])){
		$_SESSION['cate'] = $_POST['btnEdit'];
					
				echo "<script>
					window.location ='EditBusinessCategory.php';</script>";
				}				
				if(isset($_POST['btnDelete'])){
					$a = $_POST['btnDelete'];
					 	mysqli_query($con,"Set @a = 2;");
					mysqli_query($con,"Update tblBusinessCate set strStatus = 'Disabled' where strBusCatergory = '$a'");
				echo "<script>
					window.location ='BusinessCat.php';</script>";
				}
		if(isset($_POST['btnEnable'])){
				$a = $_POST['btnEnable'];
				 	mysqli_query($con,"Set @a = 2;");
				mysqli_query($con,"Update tblBusinessCate set strStatus = 'Enabled' where strBusCatergory = '$a'");
				echo "<script>
					window.location ='BusinessCat.php';</script>";
				}
?>     
			
</section> <!--/wrapper -->
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

	<!--DATA TABLES-->
	<script src="dataTables/jquery.dataTables.js"></script>
    
	<script src="dataTables/dataTables.bootstrap.js"></script>	

	<script>
	  
		$(document).ready(function() {
		  
		$('#dataTable').dataTable();		  
	  
		});

	</script>

	
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
		url: "DisabledtableCat.php",
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
