<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
         <br>
          <section class="wrapper site-min-height">

 <legend ><font face = "cambria" size = 8 color = "grey"> Add new Street</font></legend>

 <button  class="btn btn-info" onclick="window.location.href='StreetMaintenance.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button><br><br>
		
		<form method = POST>
						
<div class="col-sm-9 col-md-6 col-lg-6">
<div class = "showback">
		<p><font face = "cambria" size = 5 color = "grey"> Street Name </font></p>
		<div class = "form-group">
			<div class="col-sm-12">
				<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="text"  required>			 
           </div>
		</div><br><br><br>
		
		<div class="split-para"><font face = "cambria" size = 5 color = "grey"> Purok Name</font></p>
		
			
                
			<div class="col-sm-12">
				<input id="controlno" name = "Purok" class="form-control input-group-lg reg_name" value = " " type="text" >			 
           </div>

			
		</div><br><br><br>
	<br><br><br>	
  
		<center> <input type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd"  value = "Save Record"  > </div>
		<br><br></center></div>
			<!-- DIV FOR TABLE -->
		<div class="col-sm-3 col-md-6 col-lg-6">
		<div class = "showback">
		<table  class="table table-striped table-bordered table-hover" >
		<thead>
		<th><i class="fa fa-bullhorn"></i> Street Name</th>
		<th><i class="fa fa-bookmark"></i> Purok Name</th>
		
		</thead>
		<tbody>
							<?php
					require('connection.php');
						$sql = "select intStreetId , strStreetName, strPurok from tblStreet order by intStreetId asc";
						$query = mysqli_query($con, $sql);
				
						if(mysqli_num_rows($query) > 0){
							$i = 1;
					
							while($row = mysqli_fetch_object($query)){?>
								<tr>
									<td><?php echo $row->strStreetName?>				</td>
									<td><?php echo $row->strPurok?></td>
									
								</tr>
		<?php }} ?></tbody>
				</table></div>
		</div>
<!-- DIV END-->
		<?php
		 if (isset($_POST['btnAdd'])){
			 $strStreet = $_POST['StreetName'];
			 $strPurok = $_POST['Purok'];
			 if($strStreet == NULL ){
				 echo "<script>alert('Please Complete the form');</script>";
			 }
			 else{
				 require('connection.php');
			
				mysqli_query($con,"INSERT INTO `tblStreet`(`strStreetName`, `strPurok`) VALUES ('$strStreet','$strPurok');");
					 echo "<script>alert('Success');
					 window.location = 'StreetMaintenance.php';</script>";
			 }
		}
		?>
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
