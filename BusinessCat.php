 <?php session_start();?>
<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->  
				 
      <section id="main-content">
          <section class="wrapper site-min-height">		<form method = POST>
<legend ><font face = "cambria" size = 8 color = "grey"> Business Maintenance </font></legend>
                     
                              
	 <input type="button" class="btn btn-info" name = "btnEdit1" id = "btnEdit1" value = "Add Category" onclick = "window.location = 'AddBusinessCategory.php'" >
	 &nbsp;&nbsp;<input type= checkbox id = "showdisabled" onclick ="showdis()"> Show Disabled Items
                            <form method = POST>
                               
<center>
<br><div class = "showback" id = "tblview">
					 <table   class="table table-striped table-bordered table-hover"  border = '2' style = 'width:95%'>
					<thead>
					<tr>
					<th>Business Type</th>
					<th>Amount</th>
					<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					require('connection.php');
				$sql = "select * from tblBusinessCate where strStatus = 'Enabled'";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
					$i = 1;
					while($row = mysqli_fetch_object($query)){?>
					<tr> <td><?php echo $row->strBusCateName?></td>
					<td><?php echo $row->dblAmount?></td>
					<td><div class="btn-group " role="group" aria-label="..." >	
									<div class="btn-group " role="group">	
									<button  class="btn btn-info btn-round" type = submit name = "btnEdit" value = <?php echo $row->strBusCatergory; ?> >Edit</button>
									</div>
									<div class="btn-group " role="group" >	
									<button  class="btn btn-danger btn-round" type = submit name = "btnDelete" onclick = "return confirm('Do you really want to continue?');" value = <?php echo $row->strBusCatergory; ?> >Disable</button>
									</div>
									</div></td>
				<?php }}
				?></tbody>
				</table>
				</div>
</center>
</form>
             <?php	if(isset($_POST['btnEdit'])){
					$_SESSION['cate'] = $_POST['btnEdit'];
					
				echo "<script>
					window.location ='EditBusinessCategory.php';</script>";
				}				
				if(isset($_POST['btnDelete'])){
					$a = $_POST['btnDelete'];
					mysqli_query($con,"Update tblBusinessCate set strStatus = 'Disabled' where strBusCatergory = '$a'");
				echo "<script>
					window.location ='BusinessCat.php';</script>";
				}
if(isset($_POST['btnEnable'])){
					$a = $_POST['btnEnable'];
					mysqli_query($con,"Update tblBusinessCate set strStatus = 'Enabled' where strBusCatergory = '$a'");
				echo "<script>
					window.location ='BusinessCat.php';</script>";
				}						?>       </div>
			
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
	function showdis(){
		var val = 0;
		if(document.getElementById('showdisabled').checked){
			val = 1;
		}
		else{
			val = 2;
		}
		//alert(val);
		$.ajax({
		type: "POST",
		url: "DisabledtableCat.php",
		data: 'sid=' + val,
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
