<!DOCTYPE html>
<?php session_start();
		 //echo "<script>alert('". $_SESSION['name']	."');</script>";
		 $a = $_SESSION['name'];
		  require('header.php');?>
	<?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->

<section id="main-content"><br>
    <section class="wrapper site-min-height">
		<button class="btn btn-theme" onclick="window.location.href='DocumentMaintenance.php'">Back to the Previous Page</button>
			<form method = POST>
                       <legend ><font face = "cambria" size = 8 color = "grey"> Edit Document Details</font></legend>		
				<div class = "showback">
					<input id="DocumentC" name ="DocumentC" class="form-control input-group-lg reg_name" type="hidden" <?php if(isset($_SESSION['id'])) {echo "value =  ".$_SESSION['id'];}?>  placeholder =" 000 DOC 123" readonly>				 							
						<p><font face = "cambria" size = 5 color = "grey"> Document Name </font></p>
				
					<div class = "form-group">
						<div class="col-sm-5">		   
							<input id="DocumentN"  name="DocumentN" class="form-control input-group-lg reg_name" type="text" title="Enter Document name" required <?php if(isset($_SESSION['id'])) {echo "value =  '".$a."'";}?>>				 
						</div><br><br><br>
						<p><font face = "cambria" size = 5 color = "grey">Price </font></p>
						
						<div class = "form-group">
							<div class="col-sm-5">		   
								<input id="DocumentN1"  name="Price" class="form-control input-group-lg reg_name" type= number step = any title="Enter Document name"  <?php if(isset($_SESSION['id'])) {echo "value =  ".$_SESSION['price'];}?> required >			 
							</div>
						</div><br><br><br>	
					</div><center>
	  
					<input type="submit" class="btn btn-info" name = "btnEdit" id = "btnEdit" value = "Edit Record" >
				</div>
			
	
				
	
				<?php if(isset($_POST['btnEdit'])){
					 $strDocC = $_POST['DocumentC'];
					 $strDocN = $_POST['DocumentN'];
					$strPrice = (double)$_POST['Price'];
					if($strDocC == NULL ||$strDocN == NULL ){
						echo "<script>alert('Please Complete the form');</script>";
					}
					else{
						require('connection.php');
						$g = mysqli_query($con,"UPDATE tbldocument SET strDocName ='$strDocN',strDocFee ='$strPrice' where intDocCode = '$strDocC'");
						if($g==true){
						session_destroy();
						echo "<script>alert('Success');</script>";
						echo "<script> window.location = 'DocumentMaintenance.php' </script> ";}
						else{}
					}				
				}
			 	 
				 
				if(isset($_POST['btnCancel'])){
					session_destroy();
				    echo "<script> window.location = 'DocumentMaintenance.php' </script> ";
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
