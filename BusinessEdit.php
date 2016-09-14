<!DOCTYPE html>
          <?php session_start();
		  require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->

      <section id="main-content">
	  <br>
          <section class="wrapper site-min-height">
 <button class="btn btn-theme" onclick= "window.location.href='BusinessMaintenance.php'">Back to the Previous Page</button>
 	                           <form method = POST>


	<legend ><font face = "cambria" size = 8 color = "grey">Edit Business </font></legend>
	<font face = "cambria" size = 5 color = "grey"> Business ID </font></p>
	<div class = "form-group">
		   <div class="col-sm-8">
		   
             <input id="busId" name="busId" class="form-control input-group-lg reg_name" type="text" value = '<?php if (isset($_SESSION['bid'])){ echo $_SESSION['bid'];}?>' title="generated brgyId" placeholder=" XXXXXX" maxlength  =10 readonly>
			 
           </div>
	</div><br><br>
	
	<p><font face = "cambria" size = 5 color = "grey"> Business Name </font></p>
				
           <div class="col-sm-8">

             <input id="busName"  name="busName" class="form-control input-group-lg reg_name" type="text" title="Enter first name" placeholder="Business name" value = '<?php if (isset($_SESSION['bid'])){ echo $_SESSION['bn'];}?>' required >
           </div> <br><br>
		  	 <p><font face = "cambria" size = 5 color = "grey"> Business Description </font></p>
           <div class="col-sm-8">
              <input id="busDesc" name="busDesc" class="form-control input-group-lg reg_name" type="text"  title="Enter Adress" placeholder="Description" value = '<?php if (isset($_SESSION['bid'])){ echo $_SESSION['bd'];}?>' required >
           </div><br><br><br>
		   <p><font face = "cambria" size = 5 color = "grey"> Business Category</font></p>
		   <div class="col-sm-8">
            <select class = form-control name = "busCategory" >
			<?php
			require('connection.php');
			$sql = mysqli_query($con,'Select * from tblbusinesscate');
			while($row = mysqli_fetch_object($sql)){
			?>
			<option value = <?php echo "'".$row->strBusCatergory."'";
			if($_SESSION['bc'] == $row->strBusCatergory){
				echo "selected";
			}?>><?php echo $row->strBusCateName; ?></option>
			<?php
			}
			?>
			</select>
			 
           </div>
	<br><br>
	
	  <p><font face = "cambria" size = 5 color = "grey"> Contact Person</font></p>
		   <div class="col-sm-8">
             <input id="contactperson" class="form-control input-group-lg reg_name" type="text" name="contactperson" title="Enter middle name" placeholder="Full Name" value = '<?php if (isset($_SESSION['bid'])){ echo $_SESSION['bcp'];}?>' required>
			 
           </div><br><br>
		    <p><font face = "cambria" size = 5 color = "grey"> Contact Number</font></p>
		   <div class="col-sm-8">
             <input id="contactperson" class="form-control input-group-lg reg_name" type="text" name="contactn" title="Enter middle name" placeholder="Full Name" value = '<?php if (isset($_SESSION['bid'])){ echo $_SESSION['bcn'];}?>' required>
			 
           </div><br><br>
	
	
	  <p><font face = "cambria" size = 5 color = "grey"> Location</font></p>
		   <div class="col-sm-8">
             <input id="Location" class="form-control input-group-lg reg_name" type="text" name="Location" title="Enter middle name" placeholder="Location" value = '<?php if (isset($_SESSION['bid'])){ echo $_SESSION['bl'];}?>' required >
			 
           </div><br><br><br><br>

	
	
  <center>
  

			 <input type="submit" class="btn btn-info" name = "btnEdit" id = "btnEdit" value = "Edit Record">
			
    </center><br><br><br>
	<?php if(isset($_POST['btnEdit'])){
					  $strbuscode = $_POST['busId'];
				 $strbusname = $_POST['busName'];
				 $strbusdesc = $_POST['busDesc'];
				 $strbuscategory = $_POST['busCategory'];
				 $strcontact = $_POST['contactperson'];
				  $strcontactn = $_POST['contactn'];
				 $strlocation = $_POST['Location'];
				
				if($strbuscode == NULL ||$strbusname == NULL ||$strbusdesc == NULL ||$strbuscategory == NULL 
				 ||$strcontact == NULL ||$strlocation == NULL ||$strcontactn== NULL ){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				  else{
					 require('connection.php');
					 $_busname = mysqli_real_escape_string($con,$strbusname);
							$_busdesc = mysqli_real_escape_string($con,$strbusdesc);
							$_location = mysqli_real_escape_string($con,$strlocation);
					 mysqli_query($con,"Update tblbusiness Set strBusinessName = '$_busname' , strBusinessDesc = '$_busdesc', strBusinessCateID = '$strbuscategory', strBusinessContactPerson = '$strcontact' , strBusinessLocation = '$_location', strContactNum = '$strcontactn' where strBusinessID = '$strbuscode';");
					 echo "<script>alert('Success');</script>";
					 session_destroy();
					 echo "<script>
							window.location = 'BusinessMaintenance.php'; </script>";
			 }}
					
			?>
	</form>
                               <!-- /#page-content-wrapper -->

			
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
