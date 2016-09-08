<?php
	require("connection.php");
		
	//tblreservationrequest` - Applicant
	mysqli_query($con, "INSERT INTO `tblreservationrequest`(`strReservationID`, `strRSresidentId`, `strRSapplicantId`, `datRSIssued`, `datRSReserved`, `dtmFrom`, `dtmTo`, `strRSapprovalStatus`,`strRSPurpose`) VALUES ('$resId','00-admin','',NOW(),'$resFrom', UNIX_TIMESTAMP('$resFrom')*1000, UNIX_TIMESTAMP('$resFrom')*1000,'BARANGAY EVENT','$resPurpose')");

	foreach($arrEvent as $b){

		$datetemp = str_replace('.','/', $b);
        $datetemp = str_replace('/','-', $datetemp);
        $datetemp = date('Y-m-d hh:mm:ss', strtotime($datetemp));

		//tblreservefaci`
		mysqli_query($con,"INSERT INTO `tblreservefaci`(`strReservationID`, `strREFaciCode`, `dtmREFrom`, `dtmRETo`) VALUES ('$resId','1','$datetemp','')");
	}
		
	echo"<script> alert('You have successfully added event/s'); </script>";
	//Refresh Page

?>