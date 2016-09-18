

<?php 
    $val = $_POST['val'];
	$resfrom = $_POST['fid'];
	$resto = $_POST['tid'];
	

if($val == 1){  

    $resFacility = $_POST['rid'];
?>

<div id="viewCheck" class="panel panel-panel">
    <ul id="sortable" class="task-list">
        <li class="list-primary">
            <div class="task-title">    
                        
            <?php                       
                require("connection.php");
                $query = mysqli_query($con,"SELECT f.`strFaciNo`, f.`strFaciName`, TIME(r.`dtmREFrom`), TIME(r.`dtmRETo`) FROM tblreservefaci r INNER JOIN tblfacility f ON f.`strFaciNo` = r.`strREFaciCode` INNER JOIN tblreservationrequest rs ON rs.`strReservationID` = r.`strReservationID` WHERE (r.`strREFaciCode`='$resFacility') AND (r.`dtmREFrom` BETWEEN '$resfrom' AND '$resto' OR r.`dtmRETo` BETWEEN '$resfrom' AND '$resto') AND (rs.`strRSapprovalStatus` = 'Paid' OR rs.`strRSapprovalStatus` = 'Reserved' OR rs.`strRSapprovalStatus` = 'Half Paid')");

                if(mysqli_num_rows($query) > 0){
                
                $i = 1;
                 while($row = mysqli_fetch_row($query)){

                    $facino = $row[0];
                    $facitemp = $row[1];
                    $facifrom = $row[2];
                    $facito = $row[3];
                    
                    echo"<center><h4><span> NOT AVAILABLE</span><span class='label label-warning'> $facifrom - $facito </span></h4></center>";
                    
                  }
                    $go = 1;
                }else{

                    echo"<center><h3><span> AVAILABLE </span><span class='label label-warning'></span></h3></center>";
                    $go = 0;
                }

            ?> </div>
        </li>
    </ul>
</div>

<?php
}else if($val==2){

?>   
<div id="equipmentForm" class = "panel panel-panel">
    <div class="form-group">
        <div class = "showback">                                                
            <font face = "cambria" size = 5 color = "grey"> Items </font><br><br>  
<?php

    require("connection.php");
    $query = mysqli_query($con, "SELECT eq.`strEquipName`, intEquipQuantity-SUM(r.`intREQuantity`) FROM tblreserveequip r INNER JOIN tblequipment eq ON eq.`strEquipName`=r.`strREEquipCode` WHERE r.`dtmREFrom` BETWEEN '$resfrom' AND '$resto' OR r.`dtmRETo` BETWEEN '$resfrom' AND '$resto' GROUP BY eq.`strEquipName` UNION SELECT e.`strEquipName`, e.`intEquipQuantity` FROM tblequipment e WHERE e.`strStatus`='Enabled' AND e.`strEquipName` NOT IN ( SELECT eq.`strEquipName` FROM tblreserveequip r INNER JOIN tblequipment eq ON eq.`strEquipName`= r.`strREEquipCode` WHERE r.`dtmREFrom` BETWEEN '$resfrom' AND '$resto' OR r.`dtmRETo` BETWEEN '$resfrom' AND '$resto' GROUP BY eq.`strEquipName`)");

    
     while($row = mysqli_fetch_row($query)){
        if($row[1] > 0){
            echo "<p><font face='cambria' size=4 color='grey'><input type='checkbox' name = 'equipment' value='$row[0]'/> $row[0] ($row[1]) </font></p>
                <input class='form-control input-group-lg reg_name' type='number' name = 'quantity' title='Input Quantity' placeholder='Input Quantity' min='1' max='$row[1]' value=''>";
        }else{

        }       
        
    }
    
?>   
        </div>
    </div>
</div>

<?php }else if($val==3){ 

    $equipment[] = array();
    $equipment = $_POST['equipment'];
    $resFacility = $_POST['rid'];
?>

<div id="viewCheck" class="panel panel-panel">
    <ul id="sortable" class="task-list">
        <li class="list-primary">
            <div class="task-title">    
                        
            <?php                       
                require("connection.php");
                $query = mysqli_query($con,"SELECT f.`strFaciNo`, f.`strFaciName`, TIME(r.`dtmREFrom`), TIME(r.`dtmRETo`) FROM tblreservefaci r INNER JOIN tblfacility f ON f.`strFaciNo` = r.`strREFaciCode` INNER JOIN tblreservationrequest rs ON rs.`strReservationID` = r.`strReservationID` WHERE (r.`strREFaciCode`='$resFacility') AND (r.`dtmREFrom` BETWEEN '$resfrom' AND '$resto' OR r.`dtmRETo` BETWEEN '$resfrom' AND '$resto') AND (rs.`strRSapprovalStatus` = 'Paid' OR rs.`strRSapprovalStatus` = 'Reserved' OR rs.`strRSapprovalStatus` = 'Half Paid')");

                if(mysqli_num_rows($query) > 0){
                
                 $i = 1;
                 while($row = mysqli_fetch_row($query)){

                    $facino = $row[0];
                    $facitemp = $row[1];
                    $facifrom = $row[2];
                    $facito = $row[3];
                                        
                  }

                    $go = 1;
                }else{

                    $go = 0;
                }

                if($go==0 AND $resfrom!="" AND $resto!="" AND ($resFacility!="" OR !empty($equipment))){

                    echo"<script> document.getElementById('proceed').style.display = 'block'; </script>";  
                }else{

                    echo"<script> alert('Your request is invalid')</script>";
                }

            ?>          </div>
        </li>
    </ul>
</div>    

<?php } ?>

