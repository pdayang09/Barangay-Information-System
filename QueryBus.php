
<?php
require('connection.php');
$val = $_POST['sid'];
?>
		 <thead>
		   <th> No.</th>
		  <th> Business Contact Person</th>
		  <th> Business Name</th>
		  <th> Category</th>
		  <th> Contact Number</th>
		  <th> Status </th>
		  </thead>
		  <tbody><?php
		 if($val == ""){
		  require('connection.php');
		 	  $ctr = 0;
		  $Gender = "";
		  $query = "Select concat(strLastName,' ',strNameExtension,', ',strFirstName,' ',strMiddleName) as 'Name', strContactNum,strBusinessName,strBSbusinessStat,strBusCateName from tblbusiness as a inner join tblbusinessstat as b on a.strBusinessID = b.strBusinessID inner join tblbusinesscate as c on a.strBusinessCateID = c.strBusCatergory inner join tblhousemember as d on b.strBusOwnerID = d.intMemberNo order by Name ";
		  $sql = mysqli_query($con,$query);
		  while($row = mysqli_fetch_object($sql)){
			  ++$ctr;?>
			   <tr> <td> <?php echo $ctr;?></td>
		  <td> <?php echo $row->Name;?></td>
		  <td> <?php echo $row->strBusinessName; ?></td>
		  <td> <?php echo $row->strBusCateName; ?> </td>
		  <td> <?php echo $row->strContactNum; ?> </td>
		  <td> <?php echo $row->strBSbusinessStat ?></td><tr>
		  <?php } 
		  
		  $query = "Select concat(strApplicantLName,' ',strNameExtension,', ',strApplicantFName,' ',strApplicantMName) as 'Name', strContactNum,strBusinessName,strBSbusinessStat,strBusCateName from tblbusiness as a inner join tblbusinessstat as b on a.strBusinessID = b.strBusinessID inner join tblbusinesscate as c on a.strBusinessCateID = c.strBusCatergory inner join tblapplicant as d on b.strBusOwnerID = d.strApplicantID order by Name ";
		  $sql = mysqli_query($con,$query);
		  while($row = mysqli_fetch_object($sql)){
			  ++$ctr;?>
			   <tr> <td> <?php echo $ctr;?></td>
		   <td> <?php echo $row->Name;?></td>
		  <td> <?php echo $row->strBusinessName; ?></td>
		  <td> <?php echo $row->strBusCateName; ?> </td>
		  <td> <?php echo $row->strContactNum; ?> </td>
		  <td> <?php echo $row->strBSbusinessStat ?></td><tr>
		  <?php }  }
		  else{
	
		$ctr = 0;
		require('connection.php');
		  $Gender = "";
		  $query = "Select concat(strLastName,' ',strNameExtension,', ',strFirstName,' ',strMiddleName) as 'Name', strContactNum,strBusinessName,strBSbusinessStat,strBusCateName from tblbusiness as a inner join tblbusinessstat as b on a.strBusinessID = b.strBusinessID inner join tblbusinesscate as c on a.strBusinessCateID = c.strBusCatergory inner join tblhousemember as d on b.strBusOwnerID = d.intMemberNo where ".$val." order by Name ";
		  $sql = mysqli_query($con,$query);
		  while($row = mysqli_fetch_object($sql)){
			  ++$ctr;?>
			   <tr> <td> <?php echo $ctr;?></td>
		  <td> <?php echo $row->Name;?></td>
		  <td> <?php echo $row->strBusinessName; ?></td>
		  <td> <?php echo $row->strBusCateName; ?> </td>
		  <td> <?php echo $row->strContactNum; ?> </td>
		  <td> <?php echo $row->strBSbusinessStat ?></td><tr>
		  <?php } 
		  
		  $query = "Select concat(strApplicantLName,' ',strNameExtension,', ',strApplicantFName,' ',strApplicantMName) as 'Name', strContactNum,strBusinessName,strBSbusinessStat,strBusCateName from tblbusiness as a inner join tblbusinessstat as b on a.strBusinessID = b.strBusinessID inner join tblbusinesscate as c on a.strBusinessCateID = c.strBusCatergory inner join tblapplicant as d on b.strBusOwnerID = d.strApplicantID where ".$val." order by Name ";
		  $sql = mysqli_query($con,$query);
		  while($row = mysqli_fetch_object($sql)){
			  ++$ctr;?>
			   <tr> <td> <?php echo $ctr;?></td>
		 <td> <?php echo $row->Name;?></td>
		  <td> <?php echo $row->strBusinessName; ?></td>
		  <td> <?php echo $row->strBusCateName; ?> </td>
		  <td> <?php echo $row->strContactNum; ?> </td>
		  <td> <?php echo $row->strBSbusinessStat ?></td><tr>
		  <?php } }
?>