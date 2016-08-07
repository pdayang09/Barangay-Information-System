<?php
	session_start();
	// Retrieve Personal Data -->
	//$name = "Jan Philip Ala";
	//$add = "Pinagbuhatan, Pasig";
	$name = $_SESSION['contactno'];
	$add = $_SESSION['place'];
	$resId = $_SESSION['resId'];
	//$appId = $_SESSION['appId'];
	$doc = "Certification";
	
	require('connection.php');
	$certiPurpose = $certiPurposeErr = "";
	$certiSQL = "SELECT strDocPurposeID, strPurposeName from tbldocumentpurpose where strDocID = '1'";
	$certiResult = mysqli_query($con, $certiSQL);
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["certiPurpose"])) {
		$certiPurposeErr = "*Purpose can't be blank.";
	} else
		{
			$certiPurpose = test_input($_POST["certiPurpose"]);
		}
	}//if
	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}//function
?>
<p>Barangay Certification</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	<?php
	echo "Name: <input disabled='disabled' name='name' type='text' value='$name'/><br /><br />";
	echo "Address: <input disabled='disabled' name='name' type='text' value='$add'/><br /><br />";
	echo "Purpose:";
		while($row = mysqli_fetch_row($certiResult)){
			echo "<input type='radio' name='certiPurpose' value='$row[1]'/>$row[1]";
			}
			echo "<input type='radio' name='certiPurpose' onclick='enableDisable(this.checked, 'otherPurposeTxt')'> Other: <input type='text' id='idotherPurpose' name='otherPurposeTxt' value='' disabled/>";
			echo "</select><br /><br />";
	?>
	<input name="submit" type="submit" value="Process" /><br /><br /> <br /><br />
	 <script language="javascript">
    function enableDisable(bEnable, idotherPurpose)
    {
         document.getElementById(idotherPurpose).disabled = bEnable
    }
	</script><br /><br /> 
 </form>
 
 <?php
	if(isset($_POST['submit']))
		{
			$_SESSION['name'] = $name;
			$_SESSION['add'] = $add;
			echo "<script> window.location = 'session.php';</script>";
		}
 ?>