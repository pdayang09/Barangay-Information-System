<?php
	require("connection.php");

	$out = array();
	
	$sql   = mysqli_query($con,"SELECT r.`strReservationID`, r.`strRSresidentId`, CONCAT(re.`strLastName`,' ', re.`strFirstName`, ', ', re.`strMiddleName`) AS 'Name', re.`strContactNo` AS 'Contact', r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`, r.`dtmFrom`, r.`dtmTo`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblhousemember re ON re.`intMemberNo` = r.`strRSresidentId` UNION SELECT r.`strReservationID`, r.`strRSapplicantId`, CONCAT(a.`strApplicantLName`,' ', a.`strApplicantFName`, ', ', a.`strApplicantMName`) AS 'Name', a.`strApplicantContactNo` AS 'Contact', r.`strRSPurpose`, r.`datRSReserved`, r.`strRSapprovalStatus`,r.`dtmFrom`, r.`dtmTo`, p.intrequestorno FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.`strReservationID` INNER JOIN tblapplicant a ON a.`strApplicantID` = r.`strRSapplicantId` WHERE r.`strRSapprovalStatus` = 'Reserved' ORDER BY `datRSReserved`");
	
	while($row = mysqli_fetch_array($sql)) {
		if($row['strRSapprovalStatus']=='Reserved'){
			$out[] = array(
				'id' => $row['strReservationID'],
				'title' => "Reservation: ".$row['strReservationID']." Name: ".$row['Name']." Purpose: ".$row['strRSPurpose']." Contact No: ".$row['Contact']." ",	
				'url' => '#',
				'class' => 'event-important',
				'start' => $row['dtmFrom'],
				'end' => $row['dtmTo']
			);
		}else if($row['strRSapprovalStatus']=='Paid'){
			$out[] = array(
				'id' => $row['strReservationID'],
				'title' => "Reservation: ".$row['strReservationID']." Name: ".$row['Name']." Purpose: ".$row['strRSPurpose']." Contact No: ".$row['Contact']." ",	
				'url' => '#',
				'class' => 'event-success',
				'start' => $row['dtmFrom'],
				'end' => $row['dtmTo']
			);
		}else if($row['strRSapprovalStatus']=='Half Paid'){
			$out[] = array(
				'id' => $row['strReservationID'],
				'title' => "Reservation: ".$row['strReservationID']." Name: ".$row['Name']." Purpose: ".$row['strRSPurpose']." Contact No: ".$row['Contact']." ",	
				'url' => '#',
				'class' => 'event-warning',
				'start' => $row['dtmFrom'],
				'end' => $row['dtmTo']
			);
		}

	}

	echo json_encode(array('success' => 1, 'result' => $out));
	exit;
		
?>