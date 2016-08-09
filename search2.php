 <?php session_start();?>
<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">	
<legend ><font face = "cambria" size = 8 color = "grey"> Resident Module </font></legend>
  <script>
  function a(){
	  var x = document.getElementById('btn').value;
	  document.getElementById('ID').value = x;
  }
  </script>

<button  class="btn btn-info" onclick="window.location.href='HholdPersonal.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
  <form method = POST>
      				<! -- MODALS -->
      		
						<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Transfer Resident</h4>
						      </div>
						      <div class="modal-body">
						       <input id="ID" class="form-control input-group-lg reg_name" type= hidden name="no" title="Enter first name">
			<p><font face = "cambria" size = 4 color = "grey">Relation to the Owner<font></p>

					<div class="form-group">				
					<div class="col-sm-3">

						<input id="RFName1" class="form-control input-group-lg reg_name" type= text name="relation" title="Enter first name" >
						
						</div> 
		  
		   
		   
			</div><br><br><br>		  
						      </div>
						      <div class="modal-footer">
						        <button type="submit" class="btn btn-primary" name = "Save" >Save changes</button><?php
						require('connection.php');
						if(isset($_POST['Save'])){
						$hno = $_POST['no'];
						$memb = $_SESSION['Memb'];
						$relate = $_POST['relation'];
						$sql = "UPDATE `tblhousemember` SET `intForeignHouseholdNo`= '$hno',`Status`= '$relate' WHERE intMemberNo = '$memb' ";
						mysqli_query($con,$sql);
						echo "<script> window.location = 'Hholdview.php'</script>";}?>
						      </div>
						    </div>
						  </div>
						</div>      				
      				</div>
					</form>
<br><br>  <form method = POST>
        <table border = '2' style = 'width:95%'>
		
<tr>
<th>Household Head Name</th>
<th>Address</th>
<th>Action</th>
</tr>
<?php
$memb = $_SESSION['Memb'];
$a = $_SESSION['Last'];
          require('connection.php');
        $sql = "SELECT concat(b.strLastName,', ',b.strFirstName) as 'Name' , concat(a.strBuildingNo,' ',a.strStreet,', ',a.strPurok) as 'Address', a.intHouseholdNo as 'No'  from tblhousehold as a inner join tblhousemember as b on a.intHouseholdNo = b.intForeignHouseholdNo where b.strStatus = 'Head' AND b.strLastName = '$a'";
        $query = mysqli_query($con, $sql);
        if(mysqli_num_rows($query) > 0){
      
            while($row = mysqli_fetch_object($query)){?>
          <tr> <td><?php echo $row->Name?></td>
          <td><?php echo $row->Address?></td>
          <td><button id = 'btn' type = button value = <?php echo $row->No?> name = 'Edit' data-toggle="modal" data-target="#myModal" onclick = "a();">Transfer</button> </td>

          </tr>
        <?php }}
		?>

</table>
 </form>
                 </center>      
                    </div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
