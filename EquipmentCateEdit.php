		 <?php session_start();?>
<!DOCTYPE html>
          <?php require('header.php');?>
    <?php require('sidebar.php');
	require('connection.php');
	$a = $_SESSION['a'];
	$query = "Select * FROM tblcategory where strCategoryCode = '$a'";
	$sql = mysqli_query($con,$query);
	$row = mysqli_fetch_object($sql);
	$desc = $row->strCategoryDesc;
	$Type= $row->strCategoryType;
	//echo "<script>alert('$Type')</script>";

	?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
	  <script>
	  
	  function a(){
		var zone = '<?php echo $Type;?>';
		  var selectobject = document.getElementById("ftype");
			 for (var i=0; i<selectobject.length; i++){
if(selectobject.options[i].value == zone){
	
	document.getElementById("ftype").value = selectobject.options[i].value;}
	}
	  }
	  
	  
	  </script>
      <section id="main-content">
          <section class="wrapper site-min-height">		<br>
		  	<button  class="btn btn-info" onclick="window.location.href='EquipmentCat.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>

		<legend ><font face = "cambria" size = 8 color = "grey"> Add Facility/Equipment Category </font></legend>
<form method = POST>					

	 	<div class = "showback">
	<p><font face = "cambria" size = 5 color = "grey"> Item Description </font></p>
	<div class = "form-group">
		   <div class="col-md-5">
		   
	<input id="PDESC1" name="PDESC1" class="form-control input-group-lg reg_name" type="text" name="facName" title="Enter Facility name" <?php echo "value='".$desc."'";	 ?>>	
           </div>
	</div><br><br><br>
	<?php echo "<script>a();</script>";?>
		<p><font face = "cambria" size = 5 color = "grey"> Item Type </font></p>
	<div class = "form-group">
		   <div class="col-md-5">
		   
	<select class = "form-control" name = "type" id = "ftype">
	<option value  ="Facility"> Facility</option>
	<option value = "Equipment">  Equipment</option>
	</select>
           </div>
	</div><br><br><br>
  
  	<center> <input type="submit" class="btn btn-outline btn-success" name = "btnAdd" id = "btnAdd"  value = "Save Record"  > 
</div>
			 
		<br><br>
			 <?php
			 if(isset($_SESSION['a'])){
				 echo "<script>a();</script>";
			 }
			 if (isset($_POST['btnAdd'])){
				 $strPD = $_POST['PDESC1'];
				  $strtype = $_POST['type'];
				
				 if($strPD == NULL ){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					 require('connection.php');
					   	mysqli_query($con,"Set @a = 2;");
					 mysqli_query($con,"Update tblcategory set strCategoryType = '$strtype', strCategoryDesc = '$strPD' where strCategoryCode = '$a' ");
					 echo "<script>alert('Success');
					 window.location = 'EquipmentCat.php'</script>";
			 }}
				 ?>
    </center>
	</form>
	
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
