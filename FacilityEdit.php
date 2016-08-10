<!DOCTYPE html>
          <?php session_start();
		  
		  require('header.php');?>
    <?php require('sidebar.php');?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->

<script>
function a(){
	
	var strtype = '<?php echo $_SESSION['stat']?>';
	var selectobject = document.getElementById("facstatus");
	
		for (var i=0; i<selectobject.length; i++){
			if(selectobject.options[i].value == strtype){
				document.getElementById("facstatus").value = selectobject.options[i].value;}
			else{
			}
		}
}
</script>
     
      <section id="main-content">
	  <br>
          <section class="wrapper site-min-height">
 <button class="btn btn-theme" onclick= "window.location.href='FacilityMaintenance.php'">Back to the Previous Page</button>
 	                           <form method = POST>

    
    
        <!-- Page Content -->
   
			<legend ><font face = "cambria" size = 8 color = "grey"> Edit Facility </font></legend>
<div class = "showback">
			<p><font face = "cambria" size = 5 color = "grey"> Facility Name </font></p>
	
			<div class = "form-group">
				<div class="col-sm-5">
					<input id="facId" name ="facId" class="form-control input-group-lg reg_name" type="text"  placeholder=" 000 FAC 123" <?php			 
					if(isset($_SESSION['fcode'])){echo "value = '".$_SESSION['fcode']."'";}?> readonly = true maxlength = 1->
				</div>
			</div><br><br><br>
	
			<p><font face = "cambria" size = 5 color = "grey"> Category </font></p>
	
			<div class = "form-group">
				<div class="col-sm-5">		   
				<input id="facName"  name="facName" class="form-control input-group-lg reg_name" type="text" title="Enter Facility name"  <?php				 
				if(isset($_SESSION['fcode'])){echo "value = '".$_SESSION['type']."'";}?> readonly >
				</div>
			</div><br><br><br>
	
			<p><font face = "cambria" size = 5 color = "grey"> Day Price </font></p>
	
			<div class = "form-group">
				<div class="col-sm-5">
				<input id="facId1" name ="dayprice" class="form-control input-group-lg reg_name" type=number step = any min =0    <?php
				if(isset($_SESSION['fcode'])){echo "value = '".$_SESSION['dayprice']."'";}?> >
				</div>
			</div><br><br>

	<p><font face = "cambria" size = 5 color = "grey"> Night Price </font></p>
	
			<div class = "form-group">
				<div class="col-sm-5">
				<input id="facId1" name ="nightprice" class="form-control input-group-lg reg_name" type=number step = any min =0    <?php
				if(isset($_SESSION['fcode'])){echo "value = '".$_SESSION['nightprice']."'";}?> required>
				</div>
			</div><br><br>

<p><font face = "cambria" size = 5 color = "grey"> Resident Price </font></p>
	
			<div class = "form-group">
				<div class="col-sm-5">
				<input id="facId1" name ="residentprice" class="form-control input-group-lg reg_name" type=number step = any min =0    <?php
				if(isset($_SESSION['fcode'])){echo "value = '".$_SESSION['residentprice']."'";}?>required>
				</div>
			</div><br><br>

			<p><font face = "cambria" size = 5 color = "grey"> Status </font></p>
		
			<div class = "form-group">
				<div class="col-md-5">
					<select class="form-control input-group-lg reg_name" id = "facstatus" name = "facstatus">
						<option> Good Condition</option>
						<option> Under Maintenance</option>
						<option> Broken</option>
					</select>
				</div>
			</div><br><br><br><br><br>
	
			
			<?php echo "<script>a();</script>"?><center> 
	
				<input type="submit" class="btn btn-info" name = "btnEdit" id = "btnEdit" value = "Save Record" ></div>
	
			<?php //Validation
		
			if(isset($_POST['btnEdit'])){
					$strcode = $_POST['facId'];
					$strdayprice = (double)$_POST['dayprice'];
					$strnightprice = (double)$_POST['nightprice'];
					$strresidentprice = (double)$_POST['residentprice'];
					$strStatus = $_POST['facstatus'];
					$b=0;
					
				if (preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $strprice)){
					$b = 1;}
					
				if($strStatus == NULL ){
					 echo "<script>alert('Please Complete the form');</script>";
				}else{
					if($b == 1){echo "<script>alert('Characters like /[\^£$%&*()}{@#~?><>,|=_+¬-]/ is not allowed');</script>";}
					else{
						require('connection.php');
						mysqli_query($con,"Update tblfacility Set strFaciStatus = '$strStatus', dblFaciDayCharge = $strdayprice,dblFaciNightCharge = $strnightprice,dblFaciDiscount = $strresidentprice where strFaciName = '$strcode';");
					 
						echo "<script>alert('Success');</script>";
					 	session_destroy();
						echo "<script>window.location = 'FacilityMaintenance.php'</script>
					";}
				}
			}
			 
		?></center><br><br>
                       </form>
                               <!-- /#page-content-wrapper -->

			
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
