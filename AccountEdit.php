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
 <button class="btn btn-theme" onclick="window.location.href='AccountMaintenance.php'">Back to the Previous Page</button>
 	                     <form method = POST>
                    <legend ><font face = "cambria" size = 8 color = "grey"> Edit Account </font></legend><br>
                       <p><font face = "cambria" size = 5 color = "grey"> Account ID </font></p>
	<div class = "form-group">
		   <div class="col-sm-5">
		   
             <input id="Aid" name ="Aid" class="form-control input-group-lg reg_name" type="text"  placeholder=" ID" maxlength = 10 readonly <?php if(isset($_SESSION['ID']))
			 {echo "value =".$_SESSION['ID'];}?> readonly>
			 
           </div>
	</div><br><br><br>
	<p><font face = "cambria" size = 5 color = "grey"> Name </font></p>
	<div class="form-group">				
           <div class="col-sm-3">

             <input id="RFName1" class="form-control input-group-lg reg_name" type="text" name="AFName" title="Enter first name" placeholder="First name" <?php if(isset($_SESSION['ID'])){
				 echo "value =". $_SESSION['Fname'];}?> required>
           </div> 
		   <div class="col-sm-3">
             <input id="RMName1" class="form-control input-group-lg reg_name" type="text" name= "AMName" title="Enter middle name" placeholder="Middle name" <?php if(isset($_SESSION['ID'])){
				 echo "value =".$_SESSION['Mname'];}?>>
			 
           </div>
           <div class="col-sm-3">
             <input id="RLName1" class="form-control input-group-lg reg_name" type="text" name= "ALName" title="Enter last name" placeholder="Last name" <?php if(isset($_SESSION['ID'])){
				 echo "value =".$_SESSION['Lname'];}?> required> 
           </div>
		   
		   
	</div><br><br><br>
	<p><font face = "cambria" size = 5 color = "grey"> Birthday </font></p>
	<div class="form-group">				
           <div class="col-sm-3">

             <input id="RFName1" class="form-control input-group-lg reg_name" type="text" name="ABirthday" title="Enter first name" placeholder="YYYY-MM-DD" readonly <?php if(isset($_SESSION['ID'])){
				 echo "value =".$_SESSION['bday'];}?> required>
           </div> 
		  
		   
		   
	</div><br><br><br>
	<p><font face = "cambria" size = 5 color = "grey"> Username </font></p>
	<div class = "form-group">
		   <div class="col-sm-5">
		   
             <input id="dat" name ="Auser" class="form-control input-group-lg reg_name" type="text"   maxlength = 10  <?php if(isset($_SESSION['ID'])){
				 echo "value =".$_SESSION['User'];}?> required>
			 
           </div>
	</div><br><br><br>
	<p><font face = "cambria" size = 5 color = "grey"> Password </font></p>
	<div class = "form-group">
		   <div class="col-sm-5">
		   
             <input id="dat" name ="Apass" class="form-control input-group-lg reg_name" type= password  maxlength = 10 <?php if(isset($_SESSION['ID'])){
				 echo "value =".$_SESSION['Pass'];}?> required>
			 
           </div>
	</div><br><br><br>
	
	
	
	<br><br><br>
  
  	<center>
			 <input type="submit" class="btn btn-info" name = "btnEdit" id = "btnEdit" value = "Save Record" >
			 <?php
		require('connection.php');
				
				if(isset($_POST['btnEdit'])){
					 $strAccountid = $_POST['Aid'];
				 $strFname = $_POST['AFName'];
				  $strMname = $_POST['AMName'];
				   $strLname = $_POST['ALName'];
					 $strUser = $_POST['Auser'];
					  $strPass = $_POST['Apass'];
				$a =0;
				$b =0;
						if (preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $strLname)){
							$b = 1;}
						if (preg_match('/[\']/', $strLname)||preg_match('/[\']/', $strMname)||preg_match('/[\']/', $strFname)){
								$a = 1;
							}
						if($a == 1){
						$_Lname = mysqli_real_escape_string($con,$strLname);
							$_Fname = mysqli_real_escape_string($con,$strFname);
							$_Mname = mysqli_real_escape_string($con,$strMname);
						}
						
				if($strFname == NULL  ||$strLname  == NULL ||$strUser  == NULL ||$strPass == NULL ){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				  else if ($b == 1){
					 echo "<script>alert('Characters like /[\^£$%&*()}{@#~?><>,|=_+¬-]/ is not allowed');</script>";
				 }
				  else{
					 
					 if($a==1){
						mysqli_query($con,"Update tblaccount Set strOfficerFname = '$_Fname', strOfficerLname = '$_Lname', strOfficerMname = '$_Mname',strUsername = '$strUser',strPassword = '$strPass' where strOfficerID = '$strAccountid';");
					
					 echo "<script>alert('Success');</script>";
					 					session_destroy();
					 echo "<script>window.location = 'AccountMaintenance.php'</script>
					 ";
					}
					else{
					}
					 mysqli_query($con,"Update tblaccount Set strOfficerFname = '$strFname', strOfficerLname = '$strLname', strOfficerMname = '$strMname',strUsername = '$strUser',strPassword = '$strPass' where strOfficerID = '$strAccountid';");
					 echo "<script>alert('Success');</script>";
					 					session_destroy();
					 echo "<script>window.location = 'AccountMaintenance.php'</script>
					 ";
			 }}
			 
			
			 if(isset($_POST['btnCancel'])){
					session_destroy();
					 echo "<script>window.location = 'AccountMaintenance.php'</script>
					 ";
			 }
			
			 ?>
    </center><br><br>
                               <!-- /#page-content-wrapper -->
</form>
			
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
