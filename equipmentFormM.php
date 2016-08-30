
	

	<?php

	$resfrom = $_SESSION['resfrom'];
    $resto = $_SESSION['resto'];

	require("connection.php");
	$query = mysqli_query($con, "SELECT DISTINCT e.`strEquipName`, (e.`intEquipQuantity` - re.`intREQuantity`), e.`strStatus` from tblequipment e INNER JOIN tblreserveequip re ON re.strREEquipCode = e.`strEquipName` where (e.`intEquipQuantity`- re.`intREQuantity`) > 0 AND e.`strStatus` = 'Enabled' AND (re.dtmREFrom BETWEEN '$resfrom' and '$resto') OR (re.dtmRETo BETWEEN '$resfrom' and '$resto') UNION SELECT eq.`strEquipName`, eq.`intEquipQuantity`, eq.`strStatus` from tblequipment eq JOIN tblreserveequip re WHERE (eq.`intEquipQuantity` > 0) AND eq.`strStatus` = 'Enabled' AND eq.`strEquipName` != re.strREEquipCode AND (re.dtmREFrom NOT BETWEEN '$resfrom' and '$resto') OR (re.dtmRETo NOT BETWEEN '$resfrom' and '$resto')");

  	 while($row = mysqli_fetch_row($query)){
	   
	   	echo "
		<p><font face='cambria' size=4 color='grey'>
		<input type='checkbox' name = equipment value='$row[0]'/> $row[0] </font></p>
		<input id='quantity' class='form-control input-group-lg reg_name' type='number' name = quantity title='Input Quantity' placeholder='Input Quantity' min='1' max='$row[1]' value='0'; >";
	
   	} ?>
	
