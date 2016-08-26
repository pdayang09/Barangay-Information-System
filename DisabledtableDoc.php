
<?php
require('connection.php');
$val = $_POST['sid'];?>
     
                                <center>
								<table   class="table table-striped table-bordered table-hover"   border = '2' style = 'width:95%'>
								<thead>
								<tr>
								
								<th>Document Name</th>
								<th>Price</th>
								<th>Action</th>							
								</tr>
								</thead>
								<tbody><?php
if($val == 2){
				require('connection.php');
								$sql = "select * from tbldocument where strStatus = 'Enabled'";
								$query = mysqli_query($con, $sql);
				
								if(mysqli_num_rows($query) > 0){
								$i = 1;
								
								while($row = mysqli_fetch_object($query)){
									?>
								<tr>
								<td><?php echo $row->strDocName?></td>
								<td><?php echo $row->strDocFee?></td>
								<td>
								<div class="btn-group " role="group" aria-label="..." >	
									<div class="btn-group " role="group">	
									<button  class="btn btn-info btn-round" type = submit name = "btnEdit" value = <?php echo $row->intDocCode; ?> >Edit</button>
									</div>
									<div class="btn-group " role="group" >	
									<button  class="btn btn-danger btn-round" type = submit name = "btnDelete" onclick = "return confirm('Do you really want to continue?');" value = <?php echo $row->intDocCode; ?> >Disable</button>
									</div>
									</div>
							</td>
								</tr>
								
								<?php  }}}
if($val == 1){
				require('connection.php');
								$sql = "select * from tbldocument where strStatus = 'Disabled'";
								$query = mysqli_query($con, $sql);
				
								if(mysqli_num_rows($query) > 0){
								$i = 1;
								
								while($row = mysqli_fetch_object($query)){
									?>
								<tr>
								<td><?php echo $row->strDocName?></td>
								<td><?php echo $row->strDocFee?></td>
								<td>
									
									<button  class="btn btn-info btn-round" type = submit name = "btnEnable" onclick = "return confirm('Do you really want to continue?');" value = <?php echo $row->intDocCode; ?> >Enable</button>
									
									
							</td>
								</tr>
								
								<?php  }}}?>
</tbody>
</table>