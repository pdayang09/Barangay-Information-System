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
 <button  class="btn btn-info" onclick="window.location.href='DocumentPMaintenance.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
<form method = POST>
<legend><font face = "cambria" size = 8 color = "grey"> Add Purpose Details </font></legend>
		
		<form method = POST>
						
	
				<p><font face = "cambria" size = 5 color = "grey"> Document Description </font><font  size = 5 color = "Red"> * </font></p>
			<div class = "form-group">
				<div class="col-md-5">		   
				<textarea id="PurposeN1"  name="PurposeN1" class="form-control input-group-lg reg_name" type="text" title="Enter Document Purpose name" required></textarea>
			 
				</div>
			</div><br><br><br><br><br>				
  
				<center> <input type="submit" class="btn btn-outline btn-success" name = "btnAdd" id = "btnAdd"  value = "Save"  > <br><br>
			
			<?php
				if (isset($_POST['btnAdd'])){
			
				 $strPurN = $_POST['PurposeN1'];
				 
				 if($strPurN == NULL){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					 require('connection.php');
					 mysqli_query($con,"insert into tbldocumentpurpose(`strPurposeName`) values ('$strPurN');");
					 echo "<script>alert('Success');
					 window.location = 'DocumentPMaintenance.php';</script>";
			 }}
			?>
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
