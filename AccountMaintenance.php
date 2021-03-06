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
		<h2>Account</h2>
						
						<p align="right">
						<button  class="btn btn-info" onclick="window.location.href='Addaccount.php'"><i class="fa fa-plus"></i> Add New</button>
						</p>
					<div class = 'showback'><form method = POST>
					<br>
					 <table class="table table-striped table-bordered table-hover" border = '2' id="dataTable">
					<thead>
					<tr>
					<th>Account ID</th>
					<th>Employee Name</th>
					<th>Username</th>
					<th>Password</th>
					<th>Date Start</th>
					<th>Date End</th>
					<th>Action</th>
					</tr>
					</thead>
					
					<tfoot>
					<tr>
					<th>Account ID</th>
					<th>Employee Name</th>
					<th>Username</th>
					<th>Password</th>
					<th>Date Start</th>
					<th>Date End</th>
					<th>Action</th>
					</tr>
					</tfoot>
					
					
					<tbody>
					<?php
					require('connection.php');
				$sql = "SELECT `strOfficerID`,`strUsername`,`strPassword`, concat(strLastName,',',strFirstName,' ',strMiddleName) as 'Name', `dtStart`,`dtEnd` FROM `tblaccount` as a inner join `tblhousemember` as b on b.intMemberNo = a.intForeignMemberNo where a.strStatus = 'Enabled'";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
					$i = 1;
					while($row = mysqli_fetch_object($query)){?>
					<tr> <td><?php echo $row->strOfficerID?></td>
					<td><?php echo $row->Name?></td>
					<td><?php echo $row->strUsername?></td>
					<td><?php echo $row->strPassword?></td>
					<td><?php echo $row->dtStart?></td>
					<td><?php echo $row->dtEnd?></td>
					<td><div class="btn-group " role="group" aria-label="..." >	
										<div class="btn-group " role="group">	
											<button  class="btn btn-primary btn-xs" type = submit name = "btnEdit" value = <?php echo $row->strOfficerID; ?> ><i class="fa fa-pencil"></i></button>	
											<button  class="btn btn-danger btn-xs" type = submit name = "btnDelete" onclick = "return confirm('Do you really want to continue?');" value = <?php echo $row->strOfficerID; ?> >Disable</button>
										</div></td>

					</tr>
				<?php }}
				
					if(isset($_POST['btnEdit'])){
						$search = $_POST['btnEdit'];		
						$_SESSION['ID'] = $search;
						echo "<script>window.location = 'AccountEdit.php'</script>";
					}			
					
					if(isset($_POST['btnDelete'])){
						$id = $_POST['btnDelete'];
						mysqli_query($con,"Update tblaccount set strStatus = 'Disabled' where strOfficerID = $id");
						echo "<script>window.location = 'AccountMaintenance.php';</script>";
					}?></tbody>
				</table>
				</div>

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
