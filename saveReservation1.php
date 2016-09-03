<?php
	require("connection.php");
	
	if($residency == 1){
		
		//tblreservationrequest` - Resident
		mysqli_query($con, "INSERT INTO `tblreservationrequest`(`strReservationID`,`strRSresidentId`, `strRSapplicantId`,`datRSIssued`, `datRSReserved`, `dtmFrom`, `dtmTo`,`strRSapprovalStatus`,`strRSPurpose`) VALUES ('$resId','$clientID','',NOW(),'$resFrom', UNIX_TIMESTAMP('$resFrom')*1000, UNIX_TIMESTAMP('$resTo')*1000,'For Approval','$resPurpose')");
	}else if($residency == 2){
		
		//tblreservationrequest` - Applicant
		mysqli_query($con, "INSERT INTO `tblreservationrequest`(`strReservationID`, `strRSresidentId`, `strRSapplicantId`, `datRSIssued`, `datRSReserved`, `dtmFrom`, `dtmTo`, `strRSapprovalStatus`,`strRSPurpose`) VALUES ('$resId','','$clientID',NOW(),'$resFrom', UNIX_TIMESTAMP('$resFrom')*1000, UNIX_TIMESTAMP('$resTo')*1000,'For Approval','$resPurpose')");
	}
		
		
		//tblpaymentdetail`
		mysqli_query($con, "INSERT INTO `tblpaymentdetail`(`strRequestID`, `dblReqPayment`, `intRequestORNo`) VALUES ('$resId','$total','$resId');");
	
		//tblpaymenttrans`
		//mysqli_query($con, "INSERT INTO `tblpaymenttrans`(`intORNo`, `dtmPaymentDate`, `dblPaymentAmount`, `dblPaidAmount`, `dblRemaining`) VALUES ('',' ','$total','','$total')");
		
		if($facilityF == 1){
			//tblreservefaci`
			mysqli_query($con,"INSERT INTO `tblreservefaci`(`strReservationID`, `strREFaciCode`, `dtmREFrom`, `dtmRETo`) VALUES ('$resId','$resFacility','$resFrom','$resTo')");

			unset($equipment);
			unset($equipfee1);
			unset($quantity);
			unset($quantity1);
			unset($resFacility);

			$resFacName = "";
			$resfee = "";
			$hours = "";

			$facilityF == 0;
		}else if ($facilityF == 0){
			
			$facilityF == 0;
		}		
		
		//tblreserveequip`
		if($equipmentF==1){

		//EQUIPMENT
		$equipment[] = array();
		$quantity[] = array();		
		$quantity1[] = array(); //Temporary storage for quantity array	
		$equipfee1[] = array(); //Equipment Fee

		$temp = explode(",",$_SESSION['equipment']);
		$equipment = array_merge($equipment, $temp);

		$temp1 = explode(",",$_SESSION['quantity']);
		$quantity = array_merge($quantity, $temp1);

		$intCtr =0;
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
		
		echo"<script> alert('Your request has been submitted'); </script>";
		//Refresh Page

?>