
<?php
require('connection.php');
$val = $_POST['sid'];
?>
		<thead>
		  <th> Resident's Name</th>
		  <th> Address</th>
		  <th> Gender</th>
		  <th> Age </th>
		   <th> Occupation</th>
		  <th> Civil Status</th>
		  </thead>
		  <tbody>
		 <tbody><?php
		 if($val == ""){
			 $Gender = "";
		  $query = "Select strOccupation,concat(strLastName,' ',strNameExtension,', ',strFirstName,' ',strMiddleName) as Name, concat(strBuildingNo,', ',strStreetName,' ',strPurok) as Address, charGender, timestampdiff(YEAR,dtBirthdate,NOW()) as Age, strCivilStatus from tblhousemember as a inner join 
		  tblhousehold as b on a.intForeignHouseholdNo = b.intHouseholdNo inner join tblstreet as c on b.intForeignStreetId = c.intStreetId order by address";
		  $sql = mysqli_query($con,$query);
		  while($row = mysqli_fetch_object($sql)){
			 if($row->charGender == 'M'){
				 $Gender = 'Male';
			 }
			else{ $Gender = 'Female';}			 ?>
		  <tr> <td> <?php echo $row->Name; ?></td>
		  <td> <?php echo $row->Address; ?></td>
		  <td><?php echo $Gender; ?></td>
		  <td> <?php echo $row->Age; ?> </td>
		  <td> <?php echo $row->strOccupation; ?> </td>
		  <td> <?php echo $row->strCivilStatus; ?></td><tr>
		  <?php }}
		  else{
			  $Gender = "";
		  $query = "Select strOccupation, concat(strLastName,' ',strNameExtension,', ',strFirstName,' ',strMiddleName) as Name, concat(strBuildingNo,', ',strStreetName,' ',strPurok) as Address, charGender, timestampdiff(YEAR,dtBirthdate,NOW()) as Age, strCivilStatus from tblhousemember as a inner join 
		  tblhousehold as b on a.intForeignHouseholdNo = b.intHouseholdNo inner join tblstreet as c on b.intForeignStreetId = c.intStreetId 
		  where ".$val." order by address";
		  echo "<script>alert($query)</script>";
		  $sql = mysqli_query($con,$query);
		  while($row = mysqli_fetch_object($sql)){
			 if($row->charGender == 'M'){
				 $Gender = 'Male';
			 }
			else{ $Gender = 'Female';}			 ?>
		  <tr> <td> <?php echo $row->Name; ?></td>
		  <td> <?php echo $row->Address; ?></td>
		  <td><?php echo $Gender; ?></td>
		  <td> <?php echo $row->Age; ?> </td>
		   <td> <?php echo $row->strOccupation; ?> </td>
		  <td> <?php echo $row->strCivilStatus; ?></td><tr>
		  <?php }
		  }
?>