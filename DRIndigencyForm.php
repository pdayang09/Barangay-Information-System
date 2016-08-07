<?php
	session_start();
	// Retrieve Personal Data -->
	//$_SESSION[''];
	//$_SESSION[''];
	//$_SESSION[''];
	
	$indPurpose = "";
	require('connection.php');
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if(empty($_POST["indPurpose"])) {
				$indPurpose= "Purpose can't be blank.";
			}else
			{
				$indPurpose = test_input($_POST["indPurpose"]);
			} 
		}
	$PurposeSQL = "SELECT strDocPurposeID, strPurposeName FROM tbldocumentpurpose ";
	$PurposeResult = mysqli_query($conn, $PurposeSQL);
	$RequestSQL = "SELECT FirstName, MiddleName, LastName, NameExtension from tblhousemember where ForeignHouseholdNo = '1'";
	$RequestResult = mysqli_query($conn, $RequestSQL);
	if(isset($_POST['btnSubmit']))
	{
		$indPurpose = $_POST["indPurpose"];
		echo $indPurpose;
	}
	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}//function
	mysqli_close($conn);
?>
<p>Certificate of Indigency</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	Name: <input name="name" type="text" /> <br /><br /> 
	Address: <input name="name" type="text" /><br /><br />
	<?php echo "Requested by:<select name='requestedBy'>";
		echo "<option selected='selected' value=''>Select Family Member";
		if ($RequestResult->num_rows > 0)
		{
			// output data of each row
			while($row = $RequestResult->fetch_assoc()) {
				$fullName = $row["FirstName"].' '.$row["MiddleName"].' '.$row["LastName"].' '.$row['NameExtension'];
				echo "<option value='$fullName'>$fullName";
			}
		}
		echo "</select><br /><br />";
		//if($fullName == ['name]')
		while($row = mysqli_fetch_row($PurposeResult)){
			echo "Purpose: <input type='radio' name='indPurpose' value='$row[1]'/> $row[1]";
			}
			echo "<input type='radio' name='indPurpose'> Other: <input type='text' name='otherPurposeTxt' value=''/>";?>
		<span class='error'> <?php echo $indPurpose;?></span>
		<br /><br />
	<input name="btnSubmit" type="submit" value="Process" /><br /><br />
 </form>