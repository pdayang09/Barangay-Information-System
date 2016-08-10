<html>
<head>
</head>
<body>
<center>

<h1><font face = 'calibri'>Daily Report of Unrequited/For Replacement Equipments</font><h1>
<table border = 1 width = 95%>
<thead><tr>
<th>Borrower's Name</th>
<th>Equipment Code</th>
<th>Equipment Type</th>
<th>Date Borrowed</th>
</tr></thead>
<tbody>
<?php
require('connection.php');
			$query = mysqli_query($con,"Select concat(`strApplicantLname`,',',`strApplicantFname`) as 'Name',
			`strEquipCode` ,`EquipCategoryName`,`dtdateborrowed`,transactStatus from tblapplicant as a inner join 
			tblreservationrequest as b on a.strApplicantId = b.strRRapplicantID inner join 
			tblreservationdetails as c on b.strReservationID = c.strReservationID inner join tblreservequipdetail as 
			d on c.strReservationID = d.strReservationID inner join tblequipment as e on 
            d.strEquipCode = e.EquipControlNo inner join tblequipmentcategory as f on e.ForEquipCategoryCode = f.EquipCategoryCode
            where d.dtdatereturned is null AND transactStatus != 'Cleared' Order by `strEquipCode` asc ");
			while($row = mysqli_fetch_object($query)){?>
				<tr><td ><center><?php echo $row->Name;?></center></td>
				
				<td ><center><?php echo $row->strEquipCode; ?></center></td>
				<td><center><?php echo $row->EquipCategoryName;?></center></td>
				
				<td ><center><?php echo $row->dtdateborrowed;?></center></td>
		
				
				<?php
			}?>
</tbody>
</table>
</center>
</body>
</html>