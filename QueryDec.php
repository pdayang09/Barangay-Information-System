
<?php
require('connection.php');
$val = $_POST['sid'];
?>
		 <thead>
		  <th> Resident's Name</th>
		  <th> Gender</th>
		  <th> Date of Birth</th>
		  <th> Date of Death</th>
		  <th> Age of Death</th>
		  </thead>
		  <tbody><?php
		 if($val == ""){
			 $Gender = "";
		  $query = "SELECT concat(strLastName,' ',strNameExtension,', ',strFirstName,'' ,strMiddleName) as Name, `charGender`,`dtBirthdate`,`dtDied`, timestampdiff(YEAR,`dtBirthdate`,`dtDied`) as Age FROM `tbldeceased` ";
			$sql = mysqli_query($con,$query);
		  while($row = mysqli_fetch_object($sql)){
			 if($row->charGender == 'M'){
				 $Gender = 'Male';
			 }
			else{ $Gender = 'Female';}			 ?>
		  <tr> <td> <?php echo $row->Name; ?></td>
		  <td><?php echo $Gender; ?></td>
		  <td> <?php echo $row->dtBirthdate?></td>
		  <td> <?php echo $row->dtDied ?></td>  
		  <td> <?php echo $row->Age; ?> </td><tr>
		  <?php }}
		  else{
			  $Gender = "";
		  $query = "SELECT concat(strLastName,' ',strNameExtension,', ',strFirstName,'' ,strMiddleName) as Name, `charGender`,`dtBirthdate`,`dtDied`, timestampdiff(YEAR,`dtBirthdate`,`dtDied`) as Age FROM `tbldeceased` where ".$val;
		  echo "<script>alert($query)</script>";
		  $sql = mysqli_query($con,$query);
		  while($row = mysqli_fetch_object($sql)){
			 if($row->charGender == 'M'){
				 $Gender = 'Male';
			 }
			else{ $Gender = 'Female';}			 ?>
		 <tr> <td> <?php echo $row->Name; ?></td>
		  <td><?php echo $Gender; ?></td>
		  <td> <?php echo $row->dtBirthdate?></td>
		  <td> <?php echo $row->dtDied ?></td>  
		  <td> <?php echo $row->Age; ?> </td><tr>
		  <?php }}
?>