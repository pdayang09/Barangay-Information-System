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
<legend ><font face = "cambria" size = 8 color = "grey"> Document Purpose Maintenance </font></legend>
<br><div class = "showback">
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <button  class="btn btn-info" onclick = "window.location.href='AddPurpose.php'">Add New Purpose</button><br>
<form method = POST>
						
                                <center><br>
								<table   class="table table-striped table-bordered table-hover"    border = '2' style = 'width:95%'>
								<thead>
								<tr>
								<th>Purpose ID </th>
								<th>Purpose Description </th>
								<th>Edit</th>
								</tr>
								</thead>
					<form method = POST >
							<tbody>
							<?php
								require('connection.php');
								$sql = "select * from tbldocumentpurpose";
								$query = mysqli_query($con, $sql);
				
								if(mysqli_num_rows($query) > 0){
								$i = 1;
								
								while($row = mysqli_fetch_object($query)){?>
								<tr> <td><?php echo $row->strDocPurposeID?></td>
								<td><?php echo $row->strPurposeName?></td>
								<td><button type = submit class="btn btn-success btn-sm"  name = 'btnEdit1' id = 'btnEdit1' value = <?php echo $row->strDocPurposeID; ?>>EDIT</button></td>
								</tr>
								
							<?php }} ?>
							</tbody>
							<?php
							if(isset($_POST['btnEdit1'])){
								$search = $_POST['btnEdit1'];
							
								$query= mysqli_query($con,"Select * from tbldocumentpurpose where strDocPurposeID = '$search'");
								if(mysqli_num_rows($query)>0){
									$row = mysqli_fetch_object($query);
									$_SESSION['purp'] = $row->strPurposeName;
									$_SESSION['id'] = $search;
									
								echo "<script>
									window.location = 'EditPurpose.php';
									</script>";
								}
							}?>
							
								</center>
                       </form>
				</table>
</center>
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
