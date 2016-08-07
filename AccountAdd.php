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
 <button  class="btn btn-info" onclick="window.location.href='AccountMaintenance.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>

<legend ><font face = "cambria" size = 8 color = "grey"> Add new account </font></legend>
				
<form method = POST>				
<p><font face = "cambria" size = 5 color = "grey"> Account ID </font></p>
	<div class = "form-group">
		   <div class="col-sm-5">
		   
             <input id="Aid" name ="Aid" class="form-control input-group-lg reg_name" type="text"  placeholder=" ID" maxlength = 10 required>
			 
           </div>
	</div><br><br><br>
	<p><font face = "cambria" size = 5 color = "grey"> Name </font></p>
	<div class="form-group">				
           <div class="col-sm-3">

             <input id="RFName1" class="form-control input-group-lg reg_name" type="text" name="AFName" title="Enter first name" placeholder="First name" required>
           </div> 
		   <div class="col-sm-3">
		 
             <input id="RMName1" class="form-control input-group-lg reg_name" type="text" name= "AMName" title="Enter middle name" placeholder="Middle name">
			 
           </div>
           <div class="col-sm-3">
		
             <input id="RLName1" class="form-control input-group-lg reg_name" type="text" name= "ALName" title="Enter last name" placeholder="Last name" required>
           </div>
		   
		   
	</div><br><br>
	<p><font face = "cambria" size = 5 color = "grey"> Birthday </font></p>
	<div class="form-group">				
           <div class="col-sm-3">

             <input id="RFName1" class="form-control input-group-lg reg_name" type= date name="ABirthday" title="Enter first name" required>
           </div> 
		  
		   
		   
	</div><br><br><br>
	<p><font face = "cambria" size = 5 color = "grey"> Username </font></p>
	<div class = "form-group">
		   <div class="col-sm-5">
		   
             <input id="dat" name ="Auser" class="form-control input-group-lg reg_name" type="text"   maxlength = 10 required>
			 
           </div>
	</div><br><br><br>
	<p><font face = "cambria" size = 5 color = "grey"> Password </font></p>
	<div class = "form-group">
		   <div class="col-sm-5">
		   
             <input id="dat" name ="Apass" class="form-control input-group-lg reg_name" type= password  maxlength = 10 required >
			 
           </div>
	</div><br><br><br>
	
	
	
	<br><br><br>
  
  	<center> <input type="submit" class="btn btn-info" name = "btnAdd" id = "btnAdd"  value = "Save Record"  > 
		
		
			 <?php require('connection.php');
			 if (isset($_POST['btnAdd'])){
				 $strAccountid = $_POST['Aid'];
				 $strFname = $_POST['AFName'];
				  $strMname = $_POST['AMName'];
				   $strLname = $_POST['ALName'];
				$a =0;
				$b =0;
						if (preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $strLname) || preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $strFname)|| preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $strMname)){
							$b = 1;}
						if (preg_match('/[\']/', $strLname)||preg_match('/[\']/', $strMname)||preg_match('/[\']/', $strFname)){
								$a = 1;
							}
						if($a == 1){
							$_Lname = mysqli_real_escape_string($con,$strLname);
							$_Fname = mysqli_real_escape_string($con,$strFname);
							$_Mname = mysqli_real_escape_string($con,$strMname);
						}
						
				    $strBday= $_POST['ABirthday'];
					 $strUser = $_POST['Auser'];
					  $strPass = $_POST['Apass'];

				 if($strAccountid == NULL ||$strFname == NULL ||$strLname == NULL ||$strBday == NULL ||$strUser == NULL ||$strPass == NULL){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else if ($b == 1){
					 echo "<script>alert('Characters like /[\^£$%&*()}{@#~?><>,|=_+¬-]/ is not allowed');</script>";
				 }
				 else{
	
					if($strMname == NULL){$strMname = " ";}
					if($a==1){
						
					$g = mysqli_query($con,"INSERT INTO `tblaccount`(`strOfficerID`, `strUsername`, `strPassword`, `strOfficerFname`, `strOfficerMname`, `strOfficerLname`, `datOfficerBirthdate`) VALUES ('$strAccountid','$strUser',
					'$strPass','$_Fname','$_Mname','$_Lname','$strBday')");
					if($g == true){
						echo "<script>alert('Success');</script>";
					}
					else{echo "<script>alert('".mysqli_error($con)."');</script>";}}
					else{$g = mysqli_query($con,"INSERT INTO `tblaccount`(`strOfficerID`, `strUsername`, `strPassword`, `strOfficerFname`, `strOfficerMname`, `strOfficerLname`, `datOfficerBirthdate`) VALUES ('$strAccountid','$strUser',
					'$strPass','$strFname','$strMname','$strLname','$strBday')");
					if($g == true){
						echo "<script>alert('Success');</script>";
					}
					else{echo "<script>alert('".mysqli_error($con)."');</script>";}}
			 }}
			 if(isset($_POST['btnCancel'])){
					
					
			 }
				 ?><br><br>
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
