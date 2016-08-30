<?php
$sid = $_POST['sid'];

?>
	<table  class="table table-striped table-bordered table-hover" border = '3' style = 'width:95%'>
							<thead>
								<tr>
									
									<th><i class="fa fa-question-circle"></i> Name</th>
									<th><i class="fa fa-bullhorn"></i> Category</th>
									<th><i class="fa fa-bookmark"></i> Day Charge</th>
									<th><i class="fa fa-bookmark"></i> Night Charge</th>
									<th><i class="fa fa-cog"></i> Status</th>
									<th><i class="fa fa-edit"></i> Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									
									<th><i class="fa fa-question-circle"></i> Name</th>
									<th><i class="fa fa-bullhorn"></i> Category</th>
									<th><i class="fa fa-bookmark"></i> Day Charge</th>
									<th><i class="fa fa-bookmark"></i> Night Charge</th>
									<th><i class="fa fa-cog"></i> Status</th>
									<th><i class="fa fa-edit"></i> Action</th>
								</tr>
							</tfoot>
							
						<tbody>
			 
								
							<?php if ($sid == 1){
							require('connection.php');
							$sql = "select * from tblfacility where strFaciStatus = 'Under Maintenance' || strFaciStatus = 'Broken' ";
							$query = mysqli_query($con, $sql);
				
							if(mysqli_num_rows($query) > 0){
								$i = 1;
					
							while($row = mysqli_fetch_object($query)){?>
								<tr>
									<td><?php echo $row->strFaciName?> </td>
									<td><?php
								
							$query2 = mysqli_query($con,"Select * from tblcategory where strCategoryCode = '".$row->strFaciCategory."'");
					
							if(mysqli_num_rows($query2) > 0){
								$row2 = mysqli_fetch_object($query2);
								echo $row2->strCategoryDesc;
					}?>
					
									</td>
										<td><?php echo $row->dblFaciDayCharge?></td>
										<td><?php echo $row->dblFaciNightCharge?></td>
										<td><?php echo $row->strFaciStatus?></td>
										
										<td><button type = submit  class="btn btn-primary btn-xs" name = 'btnedit' value = <?php echo $row->strFaciNo ?> ><i class="fa fa-pencil"></i></button></td>
									</tr>		 
								</form>  
					<?php 		}
}}

else{ ?> 
					<?php
							require('connection.php');
							$sql = "select * from tblfacility where strFaciStatus = 'Good Condition'";
							$query = mysqli_query($con, $sql);
				
							if(mysqli_num_rows($query) > 0){
								$i = 1;
					
							while($row = mysqli_fetch_object($query)){?>
								<tr>
									<td><?php echo $row->strFaciName?> </td>
									<td><?php
								
							$query2 = mysqli_query($con,"Select * from tblcategory where strCategoryCode = '".$row->strFaciCategory."'");
					
							if(mysqli_num_rows($query2) > 0){
								$row2 = mysqli_fetch_object($query2);
								echo $row2->strCategoryDesc;
					}?>
					
									</td>
										<td><?php echo $row->dblFaciDayCharge?></td>
										<td><?php echo $row->dblFaciNightCharge?></td>
										<td><?php echo $row->strFaciStatus?></td>
										
										<td><button type = submit  class="btn btn-primary btn-xs" name = 'btnedit' value = <?php echo $row->strFaciNo ?> ><i class="fa fa-pencil"></i></button></td>
									</tr>		 
								</form>  
					<?php 		}
							} 
	
	
	
	
	
	
}
?>