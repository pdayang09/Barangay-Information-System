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
<legend><font face = "cambria" size = 8 color = "grey"> Account Maintenance </font></legend>

				<div class = 'showback'>		

	 &nbsp; &nbsp; &nbsp; &nbsp; <button  class="btn btn-info" onclick = "window.location.href='AddAccount.php'">Add New Account</button><br>
				<form method = POST><center>
<br>
					 <table class="table table-striped table-bordered table-hover" border = '2' style = 'width:95%'>
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
					<tbody>
					<?php
					require('connection.php');
				$sql = "SELECT `strOfficerID`,`strUsername`,`strPassword`, concat(strLastName,',',strFirstName,' ',strMiddleName) as 'Name', `dtStart`,`dtEnd` FROM `tblaccount` as a inner join `tblhousemember` as b on b.intMemberNo = a.intForeignMemberNo";
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
					<td><button type = submit class = "btn btn-info btn-round btn-sm"value = <?php echo $row->strOfficerID?> name = 'Edit' >Edit</button></td>

					</tr>
				<?php }}
					if(isset($_POST['Edit'])){
						$search = $_POST['Edit'];
						$query = mysqli_query($con,"Select * from tblaccount where strOfficerID = '$search'");
						$row = mysqli_fetch_object($query);
						$_SESSION['ID'] = $search;
						$_SESSION['Fname'] = $row->strOfficerFname;
						$_SESSION['Mname'] = $row->strOfficerMname;
						$_SESSION['Lname'] = $row->strOfficerLname;
						$_SESSION['User'] = $row->strUsername;
						$_SESSION['Pass'] = $row->strPassword;
						$_SESSION['bday'] = $row->datOfficerBirthdate;
						echo "<script>window.location = 'AccountEdit.php'</script>";
					}			?></tbody>
				</table>
				</div>
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
