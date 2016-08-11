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
	$time1temp = new StrToTime("11:00");
	$time2temp = StrToTime("15:00");
	$date1 = StrToTime"2014-01-10");
	$date2 = new DateTime("2014-01-13");

	$start = new DateTime("18:00");
	$end = new DateTime("24:00");

	$maxperday = $end->diff($start)->format("%h");
	$full_day_hours = ($date2->diff($date1)->format("%a")-1)*$maxperday;
	$first_day_hours = min($maxperday,max(0,$end->diff($time1temp)->format("%h")));
	$last_day_hours = min($maxperday,max(0,$time2temp->diff($start)->format("%h")));

	$Nhours = $first_day_hours + $full_day_hours + $last_day_hours;
	
	echo "<script> alert('$time1temp $time2temp, $start, $end, $diffnight'); </script>";
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