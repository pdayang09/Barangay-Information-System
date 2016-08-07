<?php
	require("connection.php");

	$out = array();
	
	$sql   = mysqli_query($con,"SELECT r.strreservationid, r.strrrapplicantid, CONCAT(a.strapplicantlname,' ', 	a.strapplicantfname, ', ', a.strapplicantmname) AS 'Name', a.strapplicantcontactno, r.strrrpurpose, r.datrreserveddate, r.strrrapprovalstatus, p.intrequestorno, r.dtmFrom, r.dtmTo FROM tblreservationrequest r INNER JOIN tblpaymentdetail p ON p.strrequestid = r.strreservationid INNER JOIN tblapplicant a ON a.strapplicantid = r.strrrapplicantid");
	
	while($row = mysqli_fetch_array($sql)) {
		if($row['strrrapprovalstatus']=='Approved'){
			$out[] = array(
				'id' => $row['strreservationid'],
				'title' => "Reservation: ".$row['strreservationid']." Name: ".$row['Name']." Purpose: ".$row['strrrpurpose']." Contact No: ".$row['strapplicantcontactno']." ",	
				'url' => '#',
				'class' => 'event-important',
				'start' => $row['dtmFrom'],
				'end' => $row['dtmTo']
			);
		}else if($row['strrrapprovalstatus']=='Paid'){
			$out[] = array(
				'id' => $row['strreservationid'],
				'title' => "Reservation: ".$row['strreservationid']." Name: ".$row['Name']." Purpose: ".$row['strrrpurpose']." Contact No: ".$row['strapplicantcontactno']." ",	
				'url' => '#',
				'class' => 'event-success',
				'start' => $row['dtmFrom'],
				'end' => $row['dtmTo']
			);
		}
	}

	echo json_encode(array('success' => 1, 'result' => $out));
	exit;
		
?>