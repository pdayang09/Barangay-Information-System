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
<legend ><font face = "cambria" size = 8 color = "grey"> Equipment Maintenance </font></legend>
<br>
<div class="input-append">
	<input name="search" id="search" placeholder = "Input Business Name"/>
    <button class="btn btn-info" name = "s1">Search</button></form>
</div><br>
<?php if(isset($_POST['s1'])){
$_SESSION['s'] = $_POST['search'];
	echo "<script>window.location = 'BusinessMaintenance2.php'; </script>";}?>
	<button  class="btn btn-info" onclick = "window.location.href='EquipmentAdd.php'">Add Equipment</button><br>
                            <center><br>				
				
	<div class = "showback">
				<table class="table table-striped table-bordered table-hover"  border = '3' style = 'width:95%'><!-- Table -->
					<thead><tr>
						<th> Equipment </th>
						<th> Category </th>
						<th> Quantity </th>
						<th> EDIT </th>
					</tr></thead>
					
					<tbody><?php
					require('connection.php');
					$s = $_SESSION['s'];
						$sql = "select * from tblequipment where strEquipCode LIKE '%$s%'";
						$query = mysqli_query($con, $sql);
				
						if(mysqli_num_rows($query) > 0){
							$i = 1;
					
							while($row = mysqli_fetch_object($query)){?>
								<tr> <td><?php echo $row->strEquipCode?></td>
									<td><?php 
					
								$query2 = mysqli_query($con,"Select * from tblCategory where strcategorycode = '$row->strCategoryCode'");
							
								if(mysqli_num_rows($query2) > 0){
							
									while($row1 = mysqli_fetch_object($query2)){
										echo  $row1->strCategoryDesc;

									}
								}
					?>				</td>
									<td><?php echo $row->intQuantity?></td>
									<td><button class= "btn btn-success"  type = submit name = "btnEdit" id = "btnEdit" value = <?php echo $row->intEquipno; ?> >EDIT</button></td>
								</tr>
		<?php }} ?></tbody>
				</table>
			</div><br><br>
				<?php
					if(isset($_POST['btnEdit'])){
						$equipcode = $_POST['btnEdit'];		
						$query = mysqli_query($con,"Select * from tblEquipment where intEquipno = '$equipcode'");
							$row = mysqli_fetch_object($query);
							$_SESSION['contno'] = $equipcode;
							$_SESSION['stat'] = $row->intQuantity;
							
							$query2 = mysqli_query($con,"Select * from tblCategory where strCategoryCode = '$row->strCategoryCode'");
							$row2 = mysqli_fetch_object($query2);
							$_SESSION['cat'] = $row2->strCategoryDesc;	
							
							echo "<script> window.location = 'EquipM22.php';</script>";						
					}?>
                    </form>             
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

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
