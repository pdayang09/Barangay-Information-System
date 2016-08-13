 <?php 
require("connection.php");

if($_POST['bid']==1){
	
	$sid = $_POST["sid"];
	$sid1 = $_POST["sid1"];

		$resfrom = $sid;
		$resto = $sid1;

		echo"<script> alert('$resfrom $resto');</script>";
		
		$_SESSION['resfrom'] = $resfrom;
		$_SESSION['resto'] = $resto;
		
		//echo"<script> alert(' $resfrom $resto'); </script>";
 ?>
	
<div class="form-group">
	<div class="col-sm-5">
		<div class="showback">
	       	<div class="panel-heading">
	            <div class="pull-left"><h4><i class="fa fa-tasks"></i> Reserved Facility </h4></div><br>
	        </div>
            <div class="task-content">
                <ul id="sortable" class="task-list">
                    <li class="list-primary">
						<div class="task-title">

<?php

		 $statement = "SELECT f.`strFaciName`, TIME(r.`dtmREFrom`), TIME(r.`dtmRETo`) FROM tblreservefaci r INNER JOIN tblfacility f ON f.`strFaciNo` = r.`strREFaciCode` WHERE r.`dtmREFrom` BETWEEN '$resfrom' AND '$resfrom' OR r.`dtmRETo` BETWEEN '$resto' AND '$resto' ORDER BY r.`dtmREFrom`";


			$query = mysqli_query($con, $statement);
			while($row = mysqli_fetch_array($query)){
				
				while($row = mysqli_fetch_row($query)){
					$facitemp = $row[0];
					$facifrom = $row[1];
					$facito = $row[2];
					
					echo"<h5><span class='task-title-sp'> $facitemp</span><span class='label label-warning'> $facifrom - $facito</span></h5>";
				}
			}?> 			</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="col-sm-5">
		<div class="showback">
			<div class="panel-heading">
				<div class="pull-left"><h4><i class="fa fa-tasks"></i> Reserved Equipment </h4></div><br>
			</div>
    
			<div class="task-content">
                <ul id="sortable" class="task-list">
                    <li class="list-primary">
						<div class="task-title">		
			<?php						
				require("connection.php");
				$query = mysqli_query($con, "SELECT f.`strEquipName`, TIME(r.`dtmREFrom`), TIME(r.`dtmRETo`), r.`intREQuantity` FROM tblreserveequip r INNER JOIN tblequipment f ON f.`strEquipName` = r.`strREEquipCode` WHERE r.`dtmREFrom` BETWEEN '$resfrom' AND '$resto' OR r.`dtmRETo` BETWEEN '$resfrom' AND '$resto' ORDER BY r.`dtmREFrom`");

				while($row = mysqli_fetch_row($query)){
					$facitemp = $row[0];
					$facifrom = $row[1];
					$facito = $row[2];
					$equipquan = $row[3];
					
					echo"<h5><span class='task-title-sp'> $facitemp</span><span class='label label-warning'> $facifrom - $facito </span><span class='label label-info'> $equipquan</span></h5>";
				}
			?>
						</div>
					</li>
				</ul>
			</div>
		</div>	
	</div>
	</div><br><br><br><br>
<?php }?>
