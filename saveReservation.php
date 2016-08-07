<?php
	require("connection.php");
		
		//tblreservationrequest`
		mysqli_query($con, "INSERT INTO `tblreservationrequest`(`strReservationID`, `strRRapplicantID`, `datRRdateIssued`, `datRReservedDate`, `strRRapprovalStatus`, `strRRpurpose`) VALUES ('$resId','$appId',NOW(),'$resFrom','Approved','$resPurpose')");

		//tblpaymentdetail`
		mysqli_query($con, "INSERT INTO `tblpaymentdetail`(`strRequestID`, `dblReqPayment`, `intRequestORNo`) VALUES ('$resId','$total','$payOR');");
	
		//tblpaymenttrans`
		//mysqli_query($con, "INSERT INTO `tblpaymenttrans`(`intORNo`, `dtmPaymentDate`, `dblPaymentAmount`, `dblPaidAmount`, `dblRemaining`) VALUES ('$payOR',NOW(),'$total','$amountR','$balance')");
		
		if(!empty($resFacility)){
			//tblreservefaci`
			mysqli_query($con, "INSERT INTO `tblreservefaci`(`strResReservationID`, `strResFaciControlNo`, `dtmResDateofUseFrom`, `dtmResDateofUseTo`) VALUES ('$resId','$resFacility','$resFrom','$resTo')");
		}else{
			
		}		
		
		//tblreserveequip`
		if($equipmentF == 1){												
			for($intCtr = 0; $intCtr < sizeof($equipment); $intCtr++){
				mysqli_query($con, "INSERT INTO `tblreserveequip`(`strREreservationID`, `strREEquipCode`, `dtmREdateofUseFrom`, `dtmREdateofUseTo`, `intREequipQuantity`) VALUES ('$resId','$equipment[$intCtr]','$resFrom','$resTo','$quantity[$intCtr]')");
				
				//tblreturnequip`
				mysqli_query($con, "INSERT INTO `tblreturnequip`(`strReservationID`, `strEquipCode`, `dtmReturnDate`, `intReturned`, `intUnreturned`) VALUES ('$resId','$equipment[$intCtr]','$resTo',' ','$quantity1[$intCtr]')");
			}			
			$equipmentF =0;
		}else{
			
		}
		
		echo" <script> alert('Reservation Noted !');</script>";
										
		

?>