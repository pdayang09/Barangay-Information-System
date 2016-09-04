

<?php 
    $resfrom = $_POST["resfrom"];
    $resto = $_POST["resto"];
    $resFacility = $_POST["val"];

?>
       
<div id="viewCheck" class="panel panel-panel">
    <ul id="sortable" class="task-list">
        <li class="list-primary">
            <div class="task-title">    
                        
            <?php                       
                require("connection.php");
                $query = mysqli_query($con,"SELECT f.`strFaciNo`, f.`strFaciName`, TIME(r.`dtmREFrom`), TIME(r.`dtmRETo`) FROM tblreservefaci r INNER JOIN tblfacility f ON f.`strFaciNo` = r.`strREFaciCode` INNER JOIN tblreservationrequest rs ON rs.`strReservationID` = r.`strReservationID` WHERE (r.`strREFaciCode`='$resFacility') AND (r.`dtmREFrom` BETWEEN '$resfrom' AND '$resto' OR r.`dtmRETo` BETWEEN '$resfrom' AND '$resto') AND rs.`strRSapprovalStatus` = 'Paid'");

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

                $_SESSION['available'] = $go;

            ?>          


                </div>
            </li>
        </ul>
    </div>

    <?php

        if($_POST['val']==01){
            $resId = $_POST['resIdC'];            

            if($resfrom!="" AND $resto!=""){

            require("connection.php");
                mysqli_query($con, "UPDATE `tblreservationrequest` SET `datRSReserved`='$resfrom',`dtmFrom`= UNIX_TIMESTAMP('$resfrom')*1000,`dtmTo`= UNIX_TIMESTAMP('$resto')*1000 WHERE `strReservationID`= '$resId'");

                mysqli_query($con, "UPDATE `tblreservefaci` SET `dtmREFrom`='$resfrom',`dtmRETo`='$resto' WHERE `strReservationID` = $resId");                    
                mysqli_query($con, "UPDATE `tblreserveequip` SET `dtmREFrom`='$resfrom',`dtmRETo`='$resto' WHERE `strReservationID` = $resId");

                echo "<script> alert('Successfully rescheduled an event');</script>";
                echo"<script>window.location='reservation_kapitanl.php';</script>";
                }

        }else if($_POST['val']==02){
            $resId = $_POST['resIdF'];

            if($resfrom!="" AND $resto!=""){

            require("connection.php");
            mysqli_query($con, "UPDATE `tblreservationrequest` SET `strRSapprovalStatus`='Forfeited' WHERE `strReservationID`= '$resId'");

            mysqli_query($con, "DELETE FROM `tblreservefaci` WHERE `strReservationID` = $resId");                     

            mysqli_query($con, "DELETE FROM `tblreserveequip` WHERE `strReservationID` = $resId");

            mysqli_query($con, "DELETE FROM `tblpaymentdetail` WHERE `strRequestID` = resId");

            mysqli_query($con, "DELETE FROM `tblreturnequip` WHERE `strReservationID` = $resId");

            echo "<script> alert('Event Successfully Cancelled');</script>";
            echo"<script>window.location='reservation_kapitanl.php';</script>";
        }

    }
?>

