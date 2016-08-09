 <?php session_start();?>
<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  


      <!--main content start-->

      <section id="main-content">
          <section class="wrapper site-min-height">		
<legend ><font face = "cambria" size = 8 color = "grey"> Resident Module </font></legend>

<button  class="btn btn-info" onclick="window.location.href='Hholdview.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
<br>
<br>
<form method = POST>
<div class="showback"">     
<?php
require('connection.php');
$Hno = $_SESSION['Hno'];
$sql = "SELECT * from tblhousemember where intForeignHouseholdNo = '$Hno' AND strStatus = 'Head'";
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
if($row->strMiddleName == NULL){
	
}
else{
	$Mid = $row->strMiddleName;
}

if($row->strNameExtension == NULL){
	
}
else{
	$Ext = $row->strNameExtension;
}

echo "Head of Household: ".$row->strLastName.",".$row->strFirstName." ".$Mid." ".$Ext?><button type = submit  class="btn btn-info"  style="float: right; margin-right: 5cm;" value = <?php echo $row->intMemberNo?> name = 'Edit' >Edit Head Detail</button><br><?php
echo "Gender: ".$Gend."<br>";
echo "Date of Birth: ".$row->dtBirthdate."<br>";
echo "Contact Number: ".$row->strContactNo."<br>";
echo "Occupation: ".$row->strOccupation."<br>";
echo "SSS Number: ".$row->strSSSNo."<br>";
echo "TIN Number: ".$row->strTINNo."<br>";

?>
<br><br>
<a class="btn btn-info btn-sm" href = 'AddSpouse.php' <?php
$sql = "Select * from tblhousemember where intForeignHouseholdNo = '$Hno' AND strStatus = 'spouse' AND strLifeStatus = 'Alive' Order by intMemberNo desc";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($query);
if($row>0){echo "disabled";}
else{}
?>>Add Spouse</a>
<a class="btn btn-info btn-sm" data-toggle="tooltip" title="Hooray!" href = 'AddChildren.php'>Add Children</a>
<a class="btn btn-info btn-sm" href = 'AddOther.php'>Add Other Member of the Household</a>
</div>
<br>
  <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
   <div class="showback">                            
<h4>Member/s of the Household</h4>

<table class="table table-striped table-bordered table-hover" border = '2' style = 'width:95%'>
<tr>
<th>Name</th>
<th>Gender</th>
<th>Relation to the Owner</th>
<th>Action</th>
</tr>
<?php
					require('connection.php');
				$sql = "SELECT concat(strLastname,',',strFirstname,' ',strMiddleName,' ',strNameExtension) as 'Name',charGender,strStatus,intMemberNo FROM `tblhousemember` where intForeignHouseholdNo = '$Hno' AND (strLifeStatus  NOT LIKE 'Moved' AND strLifeStatus NOT LIKE 'Dead') AND (strStatus LIKE 'Spouse' OR strStatus LIKE 'Children')";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
			
					while($row = mysqli_fetch_object($query)){
						$Gend = "";
						if($row->charGender == 'F'){
							$Gend = "Female";
						}
						else{
							$Gend = "Male";
						}?>
					<tr> <td><?php echo $row->Name?></td>
					<td><?php echo $Gend?></td>
					<td><?php echo $row->strStatus?></td>
					
					<td>
					<div class="btn-group " role="group" aria-label="..." >	
					<div class="btn-group" role="group"> 
					<button class="btn btn-primary btn-sm" type = submit  value = <?php echo $row->intMemberNo?>  name = 'View' >View</button>
					</div>	
					<div class="btn-group" role="group"> 
					<button class="btn btn-success btn-sm" type = submit value = <?php echo $row->intMemberNo?> onClick="return confirm(
  'Do you really want to perform this action?');" name = 'Move' >Remove</button>
					</div>	
					<div class="btn-group" role="group">
					<button class="btn btn-success btn-sm" type = submit  value = <?php echo $row->intMemberNo?> name = 'Transfer' >Transfer</button>
					</div>	
					<div class="btn-group" role="group">
					<button class="btn btn-success btn-sm" type = submit value = <?php echo $row->intMemberNo?> name = 'Deceased' >Deceased</button>
					</div>
					<div class="btn-group" role="group">
					<button  class="btn btn-success btn-sm"type = submit value = <?php echo $row->intMemberNo?> onClick="return confirm(
  'Do you really want to perform this action?');" name = 'Edit' >Edit</button>
					</div></div></td>
					

					</tr>
				<?php }}?>

