
<?php
	require("connection.php");

	$query = mysqli_query($con, "SELECT DISTINCT `strEquipName`, `intEquipQuantity`-`intREQuantity` FROM tblreserveequip, tblequipment WHERE `dtmREFrom` BETWEEN '$resfrom' AND '$resto' OR `dtmRETo` BETWEEN '$resfrom' AND '$resto' AND `strREEquipCode` = `strEquipName` UNION SELECT `strEquipName`, `intEquipQuantity` FROM tblreserveequip, tblequipment WHERE `dtmREFrom` BETWEEN '$resfrom' AND '$resto' OR `dtmRETo` BETWEEN '$resfrom' AND '$resto' AND `strREEquipCode` != `strEquipName` AND `strEquipName` IN (SELECT `strEquipName` FROM tblequipment WHERE `strStatus`='Enabled')");

  	 while($row = mysqli_fetch_row($query)){
	   
	   	echo "
		<p><font face='cambria' size=4 color='grey'><input type='checkbox' name = 'equipment' value='$row[0]'/> $row[0] </font></p>
		<input class='form-control input-group-lg reg_name' type='number' name = 'quantity' title='Input Quantity' placeholder='Input Quantity' min='1' max='$row[1]' value=''; >
	";
	
  	} 
 ?>

<!-- change into correct query of the equipment maintenance -->