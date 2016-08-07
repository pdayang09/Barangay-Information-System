<!DOCTYPE html>
          <?php session_start(); require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
         <br>
          <section class="wrapper site-min-height">
 <button  class="btn btn-info" onclick="window.location.href='DocumentPMaintenance.php'">  <i class="glyphicon glyphicon-hand-left" aria-hidden="true"></i>&nbsp;Back to the Previous Page</button>
<form method = POST>
<legend><font face = "cambria" size = 8 color = "grey"> Edit Purpose Details </font></legend>
		
		<form method = POST>
						
	<p><font face = "cambria" size = 5 color = "grey" > Purpose ID </font></p>
	
			<div class = "form-group">
				<div class="col-sm-5">
				<input id="PurposeC" name ="PurposeC" readonly = true class="form-control input-group-lg reg_name" type="text"  placeholder=" 000 PUR 123" value = <?php if(isset($_SESSION['id'])){echo $_SESSION['id']; }?> >
			 
				</div>
			</div><br><br><br>
	
				<p><font face = "cambria" size = 5 color = "grey"> Purpose Description </font></p>
			
			<div class = "form-group">
				<div class="col-md-5">		   
				<textarea type = text id="PurposeN"  name="PurposeN" class="form-control input-group-lg reg_name"   required type="text" title="Enter Purpose Description"><?php if(isset($_SESSION['id'])){echo $_SESSION['purp']; }?></textarea>
			 
				</div>
			</div><br><br><br><br><br>
		
  
				<input type="submit" class="btn btn-outline btn-info" name = "btnEdit" id = "btnEdit" value = "Save Changes" >

				<br><br><br></div> </table><br><br>
	
				<?php if(isset($_POST['btnEdit'])){
					 $strPurC = $_POST['PurposeC'];
					 $strPurN = $_POST['PurposeN'];
				
					if($strPurC == NULL ||$strPurN == NULL ){
						echo "<script>alert('Please Complete the form');</script>";
					}
					else{
						require('connection.php');
						mysqli_query($con,"UPDATE tbldocumentpurpose SET strPurposeName = '$strPurN' where strDocPurposeID ='$strPurC'");
						echo "<script>alert('Success');</script>";
						echo "<script> window.location = 'DocumentPMaintenance.php'; </script>";
					}				
				}
			 	 
		
					 
			    
			
			?>
								
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
