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
		
		if($_SESSION['resFacilityFlag'] ==0){
			//tblreservefaci`
			mysqli_query($con,"INSERT INTO `tblreservefaci`(`strReservationID`, `strREFaciCode`, `dtmREFrom`, `dtmRETo`) VALUES ('$resId','$resFacility','$resFrom','$resTo')");

			$_SESSION['resFacilityFlag'] == 0;
		}else if ($resFacilityFlag == 1){
			
			$_SESSION['resFacilityFlag'] == 0;
		}		
		
		//tblreserveequip`
		if($equipmentF == 1){

		$intCtr =0;
		foreach($equipment as $a){
			if(!empty($a)){
	
				mysqli_query($con, "INSERT INTO `tblreserveequip`(`strReservationID`, `strREEquipCode`, `dtmREFrom`, `dtmRETo`,`intREQuantity`) VALUES ('$resId','$a','$resFrom','$resTo','$quantity1[$intCtr]')");
			
				//tblreturnequip`
				mysqli_query($con, "INSERT INTO `tblreturnequip`(`strReservationID`, `strRTEquipCode`, `datRTDate`, `intReturned`, `intUnreturned`) VALUES ('$resId','$a','$resTo','0','$quantity1[$intCtr]')");

				$intCtr++;
			}
		}

			$equipmentF =0;

			unset($equipment);
			unset($equipfee1);
			unset($quantity);
			unset($quantity1);
			unset($resFacility);

			$resFacName = "";
			$resfee = "";
			$hours = "";
			
			session_destroy();	

		}else{

		}
		
		echo"<script> alert('Your request has been submitted'); </script>";
		//Refresh Page

?>