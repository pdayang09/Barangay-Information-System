
<?php
require('connection.php');
$val = $_POST['sid'];
$val2 = $_POST['zid'];
?>
		<thead>
                        <tr>
                            <th>No.</th>
                            <th>Full Name</th>
                            <th>Contact Number</th>
                            <th>Type</th>
                            <th>Reservation Date</th>
                            <th>Purpose</th>
                        </tr>
                    </thead>
		  <tbody>
		 <tbody><?php
		 if($val == ""){
			   require('connection.php');
                                  $count = 0;
                                  $query = "SELECT concat(strLastName,' ',strNameExtension,', ',strFirstName,' ',strMiddleName) as Name
                                  , strContactNo,datRSReserved,strRSPurpose FROM `tblreservationrequest` as a inner join tblhousemember as b on a.strRSapplicantId = b.intMemberNo
                                  order by datRSReserved ";
                                  $sql = mysqli_query($con,$query);
                                  while($row = mysqli_fetch_object($sql)){
                                    ++$count ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row->Name; ?></td>
                            <td><?php echo $row->strContactNo; ?></td>
                            <td>Resident</td>
                            <td><?php echo $row->datRSReserved; ?></td>
                            <td><?php echo $row->strRSPurpose ?></td>
                        </tr>
                        <tr>
                            <?php } 
                                      $query = "SELECT concat(strApplicantLName,' ',strNameExtension,', ',strApplicantFName,' ',strApplicantMName) as Name, strApplicantContactNo,datRSReserved,
                                      strRSPurpose FROM `tblreservationrequest` as a inner join tblapplicant as b on a.strRSapplicantId = b.strApplicantID
                                      order by datRSReserved ";
                                      $sql = mysqli_query($con,$query);
                                      while($row = mysqli_fetch_object($sql)){
                                        ++$count ?>
                        </tr>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row->Name; ?></td>
                            <td><?php echo $row->strApplicantContactNo; ?></td>
                            <td>Non-Resident</td>
                            <td><?php echo $row->datRSReserved; ?></td>
                            <td><?php echo $row->strRSPurpose ?></td>
                        </tr>
                        <tr>
                            <?php } }
		  else{
				if($val2 ==0){  require('connection.php');
                                  $count = 0;
                                  $query = "SELECT concat(strLastName,' ',strNameExtension,', ',strFirstName,' ',strMiddleName) as Name
                                  , strContactNo,datRSReserved,strRSPurpose FROM `tblreservationrequest` as a inner join tblhousemember as b on a.strRSapplicantId = b.intMemberNo where ".$val." order by datRSReserved ";
                                  $sql = mysqli_query($con,$query);
                                  while($row = mysqli_fetch_object($sql)){
                                    ++$count ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row->Name; ?></td>
                            <td><?php echo $row->strContactNo; ?></td>
                            <td>Resident</td>
                            <td><?php echo $row->datRSReserved; ?></td>
                            <td><?php echo $row->strRSPurpose ?></td>
                        </tr>
                        <tr>
                            <?php } 
                                      $query = "SELECT concat(strApplicantLName,' ',strNameExtension,', ',strApplicantFName,' ',strApplicantMName) as Name, strApplicantContactNo,datRSReserved,
                                      strRSPurpose FROM `tblreservationrequest` as a inner join tblapplicant as b on a.strRSapplicantId = b.strApplicantID where ".$val.
                                      " order by datRSReserved ";
                                      $sql = mysqli_query($con,$query);
                                      while($row = mysqli_fetch_object($sql)){
                                        ++$count ?>
                        </tr>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row->Name; ?></td>
                            <td><?php echo $row->strApplicantContactNo; ?></td>
                            <td>Non-Resident</td>
                            <td><?php echo $row->datRSReserved; ?></td>
                            <td><?php echo $row->strRSPurpose ?></td>
                        </tr>
                        <tr>
                            <?php } }
				else if($val2 == 1){require('connection.php');
                                  $count = 0;
                                  
                                      $query = "SELECT concat(strApplicantLName,' ',strNameExtension,', ',strApplicantFName,' ',strApplicantMName) as Name, strApplicantContactNo,datRSReserved,
                                      strRSPurpose FROM `tblreservationrequest` as a inner join tblapplicant as b on a.strRSapplicantId = b.strApplicantID where ".$val.
                                      " order by datRSReserved ";
                                      $sql = mysqli_query($con,$query);
                                      while($row = mysqli_fetch_object($sql)){
                                        ++$count ?>
                        </tr>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row->Name; ?></td>
                            <td><?php echo $row->strApplicantContactNo; ?></td>
                            <td>Non-Resident</td>
                            <td><?php echo $row->datRSReserved; ?></td>
                            <td><?php echo $row->strRSPurpose ?></td>
                        </tr>
                        <tr>
                            <?php }}
				else{ require('connection.php');
                                  $count = 0;
                                  $query = "SELECT concat(strLastName,' ',strNameExtension,', ',strFirstName,' ',strMiddleName) as Name
                                  , strContactNo,datRSReserved,strRSPurpose FROM `tblreservationrequest` as a inner join tblhousemember as b on a.strRSapplicantId = b.intMemberNo where ".$val." order by datRSReserved ";
                                  $sql = mysqli_query($con,$query);
                                  while($row = mysqli_fetch_object($sql)){
                                    ++$count ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row->Name; ?></td>
                            <td><?php echo $row->strContactNo; ?></td>
                            <td>Resident</td>
                            <td><?php echo $row->datRSReserved; ?></td>
                            <td><?php echo $row->strRSPurpose ?></td>
                        </tr>
                        <tr>
                            <?php }}
		  }
				
?>