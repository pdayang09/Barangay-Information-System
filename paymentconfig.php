<?php
require("connection.php");

switch($residency){

	case 1:	
		$resfee = $_SESSION['dayresfee'];	
	break;
	
	case 2:
		$resfee = $_SESSION['dayresfee'] + $_SESSION['NResidentCharge'];;
	break;
	
	default;
	//intFixed =0;
	//$query = mysqli_query($con, "select `dblFaciDayCharge`, `dblFaciNightCharge`, `dblFaciDiscount`, `strFaciNo` from tblFacility where `strFaciName` = '$resFacility'");
								
	//while($row = mysqli_fetch_row($query)){ CHANGE QUERY GET DATA FROM UTILITY
	
	//}
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