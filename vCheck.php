

<?php 
	$resfrom = $_POST["fid"];
	$resto = $_POST["tid"];
	$resFacility = $_POST["rid"];

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
                    
                    echo"<center><h4><span> NOT AVAILABLE </span><span class='label label-warning'> $facifrom - $facito </span></h4></center>";
                    $_SESSION['go'] = 1;
                  }
                }else{

                	echo"<center><h3><span> AVAILABLE </span><span class='label label-warning'></span></h3></center>";
                    $_SESSION['go'] = 0;
                }

            ?>          </div>
                    </li>
                </ul>
            </div>

    <div id="viewCheckEquip" class="col-sm-3">
        <div class="showback">
            <div class="panel-heading">
                <div class="pull-left"><h4> Reserved Equipment </h4></div><br>
            </div>
    
            <div class="task-content">
                <ul id="sortable" class="task-list">
                    <li class="list-primary">
                        <div class="task-title">        
            <?php 

            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>  
    </div>

