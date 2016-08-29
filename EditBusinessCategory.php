<!DOCTYPE html>
    <?php session_start();
	 require('header.php');?>
    <?php require('sidebar.php');
	require('connection.php');
	$a = $_SESSION['cate'];
	$query = "Select * from tblBusinessCate where strBusCatergory = '$a'" ;
	$sql = mysqli_query($con,$query);
	$row = mysqli_fetch_object($sql);	?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
       <section id="main-content">
          <section class="wrapper site-min-height">
		
	  <!--main content start-->  
				 
		<legend ><font face = "cambria" size = 8 color = "grey"> Add Business Category </font></legend> 
		<button  class="btn btn-info" onclick="window.location.href='BusinessCat.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
		<br><br>
<form method = POST>
					
<!-- DIV FOR FORM -->
		
	
  	<div class = 'showback'>	
	<p><font face = "cambria" size = 5 color = "grey"> Business Category Name </font>  </font></p>
		<div class = "form-group">
			<div class="col-md-5">
			   
		<input id="PDESC1" name="PDESC1" class="form-control input-group-lg reg_name" type="text" name="facName" title="Enter Facility name" <?php echo "value='".$row->strBusCateName."'";?>>	
			   </div>
		</div><br><br><br>
	

	<p><font face = "cambria" size = 5 color = "grey"> Amount </font></p>
	<div class = "form-group">
		   <div class="col-md-5">
		   
	<input id="PDESC1" name="Amount" class="form-control input-group-lg reg_name" type=number step = any   min = 0 name="facName" title="Enter Facility name"  <?php echo "value= ".$row->dblAmount."";?>>	
           </div>
	</div><br><br><br>
	

  	<center> <input type="submit" class="btn btn-success" name = "btnAdd" id = "btnAdd"  value = "Save Record"  > 
			 <?php
			 if (isset($_POST['btnAdd'])){
				 $strPD = $_POST['PDESC1'];
				  $strtype = $_POST['Amount'];
				
				 if($strPD == NULL ||$strtype == NULL ){
					 echo "<script>alert('Please Complete the form');</script>";
				 }
				 else{
					 require('connection.php');
					 mysqli_query($con,"update tblBusinessCate set strBusCateName = '$strPD', dblAmount = $strtype where strBusCatergory= '$a'");
					 echo "<script>alert('Success');
					 window.location = 'BusinessCat.php'</script>";
			 }}
				 ?>
    </center>
	</form>
</div><!--DIV END -->

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
