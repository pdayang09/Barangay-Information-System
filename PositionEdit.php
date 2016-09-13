<!DOCTYPE html>
<?php session_start();
		 //echo "<script>alert('". $_SESSION['name']	."');</script>";
		 $a = $_SESSION['name'];
		 $b = $_SESSION['view'];
		  require('header.php');?>
	<?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
<script>
function a(){
	
	if(document.getElementById('Viewed').value == 'Sec'){
		document.getElementsByName('View')[0].checked = true;
	}
	else if(document.getElementById('Viewed').value == 'Kap'){
				document.getElementsByName('View')[1].checked = true;
	}
	else if(document.getElementById('Viewed').value == 'Liason'){
				document.getElementsByName('View')[2].checked = true;
	}
	else if(document.getElementById('Viewed').value == 'Admin'){
				document.getElementsByName('View')[3].checked = true;
	}
}
</script>

<section id="main-content"><br>
    <section class="wrapper site-min-height">
		<button class="btn btn-theme" onclick="window.location.href='PositionMaintenance.php'">Back to the Previous Page</button>
			<form method = POST>
                       <legend ><font face = "cambria" size = 8 color = "grey"> Edit Position Details</font></legend>		
				<div class = "showback">
					<input id="DocumentC" name ="DocumentC" class="form-control input-group-lg reg_name" type="hidden" <?php if(isset($_SESSION['id'])) {echo "value =  ".$_SESSION['id'];}?>  placeholder =" 000 DOC 123" readonly>		

					<input id="Viewed"  class="form-control input-group-lg reg_name" type="hidden" <?php if(isset($_SESSION['view'])) {echo "value =  ".$_SESSION['view'];}?>  placeholder =" 000 DOC 123" readonly>							
						<p><font face = "cambria" size = 5 color = "grey"> Position Name </font></p>
				
					<div class = "form-group">
						<div class="col-sm-5">		   
							<input id="DocumentN"  name="DocumentN" class="form-control input-group-lg reg_name" type="text" title="Enter Document name" required <?php if(isset($_SESSION['name'])) {echo "value =  '".$a."'";}?>>				 
						</div><br><br><br>
						<p><font face = "cambria" size = 5 color = "grey">Number </font></p>
						
						<div class = "form-group">
							<div class="col-sm-5">		   
								<input id="DocumentN1"  name="Price" class="form-control input-group-lg reg_name" type= number  title="Enter Document name"  <?php if(isset($_SESSION['number'])) {echo "value =  ".$_SESSION['number'];}?> required >			 
							</div>
						</div><br><br><br>	
						
						<font face = "cambria" size = 5 color = "grey"> View </font></p>
					<div class = "form-group">
						<div class="col-sm-12">		   
						<input id="View1"  name="View"  value = "Sec" type= radio> Secretary View <br>
						<input id="View2"  name="View"  value = "Kap" type= radio> Barangay Captain View<br>
						<input id="View3"  name="View"  value = "Liason" type= radio> Liaison View<br>
						<input id="View4"  name="View"  value = "Admin" type= radio> Administrator View<br>
						</div>
					</div><br><br><br><br><br>			
					</div><center>
	  <?php echo "<script> a();</script>"?>
					<input type="submit" class="btn btn-info" name = "btnEdit" id = "btnEdit" value = "Edit Record" >
				</div>
			
	
				
	
				<?php if(isset($_POST['btnEdit'])){
					 $strDocC = $_POST['DocumentC'];
					 $strDocN = $_POST['DocumentN'];
					$strPrice = $_POST['Price'];
					$strView =  $_POST['View'];
					if($strDocC == NULL ||$strDocN == NULL ){
						echo "<script>alert('Please Complete the form');</script>";
					}
					else{
						require('connection.php');
						mysqli_query($con,"Set @a = 2;");
						$g = mysqli_query($con,"UPDATE tblbrgyposition SET strPositionName ='$strDocN',intNumber ='$strPrice', strView = '$strView' where intPositionId = '$strDocC'");
						if($g==true){
						session_destroy();
						echo "<script>alert('Success');</script>";
					
						echo "<script> window.location = 'PositionMaintenance.php' </script> ";}
						else{}
					}				
				}
			 	 
				 
				if(isset($_POST['btnCancel'])){
					session_destroy();
				    echo "<script> window.location = 'PositionMaintenance.php' </script> ";
				}
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
