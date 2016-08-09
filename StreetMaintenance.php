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
<legend ><font face = "cambria" size = 8 color = "grey">Street Maintenance </font></legend>
<br>
<div class="input-append">
       <input name="search" id="searchr"  placeholder = "Input Street Name"/>
    <button class="btn btn-info btn-round btn-xs  " id = "searchst" name = "s1" value = 2 onclick = "search(this.value)"><i class = "glyphicon glyphicon-search"></i></button>
 <button class="btn btn-info btn-round btn-xs " id = "searchst" name = "s1" value = 1 onclick = "search(this.value)" ><i class = "	glyphicon glyphicon-eye-open"></i></button>


</div><br>
	<button  class="btn btn-info btn-round" onclick = "window.location.href='AddStreet.php'">Add New Street</button><br>
<center><br>		            <form method = POST>                		
				<div class = "showback" id = "tablestreet">
	
				<table class="table table-striped table-bordered table-hover"  border = '3' style = 'width:95%'><!-- Table -->
					<thead><tr>
						<th> Street ID </th>
						<th> Street Name </th>
						<th> Purok Name </th>
						<th> Action </th>
					</tr></thead>
					
					<tbody><?php
					require('connection.php');
						$sql = "select intStreetId , strStreetName, strZoneName from tblStreet inner join tblZone on intForeignZoneId = intZoneId order by intForeignZoneId , intStreetId desc";
						$query = mysqli_query($con, $sql);
				
						if(mysqli_num_rows($query) > 0){
							$i = 1;
					
							while($row = mysqli_fetch_object($query)){?>
								<tr> <td><?php echo $row->intStreetId?></td>
									<td><?php echo $row->strStreetName?>				</td>
									<td><?php echo $row->strZoneName?></td>
									<td>
									<div class="btn-group " role="group" aria-label="..." >	
									<div class="btn-group " role="group">	
									<button  class="btn btn-info btn-round" type = submit name = "btnEdit" value = <?php echo $row->intStreetId; ?> >Edit</button>
									</div>
									<div class="btn-group " role="group" >	
									<button  class="btn btn-success btn-round" type = submit name = "btnDelete" value = <?php echo $row->intStreetId; ?> >Delete</button>
									</div>
									</div></td>
								</tr>
		<?php }} ?></tbody>
				</table>
			</div><br><br>
				<?php
					if(isset($_POST['btnEdit'])){
						$_SESSION['street'] = $_POST['btnEdit'];		

							echo "<script> window.location = 'EditStreet.php';</script>";						
					}
					?>
					
                    </form>             
                  </center>
			
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
function search(val){
	var a = document.getElementById('searchr').value;

	$.ajax({
		type: "POST",
		url: "gettable.php",
		data: 'sid=' + a +'&bid='+val,
		success: function(data){
			//alert(data);
			$("#tablestreet").html(data);
		}
		
	});
	
	  
}
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
