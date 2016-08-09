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
<legend ><font face = "cambria" size = 8 color = "grey"> Facility/Equipment Category Maintenance </font></legend>
                     
                               <form method = POST>
	 <input type="button" class="btn btn-info" name = "btnEdit1" id = "btnEdit1" value = "Add Category" onclick = "window.location='EquipmentCateAdd.php'">
                           
                               
<center>
<br><div class = "showback">
					 <table   class="table table-striped table-bordered table-hover"  border = '2' style = 'width:95%'>
					<thead>
					<tr>
										<th>Category ID</th>
					<th>Category Name</th>
					<th>Category Type</th>
					<th>Delete</th>
					</tr>
					</thead>
					<tbody>
					<?php
					require('connection.php');
				$sql = "select * from tblCategory ";
				$query = mysqli_query($con, $sql);
				if(mysqli_num_rows($query) > 0){
					$i = 1;
					while($row = mysqli_fetch_object($query)){?>
					<tr> <td><?php echo $row->strCategoryCode?></td>
					<td><?php echo $row->strCategoryDesc?></td>
					<td><?php echo $row->strCategoryType?></td>
					<td><button class ="btn btn-success btn-sm" type = submit name = "del" value =<?php echo $row->strCategoryCode?>>DELETE</button></td>
				<?php }}
				if(isset($_POST['del'])){
					$a = $_POST['del'];
					mysqli_query($con,"Delete From tblCategory where strCategoryCode = '$a'");
					echo "<script>alert('Successful!');
					window.location ='EquipmentCat.php';</script>";
				}				?></tbody>
				</table>
				
</center>
</form>
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
