
<?php
require('connection.php');
$val = $_POST['sid'];
?>
		<thead>
		  <tr>
<th>Household Head Name</th>
<th>Address</th>
<th>Action</th>
</tr>
		  </thead>
		  <tbody>
		 <tbody><?php

          require('connection.php');
        $sql = "SELECT concat(b.strLastName,', ',b.strFirstName) as 'Name' , concat(a.strBuildingNo,' ',strStreetName,', ',strZoneName) as 'Address', a.intHouseholdNo as 'No' from tblhousehold as a inner join tblhousemember as b on a.intHouseholdNo = b.intForeignHouseholdNo
		inner join tblstreet as c on a.intForeignStreetId = c.intStreetId inner join tblzone as d on c.intForeignZoneId = d.intZoneId  where b.strStatus = 'Head' AND strLastName like '$val%'";
        $query = mysqli_query($con, $sql);
        if(mysqli_num_rows($query) > 0){
      
            while($row = mysqli_fetch_object($query)){?>
          <tr> <td><?php echo $row->Name?></td>
          <td><?php echo $row->Address?></td>
          <td><button id = 'btn' type = button value = <?php echo $row->No?> name = 'Edit' data-toggle="modal" data-target="#myModal" onclick = "a();">Transfer</button> </td>

          </tr>
        <?php }}
?>