</table>
</div>
<br>
   <div class="showback"">                         
<h4>Other Member/s of the Household</h4>
<table class="table table-striped table-bordered table-hover" border = '2' style = 'width:95%'>
<tr>
<th>Name</th>
<th>Gender</th>
<th>Relation to the Owner</th>
<th>Action</th>
</tr>
<?php
					require('connection.php');
				$sql = "SELECT concat(strLastname,',',strFirstname,' ',strMiddleName,' ',strNameExtension) as 'Name',charGender,strStatus,intMemberNo FROM `tblhousemember` where intForeignHouseholdNo = '$Hno' AND strLifeStatus  NOT LIKE 'Moved' AND strStatus NOT LIKE 'Head' AND (strStatus NOT LIKE 'Spouse' AND strStatus NOT LIKE 'Children')";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
			
					while($row = mysqli_fetch_object($query)){
						$Gend = "";
						if($row->charGender == 'F'){
							$Gend = "Female";
						}
						else{
							$Gend = "Male";
						}?>
					<tr> <td><?php echo $row->Name?></td>
					<td><?php echo $Gend?></td>
					<td><?php echo $row->strStatus?></td>
					<td><div class="btn-group " role="group" aria-label="..." >	
					<div class="btn-group" role="group"> 
					<button class="btn btn-primary btn-sm" type = submit value = <?php echo $row->intMemberNo?> name = 'View' >View</button>
					</div>	
					<div class="btn-group" role="group"> 
					<button class="btn btn-success btn-sm" type = submit value = <?php echo $row->intMemberNo?> onClick="return confirm(
  'Do you really want to perform this action?');" name = 'Move' >Remove</button>
					</div>	
					<div class="btn-group" role="group">
					<button class="btn btn-success btn-sm" type = submit  value = <?php echo $row->intMemberNo?> name = 'Transfer' >Transfer</button>
					</div>	
					<div class="btn-group" role="group">
					<button class="btn btn-success btn-sm" type = submit value = <?php echo $row->intMemberNo?> onClick="return confirm(
  'Do you really want to perform this action?');" name = 'Deceased' >Deceased</button>
					</div>
					<div class="btn-group" role="group">
					<button  class="btn btn-success btn-sm" type = submit value = <?php echo $row->intMemberNo?> name = 'Edit' >Edit</button>
					</div></div></td>

					</tr>
				<?php }}
				
				if(isset($_POST['View'])){
					$_SESSION['Memb']=$_POST['View'];
					echo "<script>window.location = 'Memberview.php';</script>";
				}
				if(isset($_POST['Deceased'])){
					$m = $_POST['Deceased'];
					mysqli_query($con,"UPDATE `tblhousemember` SET `strLifeStatus`= 'Dead' WHERE `intMemberNo` = $m");
					echo "<script>window.location = 'HholdPersonal.php'</script>";
					
				}
				if(isset($_POST['Move'])){
					$m = $_POST['Move'];
					mysqli_query($con,"Delete from tblhousemember where `intMemberNo` = $m");
					echo "<script>window.location = 'HholdPersonal.php'</script>";
					
				}
								if(isset($_POST['Transfer'])){
					$_SESSION['Memb']=$_POST['Transfer'];
					echo "<script>window.location = 'TransM.php';</script>";
				}
						if(isset($_POST['Edit'])){
					$_SESSION['Memb']=$_POST['Edit'];
					echo "<script>window.location = 'EditChildren.php';</script>";
				}
				?>

</table></div>
</form>
                   
                    </div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
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
