 <?php session_start();?>
<!DOCTYPE html>

          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
	  <?php require('Removevalidatefamily.php');?>
          <section class="wrapper site-min-height">		
<legend ><font face = "cambria" size = 8 color = "grey"> Resident Module </font></legend>
<div class="input-append"><div class="form-group">				
           <div class="col-sm-3">

        <input class="form-control input-group-lg reg_name" name="search" id="search" placeholder = "Input Last Name"/></div><button class="btn btn-info" onclick = "Search();" name = "s1">Search</button>
</div></div><br>

					<div class="btn-group" role="group">
					<button  class="btn btn-info" onclick = "window.location.href='AddHhold.php'">Create New Household</button>
					
					</div>	
					<br>

	
<br>

	<form method = POST><center>
	<div class = "showback" id = "tableHousehold">
<table  class="table table-striped table-bordered table-hover"  border = '2' style = 'width:95%'>
<tr>
<th>Household Name</th>
<th>Address</th>
<th>Residence Status</th>
<th>Action</th>
</tr>
<?php
					require('connection.php');
				$sql = "SELECT strHouseholdLname, concat(strBuildingNo,' ',strStreetName,' ',strPurok) as 'Address',strResidence , intHouseholdNo FROM `tblhousehold` inner join `tblstreet` on intStreetId = intForeignStreetId where !(strStatus = 'Disabled') ";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
			
					while($row = mysqli_fetch_object($query)){?>
					<tr> <td><?php echo $row->strHouseholdLname?></td>
					<td><?php echo $row->Address?></td>
				<td><?php echo $row->strResidence?></td>
					<td><div class="btn-group " role="group" aria-label="..." >	
					<div class="btn-group" role="group"> 
					<button class="btn btn-primary btn-round btn-xs" type = submit value = <?php echo $row->intHouseholdNo?> name = 'Edit' >View</button>
					
					</div>	
					<div class="btn-group" role="group"> 
					 <button  class="btn btn-success btn-xs" type = button value = <?php echo $row->intHouseholdNo?> onclick = "Del(this.value)" data-toggle="modal" data-target="#RemoveModal"  name = 'Move' >Remove</button>
			
					</div>	
					<div class="btn-group" role="group">
				
					 <button class="btn btn-success btn-round btn-xs" type = submit value = <?php echo $row->intHouseholdNo?> name = 'transfer' >Transfer</button></td>
					</div>	
					</div>
			
					</tr>
				<?php }}
				if(isset($_POST['Edit'])){
					$_SESSION['Hno'] = $_POST['Edit'];
					echo "<script>window.location = 'HholdPersonal.php'</script>";
				}
				
		
				
						if(isset($_POST['transfer'])){
					$_SESSION['transfer'] = $_POST['transfer'];
					require('connection.php');
					echo "<script>window.location = 'TransferHhold.php'</script>";
				}		
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
  function Del(val){
      										//alert(val);
      											$.ajax({
      											type: "POST",
      											url: "Deletefamily.php",
      											data: 'sid=' + val,
      											success: function(data){
      											//alert(data);
      										$("#Remove").html(data);
      										}
      									});
      								}
      //custom select box
	function Search(){
		var b = document.getElementById('search').value;
		//alert(b);
		$.ajax({
		type: "POST",
		url: "gettable2.php",
		data: 'sid=' + b,
		success: function(data){
			//alert(data);
			$("#tableHousehold").html(data);
		}
		});
	}
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
