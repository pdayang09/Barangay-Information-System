 <?php session_start();?>
<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
	  
    <script>
	function empty() {
   
	var lname  =document.getElementById("hidlname").value;
	var fname = document.getElementById("hidfname").value;
	var age = getAge(document.getElementById('bday').value);

    if ( lname == 1 || fname == 1 || age<18) {
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
			var pattern = new RegExp(/[~`!#$%\^&*+=[\]\\;,/{}|\\":<>\?]/);
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
                if ((obj.value.trim() == "") || (obj.value <= 0) || age<18 ){  
             
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
          <section class="wrapper site-min-height">		<form method = POST>
		 <input id = "hidfname" name="hidfname" class="form-control" type="hidden"  <?php if(isset($_POST["hidfname"])) echo "value = ".$_POST["hidfname"]; ?>>
 <input id = "hidlname" name="hidlname" class="form-control" type="hidden" <?php if(isset($_POST["hidlname"])) echo "value = ".$_POST["hidlname"]; ?>>
 <input id = "hidbday" name="hidbday" class="form-control" type="hidden" <?php if(isset($_POST["hidbday"])) echo "value = ".$_POST["hidbday"]; ?>>
</form>
<legend ><font face = "cambria" size = 8 color = "grey"> Resident Module </font></legend>
<button  class="btn btn-info" onclick="window.location.href='Hholdpersonal.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
	<br>
	<br><div class = "showback">
<legend ><p><font face = "cambria" size = 5 color = "grey"> Add Spouse </font></p></legend >

	<form method = POST>


<p><font face = "cambria" size = 4 color = "grey"> Spouse Name: </font></p>
	<div class="form-group">		
<div class="col-sm-3">
				<div class="form-group " id = "fname-div">	
             <input name="Fname"  class="form-control" type="text" placeholder="First name" onblur= fnFirstn(this,"fname-div","Fname") <?php if(isset($_POST["Fname"])) echo "value = ".$_POST["Fname"]; ?> required >
			 </div>
           </div> 
		   <div class="col-sm-3">
		 <div class="form-group " id = "mname-div">	
             <input id="MName" class="form-control input-group-lg reg_name" type="text" name= "Mname" title="Enter middle name" placeholder="Middle name"  onblur= fnMiddletn(this,"mname-div","contactno") <?php if(isset($_POST["Mname"])) echo "value = ".$_POST["Mname"]; ?> >
			 </div>
           </div><div class="col-sm-3">
		<div class="form-group " id = "lname-div">	
             <input id="LName" class="form-control input-group-lg reg_name" type="text" name= "Lname" title="Enter last name" placeholder="Last name" <?php if(isset($_POST["Lname"])) echo "value = ".$_POST["Lname"]; ?>  onblur= fnLastn(this,"lname-div","Lname") required >
			 </div>
           </div>
		   
		      <div class="col-sm-1">
		<div class="form-group " id = "ename-div">	
             <input id="EName" class="form-control input-group-lg reg_name" type="text" name= "Ename" title="name extension(Optional)" placeholder="name extension(Optional)"  onblur= fnValid(this,"ename-div","contactno") <?php if(isset($_POST["Ename"])) echo "value = ".$_POST["Ename"]; ?>  >
           </div>
		   </div>
	</div><br><br><br>	


<div class = "form-group">
<div class="col-sm-5" required>
<p><font face = "cambria" size = 4 color = "grey"> Gender: </font></p>
<input type = radio value = "Male" name = "gend" checked> Male
<input type = radio value = "Female" name = "gend"> Female

           </div> 
	


	<div class="form-group" id = "bday-div">				
           <div class="col-sm-5">
<p><font face = "cambria" size =4 color = "grey"> Birthday </font></p>
             <input required id="bday" class="form-control input-group-lg reg_name" type= date name="bday"  max="<?php echo date("Y-m-d"); ?>" title="Enter first name"  onblur= fnValidDate(this,"bday-div","bday") <?php if(isset($_POST["bday"])) echo "value = '".$_POST["bday"]."'"; ?>>
           </div> 
		  
		   
		   
	</div><br><br><br><br><br></div><div class = "form-group">


<div class="form-group" id = "contact-div">		
 <div class="col-sm-5">		<p><font face = "cambria" size = 4 color = "grey"> Contact Number (Optional): </font></p>
           <div class="col-sm-10">
	
             <input id="RFName1" class="form-control input-group-lg reg_name" type= text name="contactno" title="Enter first name" maxlength = 11 onblur= fnValid(this,"contact-div","contactno")  <?php if(isset($_POST["contactno"])) echo "value = ".$_POST["contactno"]; ?>> 
           </div> </div>
		  
		   
		   
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
		  
		   
		   
	</div><br><br><br><br><br></div>
	<div class = "form-group">
	

<div class="form-group" id = "occup-div">				
           <div class="col-sm-5">
<p><font face = "cambria" size = 4 color = "grey"> Occupation(optional): </font></p>
 <div class="col-sm-10">
             <input id="RFName1" class="form-control input-group-lg reg_name" type= text name="occup" title="Enter first name" onblur= fnValid(this,"occup-div","occup")  <?php if(isset($_POST["occup"])) echo "value = ".$_POST["occup"]; ?>>
           </div></div> 
		  
		   
		   
	</div>



<div class="form-group" id = "SSS-div">				
           <div class="col-sm-5">

	<p><font face = "cambria" size = 4 color = "grey">SSS Number(optional): </font></p>
             <input id="RFName1" class="form-control input-group-lg reg_name" type= text name="SSS" title="Enter first name"  onblur= fnValid(this,"SSS-div","SSS")  <?php if(isset($_POST["SSS"])) echo "value = ".$_POST["SSS"]; ?>>
           </div> 
		  
		   
		   
	</div><br><br><br><br><br></div>
<div class="form-group" >


<div class="form-group" id = "Tin-div">				
           <div class="col-sm-5">

	<p><font face = "cambria" size = 4 color = "grey">TIN Number(optional): </font></p>
	 <div class="col-sm-10">
             <input id="RFName1" class="form-control input-group-lg reg_name" type= text name="TIN" title="Enter first name" onblur= fnValid(this,"Tin-div","TIN")  <?php if(isset($_POST["TIN"])) echo "value = ".$_POST["TIN"]; ?>> 
           </div> </div>
		  
		   
		   
	</div>
<div class="form-group" id = "Voter-div">				
           <div class="col-sm-5">

	<p><font face = "cambria" size = 4 color = "grey">Voter's ID(optional): </font></p>
             <input id="RFName1" class="form-control input-group-lg reg_name" type= text name="Vote" title="Enter first name"  onblur= fnValid(this,"Voter-div","Vote")  <?php if(isset($_POST["Vote"])) echo "value = ".$_POST["Vote"]; ?>>
           </div> 
		  
		   
		   
	</div><br><br><br><br><br></div>
		  <div class = "form-group">


<div class="form-group" id = "Enter-div">				
           <div class="col-sm-5">
	<p><font face = "cambria" size = 4 color = "grey"> Date Entered: </font></p><div class="col-sm-10">
            <input required id="Entered" class="form-control input-group-lg reg_name" type= date name="DateEntered"   max="<?php echo date("Y-m-d"); ?>" onblur= fnValidDate(this,"Enter-div","DateEntered") <?php  if(isset($_POST["DateEntered"])) {echo "value = ".$_POST["DateEntered"];} else{echo "value = ".date("Y-m-d"); } ?>>
           </div> 
		  </div>
		   
		   
	</div>


		   
		   
	</div><br><br><br><br><br><br>

		  <center>
<button type = submit  class="btn btn-info" name = "subm" onclick = "return empty()"> Submit Record</button></center>
<br><br></div>
<?php

require('connection.php');

if(isset($_POST['subm'])){
$Entered = $_POST['DateEntered'];
$Hno = $_SESSION['Hno'];
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
$Gend = $_POST['gend'];
$contact = $_POST['contactno'];
$bday = $_POST['bday'];
    $age = (date("Y-m-d") - $bday);
$occup = $_POST['occup'];
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
if($age>=18)
{$civil = $_POST['civil'];
	$last = $_POST['hidlname'];
	$first = $_POST['hidfname'];
	$birth = $_POST['hidbday'];
if($last == 0&&$birth == 0&&$first == 0){
$_Lname = mysqli_real_escape_string($con,$Lname);
$_Fname = mysqli_real_escape_string($con,$Fname);
$_Mname = mysqli_real_escape_string($con,$Mname);
mysqli_query($con,"INSERT INTO `tblhousemember`( `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`, `strContactNo`, `strOccupation`, `strSSSNo`, `strTINNo`, `intForeignHouseholdNo`, `strCivilStatus`, `strStatus`, `strLifeStatus`,`strVotersId`,`dtEntered`) 
VALUES ('$_Fname','$_Mname','$_Lname','$Ename','$Gend','$bday','$contact','$occup','$SSS','$TIN','$Hno','$civil','Spouse','Alive','$Vote','$Entered')");
echo "<script>window.location = 'HholdPersonal.php'</script>";}


else{
	
	echo "<script>alert('Please input valid values!');</script>";
}}else{
	echo "<script>alert('Date must be 18 and Above!');</script>";
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
