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
<legend ><font face = "cambria" size = 8 color = "grey"> Document Maintenance </font></legend>

	&nbsp; &nbsp; &nbsp; &nbsp; <button  class="btn btn-info" onclick="window.location.href='DocumentAdd.php'">Add New Document</button><br>

								<form method = POST>
							
							<br>
								<div class= 'showback'>
                            
                                <center>
								<table   class="table table-striped table-bordered table-hover"   border = '2' style = 'width:95%'>
								<thead>
								<tr>
								
								<th>Document Name</th>
								<th>Price</th>
								<th>Action</th>							
								</tr>
								</thead>
					
							<tbody>	
							<?php
								require('connection.php');
								$sql = "select * from tbldocument";
								$query = mysqli_query($con, $sql);
				
								if(mysqli_num_rows($query) > 0){
								$i = 1;
								
								while($row = mysqli_fetch_object($query)){
									?>
								<tr>
								<td><?php echo $row->strDocName?></td>
								<td><?php echo $row->strDocFee?></td>
								<td>
								
								<div class="btn-group " role="group" aria-label="..." >	
					<div class="btn-group" role="group"> 
					<button type = submit class = "btn btn-info btn-sm" name ='btnEdit' value = <?php echo $row->intDocCode?>>Edit</button>
					</div>	
					<div class="btn-group" role="group"> 
					<?php if($row->strStatus == 'Enabled'){echo "<button class = 'btn btn-success btn-sm' type = submit name = 'btnDbl' value = ".$row->intDocCode.">Disable</button>";}
								else  if($row->strStatus == 'Disabled'){echo "<button class = 'btn btn-success btn-sm'  type = submit name = 'btnAbl' value = ".$row->intDocCode.">Enable</button>";}				}}	?>
								
					</div>	
					</div></td>
								</tr>
								
							<?php  
							
							if(isset($_POST['btnEdit'])){
								$search = $_POST['btnEdit'];
								$query= mysqli_query($con,"Select * from tbldocument where intDocCode = '$search'");
								if(mysqli_num_rows($query)>0)
									$row = mysqli_fetch_object($query);
									$_SESSION['id'] = $row->intDocCode;
									$_SESSION['name'] = $row->strDocName;
									$_SESSION['price'] = $row->strDocFee;
									//echo "<script>alert('". $row->strDocName."');</script>";
									echo "<script> window.location= 'DocumentEdit.php';</script>";
							}
							
							if(isset($_POST['btnDbl'])){
								$search = $_POST['btnDbl'];
								 mysqli_query($con,"Update tbldocument SET strStatus = 'Disabled' where intDocCode = '$search'");
								 
									echo "<script>alert('Succesfully Updated'); 
									window.location= 'DocumentMaintenance.php';</script>";
							}
							if(isset($_POST['btnAbl'])){
								$search = $_POST['btnAbl'];
								 mysqli_query($con,"Update tbldocument SET strStatus = 'Enabled' where intDocCode = '$search'");
								 
									echo "<script>alert('Succesfully Updated'); 
									window.location= 'DocumentMaintenance.php';</script>";
							}?>
							</tbody>
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
