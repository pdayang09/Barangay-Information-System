<?php

	$holidays[] = array();
	$arrDisabledDates[] = array();
	$arrEvent[] = array();
                
    //$arrEvent = [''];
	//$_SESSION['arrTemp'] = [''];
	//$_SESSION['arrSave'] = [''];

	//DISABLED DATES
	require("connection.php");
	$statement = "SELECT `Date`, `Event` FROM `tblspecialdate` WHERE `Type`='Disabled' ORDER BY `Date`";

	$query = mysqli_query($con, $statement);				
	if(mysqli_num_rows($query) > 0){

		$i = 1;								
		while($row = mysqli_fetch_array($query)){
			$datetemp = $row[0];
			$event = $row[1];

            $datetemp = date('d.m.Y', strtotime($datetemp));

            array_push($holidays, $datetemp);
		}
	}	
	
	$arrDisabledDates = $holidays;
	$_SESSION['arrDisabledDates'] = $arrDisabledDates;
	
	//unset($arrDisabledDates);
	//unset($holidays);

	// SPECIAL EVENTS
		

?>
