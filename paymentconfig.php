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

	$intFixed =1;
	
	switch($intFixed){
		case 1:
			$resfee = $resfee;
			$hours = $hours;
			
		break;
		
		case 2:
			$resfee = $resfee + 50.00;
			$hours = $hours;
			
		break;
		
		default;
	}	
	
					
?>