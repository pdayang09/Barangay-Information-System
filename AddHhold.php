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
function empty() {
   
	var y = document.getElementById("StreetList").value;
	var lname  =document.getElementById("hidlname").value;
	var fname = document.getElementById("hidfname").value;
	var age = getAge(document.getElementById('bday').value);
	var entered = getAge(document.getElementById('Entered').value);
	
    if ( y == "Street Name" || lname == 1 || fname == 1 || age<18 ) {
        alert("Please Make sure the form is filled out correctly");
        return false;
    }
}
function getAge(birthDateString) {
	//alert(birthDateString);
    var today = new Date();
    var birthDate = new Date(birthDateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
	//alert(age);
    return age;
}

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
var age = getAge(document.getElementById('bday').value);
	            if ((obj.value.trim() == "") || (obj.value <= 0) || age<18){  
	         
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
	      <section class="wrapper site-min-height">			 
		
			
			
			
	<legend ><font face = "cambria" size = 8 color = "grey"> Resident Module </font></legend>
	<button  class="btn btn-info" onclick="window.location.href='Hholdview.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button><legend></legend>
	<div class = "showback">
	<legend ><p><font face = "cambria" size = 5 color = "grey"> General Information </font></p></legend >

<form method = POST enctype = "multipart/form-data">

	Upload an Image:<br>
					<input type = "file" name = "image"id="imgInp">
        <img id="blah" height = 250 width = 250 src="#" alt="your image" />
		<br>
	
	  <input id = "hidfname" name="hidfname" class="form-control" type="hidden"  <?php if(isset($_POST["hidfname"])) echo "value = ".$_POST["hidfname"]; ?>>
			<input id = "hidlname" name="hidlname" class="form-control" type="hidden" <?php if(isset($_POST["hidlname"])) echo "value = ".$_POST["hidlname"]; ?>>
			<input id = "hidbday" name="hidbday" class="form-control" type="hidden" <?php if(isset($_POST["hidbday"])) echo "value = ".$_POST["hidbday"]; ?>>
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

	         <input id="RFName1" class="form-control input-group-lg reg_name" type= text name="OldAddress" title="Enter first name" required <?php if(isset($_POST["OldAddress"])){ echo "value = '".$_POST["OldAddress"]."'";}
																																								else{"value = ' '";} ?> >
	       </div> 
		  
		   
		   
	</div><br><br><br>


	<p><font face = "cambria" size = 4 color = "grey"> New Address: </font></p>
	<div class="form-group">				
 

		<div class="col-sm-5">

	         <input id="FName" class="form-control input-group-lg reg_name" type="text" name="Building" title="Enter first name" placeholder="Building Number" required <?php if(isset($_POST["Building"])) echo "value = ".$_POST["Building"]; ?> >
	       </div> 
	       


		   <div class="col-sm-5"> 	
	        
			<select  name = "Street" id = "StreetList" class="form-control"  >
			<option> Street Name</option>
			<?php require('connection.php');
			$sql = "Select * from tblStreet group by strPurok";
			$sql1 = mysqli_query($con,$sql);
			while($row = mysqli_fetch_object($sql1)){
				?> <option  <?php echo "value = '".$row->intStreetId."'";?>> <?php echo $row->strStreetName." ".$row->strPurok;?></option><?php
			}?>
			</select>
		

			
		 
		     
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
	         <input required id="bday" class="form-control input-group-lg reg_name" type= date name="Birthdate"   max="<?php echo date("Y-m-d"); ?>"title="Enter first name"  onblur= fnValidDate(this,"bday-div","Birthdate") <?php if(isset($_POST["Birthdate"])) echo "value = ".$_POST["Birthdate"]; ?>>
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

<div class="form-group" id = "Vote-div">				
	       <div class="col-sm-5">
		   <p><font face = "cambria" size = 4 color = "grey">Voter's ID(optional): </font></p>

	         <input id="RFName1" class="form-control input-group-lg reg_name" type= text name="Vote" title="Enter first name"  onblur= fnValid(this,"SSS-div","SSS")  <?php if(isset($_POST["Vote"])) echo "value = ".$_POST["Vote"]; ?>>
	       </div> </div>

	
		  
		   
		   
	</div></div><br><br><br><br><br>

<div class="form-group">				
 <div class="col-sm-5">	<p><font face = "cambria" size = 4 color = "grey"> Residence: </font></p>
	<div class="col-sm-10">	
	<select name = "Residence" class = "form-control">
	<option>Rent</option>
	<option>Owned</option>
	</select> 
	        
	       </div> </div>


	
	
<div class="form-group" id = "Enter-div">				
	       <div class="col-sm-5">
		   <p><font face = "cambria" size = 4 color = "grey">Date Entered:</font></p>

	         <input required id="Entered" class="form-control input-group-lg reg_name" type= date name="DateEntered"   max="<?php echo date("Y-m-d"); ?>" onblur= fnValidDate(this,"Enter-div","DateEntered") <?php if(isset($_POST["DateEntered"])) {echo "value = ".$_POST["DateEntered"];} else{echo "value = ".date("Y-m-d"); }?>>
	       </div> </div>
	
	
	
	<br><br></div><br><br><br><br></div>	<center><button type = submit  class="btn btn-info" name = "btnsubmit" onClick="return empty()">Submit Record</button></center>
	<?php
	require('connection.php');

			
	if(isset($_POST['btnsubmit'])){
	$Entered = $_POST['DateEntered'];
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
	$age = (date("Y-m-d") - $Birthdate);
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
	$Vote = "";
	if($_POST['Vote'] == NULL){
	$Vote = "";
	}
	else{$Vote= $_POST['Vote'];}
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

$dt = $_Fname.' '.$_Mname.' '.$_Lname.' '.$Ename.'-'.$Birthdate;
$dt = stripslashes($dt);
$dt = str_replace("'", '', $dt);
	if(getimagesize($_FILES['image']['tmp_name']) == FALSE){

$mysqli = mysqli_query($con,"INSERT INTO `tblhousehold`( `intForeignStreetId`, `strBuildingNo`, `strHouseholdLname`,`strResidence`,`strOldAddress`,`strStatus`) VALUES ($Street,'$Building','$_Lname','$Residence','$Old','Enabled')");
echo("Error description: " . mysqli_error($con));
	$query = mysqli_query($con,"Select intHouseholdNo from tblhousehold order by intHouseholdNo desc");

	$row = mysqli_fetch_object($query);
	$no = $row->intHouseholdNo;
	
	mysqli_query($con,"INSERT INTO `tblhousemember`( `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`, `strContactNo`, `strOccupation`, `strSSSNo`, `strTINNo`, `intForeignHouseholdNo`,`strCivilStatus`, `strStatus`,`strLifeStatus`,charLiterate,charDisable, `strVotersId`,`dtEntered`) 
	VALUES ('$_Fname','$_Mname','$_Lname','$Ename','$Gender','$Birthdate','$Contact','$Occupation','$SSS','$TIN','$no','$Civil','Head','Alive','Y','N','$Vote','$Entered')");
	$_SESSION['Hno'] = $no;

	echo "<script>window.location = 'HholdPersonal.php'</script>";
	
	/*mysqli_query($con,"INSERT INTO `tblhousemember`( `FirstName`, `MiddleName`, `LastName`, `NameExtension`, `Gender`, `Birthdate`, `ContactNo`, `Occupation`, `SSSNo`, `TINNo`, `ForeignHouseholdNo`, `CivilStatus`, `Status`, `LifeStatus`) 
	VALUES ('$_Fname','$_Mname','$_Lname','$Ename','$Gend','$bday','$contact','$occup','$SSS','$TIN','$Hno','$civil','Spouse','Alive')");
	echo "<script>window.location = 'HholdPersonal.php'</script>";*/
	

}
else{
	
$mysqli = mysqli_query($con,"INSERT INTO `tblhousehold`( `intForeignStreetId`, `strBuildingNo`, `strHouseholdLname`,`strResidence`,`strOldAddress`,`strStatus`) VALUES ($Street,'$Building','$_Lname','$Residence','$Old','Enabled')");

	$query = mysqli_query($con,"Select intHouseholdNo from tblhousehold order by intHouseholdNo desc");

	$row = mysqli_fetch_object($query);
	$no = $row->intHouseholdNo;
	
					$info = pathinfo($_FILES['image']['name']);
	 		 	 	 $ext = $info['extension']; // get the extension of the file(filename)
			     	 $newname = "$dt.".$ext;
					 $target = 'Images/BarangayPics/'.$newname;
	mysqli_query($con,"INSERT INTO `tblhousemember`( `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`, `strContactNo`, `strOccupation`, `strSSSNo`, `strTINNo`, `intForeignHouseholdNo`,`strCivilStatus`, `strStatus`,`strLifeStatus`,charLiterate,charDisable, `strVotersId`,`dtEntered`,`strImage`) 
	VALUES ('$_Fname','$_Mname','$_Lname','$Ename','$Gender','$Birthdate','$Contact','$Occupation','$SSS','$TIN','$no','$Civil','Head','Alive','Y','N','$Vote','$Entered','$target')");
	move_uploaded_file( $_FILES['image']['tmp_name'], $target);
	$_SESSION['Hno'] = $no;
	echo "<script>window.location = 'HholdPersonal.php'</script>";


	
}


	
	
	
	
	
	
	
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

	  //custom select box
function readURL(input) {
  	if (input.files && input.files[0]) {
  		var reader = new FileReader();
  		
  		reader.onload = function (e) {
  			$('#blah').attr('src', e.target.result);
  		}
  		
  		reader.readAsDataURL(input.files[0]);
  	}
  }

  $("#imgInp").change(function(){
  	readURL(this);
  });
	  $(function(){
	      $('select.styled').customSelect();
	  });

	</script>

	</body>
	</html>
