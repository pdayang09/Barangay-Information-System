

<!-- Modal -->
<div id="TransferModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Transfer A Household Member</h4>
				</div>
				<div class="modal-body" id = "Transfer">
					
				</div>
				<div class="modal-footer">
					
				</div>
			</div>

		</div>
	</div>
	  <?php
								
								
								
								if(isset($_POST['Exist'])){
									$_SESSION['Memb'] = $_POST['Exist'];
								echo "<script> 
								window.location = 'SearchMember.php';</script>";}
								
								
								if(isset($_POST['NewH'])){
									$_SESSION['Memb'] = $_POST['NewH'];
									echo "<script> window.location = 'TransferHMember2.php';</script>";
									}
								?>
	