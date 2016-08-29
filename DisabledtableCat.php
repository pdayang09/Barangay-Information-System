
<?php
require('connection.php');
$val = $_POST['sid'];?>
<table   class="table table-striped table-bordered table-hover"  border = '2' style = 'width:95%'>
						<thead>
							<tr>
								<th><i class="fa fa-bullhorn"></i> Business Type</th>
								<th><i class="fa fa-bookmark"></i> Amount</th>
								<th><i class="fa fa-edit"></i> Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th><i class="fa fa-bullhorn"></i> Business Type</th>
								<th><i class="fa fa-bookmark"></i> Amount</th>
								<th><i class="fa fa-edit"></i> Action</th>
							</tr>
						</tfoot>
						
					<tbody><?php
if($val == 2){
				$sql = "select * from tblBusinessCate where strStatus = 'Enabled'";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
					$i = 1;
					while($row = mysqli_fetch_object($query)){?>
					<tr> <td><?php echo $row->strBusCateName?></td>
					<td><?php echo $row->dblAmount?></td>
					<td><div class="btn-group " role="group" aria-label="..." >	
									<div class="btn-group " role="group">	
									<button  class="btn btn-primary btn-xs" type = submit name = "btnEdit" value = <?php echo $row->strBusCatergory; ?> ><i class="fa fa-pencil"></i></button>
									</div>
									<div class="btn-group " role="group" >	
									<button  class="btn btn-danger btn-xs" type = submit name = "btnDelete" onclick = "return confirm('Do you really want to continue?');" value = <?php echo $row->strBusCatergory; ?> >Disable</button>
									</div>
									</div></td>
<?php }}}
if($val == 1){
				$sql = "select * from tblBusinessCate where strStatus = 'Disabled'";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
					$i = 1;
					while($row = mysqli_fetch_object($query)){?>
					<tr> <td><?php echo $row->strBusCateName?></td>
					<td><?php echo $row->dblAmount?></td>
					<td><div class="btn-group " role="group" aria-label="..." >	
									
									
									<button  class="btn btn-primary btn-xs" type = submit name = "btnEnable" onclick = "return confirm('Do you really want to continue?');" value = <?php echo $row->strBusCatergory; ?> >Enable</button>
									
									</div></td>
<?php }}}?>