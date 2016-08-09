	<?php session_start();
	?>
	<!DOCTYPE html>
	      <?php require('header.php');?>
	<?php require('sidebar.php');?>
	  <!-- **********************************************************************************************************************************************************
	  MAIN CONTENT
	  *********************************************************************************************************************************************************** -->
	  <!--main content start-->
	  	   <script>


	function checkpurok(){
	if(document.getElementById('Purok').value == "Purok Name"){
		alert("Invalid Purok Name");
	}
	}
	function fnLastn(obj,strdiv,strSpanName){
			var pattern = new RegExp(/[~`!#$%\^&*+=[\]\\;,/{}|\\":<>\?]/);
	        if((obj.value.trim() == "") || (obj.value <= 0) || pattern.test(obj.value)){
	            document.getElementById(strdiv).className="form-group has-error";
				 document.getElementById("hidlname").value=1;
			
				
	        } else{
	            document.getElementById(strdiv).className="form-group has-success";
			document.getElementById("hidlname").value= 0;
	        }
	    }

	    function fnFirstn(obj,strdiv,strSpanName){
			var pattern = new RegExp(/[~`!#$%\^&*+=[\]\\;,/{}|\\":<>\?]/);
	        if((obj.value.trim() == "") || (obj.value <= 0) || pattern.test(obj.value)){
	            document.getElementById(strdiv).className="form-group has-error";
				 document.getElementById("hidfname").value=1;
	        } else{
	            document.getElementById(strdiv).className="form-group has-success";
				document.getElementById("hidfname").value=0;
	        }
	    }
		
		function fnMiddletn(obj,strdiv,strSpanName){
			var pattern = new RegExp(/[~`!#$%\^&*+=[\]\\;,/{}|\\"\:<>\?]/);
	        if(pattern.test(obj.value)){
	            document.getElementById(strdiv).className="form-group has-error";
				 document.getElementById("hidfname").value=1;
	        } else{
	            document.getElementById(strdiv).className="form-group has-success";
				document.getElementById("hidfname").value=0;
	        }
	    }
		
	    function fnValidEmail(obj,strdiv,strSpanName){  
	            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(obj.value) || obj.value.trim() == ""){  
	                
					document.getElementById(strdiv).className="has-error";
	            }else{
	                document.getElementById(strdiv).className="has-success";
	            }  
	    }
		
		function fnValidDate(obj,strdiv,strSpanName){ 

	            if ((obj.value.trim() == "") || (obj.value <= 0) ){  
	         
				   document.getElementById(strdiv).className="has-error";
				   document.getElementById("hidbday").value=1;
	            }else{
	                document.getElementById(strdiv).className="has-success";
					document.getElementById("hidbday").value=0;
	            }  
	    }
		
	    
		function fnValid(obj,strdiv,strSpanName){ 
		
	       
	         
	                document.getElementById(strdiv).className="has-success";
	            
	    }
		
	</script>
	  <section id="main-content">
	      <section class="wrapper site-min-height">		<form method = POST><br>
	<legend ><font face = "cambria" size = 8 color = "grey"> Resident Module </font></legend>
	<button  class="btn btn-info" onclick="window.location.href='Hholdview.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button><legend></legend>
	<div class = "showback">
	<legend ><p><font face = "cambria" size = 5 color = "grey"> General Information </font></p></legend >

	<form method = POST>
	<p><font face = "cambria" size = 4 color = "grey"> Household Head Name: </font></p>
	<div class="form-group">				
	      <div class="col-sm-3">
				<div class="form-group " id = "fname-div">	
	         <input name="Fname"  required  class="form-control" type="text" placeholder="First name" onblur= fnFirstn(this,"fname-div","Fname") <?php if(isset($_POST["Fname"])) echo "value = ".$_POST["Fname"]; ?>>
			 </div>
	       </div> 
		   <div class="col-sm-3">
		 <div class="form-group " id = "mname-div">	
	         <input id="MName" class="form-control input-group-lg reg_name" type="text" name= "Mname" title="Enter middle name" placeholder="Middle name"  onblur= fnMiddletn(this,"mname-div","contactno") <?php if(isset($_POST["Mname"])) echo "value = ".$_POST["Mname"]; ?> >
			 </div>
	       </div><div class="col-sm-3">
		<div class="form-group " id = "lname-div">	
	         <input id="LName" required class="form-control input-group-lg reg_name" type="text" name= "Lname" title="Enter last name" placeholder="Last name" <?php if(isset($_POST["Lname"])) echo "value = ".$_POST["Lname"]; ?>  onblur= fnLastn(this,"lname-div","Lname")  >
			 </div>
	       </div>
		   
		      <div class="col-sm-1">
		<div class="form-group " id = "ename-div">	
	         <input id="EName" class="form-control input-group-lg reg_name" type="text" name= "Ename" title="name extension(Optional)" placeholder="name extension(Optional)"  onblur= fnValid(this,"ename-div","contactno") <?php if(isset($_POST["Ename"])) echo "value = ".$_POST["Ename"]; ?>  >
	       </div>
		   </div>
	</div><br><br><br>	

	<p><font face = "cambria" size = 4 color = "grey"> Old Address: </font></p>

	<div class="form-group">				
	       <div class="col-sm-10">

	         <input id="RFName1" class="form-control input-group-lg reg_name" type= text name="OldAddress" title="Enter first name" required <?php if(isset($_POST["OldAddress"])) echo "value = ".$_POST["OldAddress"]; ?> >
	       </div> 
		  
		   
		   
	</div><br><br><br>


	<p><font face = "cambria" size = 4 color = "grey"> New Address: </font></p>
	<div class="form-group">				

	        <div class="col-sm-3"> 	
	        
			<select  name = "Purok" id = "Purok" class="form-control" onchange= "getId(this.value)" >
			<option> Purok Name</option>
			<?php require('connection.php');
			$sql = "Select * from tblZone";
			$sql1 = mysqli_query($con,$sql);
			while($row = mysqli_fetch_object($sql1)){
				?> <option  <?php echo "value =".$row->intZoneId;?>> <?php echo $row->strZoneName;?></option><?php
			}?>
			</select>
		

			</div>
		   <div class="col-sm-4">
		 <select name = "Street" id = "StreetList" class="form-control">
		<option></option>
			</select>
			 
	       </div>
	      
		   <div class="col-sm-3">

	         <input id="FName" class="form-control input-group-lg reg_name" type="text" name="Building" title="Enter first name" placeholder="Building Number" required <?php if(isset($_POST["Building"])) echo "value = ".$_POST["Building"]; ?> >
	       </div> 
		     
	</div><br><br>
	<legend ></legend >
	<legend ><p><font face = "cambria" size = 5 color = "grey"> Personal Information </font></p></legend >

	<div class = "form-group">
	<div class="col-sm-5"><p><font face = "cambria" size = 4 color = "grey"> Gender: </font></p>
	<input type = radio value = "M" name = "gend" checked> Male
	<input type = radio value = "F" name = "gend"> Female

	       </div> 
		 


	<div class="form-group" id = "bday-div">				
	       <div class="col-sm-5">
	<p><font face = "cambria" size = 4 color = "grey"> Birthday </font></p>
	         <input required id="RFName1" class="form-control input-group-lg reg_name" type= date name="Birthdate"   max="<?php echo date("Y-m-d"); ?>"title="Enter first name"  onblur= fnValidDate(this,"bday-div","Birthdate") <?php if(isset($_POST["Birthdate"])) echo "value = ".$_POST["Birthdate"]; ?>>
	       </div> 
		  
		   
		   
	</div><br><br><br><br><br></div>
	<div class = "form-group">


	<div class="form-group" id = "contact-div">				
	<div class="col-sm-5"><p><font face = "cambria" size = 4 color = "grey"> Contact Number (Optional): </font></p>
	       <div class="col-sm-10">

	         <input id="RFName1" class="form-control input-group-lg reg_name" type= text name="contact" title="Enter first name" maxlength = 11 onblur= fnValid(this,"contact-div","contact")  <?php if(isset($_POST["contact"])) echo "value = ".$_POST["contact"]; ?>> 
	       </div> 
		  
		   
		   
	</div>

	<div class="form-group">				
	       <div class="col-sm-5">
	<p><font face = "cambria" size = 4 color = "grey"> Civil Status: </font></p>

	         <select name = "civil" class = "form-control">
	<option>Single</option>
	<option>Married</option>
	<option>Widower/Widow</option>
	<option>Livein</option>
	</select> 
	       </div> 
		  

	</div><br><br><br>	<br><br>			   
		   </div>

	<div class = "form-group">



	       <div class="col-sm-5"><div class="form-group" id = "occup-div">	<p><font face = "cambria" size = 4 color = "grey"> Occupation(optional): </font></p>			
	<div class="col-sm-10">
	         <input id="RFName1" class="form-control input-group-lg reg_name" type= text name="occupation" title="Enter first name" onblur= fnValid(this,"occup-div","occup")  <?php if(isset($_POST["occupation"])) echo "value = ".$_POST["occupation"]; ?>>
	       </div> </div>
		  
		   
		   
	</div>




	<div class="form-group" id = "SSS-div">				
	       <div class="col-sm-5">
		   <p><font face = "cambria" size = 4 color = "grey">SSS Number(optional): </font></p>

	         <input id="RFName1" class="form-control input-group-lg reg_name" type= text name="SSS" title="Enter first name"  onblur= fnValid(this,"SSS-div","SSS")  <?php if(isset($_POST["SSS"])) echo "value = ".$_POST["SSS"]; ?>>
	       </div> </div>
		  
		   
		   
	<br><br><br><br><br></div>

	<div class = "form-group">


	<div class="form-group" id = "Tin-div">				
	       <div class="col-sm-5">	<p><font face = "cambria" size = 4 color = "grey">TIN Number(optional): </font></p>
	<div class="col-sm-10">
	         <input id="RFName1" class="form-control input-group-lg reg_name" type= text name="TIN" title="Enter first name" onblur= fnValid(this,"Tin-div","TIN")  <?php if(isset($_POST["TIN"])) echo "value = ".$_POST["TIN"]; ?>> 
	       </div> </div>
		  
		   
		   
	</div>



	<div class="form-group">				
	       <div class="col-sm-5">
	<p><font face = "cambria" size = 4 color = "grey"> Residence: </font></p>
	<select name = "Residence" class = "form-control">
	<option>Rent</option>
	<option>Owned</option>
	</select> 
	        
	       </div> 
		  
		   
		   
	</div></div><br><br><br><br><br>


	<button type = submit  class="btn btn-info" name = "btnsubmit">Submit Record</button>
	<br><br></div>
	<?php
	require('connection.php');

			
	if(isset($_POST['btnsubmit'])){$Hno = $_SESSION['Hno'];
	$Fname = $_POST['Fname'];
	$Mname = "";
	if($_POST['Mname'] == NULL){
	$Mname = "";
	}
	else{$Mname = $_POST['Mname'];}
	$Lname = $_POST['Lname'];
	$Ename = "";
	if($_POST['Ename'] == NULL){
	$Ename = "";
	}
	else{$Ename = $_POST['Ename'];}
	$Gender = $_POST['gend'];
	$Contact = $_POST['contact'];
	$Civil = $_POST['civil'];
	$Birthdate = $_POST['Birthdate'];
	$Occupation = $_POST['occupation'];
	$SSS = "";
	if($_POST['SSS'] == NULL){
	$SSS = "";
	}
	else{$SSS = $_POST['SSS'];}
	$TIN = "";
	if($_POST['TIN'] == NULL){
	$TIN = "";
	}
	else{$TIN = $_POST['TIN'];}
	$Street = $_POST['Street'];
	$Residence = $_POST['Residence'];
	$Old = $_POST['OldAddress'];
	$Building = $_POST['Building'];
	$last = $_POST['hidlname'];
	$first = $_POST['hidfname'];
	$birth = $_POST['hidbday'];

	if($last == 0&&$birth == 0&&$first == 0){
	$_Lname = mysqli_real_escape_string($con,$Lname);
	$_Fname = mysqli_real_escape_string($con,$Fname);
	$_Mname = mysqli_real_escape_string($con,$Mname);

	mysqli_query($con,"INSERT INTO `tblhousehold`( `intForeignStreetId`, `strBuildingNo`, `strHouseholdLname`,`strResidence`,`strOldAddress`,`strStatus`) VALUES ($Street,'$Building','$_Lname','$Residence','$Old','Enabled')");
	$query = mysqli_query($con,"Select Householdno from tblhousehold order by Householdno desc");

	$row = mysqli_fetch_object($query);
	$no = $row->Householdno;

	mysqli_query($con,"INSERT INTO `tblhousemember`( `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`, `strContactNo`, `strOccupation`, `strSSSNo`, `strTINNo`, `intForeignHouseholdNo`,`strCivilStatus`, `strStatus`,`strLifeStatus`,charLiterate,charDisable) 
	VALUES ('$_Fname','$_Mname','$_Lname','$Ename','$Gender','$Birthdate','$Contact','$Occupation','$SSS','$TIN','$no','$Civil','Head','Alive','Y','N')");
	$_SESSION['Hno'] = $no;

	echo "<script>window.location = 'HholdPersonal.php' </script>";

	//mysqli_query($con,"INSERT INTO `tblhousemember`( `FirstName`, `MiddleName`, `LastName`, `NameExtension`, `Gender`, `Birthdate`, `ContactNo`, `Occupation`, `SSSNo`, `TINNo`, `ForeignHouseholdNo`, `CivilStatus`, `Status`, `LifeStatus`) 
	//VALUES ('$_Fname','$_Mname','$_Lname','$Ename','$Gend','$bday','$contact','$occup','$SSS','$TIN','$Hno','$civil','Spouse','Alive')");
	//echo "<script>window.location = 'HholdPersonal.php'</script>";
	}
	else{

	echo "<script>alert('Please input valid values!');</script>";
	}
	}




	?>
	</form>
	             </center>      
	                </div>
			
		</section><! --/wrapper -->
	  </section><!-- /MAIN CONTENT -->

	  <!--main content end-->
	  
	</section>

	<!-- js placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery-3.1.0.min.js"></script>
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
	function getId(val){
	// alert(val);
	$.ajax({
		type: "POST",
		url: "getdata.php",
		data: "zid="+val,
		success: function(data){
			alert(data);
			$("#StreetList").html(data);
		}
		
	});
	}
	  //custom select box

	  $(function(){
	      $('select.styled').customSelect();
	  });

	</script>

	</body>
	</html>
