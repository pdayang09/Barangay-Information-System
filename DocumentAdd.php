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
 <button  class="btn btn-info" onclick="window.location.href='DocumentMaintenance.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
<legend ><font size = 8 color = "grey"> Add Document Details </font></legend>
<div class = "showback">
<form method = POST>
					
			
	
				<p><font face = "cambria" size = 5 color = "grey"> Document Name </font></p>
			<div class = "form-group">
				<div class="col-sm-5">		   
				<input id="DocumentN1"  name="DocumentN1" class="form-control input-group-lg reg_name" type="text" title="Enter Document name" maxlength = 40 required>
			 
				</div>
			</div><br><br>		
<p><font face = "cambria" size = 5 color = "grey">Price </font></p>
			<div class = "form-group">
				<div class="col-sm-5">		   
				<input id="DocumentN1"  name="Price" class="form-control input-group-lg reg_name" type= number step = any title="Enter Document name" value = '0'min = 0 required>
			 
				</div>
			</div><br><br><br><br><br>					
  
				<center> <input type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd"  value = "Save Record"  > 

			</div>
			<?php
				if (isset($_POST['btnAdd'])){
				 $strDocN = $_POST['DocumentN1'];
				 $strPrice = (double)$_POST['Price'];
				 if($strPrice == NULL){
					 $strPrice = 0;
				 }	
				 if($strPrice == NULL ||$strDocN == NULL){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					 require('connection.php');
					 mysqli_query($con,"insert into tblDocument	(`strDocName`, `strDocFee`, `strStatus`) values ('$strDocN',$strPrice,'Enable');");
					 echo "<script>alert('Success');</script>";
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
