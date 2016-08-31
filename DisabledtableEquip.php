	<form method = POST>
<?php
require('connection.php');
$val = $_POST['sid'];?>
     
                               <table class="table table-striped table-bordered table-hover"  border = '3' style = 'width:95%'><!-- Table -->
					<thead>
						<tr>
							<th><i class="fa fa-question-circle"></i> Equipment </th>
							<th><i class="fa fa-bullhorn"></i> Category </th>
							<th><i class="fa fa-bookmark"></i> Resident Price</th>
							<th><i class="fa fa-bookmark"></i> Non-Resident Price</th>
							<th><i class="fa fa-cog"></i> Quantity </th>
							<th><i class="fa fa-edit"></i> Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th><i class="fa fa-question-circle"></i> Equipment </th>
							<th><i class="fa fa-bullhorn"></i> Category </th>
							<th><i class="fa fa-bookmark"></i> Resident Price</th>
							<th><i class="fa fa-bookmark"></i> Non-Resident Price</th>
							<th><i class="fa fa-cog"></i> Quantity </th>
							<th><i class="fa fa-edit"></i> Action</th>
						</tr>
					</tfoot>
					
					<tbody><?php
if($val == 2){require('connection.php');
						$sql = "select * from tblequipment where strStatus = 'Enabled'";
						$query = mysqli_query($con, $sql);
				
						if(mysqli_num_rows($query) > 0){
							$i = 1;
					
							while($row = mysqli_fetch_object($query)){?>
								<tr> <td><?php echo $row->strEquipName?></td>
									<td><?php 
					
								$query2 = mysqli_query($con,"Select * from tblCategory where strcategorycode = '$row->strEquipCategory'");
							
								if(mysqli_num_rows($query2) > 0){
							
									while($row1 = mysqli_fetch_object($query2)){
										echo  $row1->strCategoryDesc;

									}
								}
					?>				</td>
									<td><?php echo $row->dblEquipFee?></td>
									<td><?php echo $row->dblEquipNResidentCharge?></td>
									<td><?php echo $row->intEquipQuantity?></td>
									<td>
									<div class="btn-group " role="group" aria-label="..." >	
										<div class="btn-group " role="group">	
											<button  class="btn btn-info btn-xs" type = submit name = "btnEdit" value = <?php echo $row->strEquipNo; ?> ><i class="fa fa-pencil"></i></button>
										</div>
										<div class="btn-group " role="group" >	
											<button  class="btn btn-danger btn-xs" type = submit name = "btnDelete" onclick = "return confirm('Do you really want to continue?');" value = <?php echo $row->strEquipNo; ?> >Disable</button>
										</div>
									</div>
									</td>
								</tr>
		<?php }} }
if($val == 1){require('connection.php');
						$sql = "select * from tblequipment where strStatus = 'Disabled'";
						$query = mysqli_query($con, $sql);
				
						if(mysqli_num_rows($query) > 0){
							$i = 1;
					
							while($row = mysqli_fetch_object($query)){?>
								<tr> <td><?php echo $row->strEquipName?></td>
									<td><?php 
					
								$query2 = mysqli_query($con,"Select * from tblCategory where strcategorycode = '$row->strEquipCategory'");
							
								if(mysqli_num_rows($query2) > 0){
							
									while($row1 = mysqli_fetch_object($query2)){
										echo  $row1->strCategoryDesc;

									}
								}
					?>				</td>
									<td><?php echo $row->dblEquipFee?></td>
									<td><?php echo $row->dblEquipNResidentCharge?></td>
									<td><?php echo $row->intEquipQuantity?></td>
									<td>
									<div class="btn-group " role="group">	
									<button  class="btn btn-info btn-xs" type = submit  onclick = "return confirm('Do you really want to continue?');" name = "btnEnable" value = <?php echo $row->strEquipNo; ?> >Enable</button>
									</div>
									</td>
								</tr>
		<?php }} }?>
</tbody>
</table>
</form>