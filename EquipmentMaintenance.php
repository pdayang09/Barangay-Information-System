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
<legend ><font face = "cambria" size = 8 color = "grey"> Equipment Maintenance </font></legend>
	<button  class="btn btn-info" onclick = "window.location.href='EquipmentAdd.php'">Add New Equipment</button>&nbsp;&nbsp;<input type= checkbox id = "showdisabled" onclick ="showdis()"> Show Disabled Items<br>
                            <center><br>				
				<div class = "showback" id = 'tblview'>
	<form method = POST>
				<table class="table table-striped table-bordered table-hover"  border = '3' style = 'width:95%'><!-- Table -->
					<thead><tr>
						<th> Equipment </th>
						<th> Category </th>
						<th> Price</th>
						<th> Quantity </th>
						<th> Action</th>
					</tr></thead>
					
					<tbody><?php
					require('connection.php');
						$sql = "select * from tblequipment where strStatus = 'Enabled'";
						$query = mysqli_query($con, $sql);
				
						if(mysqli_num_rows($query) > 0){
							$i = 1;
					
							while($row = mysqli_fetch_object($query)){?>
								<tr> <td><?php echo $row->strEquipName?></td>
									<td><?php 
					
								$query2 = mysqli_query($con,"Select * from tblCategory where strcategorycode = '$row->strEquipCategory'");
							
								if(mysqli_num_rows($query2) > 0){
							
									while($row1 = mysqli_fetch_object($query2)){
										echo  $row1->strCategoryDesc;

									}
								}
					?>				</td>
									<td><?php echo $row->dblEquipFee?></td>
									<td><?php echo $row->intEquipQuantity?></td>
									<td><div class="btn-group " role="group" aria-label="..." >	
									<div class="btn-group " role="group">	
									<button  class="btn btn-info btn-round" type = submit name = "btnEdit" value = <?php echo $row->strEquipNo; ?> >Edit</button>
									</div>
									<div class="btn-group " role="group" >	
									<button  class="btn btn-danger btn-round" type = submit name = "btnDelete" onclick = "return confirm('Do you really want to continue?');" value = <?php echo $row->strEquipNo; ?> >Disable</button>
									</div>
									</div></td>
								</tr>
		<?php }} ?></tbody>
				</table>
                    </form>             			</div><br><br>
				<?php
					if(isset($_POST['btnEdit'])){
						$equipcode = $_POST['btnEdit'];		
						$query = mysqli_query($con,"Select * from tblEquipment where strEquipNo = '$equipcode'");
							$row = mysqli_fetch_object($query);
							$_SESSION['contno'] = $row->strEquipNo;
							$_SESSION['Name'] = $row->strEquipName;
							$_SESSION['stat'] = $row->intEquipQuantity;
							$_SESSION['dblEquipFee'] = $row->dblEquipFee;;
							$_SESSION['discount'] = $row->dblEquipDiscount;;
							$query2 = mysqli_query($con,"Select * from tblCategory where strCategoryCode = '$row->strEquipCategory'");
							$row2 = mysqli_fetch_object($query2);
							$_SESSION['cat'] = $row2->strCategoryDesc;	
							
							echo "<script> window.location = 'EquipmentEdit.php';</script>";						
					}
					
					if(isset($_POST['btnDelete'])){
						$a = $_POST['btnDelete'];
					mysqli_query($con,"Update tblEquipment set strStatus = 'Disabled' where strEquipNo = '$a'");
				echo "<script>
					window.location ='EquipmentMaintenance.php';</script>";
				}	
if(isset($_POST['btnEnable'])){
						$a = $_POST['btnEnable'];
					mysqli_query($con,"Update tblEquipment set strStatus = 'Enabled' where strEquipNo = '$a'");
				echo "<script>
					window.location ='EquipmentMaintenance.php';</script>";
				}						?>

                  </center>
			
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
		url: "DisabledtableEquip.php",
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
