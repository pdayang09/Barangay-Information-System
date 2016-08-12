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
		mysqli_query($con, "INSERT INTO `tblpaymentdetail`(`strRequestID`, `dblReqPayment`, `intRequestORNo`) VALUES ('$resId','$total','');");
	
		//tblpaymenttrans`
		//mysqli_query($con, "INSERT INTO `tblpaymenttrans`(`intORNo`, `dtmPaymentDate`, `dblPaymentAmount`, `dblPaidAmount`, `dblRemaining`) VALUES ('',' ','$total','','$total')");
		
		if(!empty($resFacility)){
			//tblreservefaci`
			mysqli_query($con,"INSERT INTO `tblreservefaci`(`strReservationID`, `strREFaciCode`, `dtmREFrom`, `dtmRETo`) VALUES ('$resId','$resFacility','$resFrom','$resTo')");
		}else{
			
		}		
		
		//tblreserveequip`
		if($equipmentF == 1){												
			for($intCtr = 0; $intCtr < sizeof($equipment); $intCtr++){
				mysqli_query($con, "INSERT INTO `tblreserveequip`(`strReservationID`, `strREEquipCode`, `dtmREFrom`, `dtmRETo`,`intREQuantity`) VALUES ('$resId','$equipment[$intCtr]','$resFrom','$resTo','$quantity1[$intCtr]')");
			
				//tblreturnequip`
				mysqli_query($con, "INSERT INTO `tblreturnequip`(`strReservationID`, `strRTEquipCode`, `datRTDate`, `intReturned`, `intUnreturned`) VALUES ('$resId','$equipment[$intCtr]','$resTo',' ','$quantity1[$intCtr]')");
			}			
			$equipmentF =0;
			unset($equipment);
			unset($quantity);
			unset($quantity1);
			
		}else{
			
		}
		
		//Refresh Page

?>