
<?php
session_start();
$datetemp = $_POST['dDate'];
                                 
	$arrDisabledDates[] = array(); 
    $arrDisabledDates = $_SESSION['arrDisabledDates'];

    $datetemp = str_replace('/','-', $datetemp);
    $datetemp = str_replace('/','.', $datetemp);
    $datetemp = date('d.m.Y', strtotime($datetemp));
     
    array_push($arrDisabledDates, $datetemp);  
    //print_r($arrDisabledDates);   

    $_SESSION['arrDisabledDates'] = $arrDisabledDates; 
      
 ?> 

  	<div id="viewDDate" class="form-grop">
    	<div class="col-sm-6">
    		<div class="showback">

        	<table class="table table-hover" style="height: 40%; overflow: scroll; "'>
				<thead><tr>
					<th>Date</th>					
					<th> </th>
				</tr></thead>
				<tbody>
			<?php
				foreach ($arrDisabledDates as $a) {
					echo"<tr><td> $a </td>";
					echo"<td> </td></tr>";
				}
			?>	
				</tbody>
			</table>
        	</div>
        </div>
    </div>