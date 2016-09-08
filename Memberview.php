 <?php session_start();?>
<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">		<form method = POST>
<legend ><font face = "cambria" size = 8 color = "grey"> Resident Module </font></legend>
<br>


	<form method = POST>
<?php
require('connection.php');
$Hno = $_SESSION['Memb'];
$sql = "SELECT  strImage,timestampdiff(YEAR,dtBirthdate,now()) as 'AGE', concat(strFirstName,' ',strMiddleName,' ',strLastName,' ',strNameExtension) as 'Name', `charGender`,`strCivilStatus`,`strVotersId`,`strTINNo`,`strSSSNo`,`strContactNo`,`strOccupation`,`dtBirthdate` FROM `tblhousemember` where intMemberNo = '$Hno'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_object($query);
$Gend = "";
$Mid = "";
$Ext = "";

if($row->charGender == "M"){
	$Gend = "Male";
}
else{
	$Gend = "Female";
}



?>
					
<div class="col-sm-9 col-md-4 col-lg-3">
<div class = "showback">

		
		<?php echo'<img width = 350 height = 350 align="left" src = "'.$row->strImage.'">';?>
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
		</center></div>
			<!-- DIV FOR TABLE -->
		<div class="col-sm-3 col-md-8 col-lg-9">
		<div class = "showback">
		
			<p><font face = "cambria" size = 5 color = "grey"> Full Name </font></p>
		<div class = "form-group">
			<div class="col-sm-10">
				<input id="controlno" name = "StreetName" class="form-control input-group-lg reg_name" type="text" value = "<?php echo $row->Name?>" readonly>			 
           </div>
		</div><br><br>
		
		
	<div class = "form-group">



	       <div class="col-sm-5"><div class="form-group" id = "occup-div">	<p><font face = "cambria" size = 4 color = "grey"> Gender: </font></p>			
	<div class="col-sm-10">
	         <input id="RFName1" class="form-control input-group-lg reg_name"  <?php  echo "value = $Gend" ?> readonly>
	       </div> </div>
		  
		   
		   
	</div>




	<div class="form-group" id = "SSS-div">				
	       <div class="col-sm-5">
		   <p><font face = "cambria" size = 4 color = "grey">Birthday: </font></p>
				<input id="RFName1" class="form-control input-group-lg reg_name"  <?php  echo "value =".$row->dtBirthdate ?> readonly>
	       </div> </div>
		  
		   
		   
	<br><br><br><br><br></div>
	
	
		<div class = "form-group">



	       <div class="col-sm-5"><div class="form-group" id = "occup-div">	<p><font face = "cambria" size = 4 color = "grey"> Age: </font></p>			
	<div class="col-sm-10">
	         <input id="RFName1" class="form-control input-group-lg reg_name" readonly <?php  echo "value =".$row->AGE ?> >
	       </div> </div>
		  
		   
		   
	</div>




	<div class="form-group" id = "SSS-div">				
	       <div class="col-sm-5">
		<p><font face = "cambria" size = 4 color = "grey"> Contact Number: </font></p>		
				 <input id="RFName1" class="form-control input-group-lg reg_name" readonly <?php  echo "value =".$row->strContactNo ?> >
	       </div> </div>
		  
		   
		   
	<br><br><br><br><br></div>
	
	
	
	
		<div class = "form-group">



	       <div class="col-sm-5"><div class="form-group" id = "occup-div">	<p><font face = "cambria" size = 4 color = "grey"> SSS Number: </font></p>			
	<div class="col-sm-10">
	         <input id="RFName1" class="form-control input-group-lg reg_name" readonly <?php  echo "value =".$row->strSSSNo ?> >
	       </div> </div>
		  
		   
		   
	</div>




	<div class="form-group" id = "SSS-div">				
	       <div class="col-sm-5">
		   <p><font face = "cambria" size = 4 color = "grey">TIN Number: </font></p>
				<input id="RFName1" class="form-control input-group-lg reg_name"  readonly <?php  echo "value =".$row->strTINNo ?> >
	       </div> </div>
		  
		   
		   
	<br><br><br><br><br></div>
	
	
		<div class = "form-group">



	       <div class="col-sm-5"><div class="form-group" id = "occup-div">	<p><font face = "cambria" size = 4 color = "grey"> Voter's ID: </font></p>			
	<div class="col-sm-10">
	         <input id="RFName1" class="form-control input-group-lg reg_name" readonly <?php  echo "value =".$row->strVotersId ?> >
	       </div> </div>
		  
		   
		   
	</div>




	<div class="form-group" id = "SSS-div">				
	       <div class="col-sm-5">
		   <p><font face = "cambria" size = 4 color = "grey">Civil Status: </font></p>
				<input id="RFName1" class="form-control input-group-lg reg_name"  readonly <?php  echo "value =".$row->strCivilStatus ?> >
	       </div> </div>
		  
		   
		   
	<br><br><br><br><br></div>
	
	
		<div class = "form-group">

  <div class="col-sm-5"><p><font face = "cambria" size = 4 color = "grey">Occupation: </font></p>	
	<div class="col-sm-10">
	       			<input id="RFName1" class="form-control input-group-lg reg_name"  readonly <?php  echo "value =".$row->strOccupation ?> >
	       </div> </div>
		  
		   
		   
	</div>

	 
		  
		  




		  
		   
	<br><br><br><br><br></div>
<br><br><br>
	<br><br><br>	
		
		</div>
</form>
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
