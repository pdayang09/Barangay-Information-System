<?php
require("connection.php");

switch($residency){

	case 1:	
		$resfee = $dayresfee;	
	break;
	
	case 2:
		$resfee = $discount;
	break;
	
	default;
	//intFixed =0;
	//$query = mysqli_query($con, "select `dblFaciDayCharge`, `dblFaciNightCharge`, `dblFaciDiscount`, `strFaciNo` from tblFacility where `strFaciName` = '$resFacility'");
								
	//while($row = mysqli_fetch_row($query)){ CHANGE QUERY GET DATA FROM UTILITY
	
	//}
}	

	$intFixed =1;
	$night = StrToTime ('18:00');
	$diffnight = $night - $time2;
	$nighthours = $diffnight/60;
	$nighttemp = -1 * $nighthours;
	$nighthours1 = round(($hours - $nighttemp)/10000, 0, PHP_ROUND_HALF_UP);
	echo "<script> alert('$night $diffnight $nighthours $nighttemp $nighthours1 $hours'); </script>";
	echo "<script> alert('$time1 $time2'); </script>";
	
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