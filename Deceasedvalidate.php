<script>
function checkdied(){
	var died = document.getElementById('dtdied').value;
	
    if (died == "") {
        alert("Please Make sure the form is filled out correctly");
        return false;
    }
	else{
		var a = confirm('Do you really want to continue?');
		if(a==true){
			return true;
		}
		else{
			return false;
		}
	}
}
</script>

<!-- Modal -->
<div id="DeceasedModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form method = POST>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">You are about to declare this person deceased:</h4>
      </div>
      <div class="modal-body" id = "Decease">
    
      </div>
      <div class="modal-footer">
      
      </div>
    </div>

  </div>
</div></form>
<?php if(isset($_POST['dec'])){
		$date = $_POST['dtdied'];
		$m = $_POST['dec'];
				//echo "<script>alert('$m');</script>";
		mysqli_query($con,"INSERT INTO `tbldeceased`( `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`, `dtDied`) Select `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`,'$date' from tblhousemember as a where a.intMemberNo = '$m'");
		mysqli_query($con,"Delete from tblhousemember where `intMemberNo` = $m");
		echo "<script>window.location = 'HholdPersonal.php'</script>";
		
	}
	else  if(isset($_POST['Headdec'])){
		$date = $_POST['dtdied'];
		$m = $_POST['Headdec'];
		$new = $_POST['NewHead'];
		$hno1 = $_POST['question'];
				if(isset($_POST['question'])){
						mysqli_query($con,"INSERT INTO `tbldeceased`( `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`, `dtDied`) Select `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`,'$date' from tblhousemember as a where a.intMemberNo = '$m'");
				mysqli_query($con,"Delete from tblhousemember where `intMemberNo` = $m");
				mysqli_query($con,"Update tblhousemember set strStatus = 'Head' where intMemberNo = '$new'");
					$sql = mysqli_query($con, "Select * from tblhousemember where intMemberNo = '$new'");
					$row = mysqli_fetch_object($sql);
					$newlast = $row->strLastName;
				
					mysqli_query($con,"Update tblhousehold set strHouseholdLname = '$newlast' where intHouseholdNo = '$hno1'");
					echo "<script>alert('$hno1')
					window.location = 'HholdPersonal.php'</script>;";
				}
				else{
					//echo "<script>alert('$new');</script>";
					mysqli_query($con,"INSERT INTO `tbldeceased`( `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`, `dtDied`) Select `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`,'$date' from tblhousemember as a where a.intMemberNo = '$m'");
					mysqli_query($con,"Delete from tblhousemember where `intMemberNo` = $m");
					mysqli_query($con,"Update tblhousemember set strStatus = 'Head' where intMemberNo = '$new'");
				echo "<script>window.location = 'HholdPersonal.php'</script>";
				}
				//echo "<script>alert('$m');</script>";
		//mysqli_query($con,"INSERT INTO `tbldeceased`( `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`, `dtDied`) Select `strFirstName`, `strMiddleName`, `strLastName`, `strNameExtension`, `charGender`, `dtBirthdate`,'$date' from tblhousemember as a where a.intMemberNo = '$m'");
		//mysqli_query($con,"Delete from tblhousemember where `intMemberNo` = $m");
		//echo "<script>window.location = 'HholdPersonal.php'</script>";
		
	}?>