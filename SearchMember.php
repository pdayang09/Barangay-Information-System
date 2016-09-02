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
  

<button  class="btn btn-info" onclick="window.location.href='HholdPersonal.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
          <p><font face = "cambria" size = 5 color = "grey"> Enter Last Name: </font></p>
    <div class = "form-group">
      <div class="col-sm-3">
        <input id="searchLname" name = "Lastname"  onchange = "search()" class="form-control input-group-lg reg_name" type="text" maxlength = 10 required>       
           </div><button class="btn btn-info" onclick = "search()" name = "btnsubmit">Search</button>
    </div>


 
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

						<input id="Relate" class="form-control input-group-lg reg_name" type= text name="relation" title="Enter first name" >
						
						</div> 
		  
		   
		   
			</div><br><br><br>		  
						      </div>
						      <div class="modal-footer">
						        <button type="submit" class="btn btn-primary" name = "Save" onclick = "return validate()" >Save changes</button><?php
						require('connection.php');
						if(isset($_POST['Save'])){
						$hno = $_POST['no'];
						$memb = $_SESSION['Memb'];
						$relate = $_POST['relation'];
						
						echo "<script>alert('$hno');</script>";
						echo "<script>alert('$memb');</script>";
						echo "<script>alert('$relate');</script>";
						$sql = "UPDATE `tblhousemember` SET `intForeignHouseholdNo`= '$hno',`strStatus`= '$relate' WHERE intMemberNo = '$memb' ";
						mysqli_query($con,$sql);
						echo "<script> window.location = 'Hholdview.php'</script>";}?>
						      </div>
						    </div>
						  </div>
						</div>      				
      				</div>
					</form>
 <form method = POST>
<div class = "showback">
        <table id = 'tblview' class="table table-striped table-bordered table-hover" border = '2' style = 'width:95%'>
		
<tr>
<th>Household Head Name</th>
<th>Address</th>
<th>Action</th>
</tr>
<?php
$memb = $_SESSION['Memb'];


          require('connection.php');
        $sql = "SELECT concat(b.strLastName,', ',b.strFirstName) as 'Name' , concat(a.strBuildingNo,' ',strStreetName,', ',strZoneName) as 'Address', intHouseholdNo  from tblhousehold as a inner join tblhousemember as b on a.intHouseholdNo = b.intForeignHouseholdNo
		inner join tblstreet as c on a.intForeignStreetId = c.intStreetId inner join tblzone as d on c.intForeignZoneId = d.intZoneId  where b.strStatus = 'Head' ";
        $query = mysqli_query($con, $sql);
        if(mysqli_num_rows($query) > 0){
      
            while($row = mysqli_fetch_object($query)){
				$Hhold = $row->intHouseholdNo;
				echo "<script>alert('$Hhold')</script>";?>
          <tr> <td><?php echo $row->Name?></td>
          <td><?php echo $row->Address?></td>
          <td><button id = 'btn' type = button value = '<?php echo $Hhold?>' name = 'Edit' data-toggle="modal" data-target="#myModal" onclick = "a();">Transfer</button> </td>

          </tr>
        <?php }}
		?>

</table>
 </form>
 </div>
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
	  function a(){
	  var x = document.getElementsByName('Edit').value;
	  alert(x);
	  document.getElementById('ID').value = x;
  }
	  
	 function validate(){
	 if(document.getElementById('Relate').value == 'Head' || document.getElementById('Relate').value == 'head' ){
		 alert('Please input proper relation!');
		 return false;
	 }
	 else{}
	 } 
	  
	  
function search(){
	var ser = document.getElementById('searchLname').value;
	//alert(ser);
	
	        $.ajax({
    type: "POST",
     url: "search2.php",
     data: 'sid=' + ser,
     success: function(data){
         //alert(data);
          $("#tblview").html(data);
      }
        
    });
}
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
