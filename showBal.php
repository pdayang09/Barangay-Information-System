<?php

	
	$mode = $_POST['mode'];
	$payOR = $_POST['payOR'];
	$balance = $_POST['bal'];
	$total = $balance;
	$change = $_POST['change'];
	$render = $_POST['render'];
	$pay = $_POST['pay'];

if($mode == 1){

	$total = $balance;
	$balance = 0;
}else if($mode == 2){

	$total = $total/2;
	$balance = $total;
}

$change = $render-$total;	

if($change >= 0){
	

	require("connection.php");

	mysqli_query($con, "UPDATE `tblpaymentdetail` SET `intRequestORNo`= '$payOR' WHERE `strRequestID`= $pay");

	mysqli_query($con, "UPDATE `tblpaymenttrans` SET `intORNo`='$payOR',`dtmPaymentDate`= NOW(),`dblPaidAmount`='$render',`dblRemaining`= '$balance' WHERE `intORNo`= $pay");

if($balance ==0){
	mysqli_query($con, "UPDATE `tblreservationrequest` SET `strRSapprovalStatus`='Paid' WHERE `strReservationID`= $pay");
}else if($balance > 0){
	mysqli_query($con, "UPDATE `tblreservationrequest` SET `strRSapprovalStatus`='Half Paid' WHERE `strReservationID`= $pay");
}

	echo'<script> alert(" Your Payment has been collected ")</script>';
	echo'<script> window.location = "reservation_paymentl.php";</script>';
}else{

	$change = 0;
}?>	

<div id="showBalance">
	<font face = "cambria" size = 5 color = "grey"> Mode of Payment </font>
		<select class = "form-control" id = "mode" name = "mode" onchange = "showBal(this.value)">
				<option value="<?php if($mode==1) echo 1; ?>"> Full </option>
				<option value="<?php if($mode==1) echo 2; ?>"> Partial </option>
		</select>

	<font face = "cambria" size = 5 color = "grey"> Balance</font>
	<center>		
	<font face = "cambria" size = 7 color = "grey" > <?php echo $total;?> </font></center><br>
	<font face = "cambria" size = 5 color = "grey"> Amount Render </font>
		<input name="render" class="form-control put-group-lg reg_name" type="number"  title="generated brgyId" value="<?php  echo $render;?>" min="0">	
	<font face = "cambria" size = 5 color = "grey"> Change </font>
		<input name="change" class="form-control put-group-lg reg_name" type="number"  title="generated brgyId" value="<?php  echo $change;?>" disabled>			
</div>