<?php
require("connection.php");

if($_SESSION['resFacilityFlag'] == 0){

	$_SESSION['dayresfee'] = "";
	$_SESSION['NResidentCharge'] = "";
	$_SESSION['resFacility'] = "";
	$_SESSION['resFacName'] = "";
}else{
	
}

switch($residency){

	case 1:	
		$resfee = $_SESSION['dayresfee'];	
	break;
	
	case 2:
		$resfee = $_SESSION['dayresfee'] + $_SESSION['NResidentCharge'];
	break;
	
	default;
}


if($hours1 <= 0){
	$resfeeTemp = $resfee;	
	$resfee = $resfee * $hours;

	$diffTemp = $hours;
	$hours1 =0;

}else if($hours1 > 0){
	$resfeeTemp = $resfee;
	$resfee  = $resfee * $hours;
	$resfee = $resfee + $_SESSION['nightresfee']*$hours1;

	$diffTemp = $hours-$hours1;
}

//echo"<script> alert('$resfee');</script>";
					
?>