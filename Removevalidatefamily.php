

<!-- Modal -->
<div id="RemoveModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<form method = POST>
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">You are about to remove:</h4>
				</div>
				<div class="modal-body" id = "Remove">
					
				</div>
				<div class="modal-footer">
					
				</div>
			</div>

		</div>
	</div></form>
	<?php if(isset($_POST['del'])){
		
		$m = $_POST['del'];
					require('connection.php');
					mysqli_query($con,"Delete from tblhousemember WHERE intForeignHouseholdNo = '$m' ");
					mysqli_query($con,"Delete from tblhousehold WHERE intHouseholdNo = '$m' ");
					echo "<script>window.location = 'Hholdview.php'</script>";
		
	}?>