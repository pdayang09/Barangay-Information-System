<?php
	require("connection.php");
	
	//tblreservationrequest` - Resident
	mysqli_query($con, "INSERT INTO `tblreservationrequest`(`strReservationID`,`strRSresidentId`, `strRSapplicantId`,`datRSIssued`, `datRSReserved`, `dtmFrom`, `dtmTo`,`strRSapprovalStatus`,`strRSPurpose`) VALUES ('$resId','$clientID','',NOW(),'$resFrom', UNIX_TIMESTAMP('$resFrom')*1000, UNIX_TIMESTAMP('$resTo')*1000,'Reserved','$resPurpose')");
		
	mysqli_query($con, "INSERT INTO `tblpaymentdetail`(`strRequestID`, `dblReqPayment`, `intRequestORNo`) VALUES ('$resId','$total','$resId');");

	mysqli_query($con, "INSERT INTO `tblpaymenttrans`(`intORNo`, `dtmPaymentDate`, `dblPaymentAmount`, `dblPaidAmount`, `dblRemaining`) VALUES ('$resId',NOW(),'$total','$total',0)");	
			
	if($facilityF == 1){
		//tblreservefaci`
		mysqli_query($con,"INSERT INTO `tblreservefaci`(`strReservationID`, `strREFaciCode`, `dtmREFrom`, `dtmRETo`) VALUES ('$resId','$resFacility','$resFrom','$resTo')");

		$facilityF = 0;
	}else if ($facilityF == 0){
			
			$facilityF =0;
	}		
		
	//tblreserveequip`
	if($equipmentF == 1){

		//EQUIPMENT
	$equipment[] = array();
	$quantity[] = array();		
	$quantity1[] = array(); //Temporary storage for quantity array	
	$equipfee1[] = array(); //Equipment Fee

	foreach($quantity as $i){
		if(!empty($i)){
		 	$quantity1[$intCtr] = number_format($i,0);
									
			//echo $quantity[$intCtr];
			//echo $quantity1[$intCtr];
			//echo "<br>";

		$intCtr++;
		}					
	}

	$intCtr =0;
	foreach($equipment as $b){

		require("connection.php");	
		if(!empty($b)){
			mysqli_query($con, "INSERT INTO `tblreserveequip`(`strReservationID`, `strREEquipCode`, `dtmREFrom`, `dtmRETo`,`intREQuantity`) VALUES ('$resId','$b','$resFrom','$resTo','$quantity1[$intCtr]')");
						
			//tblreturnequip`
			mysqli_query($con, "INSERT INTO `tblreturnequip`(`strReservationID`, `strRTEquipCode`, `datRTDate`, `intReturned`, `intUnreturned`) VALUES ('$resId','$b','$resTo','0','$quantity1[$intCtr]')");
				
			$intCtr++;
		}
			
	}
		$equipmentF =0;

	}else{

		$equipmentF =0;
	}

		unset($equipment);
		unset($equipfee1);
		unset($quantity);
		unset($quantity1);
		unset($resFacility);

		$resFacility = "";
		$resFacName = "";
		$resfee = "";
		$hours = "";
		
		echo"<script> alert('SUCCESS'); </script>";
		//Refresh Page

?>