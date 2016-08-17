

<!-- Modal -->
<div id="DeceasedModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form method = POST>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">You are about to declare this person deceased:</h4>
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
				//echo "<script>alert('$m');</script>";
					mysqli_query($con,"Delete from tblhousemember where `intMemberNo` = $m");
				echo "<script>window.location = 'HholdPersonal.php'</script>";
					
				}?>